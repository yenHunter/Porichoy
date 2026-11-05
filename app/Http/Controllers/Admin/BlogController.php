<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\StoreBlogRequest;
use App\Http\Requests\Admin\Blog\UpdateBlogRequest;
use App\Http\Requests\Admin\Blog\UpdateBlogSequenceRequest;
use App\Http\Requests\Admin\Blog\UpdateBlogSettingsRequest;
use App\Services\Blog\BlogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function __construct(
        private readonly BlogService $blog_service
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function view(): View
    {
        return view('admin.pages.module.blog', $this->blog_service->viewData());
    }

    /**
     * Store a newly created blog post in storage.
     *
     * @param  StoreBlogRequest  $request  Validated payload
     */
    public function store(StoreBlogRequest $request): RedirectResponse
    {
        $this->blog_service->store($request);

        return back()->with('success', 'Blog post created');
    }

    /**
     * Get a blog post by id.
     */
    public function edit(string $blog_id): JsonResponse
    {
        return response()->json(
            $this->blog_service->findForEdit($blog_id)
        );
    }

    /**
     * Update an existing blog post in storage.
     *
     * @param  UpdateBlogRequest  $request  Validated payload
     */
    public function update(UpdateBlogRequest $request): RedirectResponse
    {
        $this->blog_service->update($request);

        return back()->with('success', 'Blog post updated');
    }

    /**
     * Remove an existing blog post from storage.
     */
    public function delete(string $blog_id): RedirectResponse
    {
        $this->blog_service->delete($blog_id);

        return back()->with('success', 'Blog post removed');
    }

    /**
     * Update blog sequence.
     */
    public function update_sequence(UpdateBlogSequenceRequest $request): JsonResponse
    {
        $this->blog_service->updateSequence($request);

        return response()->json(['status' => 'success']);
    }

    /**
     * Update blog settings (column visibility).
     */
    public function settings_update(UpdateBlogSettingsRequest $request): RedirectResponse
    {
        $this->blog_service->updateSettings($request);

        return back()->with('success', 'Blog settings updated');
    }
}
