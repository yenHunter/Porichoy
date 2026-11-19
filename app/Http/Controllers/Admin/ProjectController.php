<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Project\StoreProjectRequest;
use App\Http\Requests\Admin\Project\UpdateProjectRequest;
use App\Http\Requests\Admin\Project\UpdateProjectSequenceRequest;
use App\Services\Project\ProjectService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function __construct(
        private readonly ProjectService $project_service
    ) {}

    /**
     * Display the listing of the resource.
     */
    public function view(): View
    {
        return view('admin.pages.element.project', $this->project_service->viewData());
    }

    /**
     * Store a newly created project info in storage.
     *
     * @param  StoreProjectRequest  $request  Validated payload
     */
    public function store(StoreProjectRequest $request): JsonResponse|RedirectResponse
    {
        $this->project_service->store($request);

        if ($request->expectsJson()) {
            // The form is saved over JS and reloads the listing, so the message
            // rides along as a flash instead of a redirect.
            session()->flash('success', 'Project info created');

            return response()->json(['message' => 'Project info created']);
        }

        return back()->with('success', 'Project info created');
    }

    /**
     * Get a project info by id, with the values the edit form reads back.
     */
    public function edit(string $project_id): JsonResponse
    {
        return response()->json(
            $this->project_service->findForEdit($project_id)
        );
    }

    /**
     * Update an existing project info in storage.
     *
     * @param  UpdateProjectRequest  $request  Validated payload
     */
    public function update(UpdateProjectRequest $request): JsonResponse|RedirectResponse
    {
        $this->project_service->update($request);

        if ($request->expectsJson()) {
            session()->flash('success', 'Project info updated');

            return response()->json(['message' => 'Project info updated']);
        }

        return back()->with('success', 'Project info updated');
    }

    /**
     * Delete an existing project info from storage.
     */
    public function delete(string $project_id): RedirectResponse
    {
        $this->project_service->delete($project_id);

        return back()->with('success', 'Project info deleted');
    }

    /**
     * Update the sequence of multiple project info records.
     */
    public function update_sequence(UpdateProjectSequenceRequest $request): JsonResponse
    {
        $this->project_service->updateSequence($request);

        return response()->json(['status' => 'success']);
    }
}
