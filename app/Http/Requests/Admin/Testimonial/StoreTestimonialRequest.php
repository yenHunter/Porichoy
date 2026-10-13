<?php

namespace App\Http\Requests\Admin\Testimonial;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestimonialRequest extends FormRequest
{
    /**
     * Only signed-in admins may create testimonials.
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
            'client_id'           => ['required', 'exists:client_infos,id'],
            'testimonial_title'   => ['required', 'string', 'max:255'],
            'testimonial_details' => ['required', 'string'],
            'testimonial_review'  => ['required', 'integer', 'min:1', 'max:5'],
            'testimonial_status'  => ['nullable', 'boolean'],
        ];
    }

    /**
     * Validation rules for creating a testimonial.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return self::sharedRules();
    }
}
