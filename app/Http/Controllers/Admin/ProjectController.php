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
    public function store(StoreProjectRequest $request): RedirectResponse
    {
        $this->project_service->store($request);

        return back()->with('success', 'Project added successfully.');
    }

    /**
     * Get a project info by id.
     */
    public function edit(string $project_id): JsonResponse
    {
        return response()->json($this->project_service->find($project_id));
    }

    /**
     * Update an existing project info in storage.
     *
     * @param  UpdateProjectRequest  $request  Validated payload
     */
    public function update(UpdateProjectRequest $request): RedirectResponse
    {
        $this->project_service->update($request);

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
