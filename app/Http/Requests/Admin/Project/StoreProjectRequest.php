<?php

namespace App\Http\Requests\Admin\Project;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Only signed-in admins may create project records.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Shared rules for store and update.
     *
     * @return array<string, mixed>
     */
    public static function sharedRules(): array
    {
        return [
            'project_title'      => ['required', 'string', 'max:255'],
            'project_details'    => ['nullable', 'string'],
            'profile_image'      => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:10240'],
            'cover_image'        => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:10240'],
            'client_id'          => ['nullable', 'exists:client_infos,id'],
            'start_date'         => ['required', 'date'],
            'end_date'           => ['nullable', 'date', 'after_or_equal:start_date'],
            'service_id'         => ['nullable', 'exists:service_infos,id'],
            'project_location'   => ['nullable', 'string', 'max:255'],
            'project_background' => ['nullable', 'string'],
            'project_challenges' => ['nullable', 'string'],
            'project_solution'   => ['nullable', 'string'],
            'project_status'     => ['nullable', 'boolean'],
        ];
    }

    /**
     * Validation rules for creating a project entry.
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
    public static function sharedAttributes(): array
    {
        return [
            'client_id'  => 'client',
            'service_id' => 'service',
        ];
    }

    /**
     * Field names for validation error display.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return self::sharedAttributes();
    }
}
