<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use App\Models\ColumnSettings;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Education\EducationService;
use App\Http\Requests\Admin\Education\UpdateEducationRequest;
use App\Http\Requests\Admin\Education\StoreEducationRequest;
use App\Http\Requests\Admin\Education\UpdateEducationSequenceRequest;
use App\Http\Requests\Admin\Education\UpdateEducationSettingsRequest;

class EducationController extends Controller
{
    public function __construct(
        private readonly EducationService $education_service
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function view(): View
    {
        return view(
            'admin.pages.module.education',
            [
                'education_list'     => $this->education_service->listAll(),
                'education_settings' => $this->education_service->listSettings(),
            ]
        );
    }

    /**
     * Store a newly created education info in storage.
     *
     * @param  StoreEducationRequest $request Validated payload
     * @return RedirectResponse
     */
    public function store(StoreEducationRequest $request): RedirectResponse
    {
        $this->education_service->store($request);

        return back()->with('success', 'Education info created');
    }

    /**
     * Get an education info by id.
     *
     * @param  string $education_id
     * @return JsonResponse
     */
    public function edit(string $education_id): JsonResponse
    {
        return response()->json(
            $this->education_service->find($education_id)
        );
    }

    /**
     * Update an existing education info in storage.
     *
     * @param  UpdateEducationRequest $request Validated payload
     * @return RedirectResponse
     */
    public function update(UpdateEducationRequest $request): RedirectResponse
    {
        $this->education_service->update($request);

        return back()->with('success', 'Education info updated');
    }

    /**
     * Remove an existing education info from storage.
     *
     * @param  string $education_id
     * @return RedirectResponse
     */
    public function delete(string $education_id): RedirectResponse
    {
        $this->education_service->delete($education_id);

        return back()->with('success', 'Education info removed');
    }

    /**
     * Update education sequence.
     *
     * @param  UpdateEducationSequenceRequest $request
     * @return JsonResponse
     */
    public function update_sequence(UpdateEducationSequenceRequest $request): JsonResponse
    {
        $this->education_service->updateSequence($request);

        return response()->json(['status' => 'success']);
    }

    /**
     * Update education settings (column visibility).
     *
     * @param  UpdateEducationSettingsRequest $request
     * @return RedirectResponse
     */
    public function settings_update(UpdateEducationSettingsRequest $request): RedirectResponse
    {
        $this->education_service->updateSettings($request);

        return back()->with('success', 'Education settings updated');
    }
}
