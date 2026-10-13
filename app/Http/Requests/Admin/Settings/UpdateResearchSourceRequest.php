<?php

namespace App\Http\Requests\Admin\Settings;

use Illuminate\Foundation\Http\FormRequest;

class UpdateResearchSourceRequest extends FormRequest
{
    /**
     * Only signed-in admins may update research sources.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Validation rules (title required; optional thumbnail image).
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'research_source_id' => ['required', 'string', 'exists:select_types,id'],
            'title'              => ['required', 'string', 'max:255'],
            'thumbnail'          => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:10240'],
            'status'             => ['nullable', 'boolean'],
        ];
    }
}
