<?php

namespace App\Http\Requests\Admin\Research;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateResearchRequest extends FormRequest
{
    /**
     * Only signed-in admins may update research records.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Validation rules for updating a research entry.
     * (Same shape as store, plus the record id.)
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
                'research_id' => ['required', Rule::exists('research_infos', 'id')],
            ]
            + StoreResearchRequest::sharedRules();
    }
}
