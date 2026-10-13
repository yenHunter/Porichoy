<?php

namespace App\Http\Requests\Admin\Blog;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogSettingsRequest extends FormRequest
{
    /**
     * Only signed-in admins may change column visibility settings.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Column-toggle payload.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [];
    }
}
