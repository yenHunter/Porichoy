<?php

namespace App\Http\Requests\Admin\Training;

use Illuminate\Foundation\Http\FormRequest;

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
            'training_title'       => ['required', 'string', 'max:255'],
            'training_category'    => ['required', 'integer', 'exists:select_types,id'],
            'training_institute'   => ['required', 'string', 'max:255'],
            'start_date'           => ['nullable', 'date', 'before_or_equal:today'],
            'end_date'             => ['nullable', 'date', 'after_or_equal:start_date'],
            'training_location'    => ['nullable', 'string', 'max:255'],

            // Certificate may be an uploaded file (pdf/jpg/png) OR a URL string.
            'training_certificate' => [
                'nullable',
                function ($attribute, $value, $fail) {
                    if ($value instanceof \Illuminate\Http\UploadedFile) {
                        if (!$value->isValid() || !in_array($value->extension(), ['pdf', 'jpg', 'png'])) {
                            $fail('The certificate must be a valid PDF, JPG, or PNG file.');
                        }

                        return;
                    }

                    if (!is_string($value) || !filter_var($value, FILTER_VALIDATE_URL)) {
                        $fail('The certificate must be a valid file upload or a web URL.');
                    }
                },
            ],

            'training_details'     => ['nullable', 'string'],
            'training_status'      => ['nullable', 'boolean'],
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
}
