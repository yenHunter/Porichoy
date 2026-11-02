<?php

namespace App\Http\Requests\Auth;

use App\Rules\ReCaptcha;
use Illuminate\Foundation\Http\FormRequest;

class UnlockScreenRequest extends FormRequest
{
    /**
     * Only the currently signed-in user may unlock their own locked session.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Validation rules for unlocking a locked session.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'password'             => ['required', 'string'],
            // Required so the token cannot be skipped by omitting the field.
            'g-recaptcha-response' => ['required', new ReCaptcha()],
        ];
    }

    /**
     * Human-readable field names for error display.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'g-recaptcha-response' => 'reCAPTCHA',
        ];
    }
}
