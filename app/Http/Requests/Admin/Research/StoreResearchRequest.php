<?php

namespace App\Http\Requests\Admin\Research;

use App\Models\SelectType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreResearchRequest extends FormRequest
{
    /**
     * Only signed-in admins may create research records.
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
            // Only a research source, not any other select-type list.
            'research_source' => [
                'required',
                'integer',
                Rule::exists('select_types', 'id')->where('use_for', SelectType::RESEARCH_SOURCE),
            ],
            'research_category' => ['required', 'string', 'max:255'],
            'research_title' => ['required', 'string', 'max:255'],
            'published_date' => ['nullable', 'date'],
            'research_role' => ['nullable', 'string', 'max:8'],
            'research_authors' => ['nullable', 'string', 'max:255'],
            'research_link' => ['nullable', 'string', 'max:255'],
            'research_details' => ['nullable', 'string'],
            'research_status' => ['nullable', 'boolean'],
        ];
    }

    /**
     * Validation rules for creating a research entry.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return self::sharedRules();
    }
}
