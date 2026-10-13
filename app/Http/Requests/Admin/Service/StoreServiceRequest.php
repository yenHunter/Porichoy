<?php

namespace App\Http\Requests\Admin\Service;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
{
    /**
     * Only signed-in admins may create service records.
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
    public static function sharedRules(): array
    {
        return [
            'service_title'    => ['required', 'string', 'max:255'],
            'service_subtitle' => ['nullable', 'string', 'max:255'],
            'service_icon'     => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:10240'],
            'profile_image'    => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:10240'],
            'cover_image'      => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:10240'],
            'service_details'  => ['nullable', 'string'],
            'service_skills'   => ['nullable', 'array'],
            'service_status'   => ['nullable', 'boolean'],
        ];
    }

    /**
     * Validation rules for creating a service entry.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return self::sharedRules();
    }

    /**
     * Shared human-readable field names for validation errors.
     *
     * @return array<string, string>
     */
    public static function sharedAttributes(): array
    {
        return [
            'service_icon' => 'service icon',
            'cover_image'  => 'cover image',
        ];
    }

    /**
     * Field names for validation error display.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return self::sharedAttributes();
    }
}
