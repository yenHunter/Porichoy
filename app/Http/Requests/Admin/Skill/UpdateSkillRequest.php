<?php

namespace App\Http\Requests\Admin\Skill;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSkillRequest extends FormRequest
{
    /**
     * Only signed-in admins may update skill records.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Validation rules for updating a skill entry.
     * (Same shape as store, plus the record id.)
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
                'skill_id' => ['required', Rule::exists('skill_infos', 'id')],
            ]
            + StoreSkillRequest::sharedRules();
    }
}
