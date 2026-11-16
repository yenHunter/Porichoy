<?php

namespace App\Services\Settings;

use App\Http\Requests\Admin\Settings\ProfileUpdateRequest;
use App\Http\Requests\Admin\Settings\SelectTypeRequest;
use App\Models\ColumnSettings;
use App\Models\Country;
use App\Models\EducationInfo;
use App\Models\ExperienceInfo;
use App\Models\ProfileInfo;
use App\Models\SelectType;
use App\Traits\UserLogTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class SettingsService
{
    use UserLogTrait;

    private const PROFILE_DIR = 'uploads/profile';

    /**
     * Profile-info categories handled by the profile management form.
     */
    private const PROFILE_CATEGORIES = [
        ProfileInfo::BASIC,
        ProfileInfo::PERSONAL,
        ProfileInfo::ADDRESS,
        ProfileInfo::PRESENT_ADDRESS,
        ProfileInfo::PERMANENT_ADDRESS,
        ProfileInfo::SOCIAL,
    ];

    /**
     * Data for the profile management view.
     *
     * @return array<string, mixed>
     */
    public function profileViewData(): array
    {
        return [
            'profile_data' => [
                ProfileInfo::BASIC => ProfileInfo::basicInfo()->active()->get()->keyBy('column_name'),
                ProfileInfo::PERSONAL => ProfileInfo::personalInfo()->active()->get()->keyBy('column_name'),
                ProfileInfo::ADDRESS => ProfileInfo::addressInfo()->active()->get()->keyBy('column_name'),
                ProfileInfo::PRESENT_ADDRESS => ProfileInfo::presentAddressInfo()->active()->get()->keyBy('column_name'),
                ProfileInfo::PERMANENT_ADDRESS => ProfileInfo::permanentAddressInfo()->active()->get()->keyBy('column_name'),
                ProfileInfo::SOCIAL => ProfileInfo::socialInfo()->active()->get()->keyBy('column_name'),
                'education' => EducationInfo::active()->sorted()->first(),
                'experience' => ExperienceInfo::active()->sorted()->first(),
            ],
            'available_flags' => Country::active()->sorted()->get()->map(fn ($country) => [
                'name' => $country->name,
                'code' => $country->code,
                'path' => $country->flag_path,
            ])->toArray(),
        ];
    }

    /**
     * Apply the profile update payload (per-category nested values/uploads).
     */
    public function updateProfile(ProfileUpdateRequest $request): void
    {
        foreach (self::PROFILE_CATEGORIES as $category) {
            $inputs = $request->input($category, []);
            foreach ($inputs as $id => $value) {
                if ($value instanceof UploadedFile && $value->isValid()) {
                    $this->storeProfileFile($id, $value);
                } else {
                    ProfileInfo::where('id', $id)->update(['column_value' => $value]);
                }
            }
        }

        $this->logUserActivity('ProfileInfo', 'Portfolio profile information updated');
    }

    /**
     * Column settings of a module's list (the lookup screens' column modal).
     *
     * @return Collection<int, ColumnSettings>
     */
    public function selectTypeColumnSettings(string $module): Collection
    {
        return ColumnSettings::where('module', $module)->get();
    }

    /**
     * Rows for a select-type lookup view.
     *
     * @param  string  $use_for  Any SelectType use_for constant
     * @param  string|null  $with_count  Relation to count per row (e.g. blog posts)
     * @return Collection<int, SelectType>
     */
    public function selectTypeViewData(string $use_for, ?string $with_count = null): Collection
    {
        $query = SelectType::where('use_for', $use_for);

        if ($with_count !== null) {
            $query->withCount($with_count);
        }

        return $query->sorted()->get();
    }

    /**
     * How many records of $relation still point at this lookup row.
     *
     * Deleting is blocked while this is above zero: the foreign keys are
     * `onDelete('set null')`, so an unguarded delete would silently strip the
     * reference from those records.
     */
    public function selectTypeUsageCount(string $id, string $use_for, string $relation): int
    {
        $row = $this->findSelectType($id, $use_for);

        return $row === null ? 0 : $row->{$relation}()->count();
    }

    /**
     * Create a SelectType row for a lookup list.
     *
     * @param  string  $use_for  Any SelectType use_for constant
     */
    public function storeSelectType(SelectTypeRequest $request, string $use_for): SelectType
    {
        $object = new SelectType;
        $object->use_for = $use_for;
        $object->value = $request->title;
        // A thumbnail upload (research sources) is stored in `details`.
        $object->details = $request->hasFile('thumbnail')
            ? $this->storeThumbnail($request, $use_for)
            : $request->details;
        // `status` is NOT NULL; omitting the field means active.
        $object->status = $request->status ?? true;
        $object->save();

        $this->logUserActivity(ucwords(str_replace('_', ' ', $use_for)), 'Created a new '.str_replace('_', ' ', $use_for).' record');

        return $object;
    }

    /**
     * Find a SelectType row by id + discriminators.
     */
    public function findSelectType(string $id, string $use_for): ?SelectType
    {
        return SelectType::where('id', $id)->where('use_for', $use_for)->first();
    }

    /**
     * Update a lookup row.
     *
     * @param  string  $use_for  Any SelectType use_for constant
     * @param  string  $id  Row id
     */
    public function updateSelectType(SelectTypeRequest $request, string $use_for, string $id): ?SelectType
    {
        $object = $this->findSelectType($id, $use_for);
        if ($object === null) {
            return null;
        }

        $object->value = $request->title;

        if ($request->hasFile('thumbnail')) {
            $this->deleteStoredFile($object->details);
            $object->details = $this->storeThumbnail($request, $use_for);
        } elseif ($request->has('details')) {
            // Screens without a thumbnail field (every other list) edit the
            // text directly; research sources never post it, so the stored
            // thumbnail path survives an update.
            $object->details = $request->details;
        }

        // Omitted status keeps the stored value instead of writing null.
        $object->status = $request->status ?? $object->status;
        $object->save();

        $this->logUserActivity(ucwords(str_replace('_', ' ', $use_for)), 'Updated '.str_replace('_', ' ', $use_for).' record');

        return $object;
    }

    /**
     * Delete a lookup row.
     */
    public function deleteSelectType(string $id, string $use_for): void
    {
        $object = $this->findSelectType($id, $use_for);
        if ($object === null) {
            return;
        }

        // Remove the stored thumbnail, if `details` points at an uploaded file.
        $this->deleteStoredFile($object->details);

        $object->delete();

        $this->logUserActivity(ucwords(str_replace('_', ' ', $use_for)), 'Removed '.str_replace('_', ' ', $use_for).' record');
    }

    /**
     * Persist the drag/drop order of a select-type list.
     *
     * @param  array<int, array{id: int|string, sequence: int}>  $order
     */
    public function updateSelectTypeSequence(array $order): void
    {
        foreach ($order as $item) {
            SelectType::where('id', $item['id'])
                ->update(['sequence' => $item['sequence']]);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Internals
    |--------------------------------------------------------------------------
    */

    /**
     * Replace a ProfileInfo's column_value by storing an uploaded file (WebP).
     */
    private function storeProfileFile(string $profile_info_id, UploadedFile $file): void
    {
        $profileInfo = ProfileInfo::findOrFail($profile_info_id);

        if ($profileInfo->column_value && Storage::disk('public')->exists($profileInfo->column_value)) {
            Storage::disk('public')->delete($profileInfo->column_value);
        }

        $filename = Str::uuid().'.webp';
        $path = self::PROFILE_DIR.'/'.$filename;

        $image = Image::read($file);

        Storage::disk('public')->put($path, $image->toWebp(80));

        $profileInfo->update(['column_value' => $path]);
    }

    /**
     * Persist a research-source thumbnail (original extension kept).
     */
    private function storeThumbnail(SelectTypeRequest $request, string $use_for): ?string
    {
        if (! $request->hasFile('thumbnail')) {
            return null;
        }

        $dir = 'uploads/settings/'.str_replace('_', '-', $use_for);
        $file = $request->file('thumbnail');
        // Random rather than time-based, so two uploads in the same second
        // cannot overwrite each other.
        $filename = Str::random(20).'.'.$file->getClientOriginalExtension();

        Storage::disk('public')->putFileAs($dir, $file, $filename);

        return $dir.'/'.$filename;
    }

    /**
     * Delete a stored upload when the column value points at one.
     */
    private function deleteStoredFile(?string $path): void
    {
        if (! empty($path) && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
