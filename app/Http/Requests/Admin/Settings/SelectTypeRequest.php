<?php

namespace App\Http\Requests\Admin\Settings;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Used for both location-type and employment-type CRUDs — the payload shape
 * is identical (title + optional details + status) and differs only by the
 * `use_for` discriminator, which routes/URL set.
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
            'title'   => ['required', 'string', 'max:255'],
            'details' => ['nullable', 'string', 'max:255'],
            'status'  => ['nullable', 'boolean'],
        ];
    }
}
