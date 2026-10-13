<?php

namespace App\Http\Requests\Admin\Blog;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBlogRequest extends FormRequest
{
    /**
     * Only signed-in admins may update blog posts.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Validation rules for updating a blog post.
     * (Same shape as store, plus the record id.)
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
                'blog_id' => ['required', Rule::exists('blog_infos', 'id')],
            ]
            + StoreBlogRequest::sharedRules();
    }

    /**
     * Field names for validation error display.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return StoreBlogRequest::sharedAttributes();
    }
}
