<?php

namespace App\Http\Requests\Admin\Client;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    /**
     * Only signed-in admins may create client records.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Shared rules for store and update.
     *
     * Both images are optional: the element shows the stored image with a
     * Remove/Undo control, and the model falls back to a placeholder when it is
     * gone, so a create without images is valid.
     *
     * @return array<string, mixed>
     */
    public static function sharedRules(): array
    {
        return [
            'client_name' => ['required', 'string', 'max:255'],
            'client_email' => ['required', 'email', 'max:255'],
            'client_mobile' => ['nullable', 'string', 'max:20'],
            'client_designation' => ['nullable', 'string', 'max:255'],
            'client_organization' => ['nullable', 'string', 'max:255'],
            'client_address' => ['nullable', 'string', 'max:500'],
            'client_picture' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:10240'],
            'organization_logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:10240'],
            'remove_client_picture' => ['nullable', 'boolean'],
            'remove_organization_logo' => ['nullable', 'boolean'],
            'organization_website' => ['nullable', 'url', 'max:255'],
            'client_status' => ['nullable', 'boolean'],
        ];
    }

    /**
     * Validation rules for creating a client entry.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return self::sharedRules();
    }

    /**
     * Field names for validation error display.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'client_picture' => 'client picture',
            'organization_logo' => 'organization logo',
        ];
    }
}
