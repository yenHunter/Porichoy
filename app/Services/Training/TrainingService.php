<?php

namespace App\Services\Training;

use App\Http\Requests\Admin\Training\StoreTrainingRequest;
use App\Http\Requests\Admin\Training\UpdateTrainingRequest;
use App\Http\Requests\Admin\Training\UpdateTrainingSequenceRequest;
use App\Http\Requests\Admin\Training\UpdateTrainingSettingsRequest;
use App\Models\ColumnSettings;
use App\Models\SelectType;
use App\Models\TrainingInfo;
use App\Traits\UserLogTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
     * @return array<string, Collection>
     */
    public function viewData(): array
    {
        return [
            'training_list' => TrainingInfo::with('category')
                ->whereRelation('category', 'use_for', SelectType::TRAINING_CATEGORY)
                ->sorted()
                ->get(),
            'training_settings' => ColumnSettings::where('module', 'training')->get(),
            'training_category' => SelectType::where('use_for', SelectType::TRAINING_CATEGORY)->get(),
        ];
    }

    /**
     * Store a newly created training record.
     *
     * @param  StoreTrainingRequest  $request  Validated payload
     * @return TrainingInfo The created model
     */
    public function store(StoreTrainingRequest $request): TrainingInfo
    {
        $training = new TrainingInfo;
        $training->training_title = $request->training_title;
        $training->training_category = $request->training_category;
        $training->training_institute = $request->training_institute;
        $training->start_date = $request->start_date;
        $training->end_date = $request->end_date;
        $training->training_location = $request->training_location;
        $training->training_certificate = $this->resolveCertificate($request);
        $training->training_details = $request->training_details;
        $training->training_status = $request->training_status;
        $training->save();

        $this->logUserActivity('Training', 'Created a new Training info');

        return $training;
    }

    /**
     * Find one record plus the values the edit form reads back.
     *
     * The date inputs are local dates in the application timezone; a raw ISO
     * value would show the previous day whenever the app is ahead of UTC.
     *
     * @return array<string, mixed>|null
     */
    public function findForEdit(string $training_id): ?array
    {
        $training = TrainingInfo::where('id', $training_id)->first();

        if ($training === null) {
            return null;
        }

        return $training->toArray() + [
            'certificate_url' => $training->certificate_url,
            'certificate_is_url' => $this->isCertificateUrl($training->training_certificate),
            'start_date_input' => $training->start_date?->format('Y-m-d'),
            'end_date_input' => $training->end_date?->format('Y-m-d'),
        ];
    }

    /**
     * Update an existing training record (and replace the certificate if given).
     *
     * @param  UpdateTrainingRequest  $request  Validated payload
     * @return TrainingInfo The updated model
     *
     * @throws ModelNotFoundException
     */
    public function update(UpdateTrainingRequest $request): TrainingInfo
    {
        $training = TrainingInfo::findOrFail($request->training_id);

        // Precedence: a picked file, then a non-empty link, then a removal
        // request, then the stored value. Nothing arrives for an untouched
        // certificate, so saving an edit cannot wipe it.
        $certificate = trim((string) $request->input('training_certificate'));

        if ($request->hasFile('training_certificate')) {
            // Store the replacement before dropping the old file, so a failed
            // upload cannot leave the record without a certificate.
            $new_certificate = $this->storeCertificate($request);

            $this->deleteCertificate($training);

            $training->training_certificate = $new_certificate;
        } elseif ($certificate !== '' && $certificate !== (string) $training->training_certificate) {
            // A link replaces the stored file only when it actually differs.
            $this->deleteCertificate($training);

            $training->training_certificate = $certificate;
        } elseif ($certificate === '' && $request->boolean('remove_training_certificate')) {
            $this->deleteCertificate($training);

            $training->training_certificate = null;
        }

        $training->fill([
            'training_title' => $request->training_title,
            'training_category' => $request->training_category,
            'training_institute' => $request->training_institute,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'training_location' => $request->training_location,
            'training_details' => $request->training_details,
            // Omitted status keeps the stored value instead of writing null.
            'training_status' => $request->has('training_status')
                ? $request->training_status
                : $training->training_status,
        ]);
        $training->save();

        $this->logUserActivity('Training', 'Updated Training info');

        return $training;
    }

    /**
     * Delete a training record (and its stored certificate).
     *
     * @throws ModelNotFoundException
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
     * The certificate to store on create: an upload, a non-empty URL, or null.
     *
     * @param  StoreTrainingRequest|UpdateTrainingRequest  $request
     */
    private function resolveCertificate($request): ?string
    {
        if ($request->hasFile('training_certificate')) {
            return $this->storeCertificate($request);
        }

        $certificate = trim((string) $request->input('training_certificate'));

        return $certificate === '' ? null : $certificate;
    }

    /**
     * Persist an uploaded training certificate (original extension kept).
     *
     * Certificates are documents, not decorative images: the file is stored as
     * uploaded instead of being re-encoded, so a PDF stays a PDF and an image
     * keeps its bytes.
     *
     * @param  StoreTrainingRequest|UpdateTrainingRequest  $request
     * @return string|null Stored path, or null when no file was uploaded.
     */
    private function storeCertificate($request): ?string
    {
        if (! $request->hasFile('training_certificate')) {
            return null;
        }

        $file = $request->file('training_certificate');
        $filename = Str::uuid().'.'.strtolower($file->getClientOriginalExtension());

        Storage::disk('public')->putFileAs(self::CERT_DIR, $file, $filename);

        return self::CERT_DIR.'/'.$filename;
    }

    /**
     * Whether the stored certificate is an external link rather than a file.
     */
    private function isCertificateUrl(?string $certificate): bool
    {
        return is_string($certificate)
            && Str::startsWith($certificate, ['http://', 'https://']);
    }

    /**
     * Remove a stored certificate from disk (silently no-ops when absent).
     */
    private function deleteCertificate(TrainingInfo $training): void
    {
        if (! empty($training->training_certificate)
            && Storage::disk('public')->exists($training->training_certificate)
        ) {
            Storage::disk('public')->delete($training->training_certificate);
        }
    }
}
