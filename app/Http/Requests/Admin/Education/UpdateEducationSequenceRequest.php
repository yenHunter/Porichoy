<?php

namespace App\Http\Requests\Admin\Education;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEducationSequenceRequest extends FormRequest
{
    /**
     * Only signed-in admins may reorder education records.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Validation rules for the drag/drop reorder payload. The front-end
     * submits `order` as an array of [id, sequence] objects.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'order'               => ['required', 'array', 'min:1'],
            'order.*.id'          => ['required', 'string'],
            'order.*.sequence'    => ['required', 'integer', 'min:0'],
        ];
    }
}
