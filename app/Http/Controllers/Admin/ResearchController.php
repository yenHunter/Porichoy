<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Research\StoreResearchRequest;
use App\Http\Requests\Admin\Research\UpdateResearchRequest;
use App\Http\Requests\Admin\Research\UpdateResearchSequenceRequest;
use App\Http\Requests\Admin\Research\UpdateResearchSettingsRequest;
use App\Services\Research\ResearchService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ResearchController extends Controller
{
    public function __construct(
        private readonly ResearchService $research_service
    ) {}

    /**
     * Show the research management page.
     */
    public function view(): View
    {
        return view('admin.pages.module.research', $this->research_service->viewData());
    }

    /**
     * Store a new research info in the database.
     *
     * @param  StoreResearchRequest  $request  Validated payload
     */
    public function store(StoreResearchRequest $request): JsonResponse|RedirectResponse
    {
        $this->research_service->store($request);

        if ($request->expectsJson()) {
            // The form is saved over JS and reloads the listing, so the message
            // rides along as a flash instead of a redirect.
            session()->flash('success', 'Research info created');

            return response()->json(['message' => 'Research info created']);
        }

        return back()->with('success', 'Research info created');
    }

    /**
     * Get an existing research info by id.
     */
    public function edit(string $research_id): JsonResponse
    {
        return response()->json(
            $this->research_service->findForEdit($research_id)
        );
    }

    /**
     * Update an existing research info in storage.
     *
     * @param  UpdateResearchRequest  $request  Validated payload
     */
    public function update(UpdateResearchRequest $request): JsonResponse|RedirectResponse
    {
        $this->research_service->update($request);

        if ($request->expectsJson()) {
            session()->flash('success', 'Research info updated');

            return response()->json(['message' => 'Research info updated']);
        }

        return back()->with('success', 'Research info updated');
    }

    /**
     * Delete an existing research info by id.
     */
    public function delete(string $research_id): RedirectResponse
    {
        $this->research_service->delete($research_id);

        return back()->with('success', 'Research info removed');
    }

    /**
     * Update the sequence of multiple research info records.
     */
    public function update_sequence(UpdateResearchSequenceRequest $request): JsonResponse
    {
        $this->research_service->updateSequence($request);

        return response()->json(['status' => 'success']);
    }

    /**
     * Update research settings (column visibility).
     */
    public function settings_update(UpdateResearchSettingsRequest $request): RedirectResponse
    {
        $this->research_service->updateSettings($request);

        return back()->with('success', 'Research settings updated');
    }
}
