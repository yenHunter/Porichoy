<?php

namespace App\Http\Requests\Auth;

use App\Rules\ReCaptcha;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    /**
     * Registration is open to guests; created accounts start inactive
     * and require admin approval (see AuthService::register).
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules for a self-registration attempt.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'first_name'           => ['required', 'string', 'min:2', 'max:60'],
            'last_name'            => ['required', 'string', 'min:2', 'max:60'],
            'email'                => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password'             => [
                'required',
                'string',
                Password::min(8),
                'confirmed',
            ],
            'g-recaptcha-response' => [new ReCaptcha()],
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
            'email'                => 'email address',
            'g-recaptcha-response' => 'reCAPTCHA',
        ];
    }
}
