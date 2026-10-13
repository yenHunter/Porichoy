<?php

namespace App\Http\Requests\Admin\Research;

use Illuminate\Foundation\Http\FormRequest;

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
            'research_source'  => ['required', 'integer', 'exists:select_types,id'],
            'research_category' => ['required', 'string', 'max:255'],
            'research_title'   => ['required', 'string', 'max:255'],
            'published_date'   => ['nullable', 'date'],
            'research_role'    => ['nullable', 'string', 'max:8'],
            'research_authors' => ['nullable', 'string', 'max:255'],
            'research_link'    => ['nullable', 'string', 'max:255'],
            'research_details' => ['nullable', 'string'],
            'research_status'  => ['nullable', 'boolean'],
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
