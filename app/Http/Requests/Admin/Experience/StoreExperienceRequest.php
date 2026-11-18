<?php

namespace App\Http\Requests\Admin\Experience;

use App\Models\SelectType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreExperienceRequest extends FormRequest
{
    /**
     * Only signed-in admins may create experience records.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Shared rules for store and update (keep them in sync via this helper).
     *
     * @return array<string, mixed>
     */
    public static function sharedRules(): array
    {
        return [
            'employment_position' => ['required', 'string', 'max:255'],
            // Only an employment type, not any other select-type list.
            'employment_type' => [
                'required',
                'integer',
                Rule::exists('select_types', 'id')->where('use_for', SelectType::EMPLOYMENT_TYPE),
            ],
            'employment_department' => ['nullable', 'string', 'max:255'],
            'employment_organization' => ['required', 'string', 'max:255'],
            'organization_logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:10240'],
            'organization_address' => ['nullable', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            // Only a location type, not any other select-type list.
            'location_type' => [
                'nullable',
                'integer',
                Rule::exists('select_types', 'id')->where('use_for', SelectType::LOCATION_TYPE),
            ],
            'employment_details' => ['nullable', 'string'],
            'employment_status' => ['nullable', 'boolean'],
        ];
    }

    /**
     * Human-readable field names shared by store and update.
     *
     * @return array<string, string>
     */
    public static function sharedAttributes(): array
    {
        return [
            'organization_logo' => 'organization logo',
        ];
    }

    /**
     * Validation rules for creating an experience entry.
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
        return self::sharedAttributes();
    }
}
