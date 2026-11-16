<?php

namespace App\Services\Settings;

use App\Http\Requests\Admin\Settings\ProfileUpdateRequest;
use App\Http\Requests\Admin\Settings\SelectTypeRequest;
use App\Http\Requests\Admin\Settings\StoreResearchSourceRequest;
use App\Http\Requests\Admin\Settings\UpdateResearchSourceRequest;
use App\Models\ColumnSettings;
use App\Models\Country;
use App\Models\EducationInfo;
use App\Models\ExperienceInfo;
use App\Models\ProfileInfo;
use App\Models\SelectType;
use App\Traits\UserLogTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class SettingsService
{
    use UserLogTrait;

    /**
     * Directory (on the 'public' disk) for research-source thumbnails and
     * profile uploads.
     */
    private const RESEARCH_SOURCE_DIR = 'uploads/settings/research-source';

    private const PROFILE_DIR = 'uploads/profile';

    /**
     * Profile-info categories handled by the profile management form.
     */
    private const PROFILE_CATEGORIES = [
        'basic', 'personal', 'address', 'present_address', 'permanent_address', 'social',
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
                'basic' => ProfileInfo::basicInfo()->active()->get()->keyBy('column_name'),
                'personal' => ProfileInfo::personalInfo()->active()->get()->keyBy('column_name'),
                'address' => ProfileInfo::addressInfo()->active()->get()->keyBy('column_name'),
                'present_address' => ProfileInfo::presentAddressInfo()->active()->get()->keyBy('column_name'),
                'permanent_address' => ProfileInfo::permanentAddressInfo()->active()->get()->keyBy('column_name'),
                'social' => ProfileInfo::socialInfo()->active()->get()->keyBy('column_name'),
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
     * Research source listing (+ its ColumnSettings for the view).
     *
     * @return array<string, Collection>
     */
    public function researchSourceViewData(): array
    {
        return [
            'research_source_list' => SelectType::where('use_for', SelectType::RESEARCH_SOURCE)->sorted()->get(),
            'research_source_settings' => ColumnSettings::where('module', 'research_source')->get(),
        ];
    }

    /**
     * Create a research-source SelectType row (optionally with a thumbnail).
     */
    public function storeResearchSource(StoreResearchSourceRequest $request): SelectType
    {
        $object = new SelectType;
        $object->use_for = SelectType::RESEARCH_SOURCE;
        $object->value = $request->title;
        $object->details = $this->storeThumbnail($request);
        // `status` is NOT NULL; omitting the field means active.
        $object->status = $request->status ?? true;
        $object->save();

        $this->logUserActivity('Research Source', 'Created a new Research Source');

        return $object;
    }

    /**
     * Find a research-source row by id.
     */
    public function findResearchSource(string $research_source_id): ?SelectType
    {
        return SelectType::where('id', $research_source_id)
            ->where('use_for', SelectType::RESEARCH_SOURCE)
            ->first();
    }

    /**
     * Update a research-source row (replacing the thumbnail when given).
     *
     * @throws ModelNotFoundException
     */
    public function updateResearchSource(UpdateResearchSourceRequest $request): SelectType
    {
        $object = SelectType::where('id', $request->research_source_id)->firstOrFail();

        if ($request->hasFile('thumbnail')) {
            if (! empty($object->details) && Storage::disk('public')->exists($object->details)) {
                Storage::disk('public')->delete($object->details);
            }

            $object->details = $this->storeThumbnail($request);
        }

        $object->value = $request->title;
        // Omitted status keeps the stored value instead of writing null.
        $object->status = $request->status ?? $object->status;
        $object->save();

        $this->logUserActivity('Research Source', 'Updated Research Source');

        return $object;
    }

    /**
     * Delete a research-source row (and its thumbnail).
     */
    public function deleteResearchSource(string $research_source_id): void
    {
        $object = SelectType::where('id', $research_source_id)->first();
        if ($object === null) {
            return;
        }

        if (! empty($object->details) && Storage::disk('public')->exists($object->details)) {
            Storage::disk('public')->delete($object->details);
        }

        $object->delete();

        $this->logUserActivity('Research Source', 'Removed Research Source');
    }

    /**
     * Rows for location-type / employment-type views.
     *
     * @param  string  $use_for  SelectType::LOCATION_TYPE or SelectType::EMPLOYMENT_TYPE
     * @return Collection<int, SelectType>
     */
    public function selectTypeViewData(string $use_for): Collection
    {
        return SelectType::where('use_for', $use_for)->sorted()->get();
    }

    /**
     * Create a location/employment-type SelectType row.
     *
     * @param  string  $use_for  SelectType::LOCATION_TYPE or SelectType::EMPLOYMENT_TYPE
     */
    public function storeSelectType(SelectTypeRequest $request, string $use_for): SelectType
    {
        $object = new SelectType;
        $object->use_for = $use_for;
        $object->value = $request->title;
        $object->details = $request->details;
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
     * Update a location/employment-type row.
     *
     * @param  string  $use_for  SelectType::LOCATION_TYPE or SelectType::EMPLOYMENT_TYPE
     * @param  string  $id  Row id
     */
    public function updateSelectType(SelectTypeRequest $request, string $use_for, string $id): ?SelectType
    {
        $object = $this->findSelectType($id, $use_for);
        if ($object === null) {
            return null;
        }

        $object->value = $request->title;
        $object->details = $request->details;
        // Omitted status keeps the stored value instead of writing null.
        $object->status = $request->status ?? $object->status;
        $object->save();

        $this->logUserActivity(ucwords(str_replace('_', ' ', $use_for)), 'Updated '.str_replace('_', ' ', $use_for).' record');

        return $object;
    }

    /**
     * Delete a location/employment-type row.
     */
    public function deleteSelectType(string $id, string $use_for): void
    {
        $object = $this->findSelectType($id, $use_for);
        if ($object === null) {
            return;
        }

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

    // ---------------------------------------------------------------------
    // Blog Category CRUD (SelectType use_for = blog_category)
    // ---------------------------------------------------------------------

    /**
     * Rows for the blog category view, each with its post count.
     *
     * @return Collection<int, SelectType>
     */
    public function blogCategoryViewData(): Collection
    {
        return SelectType::where('use_for', SelectType::BLOG_CATEGORY)->withCount('blogs')->sorted()->get();
    }

    /**
     * Create a blog category (a select_types row). `sequence` is set by the model.
     */
    public function storeBlogCategory(SelectTypeRequest $request): SelectType
    {
        $object = new SelectType;
        $object->use_for = SelectType::BLOG_CATEGORY;
        $object->value = $request->title;
        $object->details = $request->details;
        // `status` is NOT NULL; omitting the field means active.
        $object->status = $request->status ?? true;
        $object->save();

        $this->logUserActivity('Blog Category', 'Created a new Blog Category');

        return $object;
    }

    /**
     * Find a blog category by id.
     */
    public function findBlogCategory(string $blog_category_id): ?SelectType
    {
        return SelectType::where('id', $blog_category_id)
            ->where('use_for', SelectType::BLOG_CATEGORY)
            ->first();
    }

    /**
     * Update a blog category.
     */
    public function updateBlogCategory(SelectTypeRequest $request): ?SelectType
    {
        $object = $this->findBlogCategory((string) $request->input('blog_category_id'));
        if ($object === null) {
            return null;
        }

        $object->value = $request->title;
        $object->details = $request->details;
        // Omitted status keeps the stored value instead of writing null.
        $object->status = $request->status ?? $object->status;
        $object->save();

        $this->logUserActivity('Blog Category', 'Updated Blog Category');

        return $object;
    }

    /**
     * How many posts reference the category.
     *
     * Deleting a category is blocked while this is above zero: the foreign key
     * is `onDelete('set null')`, so an unguarded delete would silently turn
     * those posts into "No Category".
     */
    public function blogCategoryPostCount(string $blog_category_id): int
    {
        return SelectType::where('use_for', SelectType::BLOG_CATEGORY)
            ->withCount('blogs')
            ->find($blog_category_id)?->blogs_count ?? 0;
    }

    /**
     * Delete a blog category. Callers must check blogCategoryPostCount() first.
     */
    public function deleteBlogCategory(string $blog_category_id): void
    {
        $object = $this->findBlogCategory($blog_category_id);
        if ($object === null) {
            return;
        }

        $object->delete();

        $this->logUserActivity('Blog Category', 'Removed Blog Category');
    }

    /**
     * Persist the drag/drop order for blog categories.
     *
     * @param  array<int, array{id: int|string, sequence: int}>  $order
     */
    public function updateBlogCategorySequence(array $order): void
    {
        $this->updateSelectTypeSequence($order);
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
    private function storeThumbnail(StoreResearchSourceRequest $request): ?string
    {
        if (! $request->hasFile('thumbnail')) {
            return null;
        }

        $file = $request->file('thumbnail');
        $filename = time().'.'.$file->getClientOriginalExtension();

        $file->storeAs('public/'.self::RESEARCH_SOURCE_DIR, $filename);

        return self::RESEARCH_SOURCE_DIR.'/'.$filename;
    }
}
