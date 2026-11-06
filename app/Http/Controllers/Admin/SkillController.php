<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Skill\StoreSkillRequest;
use App\Http\Requests\Admin\Skill\UpdateSkillRequest;
use App\Http\Requests\Admin\Skill\UpdateSkillSequenceRequest;
use App\Services\Skill\SkillService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SkillController extends Controller
{
    public function __construct(
        private readonly SkillService $skill_service
    ) {}

    /**
     * Display the listing of the resource.
     */
    public function view(): View
    {
        return view('admin.pages.element.skill', $this->skill_service->viewData());
    }

    /**
     * Store a newly created skill info in storage.
     *
     * @param  StoreSkillRequest  $request  Validated payload
     */
    public function store(StoreSkillRequest $request): RedirectResponse
    {
        $this->skill_service->store($request);

        return back()->with('success', 'Skill added successfully.');
    }

    /**
     * Get a skill info by id.
     */
    public function edit(string $skill_id): JsonResponse
    {
        return response()->json($this->skill_service->find($skill_id));
    }

    /**
     * Update an existing skill info in storage.
     *
     * @param  UpdateSkillRequest  $request  Validated payload
     */
    public function update(UpdateSkillRequest $request): RedirectResponse
    {
        $this->skill_service->update($request);

        return back()->with('success', 'Skill info updated');
    }

    /**
     * Delete an existing skill info from storage.
     */
    public function delete(string $skill_id): RedirectResponse
    {
        $this->skill_service->delete($skill_id);

        return back()->with('success', 'Skill info deleted');
    }

    /**
     * Update the sequence of multiple skill info records.
     */
    public function update_sequence(UpdateSkillSequenceRequest $request): JsonResponse
    {
        $this->skill_service->updateSequence($request);

        return response()->json(['status' => 'success']);
    }
}
