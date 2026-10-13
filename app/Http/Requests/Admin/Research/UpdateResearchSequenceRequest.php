<?php

namespace App\Http\Requests\Admin\Research;

use Illuminate\Foundation\Http\FormRequest;

class UpdateResearchSequenceRequest extends FormRequest
{
    /**
     * Only signed-in admins may reorder research records.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Drag/drop reorder payload.
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
