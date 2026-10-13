<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Training\TrainingService;
use App\Http\Requests\Admin\Training\UpdateTrainingRequest;
use App\Http\Requests\Admin\Training\StoreTrainingRequest;
use App\Http\Requests\Admin\Training\UpdateTrainingSequenceRequest;
use App\Http\Requests\Admin\Training\UpdateTrainingSettingsRequest;

class TrainingController extends Controller
{
    public function __construct(
        private readonly TrainingService $training_service
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function view(): View
    {
        return view('admin.pages.module.training', $this->training_service->viewData());
    }

    /**
     * Store a newly created training info in storage.
     *
     * @param  StoreTrainingRequest $request Validated payload
     * @return RedirectResponse
     */
    public function store(StoreTrainingRequest $request): RedirectResponse
    {
        $this->training_service->store($request);

        return back()->with('success', 'Training info created');
    }

    /**
     * Get a training info by id.
     *
     * @param  string $training_id
     * @return JsonResponse
     */
    public function edit(string $training_id): JsonResponse
    {
        return response()->json($this->training_service->find($training_id));
    }

    /**
     * Update an existing training info in storage.
     *
     * @param  UpdateTrainingRequest $request Validated payload
     * @return RedirectResponse
     */
    public function update(UpdateTrainingRequest $request): RedirectResponse
    {
        $this->training_service->update($request);

        return back()->with('success', 'Training info updated');
    }

    /**
     * Remove an existing training info from storage.
     *
     * @param  string $training_id
     * @return RedirectResponse
     */
    public function delete(string $training_id): RedirectResponse
    {
        $this->training_service->delete($training_id);

        return back()->with('success', 'Training info removed');
    }

    /**
     * Update the sequence of multiple training info records.
     *
     * @param  UpdateTrainingSequenceRequest $request
     * @return JsonResponse
     */
    public function update_sequence(UpdateTrainingSequenceRequest $request): JsonResponse
    {
        $this->training_service->updateSequence($request);

        return response()->json(['status' => 'success']);
    }

    /**
     * Update training settings (column visibility).
     *
     * @param  UpdateTrainingSettingsRequest $request
     * @return RedirectResponse
     */
    public function settings_update(UpdateTrainingSettingsRequest $request): RedirectResponse
    {
        $this->training_service->updateSettings($request);

        return back()->with('success', 'Training settings updated');
    }
}
