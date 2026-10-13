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
     * @return array<string, mixed>
     */
    public static function sharedRules(bool $logo_required): array
    {
        return [
            'client_name'          => ['required', 'string', 'max:255'],
            'client_email'         => ['required', 'email', 'max:255'],
            'client_mobile'        => ['nullable', 'string', 'max:20'],
            'client_picture'       => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:10240'],
            'client_designation'   => ['nullable', 'string', 'max:255'],
            'client_organization'  => ['nullable', 'string', 'max:255'],
            'client_address'       => ['nullable', 'string', 'max:500'],
            // Store requires a logo; update keeps the existing one when omitted.
            'organization_logo'    => [
                $logo_required ? 'required' : 'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif,webp',
                'max:10240',
            ],
            'organization_website' => ['nullable', 'url', 'max:255'],
            'client_status'        => ['nullable', 'boolean'],
        ];
    }

    /**
     * Validation rules for creating a client entry (logo required).
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return self::sharedRules(logo_required: true);
    }
}
