<?php

namespace App\Services\Blog;

use App\Traits\UserLogTrait;
use App\Models\BlogInfo;
use App\Models\BlogCategory;
use App\Models\ColumnSettings;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use App\Http\Requests\Admin\Blog\UpdateBlogRequest;
use App\Http\Requests\Admin\Blog\StoreBlogRequest;
use App\Http\Requests\Admin\Blog\UpdateBlogSequenceRequest;
use App\Http\Requests\Admin\Blog\UpdateBlogSettingsRequest;

class BlogService
{
    use UserLogTrait;

    /**
     * Directory (on the 'public' disk) where listing images are stored.
     */
    private const IMAGE_DIR = 'uploads/blog/images';

    /**
     * Directory (on the 'public' disk) where featured images are stored.
     */
    private const FEATURED_DIR = 'uploads/blog/featured';

    /**
     * Stored listing-image width.
     */
    private const IMAGE_WIDTH = 600;

    /**
     * Stored featured-image geometry.
     */
    private const FEATURED_WIDTH = 1200;

    private const FEATURED_HEIGHT = 600;

    /**
     * Data for the blog module admin view.
     *
     * @return array{
     *   blog_list: \Illuminate\Database\Eloquent\Collection<int, BlogInfo>,
     *   blog_categories: \Illuminate\Database\Eloquent\Collection<int, BlogCategory>,
     *   blog_settings: \Illuminate\Database\Eloquent\Collection<int, ColumnSettings>,
     * }
     */
    public function viewData(): array
    {
        return [
            'blog_list'       => BlogInfo::with('category')->sorted()->get(),
            'blog_categories' => BlogCategory::active()->sorted()->get(),
            'blog_settings'   => ColumnSettings::where('module', 'blog')->get(),
        ];
    }

    /**
     * Store a newly created blog post.
     *
     * @param  StoreBlogRequest $request  Validated payload (+ optional images)
     * @return BlogInfo                   The created model
     */
    public function store(StoreBlogRequest $request): BlogInfo
    {
        $blog                      = new BlogInfo();
        $blog->blog_title          = $request->blog_title;
        $blog->blog_excerpt        = $request->blog_excerpt;
        $blog->blog_content        = $request->blog_content;
        $blog->keywords            = $request->keywords;
        $blog->blog_image          = $this->storeImage($request, 'blog_image');
        $blog->blog_featured_image = $this->storeFeaturedImage($request);
        $blog->category_id         = $request->category_id;
        $blog->blog_published      = $request->blog_published;
        $blog->blog_status         = $request->blog_status;
        $blog->save();

        $this->logUserActivity('Blog', 'Created a new blog post');

        return $blog;
    }

    /**
     * Find a single blog post by id (404-ModelNotFound-safe).
     *
     * Returns null when the record does not exist so the controller can
     * answer with an empty JSON payload instead of throwing.
     *
     * @param  string $blog_id
     * @return BlogInfo|null
     */
    public function find(string $blog_id): ?BlogInfo
    {
        return BlogInfo::where('id', $blog_id)->first();
    }

    /**
     * Find a single blog post plus the values the edit form reads back.
     *
     * `blog_published_input` is formatted in the application timezone so a
     * `datetime-local` input shows (and submits) the same wall-clock time
     * instead of the UTC representation of the stored value.
     *
     * @param  string $blog_id
     * @return array<string, mixed>|null
     */
    public function findForEdit(string $blog_id): ?array
    {
        $blog = $this->find($blog_id);

        if ($blog === null) {
            return null;
        }

        return $blog->toArray() + [
            'blog_published_input' => $blog->blog_published?->format('Y-m-d\TH:i'),
        ];
    }

    /**
     * Update an existing blog post.
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
            'blog_title'     => $request->blog_title,
            'blog_excerpt'   => $request->blog_excerpt,
            'blog_content'   => $request->blog_content,
            'keywords'       => $request->keywords,
            'category_id'    => $request->category_id,
            // An emptied datetime field clears the date; an omitted key keeps it.
            'blog_published' => $request->has('blog_published')
                ? $request->blog_published
                : $blog->blog_published,
            // Omitted status keeps the stored value instead of writing null.
            'blog_status'    => $request->has('blog_status')
                ? $request->blog_status
                : $blog->blog_status,
        ]);
        $blog->save();

        $this->logUserActivity('Blog', 'Updated blog post');

        return $blog;
    }

    /**
     * Delete a blog post.
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

        $this->logUserActivity('Blog', 'Removed blog post');
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
     * Persist an uploaded listing image, rescaled and re-encoded as WebP.
     *
     * @param  StoreBlogRequest|UpdateBlogRequest $request
     * @param  string                            $field
     * @return string|null  Stored path, or null when nothing was uploaded.
     */
    private function storeImage(StoreBlogRequest|UpdateBlogRequest $request, string $field): ?string
    {
        if (!$request->hasFile($field)) {
            return null;
        }

        $path = self::IMAGE_DIR . '/' . Str::uuid() . '.webp';

        $image = Image::read($request->file($field));
        $image->scale(width: self::IMAGE_WIDTH);

        Storage::disk('public')->put($path, $image->toWebp(80));

        return $path;
    }

    /**
     * Persist an uploaded featured image (cropped to 1200x600, WebP).
     *
     * @param  StoreBlogRequest|UpdateBlogRequest $request
     * @return string|null  Stored path, or null when nothing was uploaded.
     */
    private function storeFeaturedImage(StoreBlogRequest|UpdateBlogRequest $request): ?string
    {
        if (!$request->hasFile('blog_featured_image')) {
            return null;
        }

        $path = self::FEATURED_DIR . '/' . Str::uuid() . '.webp';

        $image = Image::read($request->file('blog_featured_image'));
        $image->cover(width: self::FEATURED_WIDTH, height: self::FEATURED_HEIGHT);

        Storage::disk('public')->put($path, $image->toWebp(80));

        return $path;
    }

    /**
     * Remove a stored image from disk (silently no-ops when absent).
     *
     * @param  string|null $path
     * @return void
     */
    private function deleteImage(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
