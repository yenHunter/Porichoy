<?php

namespace App\Http\Requests\Admin\Settings;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Shared payload for creating and updating a blog category.
 *
 * Blog categories have their own table (unlike the select-type lookups under
 * Configuration), so these rules follow the model's columns instead of the
 * title/details/status shape the other lookup screens share.
 */
class BlogCategoryRequest extends FormRequest
{
    /**
     * Only signed-in admins may create/update blog categories.
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
            'category_name' => ['required', 'string', 'max:255'],
            'category_description' => ['nullable', 'string', 'max:255'],
            'category_status' => ['nullable', 'boolean'],
        ];
    }
}
