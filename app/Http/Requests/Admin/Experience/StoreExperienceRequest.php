<?php

namespace App\Http\Requests\Admin\Experience;

use Illuminate\Foundation\Http\FormRequest;

class StoreExperienceRequest extends FormRequest
{
    /**
     * Only signed-in admins may create experience records.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Validation rules for creating an experience entry.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'employment_position'      => ['required', 'string', 'max:255'],
            'employment_type'          => ['required', 'integer', 'exists:select_types,id'],
            'employment_department'    => ['nullable', 'string', 'max:255'],
            'employment_organization'  => ['required', 'string', 'max:255'],
            'organization_logo'        => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:10240'],
            'organization_address'     => ['nullable', 'string', 'max:255'],
            'start_date'               => ['required', 'date'],
            'end_date'                 => ['nullable', 'date', 'after:start_date'],
            'location_type'            => ['nullable', 'integer', 'exists:select_types,id'],
            'employment_details'       => ['nullable', 'string'],
            'employment_status'        => ['nullable', 'boolean'],
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
            'organization_logo' => 'organization logo',
        ];
    }
}
