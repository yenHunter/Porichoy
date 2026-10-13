<?php

namespace App\Http\Requests\Admin\Skill;

use Illuminate\Foundation\Http\FormRequest;

class StoreSkillRequest extends FormRequest
{
    /**
     * Only signed-in admins may create skill records.
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
            'skill_title'   => ['required', 'string', 'max:255'],
            'skill_logo'    => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:10240'],
            'skill_score'   => ['nullable', 'numeric'],
            'skill_details' => ['nullable', 'string'],
            'skill_status'  => ['nullable', 'boolean'],
        ];
    }

    /**
     * Validation rules for creating a skill entry.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return self::sharedRules();
    }
}
