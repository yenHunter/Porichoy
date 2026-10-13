<?php

namespace App\Http\Requests\Admin\Project;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Only signed-in admins may update project records.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Validation rules for updating a project entry.
     * (Same shape as store, plus the record id.)
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
                'project_id' => ['required', Rule::exists('project_infos', 'id')],
            ]
            + StoreProjectRequest::sharedRules();
    }

    /**
     * Field names for validation error display.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return StoreProjectRequest::sharedAttributes();
    }
}
