<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Services\Project\ProjectService;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\Project\StoreProjectRequest;
use App\Http\Requests\Admin\Project\UpdateProjectRequest;
use App\Http\Requests\Admin\Project\UpdateProjectSequenceRequest;

class ProjectController extends Controller
{
    public function __construct(
        private readonly ProjectService $project_service
    ) {
    }

    /**
     * Display the listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function view(): View
    {
        return view('admin.pages.element.project', $this->project_service->viewData());
    }

    /**
     * Store a newly created project info in storage.
     *
     * @param  StoreProjectRequest $request Validated payload
     * @return RedirectResponse
     */
    public function store(StoreProjectRequest $request): RedirectResponse
    {
        $this->project_service->store($request);

        return back()->with('success', 'Project added successfully.');
    }

    /**
     * Get a project info by id.
     *
     * @param  string $project_id
     * @return JsonResponse
     */
    public function edit(string $project_id): JsonResponse
    {
        return response()->json($this->project_service->find($project_id));
    }

    /**
     * Update an existing project info in storage.
     *
     * @param  UpdateProjectRequest $request Validated payload
     * @return RedirectResponse
     */
    public function update(UpdateProjectRequest $request): RedirectResponse
    {
        $this->project_service->update($request);

        return back()->with('success', 'Project info updated');
    }

    /**
     * Delete an existing project info from storage.
     *
     * @param  string $project_id
     * @return RedirectResponse
     */
    public function delete(string $project_id): RedirectResponse
    {
        $this->project_service->delete($project_id);

        return back()->with('success', 'Project info deleted');
    }

    /**
     * Update the sequence of multiple project info records.
     *
     * @param  UpdateProjectSequenceRequest $request
     * @return JsonResponse
     */
    public function update_sequence(UpdateProjectSequenceRequest $request): JsonResponse
    {
        $this->project_service->updateSequence($request);

        return response()->json(['status' => 'success']);
    }
}
