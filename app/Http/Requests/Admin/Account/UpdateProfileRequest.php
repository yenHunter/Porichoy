<?php

namespace App\Http\Requests\Admin\Account;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * A signed-in admin may edit their own profile.
     */
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    /**
     * Only the names. The email column is deliberately absent, so an address
     * posted alongside them is ignored rather than updated.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            // The types are content-checked: `mimes` reads what the file
            // actually is, not its name. An extra `image` rule would accept the
            // same uploads but fail them a second time, so the modal would show
            // two reasons for one problem.
            'profile_picture' => ['nullable', 'mimes:jpeg,png,jpg,gif,webp', 'max:10240'],
            // Opt-in flag: an untouched modal keeps the stored picture.
            'remove_profile_picture' => ['nullable', 'boolean'],
        ];
    }

    /**
     * The attributes that may reach the model.
     *
     * @return array<string, string>
     */
    public function profile(): array
    {
        return $this->safe()->only(['first_name', 'last_name']);
    }

    /**
     * Name the accepted types in the one message a rejected picture produces.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'profile_picture.mimes' => 'The profile picture must be a JPEG, PNG, GIF or WebP image.',
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
            'first_name' => 'first name',
            'last_name' => 'last name',
            'profile_picture' => 'profile picture',
            'remove_profile_picture' => 'remove picture',
        ];
    }
}
