<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogInfo;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\UserLogTrait;
use App\Models\BlogCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class BlogController extends Controller
{
    use UserLogTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function view(): View
    {
        try {
            return view(
                'admin.pages.module.blog',
                [
                    'blog_list'             => BlogInfo::with('category', 'author')->sorted()->get(),
                    'blog_categories'       => BlogCategory::active()->sorted()->get(),
                ]
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return view('admin.error.404');
        }
    }

    /**
     * Store a newly created blog in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            // Validation
            $request->validate([
                'blog_title'            => 'required|string|max:255',
                'blog_excerpt'          => 'nullable|string|max:500',
                'blog_content'          => 'nullable|string',
                'blog_image'            => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
                'blog_featured_image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
                'category_id'           => 'nullable|exists:blog_categories,id',
                'published_at'          => 'nullable|date',
                'blog_status'           => 'nullable|boolean',
            ]);

            // Store blog image
            $imagePath = null;
            if ($request->hasFile('blog_image')) {
                $file = $request->file('blog_image');
                $filename = Str::uuid() . '.webp';
                $imagePath = 'uploads/blog/images/' . $filename;
                $img = Image::read($file);
                $img->scale(width: 600);
                Storage::disk('public')->put($imagePath, $img->toWebp(80));
            }

            // Store featured image
            $featuredPath = null;
            if ($request->hasFile('blog_featured_image')) {
                $file = $request->file('blog_featured_image');
                $filename = Str::uuid() . '.webp';
                $featuredPath = 'uploads/blog/featured/' . $filename;
                $img = Image::read($file);
                $img->scale(width: 1200, height: 600);
                Storage::disk('public')->put($featuredPath, $img->toWebp(80));
            }

            // Save blog in DB
            $blog = new BlogInfo();
            $blog->blog_title = $request->blog_title;
            $blog->blog_excerpt = $request->blog_excerpt;
            $blog->blog_content = $request->blog_content;
            $blog->blog_image = $imagePath;
            $blog->blog_featured_image = $featuredPath;
            $blog->category_id = $request->category_id;
            $blog->published_at = $request->published_at;
            $blog->blog_status = $request->blog_status;
            $blog->save();

            $this->logUserActivity('Blog', 'Created a new blog post');
            return back()->with('success', 'Blog post created successfully');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    /**
     * Get a blog by id
     *
     * @param string $blog_id Blog id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function edit($blog_id): JsonResponse
    {
        try {
            return response()->json(
                BlogInfo::where('id', $blog_id)->first(),
                200
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['error' => 'Something went wrong'], 404);
        }
    }

    /**
     * Update an existing blog in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function update(Request $request): RedirectResponse
    {
        try {
            // Validation
            $validated = $request->validate([
                'blog_id'               => 'required|exists:blog_infos,id',
                'blog_title'            => 'required|string|max:255',
                'blog_excerpt'          => 'nullable|string|max:500',
                'blog_content'          => 'nullable|string',
                'blog_image'            => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
                'blog_featured_image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
                'category_id'           => 'nullable|exists:blog_categories,id',
                'published_at'          => 'nullable|date',
                'blog_status'           => 'nullable|boolean',
            ]);

            $blog = BlogInfo::findOrFail($request->blog_id);

            // Store blog image
            if ($request->hasFile('blog_image')) {
                if ($blog->blog_image && Storage::disk('public')->exists($blog->blog_image)) {
                    Storage::disk('public')->delete($blog->blog_image);
                }
                $file = $request->file('blog_image');
                $filename = Str::uuid() . '.webp';
                $imagePath = 'uploads/blog/images/' . $filename;
                $img = Image::read($file);
                $img->scale(width: 600);
                Storage::disk('public')->put($imagePath, $img->toWebp(80));
                $blog->blog_image = $imagePath;
            }

            // Store featured image
            if ($request->hasFile('blog_featured_image')) {
                if ($blog->blog_featured_image && Storage::disk('public')->exists($blog->blog_featured_image)) {
                    Storage::disk('public')->delete($blog->blog_featured_image);
                }
                $file = $request->file('blog_featured_image');
                $filename = Str::uuid() . '.webp';
                $featuredPath = 'uploads/blog/featured/' . $filename;
                $img = Image::read($file);
                $img->scale(width: 1200, height: 600);
                Storage::disk('public')->put($featuredPath, $img->toWebp(80));
                $blog->blog_featured_image = $featuredPath;
            }

            // Update blog info
            $blog->fill([
                'blog_title'        => $request->blog_title,
                'blog_excerpt'      => $request->blog_excerpt,
                'blog_content'      => $request->blog_content,
                'category_id'       => $request->category_id,
                'published_at'      => $request->published_at,
                'blog_status'       => $request->blog_status,
            ]);
            $blog->save();

            $this->logUserActivity('Blog', 'Updated blog post');
            return back()->with('success', 'Blog post updated successfully');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    /**
     * Remove an existing blog from storage.
     *
     * @param string $blog_id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function delete($blog_id): RedirectResponse
    {
        try {
            $blog = BlogInfo::findOrFail($blog_id);

            // Delete images
            if ($blog->blog_image && Storage::disk('public')->exists($blog->blog_image)) {
                Storage::disk('public')->delete($blog->blog_image);
            }
            if ($blog->blog_featured_image && Storage::disk('public')->exists($blog->blog_featured_image)) {
                Storage::disk('public')->delete($blog->blog_featured_image);
            }

            $blog->delete();
            $this->logUserActivity('Blog', 'Deleted blog post');
            return back()->with('success', 'Blog post deleted successfully');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong']);
        }
    }

    /**
     * Update blog sequence.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function update_sequence(Request $request): JsonResponse
    {
        try {
            $order = $request->input('order');
            foreach ($order as $item) {
                BlogInfo::where('id', $item['id'])->update(['blog_sequence' => $item['sequence']]);
            }
            return response()->json(['status' => 'success']);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['status' => 'error']);
        }
    }
}
