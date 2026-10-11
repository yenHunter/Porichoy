<?php

namespace App\Services\Experience;

use Illuminate\Support\Str;
use App\Traits\UserLogTrait;
use App\Models\ExperienceInfo;
use App\Models\SelectType;
use App\Models\ColumnSettings;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use App\Http\Requests\Admin\Experience\UpdateExperienceRequest;
use App\Http\Requests\Admin\Experience\StoreExperienceRequest;
use App\Http\Requests\Admin\Experience\UpdateExperienceSequenceRequest;
use App\Http\Requests\Admin\Experience\UpdateExperienceSettingsRequest;

class ExperienceService
{
    use UserLogTrait;

    /**
     * Directory (on the 'public' disk) where organization logos are stored.
     */
    private const LOGO_DIR = 'uploads/experience';

    /**
     * Stored-logo geometry.
     */
    private const LOGO_WIDTH = 300;

    /**
     * Title for the view route, full with lists.
     *
     * @return array{
     *   experience_list: \Illuminate\Database\Eloquent\Collection<int, ExperienceInfo>,
     *   experience_settings: \Illuminate\Database\Eloquent\Collection<int, ColumnSettings>,
     *   employment_type: \Illuminate\Database\Eloquent\Collection<int, SelectType>,
     *   location_type: \Illuminate\Database\Eloquent\Collection<int, SelectType>,
     * }
     */
    public function viewData(): array
    {
        return [
            'experience_list'     => ExperienceInfo::sorted()->get(),
            'experience_settings' => ColumnSettings::where('module', 'experience')->get(),
            'employment_type'     => SelectType::where('use_for', 'employment_type')->get(),
            'location_type'       => SelectType::where('use_for', 'location_type')->get(),
        ];
    }

    /**
     * Store a newly created experience record.
     *
     * @param  StoreExperienceRequest $request  Validated payload (+ optional logo file)
     * @return ExperienceInfo                   The created model
     */
    public function store(StoreExperienceRequest $request): ExperienceInfo
    {
        $logo_path = $this->storeLogo($request);

        $experience                       = new ExperienceInfo();
        $experience->employment_position       = $request->employment_position;
        $experience->employment_type           = $request->employment_type;
        $experience->employment_department     = $request->employment_department;
        $experience->employment_organization   = $request->employment_organization;
        $experience->organization_logo         = $logo_path;
        $experience->organization_address      = $request->organization_address;
        $experience->start_date                = $request->start_date;
        $experience->end_date                  = $request->end_date;
        $experience->location_type             = $request->location_type;
        $experience->employment_details        = $request->employment_details;
        $experience->employment_status         = $request->employment_status;
        $experience->save();

        $this->logUserActivity('ExperienceInfo', 'A new record created');

        return $experience;
    }

    /**
     * Find a single experience record by id.
     *
     * Returns null when the record does not exist so the controller can
     * choose an empty JSON response instead of throwing.
     *
     * @param  string $experience_id
     * @return ExperienceInfo|null
     */
    public function find(string $experience_id): ?ExperienceInfo
    {
        return ExperienceInfo::where('id', $experience_id)->first();
    }

    /**
     * Update an existing experience record (and replace the logo if given).
     *
     * @param  UpdateExperienceRequest $request  Validated payload
     * @return ExperienceInfo                    The updated model
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function update(UpdateExperienceRequest $request): ExperienceInfo
    {
        $experience = ExperienceInfo::findOrFail($request->experience_id);

        if ($request->hasFile('organization_logo')) {
            $this->deleteLogo($experience);

            $experience->organization_logo = $this->storeLogo($request);
        }

        $experience->fill([
            'employment_position'      => $request->employment_position,
            'employment_type'          => $request->employment_type,
            'employment_department'    => $request->employment_department,
            'employment_organization'  => $request->employment_organization,
            'organization_address'     => $request->organization_address,
            'start_date'               => $request->start_date,
            'end_date'                 => $request->end_date,
            'location_type'            => $request->location_type,
            'employment_details'       => $request->employment_details,
            'employment_status'        => $request->employment_status,
        ]);
        $experience->save();

        $this->logUserActivity('ExperienceInfo', 'An existing record updated');

        return $experience;
    }

    /**
     * Delete an experience record (and its stored logo).
     *
     * @param  string $experience_id
     * @return void
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function delete(string $experience_id): void
    {
        $experience = ExperienceInfo::findOrFail($experience_id);

        $this->deleteLogo($experience);

        $experience->delete();

        $this->logUserActivity('Experience', 'An existing record removed');
    }

    /**
     * Reorder (sequence-update) experience records from a drag-sort payload.
     *
     * @param  UpdateExperienceSequenceRequest $request
     * @return void
     */
    public function updateSequence(UpdateExperienceSequenceRequest $request): void
    {
        foreach ($request->input('order', []) as $item) {
            ExperienceInfo::where('id', $item['id'])
                ->update(['employment_sequence' => $item['sequence']]);
        }
    }

    /**
     * Toggle column visibility for the experience module.
     *
     * The incoming request contains a checkbox per visible column; settings
     * omitted from the payload are marked hidden.
     *
     * @param  UpdateExperienceSettingsRequest $request
     * @return void
     */
    public function updateSettings(UpdateExperienceSettingsRequest $request): void
    {
        ColumnSettings::where('module', 'experience')
            ->get()
            ->each(function (ColumnSettings $setting) use ($request) {
                $setting->visibility = $request->has($setting->column_name) ? 1 : 0;
                $setting->save();
            });

        $this->logUserActivity('Experience', 'Updated Experience settings');
    }

    /*
    |--------------------------------------------------------------------------
    | Internals
    |--------------------------------------------------------------------------
    */

    /**
     * Persist an uploaded organization logo (rescaled, re-encoded as WebP).
     *
     * @param  StoreExperienceRequest|UpdateExperienceRequest $request
     * @return string|null  Stored path, or null when no logo was uploaded.
     */
    private function storeLogo($request): ?string
    {
        if (!$request->hasFile('organization_logo')) {
            return null;
        }

        $file     = $request->file('organization_logo');
        $filename = Str::uuid() . '.webp';
        $path     = self::LOGO_DIR . '/' . $filename;

        $image = Image::read($file);
        $image->scale(width: self::LOGO_WIDTH);

        Storage::disk('public')->put($path, $image->toWebp(80));

        return $path;
    }

    /**
     * Remove a stored logo from disk (silently no-ops when absent).
     *
     * @param  ExperienceInfo $experience
     * @return void
     */
    private function deleteLogo(ExperienceInfo $experience): void
    {
        if ($experience->organization_logo && Storage::disk('public')->exists($experience->organization_logo)) {
            Storage::disk('public')->delete($experience->organization_logo);
        }
    }
}
