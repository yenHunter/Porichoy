<?php

namespace App\Http\Requests\Admin\Blog;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
     * Rules shared by store and update.
     *
     * @return array<string, mixed>
     */
    public static function sharedRules(): array
    {
        return [
            'blog_title' => ['required', 'string', 'max:255'],
            'blog_excerpt' => ['nullable', 'string', 'max:500'],
            'blog_content' => ['nullable', 'string'],
            'keywords' => ['nullable', 'string', 'max:255'],
            'blog_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:10240'],
            'blog_featured_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:10240'],
            // A post may only point at a blog category, not at any other
            // select-type list such as training categories.
            'category_id' => [
                'nullable',
                'integer',
                Rule::exists('select_types', 'id')->where('use_for', 'blog_category'),
            ],
            'blog_published' => ['nullable', 'date'],
            'blog_status' => ['nullable', 'boolean'],
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
            'category_id' => 'category',
            'blog_image' => 'blog image',
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
