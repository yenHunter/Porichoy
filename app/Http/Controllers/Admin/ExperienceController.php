<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Experience\ExperienceService;
use App\Http\Requests\Admin\Experience\UpdateExperienceRequest;
use App\Http\Requests\Admin\Experience\StoreExperienceRequest;
use App\Http\Requests\Admin\Experience\UpdateExperienceSequenceRequest;
use App\Http\Requests\Admin\Experience\UpdateExperienceSettingsRequest;

class ExperienceController extends Controller
{
    public function __construct(
        private readonly ExperienceService $experience_service
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function view(): View
    {
        return view('admin.pages.module.experience', $this->experience_service->viewData());
    }

    /**
     * Store a newly created experience info in storage.
     *
     * @param  StoreExperienceRequest $request Validated payload
     * @return RedirectResponse
     */
    public function store(StoreExperienceRequest $request): RedirectResponse
    {
        $this->experience_service->store($request);

        return back()->with('success', 'Experience info created');
    }

    /**
     * Get an experience info by id.
     *
     * @param  string $experience_id
     * @return JsonResponse
     */
    public function edit(string $experience_id): JsonResponse
    {
        return response()->json($this->experience_service->find($experience_id));
    }

    /**
     * Update an existing experience info in storage.
     *
     * @param  UpdateExperienceRequest $request Validated payload
     * @return RedirectResponse
     */
    public function update(UpdateExperienceRequest $request): RedirectResponse
    {
        $this->experience_service->update($request);

        return back()->with('success', 'Experience info updated');
    }

    /**
     * Remove an existing experience info from storage.
     *
     * @param  string $experience_id
     * @return RedirectResponse
     */
    public function delete(string $experience_id): RedirectResponse
    {
        $this->experience_service->delete($experience_id);

        return back()->with('success', 'Experience info removed');
    }

    /**
     * Update the employment sequence for multiple experience info records.
     *
     * @param  UpdateExperienceSequenceRequest $request
     * @return JsonResponse
     */
    public function update_sequence(UpdateExperienceSequenceRequest $request): JsonResponse
    {
        $this->experience_service->updateSequence($request);

        return response()->json(['status' => 'success']);
    }

    /**
     * Update experience settings (column visibility).
     *
     * @param  UpdateExperienceSettingsRequest $request
     * @return RedirectResponse
     */
    public function settings_update(UpdateExperienceSettingsRequest $request): RedirectResponse
    {
        $this->experience_service->updateSettings($request);

        return back()->with('success', 'Experience settings updated');
    }
}
