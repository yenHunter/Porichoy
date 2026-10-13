<?php

namespace App\Http\Requests\Admin\Blog;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
{
    /**
     * Only signed-in admins may create blog posts.
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
            'blog_title'          => ['required', 'string', 'max:255'],
            'blog_excerpt'        => ['nullable', 'string', 'max:500'],
            'blog_content'        => ['nullable', 'string'],
            'blog_image'          => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:10240'],
            'blog_featured_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:10240'],
            'category_id'         => ['nullable', 'exists:blog_categories,id'],
            'published_at'        => ['nullable', 'date'],
            'blog_status'         => ['nullable', 'boolean'],
        ];
    }

    /**
     * Shared human-readable field names for validation errors.
     *
     * @return array<string, string>
     */
    public static function sharedAttributes(): array
    {
        return [
            'blog_image'          => 'blog image',
            'blog_featured_image' => 'featured image',
        ];
    }

    /**
     * Validation rules for creating a blog post.
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
