<?php

namespace App\Http\Requests\Admin\Education;

use Illuminate\Foundation\Http\FormRequest;

class StoreEducationRequest extends FormRequest
{
    /**
     * Only signed-in admins may create education records.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Validation rules for creating an education entry.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'education_degree'     => ['required', 'string', 'max:255'],
            'education_subject'    => ['nullable', 'string', 'max:255'],
            'education_institute'  => ['required', 'string', 'max:255'],
            'institute_logo'       => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:10240'],
            'institute_address'    => ['nullable', 'string', 'max:255'],
            'start_date'           => ['required', 'date'],
            'end_date'             => ['nullable', 'date', 'after_or_equal:start_date'],
            'education_result'     => ['nullable', 'string', 'max:255'],
            'education_details'    => ['nullable', 'string'],
            'education_status'     => ['nullable', 'boolean'],
        ];
    }

    /**
     * Field names for validation error display.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'institute_logo' => 'institute logo',
        ];
    }
}
