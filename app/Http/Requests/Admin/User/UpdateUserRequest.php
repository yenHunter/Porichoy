<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Only signed-in admins may update users.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Validation rules for updating a user.
     * Email must remain unique, except for the record being updated.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
                'user_id' => ['required', Rule::exists('users', 'id')],
                'email'   => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->input('user_id'))],
            ]
            + StoreUserRequest::sharedRules();
    }

    /**
     * Field names for validation error display.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return StoreUserRequest::staticAttributes();
    }

    /**
     * Shared attributes for store/update.
     *
     * @return array<string, string>
     */
    public static function staticAttributes(): array
    {
        return [
            'profile_picture' => 'profile picture',
        ];
    }
}
