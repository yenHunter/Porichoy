<?php

namespace App\Services\Education;

use App\Http\Requests\Admin\Education\StoreEducationRequest;
use App\Http\Requests\Admin\Education\UpdateEducationRequest;
use App\Http\Requests\Admin\Education\UpdateEducationSequenceRequest;
use App\Http\Requests\Admin\Education\UpdateEducationSettingsRequest;
use App\Models\ColumnSettings;
use App\Models\EducationInfo;
use App\Traits\UserLogTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class EducationService
{
    use UserLogTrait;

    /**
     * Directory (on the 'public' disk) where institute logos are stored.
     */
    private const LOGO_DIR = 'uploads/education';

    /**
     * Stored-logo geometry.
     */
    private const LOGO_WIDTH = 300;

    /**
     * Store a newly created education record.
     *
     * @param  StoreEducationRequest  $request  Validated payload (+ optional logo file)
     * @return EducationInfo The created model
     */
    public function store(StoreEducationRequest $request): EducationInfo
    {
        $logo_path = $this->storeLogo($request);

        $education = new EducationInfo;
        $education->education_degree = $request->education_degree;
        $education->education_subject = $request->education_subject;
        $education->education_institute = $request->education_institute;
        $education->institute_logo = $logo_path;
        $education->institute_address = $request->institute_address;
        $education->start_date = $request->start_date;
        $education->end_date = $request->end_date;
        $education->education_result = $request->education_result;
        $education->education_details = $request->education_details;
        $education->education_status = $request->education_status;
        $education->save();

        $this->logUserActivity('Education', 'Created a new Education info');

        return $education;
    }

    /**
     * Update an existing education record (and replace the logo if given).
     *
     * @param  UpdateEducationRequest  $request  Validated payload
     * @return EducationInfo The updated model
     *
     * @throws ModelNotFoundException
     */
    public function update(UpdateEducationRequest $request): EducationInfo
    {
        $education = EducationInfo::findOrFail($request->education_id);

        if ($request->hasFile('institute_logo')) {
            $this->deleteLogo($education);

            $education->institute_logo = $this->storeLogo($request);
        }

        $education->fill([
            'education_degree' => $request->education_degree,
            'education_subject' => $request->education_subject,
            'education_institute' => $request->education_institute,
            'institute_address' => $request->institute_address,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'education_result' => $request->education_result,
            'education_details' => $request->education_details,
            // Omitted status keeps the stored value instead of writing null.
            'education_status' => $request->has('education_status')
                ? $request->education_status
                : $education->education_status,
        ]);
        $education->save();

        $this->logUserActivity('Education', 'Updated Education info');

        return $education;
    }

    /**
     * Delete an education record (and its stored logo).
     *
     * @throws ModelNotFoundException
     */
    public function delete(string $education_id): void
    {
        $education = EducationInfo::findOrFail($education_id);

        $this->deleteLogo($education);

        $education->delete();

        $this->logUserActivity('Education', 'Removed Education info');
    }

    /**
     * Reorder (sequence-update) education records from a drag-sort payload.
     */
    public function updateSequence(UpdateEducationSequenceRequest $request): void
    {
        foreach ($request->input('order', []) as $item) {
            EducationInfo::where('id', $item['id'])
                ->update(['education_sequence' => $item['sequence']]);
        }
    }

    /**
     * Toggle column visibility for the education module.
     *
     * The incoming request contains a checkbox for each visible column;
     * settings omitted from the payload are marked hidden.
     */
    public function updateSettings(UpdateEducationSettingsRequest $request): void
    {
        ColumnSettings::where('module', 'education')
            ->get()
            ->each(function (ColumnSettings $setting) use ($request) {
                $setting->visibility = $request->has($setting->column_name) ? 1 : 0;
                $setting->save();
            });

        $this->logUserActivity('Education', 'Updated Education settings');
    }

    /**
     * All education records, in sequence order (admin listing).
     *
     * @return Collection<int, EducationInfo>
     */
    public function listAll(): Collection
    {
        return EducationInfo::sorted()->get();
    }

    /**
     * Settings rows for the education module's column-visibility panel.
     *
     * @return Collection<int, ColumnSettings>
     */
    public function listSettings(): Collection
    {
        return ColumnSettings::where('module', 'education')->get();
    }

    /**
     * Find a single education record by id (404-ModelNotFound-safe).
     *
     * Returns null when the record does not exist so the controller can
     * choose an empty JSON response instead of throwing.
     *
     * @return EducationInfo|null
     */
    /**
     * Find one record plus the dates the edit form reads back.
     *
     * The date inputs are local dates in the application timezone; a raw ISO
     * value would show the previous day whenever the app is ahead of UTC.
     *
     * @return array<string, mixed>|null
     */
    public function findForEdit(string $education_id): ?array
    {
        $education = EducationInfo::where('id', $education_id)->first();

        if ($education === null) {
            return null;
        }

        return $education->toArray() + [
            'start_date_input' => $education->start_date?->format('Y-m-d'),
            'end_date_input' => $education->end_date?->format('Y-m-d'),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Internals
    |--------------------------------------------------------------------------
    */

    /**
     * Persist an uploaded institute logo (rescaled and re-encoded as WebP).
     *
     * @param  StoreEducationRequest|UpdateEducationRequest  $request
     * @return string|null Stored path, or null when no logo was uploaded.
     */
    private function storeLogo($request): ?string
    {
        if (! $request->hasFile('institute_logo')) {
            return null;
        }

        $file = $request->file('institute_logo');
        $filename = Str::uuid().'.webp';
        $path = self::LOGO_DIR.'/'.$filename;

        $image = Image::read($file);
        $image->scale(width: self::LOGO_WIDTH);

        Storage::disk('public')->put($path, $image->toWebp(80));

        return $path;
    }

    /**
     * Remove a stored logo from disk (silently no-ops when absent).
     */
    private function deleteLogo(EducationInfo $education): void
    {
        if ($education->institute_logo && Storage::disk('public')->exists($education->institute_logo)) {
            Storage::disk('public')->delete($education->institute_logo);
        }
    }
}
