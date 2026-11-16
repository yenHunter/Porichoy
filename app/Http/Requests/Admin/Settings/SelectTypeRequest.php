<?php

namespace App\Http\Requests\Admin\Settings;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Used by every select-type lookup CRUD (research source, location type,
 * employment type, training category, blog category) — the payload shape is
 * identical (title + optional details/thumbnail + status) and differs only by
 * the `use_for` discriminator, which the route settles.
 */
class SelectTypeRequest extends FormRequest
{
    /**
     * Only signed-in admins may create/update select-type options.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Validation rules.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'details' => ['nullable', 'string', 'max:255'],
            // Only the research source screen uploads one; stored in `details`.
            'thumbnail' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:10240'],
            'status' => ['nullable', 'boolean'],
        ];
    }
}
