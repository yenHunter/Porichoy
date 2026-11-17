<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Education\StoreEducationRequest;
use App\Http\Requests\Admin\Education\UpdateEducationRequest;
use App\Http\Requests\Admin\Education\UpdateEducationSequenceRequest;
use App\Http\Requests\Admin\Education\UpdateEducationSettingsRequest;
use App\Services\Education\EducationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EducationController extends Controller
{
    public function __construct(
        private readonly EducationService $education_service
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function view(): View
    {
        return view(
            'admin.pages.module.education',
            [
                'education_list' => $this->education_service->listAll(),
                'education_settings' => $this->education_service->listSettings(),
            ]
        );
    }

    /**
     * Store a newly created education info in storage.
     *
     * @param  StoreEducationRequest  $request  Validated payload
     */
    public function store(StoreEducationRequest $request): JsonResponse|RedirectResponse
    {
        $this->education_service->store($request);

        if ($request->expectsJson()) {
            // The form is saved over JS and reloads the listing, so the message
            // rides along as a flash instead of a redirect.
            session()->flash('success', 'Education info created');

            return response()->json(['message' => 'Education info created']);
        }

        return back()->with('success', 'Education info created');
    }

    /**
     * Get an education info by id.
     */
    public function edit(string $education_id): JsonResponse
    {
        return response()->json(
            $this->education_service->findForEdit($education_id)
        );
    }

    /**
     * Update an existing education info in storage.
     *
     * @param  UpdateEducationRequest  $request  Validated payload
     */
    public function update(UpdateEducationRequest $request): JsonResponse|RedirectResponse
    {
        $this->education_service->update($request);

        if ($request->expectsJson()) {
            session()->flash('success', 'Education info updated');

            return response()->json(['message' => 'Education info updated']);
        }

        return back()->with('success', 'Education info updated');
    }

    /**
     * Remove an existing education info from storage.
     */
    public function delete(string $education_id): RedirectResponse
    {
        $this->education_service->delete($education_id);

        return back()->with('success', 'Education info removed');
    }

    /**
     * Update education sequence.
     */
    public function update_sequence(UpdateEducationSequenceRequest $request): JsonResponse
    {
        $this->education_service->updateSequence($request);

        return response()->json(['status' => 'success']);
    }

    /**
     * Update education settings (column visibility).
     */
    public function settings_update(UpdateEducationSettingsRequest $request): RedirectResponse
    {
        $this->education_service->updateSettings($request);

        return back()->with('success', 'Education settings updated');
    }
}
