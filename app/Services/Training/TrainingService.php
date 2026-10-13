<?php

namespace App\Services\Training;

use Illuminate\Support\Str;
use App\Traits\UserLogTrait;
use App\Models\TrainingInfo;
use App\Models\SelectType;
use App\Models\ColumnSettings;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Training\UpdateTrainingRequest;
use App\Http\Requests\Admin\Training\StoreTrainingRequest;
use App\Http\Requests\Admin\Training\UpdateTrainingSequenceRequest;
use App\Http\Requests\Admin\Training\UpdateTrainingSettingsRequest;

class TrainingService
{
    use UserLogTrait;

    /**
     * Directory (on the 'public' disk) where training certificates are stored.
     */
    private const CERT_DIR = 'uploads/training';

    /**
     * Data for the training module admin view (list + settings + categories).
     *
     * @return array<string, \Illuminate\Database\Eloquent\Collection>
     */
    public function viewData(): array
    {
        return [
            'training_list'     => TrainingInfo::with('category')
                ->whereRelation('category', 'use_for', 'training_category')
                ->sorted()
                ->get(),
            'training_settings' => ColumnSettings::where('module', 'training')->get(),
            'training_category' => SelectType::where('use_for', 'training_category')->get(),
        ];
    }

    /**
     * Store a newly created training record.
     *
     * @param  StoreTrainingRequest $request  Validated payload
     * @return TrainingInfo                   The created model
     */
    public function store(StoreTrainingRequest $request): TrainingInfo
    {
        $training                   = new TrainingInfo();
        $training->training_title       = $request->training_title;
        $training->training_category    = $request->training_category;
        $training->training_institute   = $request->training_institute;
        $training->start_date           = $request->start_date;
        $training->end_date             = $request->end_date;
        $training->training_location    = $request->training_location;
        $training->training_certificate = $this->storeCertificate($request);
        $training->training_details     = $request->training_details;
        $training->training_status      = $request->training_status;
        $training->save();

        $this->logUserActivity('Training', 'Created a new Training info');

        return $training;
    }

    /**
     * Find a single training record by id.
     *
     * @param  string $training_id
     * @return TrainingInfo|null
     */
    public function find(string $training_id): ?TrainingInfo
    {
        return TrainingInfo::where('id', $training_id)->first();
    }

    /**
     * Update an existing training record (and replace the certificate if given).
     *
     * @param  UpdateTrainingRequest $request  Validated payload
     * @return TrainingInfo                    The updated model
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function update(UpdateTrainingRequest $request): TrainingInfo
    {
        $training = TrainingInfo::findOrFail($request->training_id);

        if ($request->hasFile('training_certificate')) {
            $this->deleteCertificate($training);

            $training->training_certificate = $this->storeCertificate($request);
        } else {
            // The field also accepts a URL string.
            $training->training_certificate = $request->training_certificate;
        }

        $training->fill([
            'training_title'     => $request->training_title,
            'training_category'  => $request->training_category,
            'training_institute' => $request->training_institute,
            'start_date'         => $request->start_date,
            'end_date'           => $request->end_date,
            'training_location'  => $request->training_location,
            'training_details'   => $request->training_details,
            'training_status'    => $request->training_status,
        ]);
        $training->save();

        $this->logUserActivity('Training', 'Updated Training info');

        return $training;
    }

    /**
     * Delete a training record (and its stored certificate).
     *
     * @param  string $training_id
     * @return void
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function delete(string $training_id): void
    {
        $training = TrainingInfo::findOrFail($training_id);

        $this->deleteCertificate($training);

        $training->delete();

        $this->logUserActivity('Training', 'Removed Training info');
    }

    /**
     * Reorder (sequence-update) training records from a drag-sort payload.
     *
     * @param  UpdateTrainingSequenceRequest $request
     * @return void
     */
    public function updateSequence(UpdateTrainingSequenceRequest $request): void
    {
        foreach ($request->input('order', []) as $item) {
            TrainingInfo::where('id', $item['id'])
                ->update(['training_sequence' => $item['sequence']]);
        }
    }

    /**
     * Toggle column visibility for the training module.
     *
     * @param  UpdateTrainingSettingsRequest $request
     * @return void
     */
    public function updateSettings(UpdateTrainingSettingsRequest $request): void
    {
        ColumnSettings::where('module', 'training')
            ->get()
            ->each(function (ColumnSettings $setting) use ($request) {
                $setting->visibility = $request->has($setting->column_name) ? 1 : 0;
                $setting->save();
            });

        $this->logUserActivity('Training', 'Updated Training settings');
    }

    /*
    |--------------------------------------------------------------------------
    | Internals
    |--------------------------------------------------------------------------
    */

    /**
     * Persist an uploaded training certificate (original extension kept).
     *
     * @param  StoreTrainingRequest|UpdateTrainingRequest $request
     * @return string|null  Stored path, or the URL string when no upload.
     */
    private function storeCertificate($request): ?string
    {
        if (!$request->hasFile('training_certificate')) {
            return $request->input('training_certificate');
        }

        $file     = $request->file('training_certificate');
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

        Storage::disk('public')->putFileAs(self::CERT_DIR, $file, $filename);

        return self::CERT_DIR . '/' . $filename;
    }

    /**
     * Remove a stored certificate from disk (silently no-ops when absent).
     *
     * @param  TrainingInfo $training
     * @return void
     */
    private function deleteCertificate(TrainingInfo $training): void
    {
        if (!empty($training->training_certificate)
            && Storage::disk('public')->exists($training->training_certificate)
        ) {
            Storage::disk('public')->delete($training->training_certificate);
        }
    }
}
