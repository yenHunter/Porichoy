<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Blog\BlogService;
use App\Http\Requests\Admin\Blog\UpdateBlogRequest;
use App\Http\Requests\Admin\Blog\StoreBlogRequest;
use App\Http\Requests\Admin\Blog\UpdateBlogSequenceRequest;
use App\Http\Requests\Admin\Blog\UpdateBlogSettingsRequest;

class BlogController extends Controller
{
    public function __construct(
        private readonly BlogService $blog_service
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function view(): View
    {
        return view('admin.pages.module.blog', $this->blog_service->viewData());
    }

    /**
     * Store a newly created blog in storage.
     *
     * @param  StoreBlogRequest $request Validated payload
     * @return RedirectResponse
     */
    public function store(StoreBlogRequest $request): RedirectResponse
    {
        $this->blog_service->store($request);

        return back()->with('success', 'Blog post created successfully');
    }

    /**
     * Get a blog by id.
     *
     * @param  string $blog_id
     * @return JsonResponse
     */
    public function edit(string $blog_id): JsonResponse
    {
        return response()->json($this->blog_service->find($blog_id), 200);
    }

    /**
     * Update an existing blog in storage.
     *
     * @param  UpdateBlogRequest $request Validated payload
     * @return RedirectResponse
     */
    public function update(UpdateBlogRequest $request): RedirectResponse
    {
        $this->blog_service->update($request);

        return back()->with('success', 'Blog post updated successfully');
    }

    /**
     * Remove an existing blog from storage.
     *
     * @param  string $blog_id
     * @return RedirectResponse
     */
    public function delete(string $blog_id): RedirectResponse
    {
        $this->blog_service->delete($blog_id);

        return back()->with('success', 'Blog post deleted successfully');
    }

    /**
     * Update blog sequence.
     *
     * @param  UpdateBlogSequenceRequest $request
     * @return JsonResponse
     */
    public function update_sequence(UpdateBlogSequenceRequest $request): JsonResponse
    {
        $this->blog_service->updateSequence($request);

        return response()->json(['status' => 'success']);
    }

    /**
     * Update blog settings (column visibility).
     *
     * @param  UpdateBlogSettingsRequest $request
     * @return RedirectResponse
     */
    public function settings_update(UpdateBlogSettingsRequest $request): RedirectResponse
    {
        $this->blog_service->updateSettings($request);

        return back()->with('success', 'Blog settings updated');
    }
}
