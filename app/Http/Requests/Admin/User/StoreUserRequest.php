<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
{
    /**
     * Only signed-in admins may create users.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Shared rules for store and update (store adds the unique email check).
     *
     * @return array<string, mixed>
     */
    public static function sharedRules(): array
    {
        return [
            'first_name'      => ['required', 'string', 'max:255'],
            'last_name'       => ['required', 'string', 'max:255'],
            'profile_picture' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:10240'],
            'user_status'     => ['nullable', 'boolean'],
        ];
    }

    /**
     * Validation rules for creating a user.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
                'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            ]
            + self::sharedRules();
    }

    /**
     * Field names for validation error display.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'profile_picture' => 'profile picture',
        ];
    }
}
