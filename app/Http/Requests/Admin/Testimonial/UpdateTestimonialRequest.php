<?php

namespace App\Http\Requests\Admin\Testimonial;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTestimonialRequest extends FormRequest
{
    /**
     * Only signed-in admins may update testimonials.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Validation rules for updating a testimonial.
     * (Same shape as store, plus the record id.)
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
                'testimonial_id' => ['required', Rule::exists('testimonial_infos', 'id')],
            ]
            + StoreTestimonialRequest::sharedRules();
    }
}
