<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Research\ResearchService;
use App\Http\Requests\Admin\Research\UpdateResearchRequest;
use App\Http\Requests\Admin\Research\StoreResearchRequest;
use App\Http\Requests\Admin\Research\UpdateResearchSequenceRequest;
use App\Http\Requests\Admin\Research\UpdateResearchSettingsRequest;

class ResearchController extends Controller
{
    public function __construct(
        private readonly ResearchService $research_service
    ) {
    }

    /**
     * Show the research management page.
     *
     * @return \Illuminate\View\View
     */
    public function view(): View
    {
        return view('admin.pages.module.research', $this->research_service->viewData());
    }

    /**
     * Store a new research info in the database.
     *
     * @param  StoreResearchRequest $request Validated payload
     * @return RedirectResponse
     */
    public function store(StoreResearchRequest $request): RedirectResponse
    {
        $this->research_service->store($request);

        return back()->with('success', 'Research info created');
    }

    /**
     * Get an existing research info by id.
     *
     * @param  string $research_id
     * @return JsonResponse
     */
    public function edit(string $research_id): JsonResponse
    {
        return response()->json($this->research_service->find($research_id));
    }

    /**
     * Update an existing research info in storage.
     *
     * @param  UpdateResearchRequest $request Validated payload
     * @return RedirectResponse
     */
    public function update(UpdateResearchRequest $request): RedirectResponse
    {
        $this->research_service->update($request);

        return back()->with('success', 'Research info updated');
    }

    /**
     * Delete an existing research info by id.
     *
     * @param  string $research_id
     * @return RedirectResponse
     */
    public function delete(string $research_id): RedirectResponse
    {
        $this->research_service->delete($research_id);

        return back()->with('success', 'Research info removed');
    }

    /**
     * Update the sequence of multiple research info records.
     *
     * @param  UpdateResearchSequenceRequest $request
     * @return JsonResponse
     */
    public function update_sequence(UpdateResearchSequenceRequest $request): JsonResponse
    {
        $this->research_service->updateSequence($request);

        return response()->json(['status' => 'success']);
    }

    /**
     * Update research settings (column visibility).
     *
     * @param  UpdateResearchSettingsRequest $request
     * @return RedirectResponse
     */
    public function settings_update(UpdateResearchSettingsRequest $request): RedirectResponse
    {
        $this->research_service->updateSettings($request);

        return back()->with('success', 'Research settings updated');
    }
}
