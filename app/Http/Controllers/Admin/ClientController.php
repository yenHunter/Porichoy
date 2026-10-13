<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Client\ClientService;
use App\Http\Requests\Admin\Client\StoreClientRequest;
use App\Http\Requests\Admin\Client\UpdateClientRequest;
use App\Http\Requests\Admin\Client\UpdateClientSequenceRequest;

class ClientController extends Controller
{
    public function __construct(
        private readonly ClientService $client_service
    ) {
    }

    /**
     * Display the listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function view(): View
    {
        return view('admin.pages.element.client', $this->client_service->viewData());
    }

    /**
     * Store a newly created client info in storage.
     *
     * @param  StoreClientRequest $request Validated payload
     * @return RedirectResponse
     */
    public function store(StoreClientRequest $request): RedirectResponse
    {
        $this->client_service->store($request);

        return back()->with('success', 'Client added successfully.');
    }

    /**
     * Get a client info by id.
     *
     * @param  string $client_id
     * @return JsonResponse
     */
    public function edit(string $client_id): JsonResponse
    {
        return response()->json($this->client_service->find($client_id));
    }

    /**
     * Update an existing client info in storage.
     *
     * @param  UpdateClientRequest $request Validated payload
     * @return RedirectResponse
     */
    public function update(UpdateClientRequest $request): RedirectResponse
    {
        $this->client_service->update($request);

        return back()->with('success', 'Client info updated');
    }

    /**
     * Delete an existing client info from storage.
     *
     * @param  string $client_id
     * @return RedirectResponse
     */
    public function delete(string $client_id): RedirectResponse
    {
        $this->client_service->delete($client_id);

        return back()->with('success', 'Client info deleted');
    }

    /**
     * Update the sequence of multiple client info records.
     *
     * @param  UpdateClientSequenceRequest $request
     * @return JsonResponse
     */
    public function update_sequence(UpdateClientSequenceRequest $request): JsonResponse
    {
        $this->client_service->updateSequence($request);

        return response()->json(['status' => 'success']);
    }
}
