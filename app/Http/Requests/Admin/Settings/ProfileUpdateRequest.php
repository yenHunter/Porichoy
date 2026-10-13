<?php

namespace App\Http\Requests\Admin\Settings;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Only signed-in admins may update the portfolio profile.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * The profile form posts nested per category: basic[id]=value,
     * personal[id]=value, … including uploaded files in place of values.
     * The per-field shape is defined by the seeded ProfileInfo rows, so
     * the request only enforces array structure.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'basic' => ['array'],
            'personal' => ['array'],
            'address' => ['array'],
            'present_address' => ['array'],
            'permanent_address' => ['array'],
            'social' => ['array'],
        ];
    }
}
