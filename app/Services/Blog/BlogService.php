<?php

namespace App\Services\Blog;

use Illuminate\Support\Str;
use App\Traits\UserLogTrait;
use App\Models\BlogInfo;
use App\Models\BlogCategory;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Blog\UpdateBlogRequest;
use App\Http\Requests\Admin\Blog\StoreBlogRequest;
use App\Http\Requests\Admin\Blog\UpdateBlogSequenceRequest;
use App\Http\Requests\Admin\Blog\UpdateBlogSettingsRequest;
use App\Models\ColumnSettings;

class BlogService
{
    use UserLogTrait;

    /**
     * Image storage directories (on the 'public' disk) and geometry.
     */
    private const IMAGE_DIR    = 'uploads/blog/images';
    private const FEATURED_DIR = 'uploads/blog/featured';
    private const IMAGE_WIDTH  = 600;
    private const FEATURED_W   = 1200;
    private const FEATURED_H   = 600;

    /**
     * Data for the blog module admin view.
     *
     * @return array<string, \Illuminate\Database\Eloquent\Collection>
     */
    public function viewData(): array
    {
        return [
            'blog_list'           => BlogInfo::with('category')->sorted()->get(),
            'blog_categories'     => BlogCategory::active()->sorted()->get(),
        ];
    }

    /**
     * Store a newly created blog post.
     *
     * @param  StoreBlogRequest $request  Validated payload
     * @return BlogInfo                   The created model
     */
    public function store(StoreBlogRequest $request): BlogInfo
    {
        $blog                     = new BlogInfo();
        $blog->blog_title         = $request->blog_title;
        $blog->blog_excerpt       = $request->blog_excerpt;
        $blog->blog_content       = $request->blog_content;
        $blog->blog_image         = $this->storeImage($request, 'blog_image');
        $blog->blog_featured_image = $this->storeFeaturedImage($request);
        $blog->category_id        = $request->category_id;
        $blog->published_at       = $request->published_at;
        $blog->blog_status        = $request->blog_status;
        $blog->save();

        $this->logUserActivity('Blog', 'Created a new blog post');

        return $blog;
    }

    /**
     * Find a single blog record by id.
     *
     * @param  string $blog_id
     * @return BlogInfo|null
     */
    public function find(string $blog_id): ?BlogInfo
    {
        return BlogInfo::where('id', $blog_id)->first();
    }

    /**
     * Update an existing blog post (replacing images if given).
     *
     * @param  UpdateBlogRequest $request  Validated payload
     * @return BlogInfo                    The updated model
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function update(UpdateBlogRequest $request): BlogInfo
    {
        $blog = BlogInfo::findOrFail($request->blog_id);

        if ($request->hasFile('blog_image')) {
            $this->deleteImage($blog->blog_image);
            $blog->blog_image = $this->storeImage($request, 'blog_image');
        }

        if ($request->hasFile('blog_featured_image')) {
            $this->deleteImage($blog->blog_featured_image);
            $blog->blog_featured_image = $this->storeFeaturedImage($request);
        }

        $blog->fill([
            'blog_title'    => $request->blog_title,
            'blog_excerpt'  => $request->blog_excerpt,
            'blog_content'  => $request->blog_content,
            'category_id'   => $request->category_id,
            'published_at'  => $request->published_at,
            'blog_status'   => $request->blog_status,
        ]);
        $blog->save();

        $this->logUserActivity('Blog', 'Updated blog post');

        return $blog;
    }

    /**
     * Delete a blog post (and its stored images).
     *
     * @param  string $blog_id
     * @return void
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function delete(string $blog_id): void
    {
        $blog = BlogInfo::findOrFail($blog_id);

        $this->deleteImage($blog->blog_image);
        $this->deleteImage($blog->blog_featured_image);

        $blog->delete();

        $this->logUserActivity('Blog', 'Deleted blog post');
    }

    /**
     * Reorder (sequence-update) blog posts from a drag-sort payload.
     *
     * @param  UpdateBlogSequenceRequest $request
     * @return void
     */
    public function updateSequence(UpdateBlogSequenceRequest $request): void
    {
        foreach ($request->input('order', []) as $item) {
            BlogInfo::where('id', $item['id'])
                ->update(['blog_sequence' => $item['sequence']]);
        }
    }

    /**
     * Toggle column visibility for the blog module.
     *
     * @param  UpdateBlogSettingsRequest $request
     * @return void
     */
    public function updateSettings(UpdateBlogSettingsRequest $request): void
    {
        ColumnSettings::where('module', 'blog')
            ->get()
            ->each(function (ColumnSettings $setting) use ($request) {
                $setting->visibility = $request->has($setting->column_name) ? 1 : 0;
                $setting->save();
            });

        $this->logUserActivity('Blog', 'Updated Blog settings');
    }

    /*
    |--------------------------------------------------------------------------
    | Internals
    |--------------------------------------------------------------------------
    */

    /**
     * Persist the regular blog image, rescaled and re-coded as WebP.
     */
    private function storeImage(StoreBlogRequest|UpdateBlogRequest $request, string $field): ?string
    {
        if (!$request->hasFile($field)) {
            return null;
        }

        $filename = Str::uuid() . '.webp';
        $path     = self::IMAGE_DIR . '/' . $filename;

        $image = Image::read($request->file($field));
        $image->scale(width: self::IMAGE_WIDTH);

        Storage::disk('public')->put($path, $image->toWebp(80));

        return $path;
    }

    /**
     * Persist the featured image (1200x600) re-coded as WebP.
     */
    private function storeFeaturedImage(StoreBlogRequest|UpdateBlogRequest $request): ?string
    {
        if (!$request->hasFile('blog_featured_image')) {
            return null;
        }

        $filename = Str::uuid() . '.webp';
        $path     = self::FEATURED_DIR . '/' . $filename;

        $image = Image::read($request->file('blog_featured_image'));
        $image->scale(width: self::FEATURED_W, height: self::FEATURED_H);

        Storage::disk('public')->put($path, $image->toWebp(80));

        return $path;
    }

    /**
     * Remove a stored image from disk (silently no-ops when absent).
     */
    private function deleteImage(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
