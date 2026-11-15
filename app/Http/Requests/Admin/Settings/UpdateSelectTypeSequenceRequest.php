<?php

namespace App\Http\Requests\Admin\Settings;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Shared by every select-type lookup (research source, location type,
 * employment type, training category): they all reorder through
 * `{order: [{id, sequence}]}`.
 */
class UpdateSelectTypeSequenceRequest extends FormRequest
{
    /**
     * Only signed-in admins may reorder lookup values.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Validation rules for the drag/drop reorder payload.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'order' => ['required', 'array', 'min:1'],
            'order.*.id' => ['required'],
            'order.*.sequence' => ['required', 'integer', 'min:0'],
        ];
    }
}
