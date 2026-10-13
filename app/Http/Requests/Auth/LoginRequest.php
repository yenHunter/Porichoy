<?php

namespace App\Http\Requests\Auth;

use App\Rules\ReCaptcha;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Guests owning only their own credentials may attempt a login.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules for the login attempt.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'email'                => ['required', 'string', 'email'],
            'password'             => ['required', 'string'],
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
