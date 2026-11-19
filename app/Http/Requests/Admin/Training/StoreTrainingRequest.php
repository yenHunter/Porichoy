<?php

namespace App\Http\Requests\Admin\Training;

use App\Models\SelectType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;

class StoreTrainingRequest extends FormRequest
{
    /**
     * Only signed-in admins may create training records.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Shared rules for store and update (keep them in sync via this helper).
     *
     * @return array<string, mixed>
     */
    public static function sharedRules(): array
    {
        return [
            'training_title' => ['required', 'string', 'max:255'],
            // Only a training category, not any other select-type list.
            'training_category' => [
                'required',
                'integer',
                Rule::exists('select_types', 'id')->where('use_for', SelectType::TRAINING_CATEGORY),
            ],
            'training_institute' => ['required', 'string', 'max:255'],
            'start_date' => ['nullable', 'date', 'before_or_equal:today'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'training_location' => ['nullable', 'string', 'max:255'],

            // Certificate may be an uploaded file (PDF/JPG/JPEG/PNG) OR a URL.
            // The size ceiling matches the picker's 10 MB limit.
            'training_certificate' => [
                'nullable',
                function ($attribute, $value, $fail) {
                    if ($value instanceof UploadedFile) {
                        if (! $value->isValid()) {
                            $fail('The certificate could not be uploaded. Choose the file again.');

                            return;
                        }

                        if (! in_array(strtolower($value->getClientOriginalExtension()), ['pdf', 'jpg', 'jpeg', 'png'], true)) {
                            $fail('The certificate must be a PDF, JPG or PNG file.');

                            return;
                        }

                        if ($value->getSize() > 10 * 1024 * 1024) {
                            $fail('The certificate may not be larger than 10 MB.');
                        }

                        return;
                    }

                    if ($value === null || $value === '') {
                        return;
                    }

                    if (! is_string($value) || ! filter_var($value, FILTER_VALIDATE_URL)) {
                        $fail('The certificate must be a valid file upload or a web URL.');
                    }
                },
            ],

            'training_details' => ['nullable', 'string'],
            'training_status' => ['nullable', 'boolean'],
        ];
    }

    /**
     * Validation rules for creating a training entry.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return self::sharedRules();
    }

    /**
     * Field names for validation error display.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'training_certificate' => 'certificate',
        ];
    }
}
