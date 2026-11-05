<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Training\StoreTrainingRequest;
use App\Http\Requests\Admin\Training\UpdateTrainingRequest;
use App\Http\Requests\Admin\Training\UpdateTrainingSequenceRequest;
use App\Http\Requests\Admin\Training\UpdateTrainingSettingsRequest;
use App\Services\Training\TrainingService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TrainingController extends Controller
{
    public function __construct(
        private readonly TrainingService $training_service
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function view(): View
    {
        return view('admin.pages.module.training', $this->training_service->viewData());
    }

    /**
     * Store a newly created training info in storage.
     *
     * @param  StoreTrainingRequest  $request  Validated payload
     */
    public function store(StoreTrainingRequest $request): RedirectResponse
    {
        $this->training_service->store($request);

        return back()->with('success', 'Training info created');
    }

    /**
     * Get a training info by id.
     */
    public function edit(string $training_id): JsonResponse
    {
        return response()->json($this->training_service->find($training_id));
    }

    /**
     * Update an existing training info in storage.
     *
     * @param  UpdateTrainingRequest  $request  Validated payload
     */
    public function update(UpdateTrainingRequest $request): RedirectResponse
    {
        $this->training_service->update($request);

        return back()->with('success', 'Training info updated');
    }

    /**
     * Remove an existing training info from storage.
     */
    public function delete(string $training_id): RedirectResponse
    {
        $this->training_service->delete($training_id);

        return back()->with('success', 'Training info removed');
    }

    /**
     * Update the sequence of multiple training info records.
     */
    public function update_sequence(UpdateTrainingSequenceRequest $request): JsonResponse
    {
        $this->training_service->updateSequence($request);

        return response()->json(['status' => 'success']);
    }

    /**
     * Update training settings (column visibility).
     */
    public function settings_update(UpdateTrainingSettingsRequest $request): RedirectResponse
    {
        $this->training_service->updateSettings($request);

        return back()->with('success', 'Training settings updated');
    }
}
