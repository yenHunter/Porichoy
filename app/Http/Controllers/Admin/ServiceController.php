<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Service\ServiceService;
use App\Http\Requests\Admin\Service\StoreServiceRequest;
use App\Http\Requests\Admin\Service\UpdateServiceRequest;
use App\Http\Requests\Admin\Service\UpdateServiceSequenceRequest;

class ServiceController extends Controller
{
    public function __construct(
        private readonly ServiceService $service_service
    ) {
    }

    /**
     * Display the listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function view(): View
    {
        return view('admin.pages.element.service', $this->service_service->viewData());
    }

    /**
     * Store a newly created service info in storage.
     *
     * @param  StoreServiceRequest $request Validated payload
     * @return RedirectResponse
     */
    public function store(StoreServiceRequest $request): RedirectResponse
    {
        $this->service_service->store($request);

        return back()->with('success', 'Service added successfully.');
    }

    /**
     * Get a service info by id.
     *
     * @param  string $service_id
     * @return JsonResponse
     */
    public function edit(string $service_id): JsonResponse
    {
        return response()->json($this->service_service->find($service_id));
    }

    /**
     * Update an existing service info in storage.
     *
     * @param  UpdateServiceRequest $request Validated payload
     * @return RedirectResponse
     */
    public function update(UpdateServiceRequest $request): RedirectResponse
    {
        $this->service_service->update($request);

        return back()->with('success', 'Service info updated');
    }

    /**
     * Delete an existing service info from storage.
     *
     * @param  string $service_id
     * @return RedirectResponse
     */
    public function delete(string $service_id): RedirectResponse
    {
        $this->service_service->delete($service_id);

        return back()->with('success', 'Service info deleted');
    }

    /**
     * Update the sequence of multiple service info records.
     *
     * @param  UpdateServiceSequenceRequest $request
     * @return JsonResponse
     */
    public function update_sequence(UpdateServiceSequenceRequest $request): JsonResponse
    {
        $this->service_service->updateSequence($request);

        return response()->json(['status' => 'success']);
    }
}
