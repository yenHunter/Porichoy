<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Experience\StoreExperienceRequest;
use App\Http\Requests\Admin\Experience\UpdateExperienceRequest;
use App\Http\Requests\Admin\Experience\UpdateExperienceSequenceRequest;
use App\Http\Requests\Admin\Experience\UpdateExperienceSettingsRequest;
use App\Services\Experience\ExperienceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ExperienceController extends Controller
{
    public function __construct(
        private readonly ExperienceService $experience_service
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function view(): View
    {
        return view('admin.pages.module.experience', $this->experience_service->viewData());
    }

    /**
     * Store a newly created experience info in storage.
     *
     * @param  StoreExperienceRequest  $request  Validated payload
     */
    public function store(StoreExperienceRequest $request): JsonResponse|RedirectResponse
    {
        $this->experience_service->store($request);

        if ($request->expectsJson()) {
            // The form is saved over JS and reloads the listing, so the message
            // rides along as a flash instead of a redirect.
            session()->flash('success', 'Experience info created');

            return response()->json(['message' => 'Experience info created']);
        }

        return back()->with('success', 'Experience info created');
    }

    /**
     * Get an experience info by id.
     */
    public function edit(string $experience_id): JsonResponse
    {
        return response()->json(
            $this->experience_service->findForEdit($experience_id)
        );
    }

    /**
     * Update an existing experience info in storage.
     *
     * @param  UpdateExperienceRequest  $request  Validated payload
     */
    public function update(UpdateExperienceRequest $request): JsonResponse|RedirectResponse
    {
        $this->experience_service->update($request);

        if ($request->expectsJson()) {
            session()->flash('success', 'Experience info updated');

            return response()->json(['message' => 'Experience info updated']);
        }

        return back()->with('success', 'Experience info updated');
    }

    /**
     * Remove an existing experience info from storage.
     */
    public function delete(string $experience_id): RedirectResponse
    {
        $this->experience_service->delete($experience_id);

        return back()->with('success', 'Experience info removed');
    }

    /**
     * Update the employment sequence for multiple experience info records.
     */
    public function update_sequence(UpdateExperienceSequenceRequest $request): JsonResponse
    {
        $this->experience_service->updateSequence($request);

        return response()->json(['status' => 'success']);
    }

    /**
     * Update experience settings (column visibility).
     */
    public function settings_update(UpdateExperienceSettingsRequest $request): RedirectResponse
    {
        $this->experience_service->updateSettings($request);

        return back()->with('success', 'Experience settings updated');
    }
}
