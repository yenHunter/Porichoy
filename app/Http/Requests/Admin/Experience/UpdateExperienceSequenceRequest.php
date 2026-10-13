<?php

namespace App\Http\Requests\Admin\Experience;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExperienceSequenceRequest extends FormRequest
{
    /**
     * Only signed-in admins may reorder experience records.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Drag/drop reorder payload (the front-end submits `order` as an
     * array of [id, sequence] objects).
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'order'            => ['required', 'array', 'min:1'],
            'order.*.id'       => ['required', 'string'],
            'order.*.sequence' => ['required', 'integer', 'min:0'],
        ];
    }
}
