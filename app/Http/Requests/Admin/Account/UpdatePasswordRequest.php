<?php

namespace App\Http\Requests\Admin\Account;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Validator;

class UpdatePasswordRequest extends FormRequest
{
    /**
     * A signed-in admin may change their own password.
     */
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    /**
     * The rules mirror the strength meter the modal shows (8+ characters with
     * mixed case, a number and a symbol), so a password that reaches the
     * database is one the browser already rated as strong.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'current_password' => ['required', 'string', 'current_password'],
            'password' => [
                'required',
                'string',
                'confirmed',
                Password::min(8)->mixedCase()->numbers()->symbols(),
                'different:current_password',
            ],
        ];
    }

    /**
     * `different` only compares the submitted strings, so it misses a new
     * password that equals the stored one in a different spelling. Compare
     * against the hash as well.
     *
     * @return array<int, callable>
     */
    public function after(): array
    {
        return [
            function (Validator $validator) {
                $password = (string) $this->input('password');
                $hash = (string) $this->user()?->password;

                if ($password !== '' && $hash !== '' && Hash::check($password, $hash)) {
                    $validator->errors()->add(
                        'password',
                        'The new password must be different from your current password.'
                    );
                }
            },
        ];
    }

    /**
     * Field names for validation error display.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'current_password' => 'current password',
            'password' => 'new password',
        ];
    }
}
