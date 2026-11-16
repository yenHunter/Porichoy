<?php

namespace App\Http\Requests\Admin\Experience;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateExperienceRequest extends FormRequest
{
    /**
     * Only signed-in admins may update experience records.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Validation rules for updating an experience entry.
     * (Same shape as store, plus the record id.)
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'experience_id' => ['required', Rule::exists('experience_infos', 'id')],
        ]
            + StoreExperienceRequest::sharedRules();
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
