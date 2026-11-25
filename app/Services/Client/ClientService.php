<?php

namespace App\Services\Client;

use App\Http\Requests\Admin\Client\StoreClientRequest;
use App\Http\Requests\Admin\Client\UpdateClientRequest;
use App\Http\Requests\Admin\Client\UpdateClientSequenceRequest;
use App\Models\ClientInfo;
use App\Traits\UserLogTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class ClientService
{
    use UserLogTrait;

    /**
     * Image storage directories (on the 'public' disk) and their target width.
     */
    private const IMAGE_DIRS = [
        'client_picture' => ['dir' => 'uploads/client/image', 'width' => 300],
        'organization_logo' => ['dir' => 'uploads/client/organization', 'width' => 300],
    ];

    /**
     * Data for the client element admin view.
     *
     * @return array<string, Collection>
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
     * @param  StoreClientRequest  $request  Validated payload
     * @return ClientInfo The created model
     */
    public function store(StoreClientRequest $request): ClientInfo
    {
        $client = new ClientInfo;
        $client->client_name = $request->client_name;
        $client->client_email = $request->client_email;
        $client->client_mobile = $request->client_mobile;
        $client->client_designation = $request->client_designation;
        $client->client_organization = $request->client_organization;
        $client->client_address = $request->client_address;
        $client->organization_website = $request->organization_website;
        $client->client_status = $request->client_status;

        $this->storeClientImages($client, $request);

        $client->save();

        $this->logUserActivity('Client', 'New record created');

        return $client;
    }

    /**
     * Find one record plus the image URLs the edit form reads back.
     *
     * The accessors resolve a stored path to a public URL and fall back to the
     * placeholder, so the form never has to rebuild either URL itself.
     *
     * @return array<string, mixed>|null
     */
    public function findForEdit(string $client_id): ?array
    {
        $client = ClientInfo::where('id', $client_id)->first();

        if ($client === null) {
            return null;
        }

        return $client->toArray() + [
            'client_picture_url' => $client->client_picture_url,
            'organization_logo_url' => $client->client_org_logo_url,
        ];
    }

    /**
     * Update an existing client record (and replace images when given).
     *
     * @param  UpdateClientRequest  $request  Validated payload
     * @return ClientInfo The updated model
     *
     * @throws ModelNotFoundException
     */
    public function update(UpdateClientRequest $request): ClientInfo
    {
        $client = ClientInfo::findOrFail($request->client_id);

        $this->storeClientImages($client, $request);

        $client->fill([
            'client_name' => $request->client_name,
            'client_email' => $request->client_email,
            'client_mobile' => $request->client_mobile,
            'client_designation' => $request->client_designation,
            'client_organization' => $request->client_organization,
            'client_address' => $request->client_address,
            'organization_website' => $request->organization_website,
            // Omitted status keeps the stored value instead of writing null.
            'client_status' => $request->has('client_status')
                ? $request->client_status
                : $client->client_status,
        ]);
        $client->save();

        $this->logUserActivity('Client', 'Existing record updated');

        return $client;
    }

    /**
     * Delete a client record (and all its stored images).
     *
     * @throws ModelNotFoundException
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
     * Handle both client images in one pass.
     *
     * A picked file replaces the stored image; otherwise a removal request
     * clears it; otherwise the stored image is kept, so saving an edit without
     * touching an image cannot wipe it.
     */
    private function storeClientImages(ClientInfo $client, StoreClientRequest|UpdateClientRequest $request): void
    {
        foreach (self::IMAGE_DIRS as $field => $config) {
            if ($request->hasFile($field)) {
                // Convert and store the replacement before dropping the old
                // file, so a failed conversion cannot leave the record without
                // an image.
                $path = $this->storeImage($request->file($field), $config);

                $this->deleteImage($client->{$field});

                $client->{$field} = $path;

                continue;
            }

            if ($request->boolean('remove_'.$field)) {
                $this->deleteImage($client->{$field});

                $client->{$field} = null;
            }
        }
    }

    /**
     * Convert one uploaded image to WebP and store it on the public disk.
     *
     * @param  UploadedFile  $file
     * @param  array{dir: string, width: int}  $config
     */
    private function storeImage($file, array $config): string
    {
        $path = $config['dir'].'/'.Str::uuid().'.webp';

        $image = Image::read($file);
        $image->scale(width: $config['width']);

        Storage::disk('public')->put($path, $image->toWebp(80));

        return $path;
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
