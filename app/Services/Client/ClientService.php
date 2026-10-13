<?php

namespace App\Services\Client;

use Illuminate\Support\Str;
use App\Traits\UserLogTrait;
use App\Models\ClientInfo;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use App\Http\Requests\Admin\Client\StoreClientRequest;
use App\Http\Requests\Admin\Client\UpdateClientRequest;
use App\Http\Requests\Admin\Client\UpdateClientSequenceRequest;

class ClientService
{
    use UserLogTrait;

    /**
     * Image storage directories (on the 'public' disk).
     */
    private const IMAGE_DIRS = [
        'client_picture'    => 'uploads/client/image',
        'organization_logo' => 'uploads/client/organization',
    ];

    /**
     * Data for the client element admin view.
     *
     * @return array<string, \Illuminate\Database\Eloquent\Collection>
     */
    public function viewData(): array
    {
        return [
            'client_list' => ClientInfo::sorted()->get(),
        ];
    }

    /**
     * Store a newly created client record.
     *
     * @param  StoreClientRequest $request  Validated payload
     * @return ClientInfo                   The created model
     */
    public function store(StoreClientRequest $request): ClientInfo
    {
        $client                       = new ClientInfo();
        $client->client_name          = $request->client_name;
        $client->client_email         = $request->client_email;
        $client->client_mobile        = $request->client_mobile;
        $client->client_designation   = $request->client_designation;
        $client->client_organization  = $request->client_organization;
        $client->client_address       = $request->client_address;
        $client->organization_website = $request->organization_website;
        $client->client_status        = $request->client_status;

        $this->storeClientImages($client, $request);

        $client->save();

        $this->logUserActivity('Client', 'New record created');

        return $client;
    }

    /**
     * Find a single client record by id.
     *
     * @param  string $client_id
     * @return ClientInfo|null
     */
    public function find(string $client_id): ?ClientInfo
    {
        return ClientInfo::where('id', $client_id)->first();
    }

    /**
     * Update an existing client record (and replace images when given).
     *
     * @param  UpdateClientRequest $request  Validated payload
     * @return ClientInfo                    The updated model
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function update(UpdateClientRequest $request): ClientInfo
    {
        $client = ClientInfo::findOrFail($request->client_id);

        $this->storeClientImages($client, $request);

        $client->fill([
            'client_name'          => $request->client_name,
            'client_email'         => $request->client_email,
            'client_mobile'        => $request->client_mobile,
            'client_designation'   => $request->client_designation,
            'client_organization'  => $request->client_organization,
            'client_address'       => $request->client_address,
            'organization_website' => $request->organization_website,
            'client_status'        => $request->client_status,
        ]);
        $client->save();

        $this->logUserActivity('Client', 'Existing record updated');

        return $client;
    }

    /**
     * Delete a client record (and all its stored images).
     *
     * @param  string $client_id
     * @return void
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function delete(string $client_id): void
    {
        $client = ClientInfo::findOrFail($client_id);

        foreach (array_keys(self::IMAGE_DIRS) as $field) {
            $this->deleteImage($client->{$field});
        }

        $client->delete();

        $this->logUserActivity('Client', 'Existing record deleted');
    }

    /**
     * Reorder (sequence-update) client records from a drag-sort payload.
     *
     * @param  UpdateClientSequenceRequest $request
     * @return void
     */
    public function updateSequence(UpdateClientSequenceRequest $request): void
    {
        foreach ($request->input('order', []) as $item) {
            ClientInfo::where('id', $item['id'])
                ->update(['client_sequence' => $item['sequence']]);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Internals
    |--------------------------------------------------------------------------
    */

    /**
     * Handle both client images in one pass (store new, delete old).
     */
    private function storeClientImages(ClientInfo $client, StoreClientRequest|UpdateClientRequest $request): void
    {
        foreach (self::IMAGE_DIRS as $field => $dir) {
            if (!$request->hasFile($field)) {
                continue;
            }

            $this->deleteImage($client->{$field});

            $filename = Str::uuid() . '.webp';
            $path     = $dir . '/' . $filename;

            $image = Image::read($request->file($field));
            $image->scale(width: 300);

            Storage::disk('public')->put($path, $image->toWebp(80));

            $client->{$field} = $path;
        }
    }

    /**
     * Remove a stored image from disk (silently no-ops when absent).
     */
    private function deleteImage(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
