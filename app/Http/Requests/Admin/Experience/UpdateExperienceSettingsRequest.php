<?php

namespace App\Http\Requests\Admin\Experience;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExperienceSettingsRequest extends FormRequest
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
     * names; anything omitted is treated as hidden. No further validation.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [];
    }
}
