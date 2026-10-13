<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Skill\SkillService;
use App\Http\Requests\Admin\Skill\StoreSkillRequest;
use App\Http\Requests\Admin\Skill\UpdateSkillRequest;
use App\Http\Requests\Admin\Skill\UpdateSkillSequenceRequest;

class SkillController extends Controller
{
    public function __construct(
        private readonly SkillService $skill_service
    ) {
    }

    /**
     * Display the listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function view(): View
    {
        return view('admin.pages.element.skill', $this->skill_service->viewData());
    }

    /**
     * Store a newly created skill info in storage.
     *
     * @param  StoreSkillRequest $request Validated payload
     * @return RedirectResponse
     */
    public function store(StoreSkillRequest $request): RedirectResponse
    {
        $this->skill_service->store($request);

        return back()->with('success', 'Skill added successfully.');
    }

    /**
     * Get a skill info by id.
     *
     * @param  string $skill_id
     * @return JsonResponse
     */
    public function edit(string $skill_id): JsonResponse
    {
        return response()->json($this->skill_service->find($skill_id));
    }

    /**
     * Update an existing skill info in storage.
     *
     * @param  UpdateSkillRequest $request Validated payload
     * @return RedirectResponse
     */
    public function update(UpdateSkillRequest $request): RedirectResponse
    {
        $this->skill_service->update($request);

        return back()->with('success', 'Skill info updated');
    }

    /**
     * Delete an existing skill info from storage.
     *
     * @param  string $skill_id
     * @return RedirectResponse
     */
    public function delete(string $skill_id): RedirectResponse
    {
        $this->skill_service->delete($skill_id);

        return back()->with('success', 'Skill info deleted');
    }

    /**
     * Update the sequence of multiple skill info records.
     *
     * @param  UpdateSkillSequenceRequest $request
     * @return JsonResponse
     */
    public function update_sequence(UpdateSkillSequenceRequest $request): JsonResponse
    {
        $this->skill_service->updateSequence($request);

        return response()->json(['status' => 'success']);
    }
}
