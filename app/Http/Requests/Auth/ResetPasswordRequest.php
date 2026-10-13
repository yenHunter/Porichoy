<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ResetPasswordRequest extends FormRequest
{
    /**
     * Guests owning a valid reset token may reset their password.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules for a password reset (token from the e-mail link).
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'token'    => ['required'],
            'email'    => ['required', 'string', 'email'],
            'password' => [
                'required',
                'string',
                Password::min(8),
                'confirmed',
            ],
        ];
    }

    /**
     * Returns the payload to hand to the (Password facade) reset operation,
     * excluding the confirmation field and reCAPTCHA token.
     *
     * @return array<string, mixed>
     */
    public function credentials(): array
    {
        return $this->only('email', 'password', 'password_confirmation', 'token');
    }

    /**
     * Human-readable field names for error display.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'email' => 'email address',
        ];
    }
}
