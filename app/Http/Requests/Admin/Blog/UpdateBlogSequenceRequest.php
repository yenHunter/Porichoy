<?php

namespace App\Http\Requests\Admin\Blog;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogSequenceRequest extends FormRequest
{
    /**
     * Only signed-in admins may reorder blog posts.
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
            'order'            => ['required', 'array', 'min:1'],
            'order.*.id'       => ['required', 'string'],
            'order.*.sequence' => ['required', 'integer', 'min:0'],
        ];
    }
}
