<?php

namespace App\Http\Requests\Admin\Education;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEducationSettingsRequest extends FormRequest
{
    /**
     * Only signed-in admins may change column visibility settings.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Column-toggle payload: the front-end sends only the visible column
     * names as checkbox values; anything omitted is treated as hidden.
     * No additional validation beyond array-shape is needed.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [];
    }
}
