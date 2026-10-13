<?php

namespace App\Http\Requests\Admin\Training;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTrainingSettingsRequest extends FormRequest
{
    /**
     * Only signed-in admins may change column visibility settings.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Column-toggle payload: visible column names present, omissions hidden.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [];
    }
}
