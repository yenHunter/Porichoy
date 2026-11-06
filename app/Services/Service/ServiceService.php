<?php

namespace App\Services\Service;

use App\Http\Requests\Admin\Service\StoreServiceRequest;
use App\Http\Requests\Admin\Service\UpdateServiceRequest;
use App\Http\Requests\Admin\Service\UpdateServiceSequenceRequest;
use App\Models\ServiceInfo;
use App\Models\SkillInfo;
use App\Traits\UserLogTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class ServiceService
{
    use UserLogTrait;

    /**
     * Image storage directories (on the 'public' disk) and geometry.
     */
    private const IMAGE_DIRS = [
        'service_icon' => ['dir' => 'uploads/service/icon',    'width' => 300],
        'profile_image' => ['dir' => 'uploads/service/profile', 'width' => 300],
        'cover_image' => ['dir' => 'uploads/service/cover',   'width' => 1200],
    ];

    /**
     * Data for the service element admin view.
     *
     * @return array<string, Collection>
     */
    public function viewData(): array
    {
        return [
            'service_list' => ServiceInfo::sorted()->get(),
            'skill_list' => SkillInfo::sorted()->get(),
        ];
    }

    /**
     * Store a newly created service record.
     *
     * @param  StoreServiceRequest  $request  Validated payload
     * @return ServiceInfo The created model
     */
    public function store(StoreServiceRequest $request): ServiceInfo
    {
        $service = new ServiceInfo;
        $service->service_title = $request->service_title;
        $service->service_subtitle = $request->service_subtitle;
        $service->service_details = $request->service_details;
        $service->service_status = $request->service_status;

        $this->storeServiceImages($service, $request);

        $service->save();

        // Skills live in the service_skill_infos pivot table.
        $service->skills()->sync($request->service_skills ?? []);

        $this->logUserActivity('Service', 'New record created');

        return $service;
    }

    /**
     * Find a single service record by id (service_skills returned decoded).
     */
    public function find(string $service_id): ?ServiceInfo
    {
        $service = ServiceInfo::where('id', $service_id)->first();

        if ($service) {
            // The edit form expects the related skill ids.
            $service->service_skills = $service->skills()->pluck('skill_infos.id')->all();
        }

        return $service;
    }

    /**
     * Update an existing service record (replacing images when given).
     *
     * @param  UpdateServiceRequest  $request  Validated payload
     * @return ServiceInfo The updated model
     *
     * @throws ModelNotFoundException
     */
    public function update(UpdateServiceRequest $request): ServiceInfo
    {
        $service = ServiceInfo::findOrFail($request->service_id);

        $this->storeServiceImages($service, $request);

        $service->fill([
            'service_title' => $request->service_title,
            'service_subtitle' => $request->service_subtitle,
            'service_details' => $request->service_details,
            // Omitted status keeps the stored value instead of writing null.
            'service_status' => $request->has('service_status')
                ? $request->service_status
                : $service->service_status,
        ]);
        $service->save();

        // Skills live in the service_skill_infos pivot table.
        $service->skills()->sync($request->service_skills ?? []);

        $this->logUserActivity('Service', 'Existing record updated');

        return $service;
    }

    /**
     * Delete a service record (and all its stored images).
     *
     * @throws ModelNotFoundException
     */
    public function delete(string $service_id): void
    {
        $service = ServiceInfo::findOrFail($service_id);

        foreach (array_keys(self::IMAGE_DIRS) as $field) {
            $this->deleteImage($service->{$field});
            $service->{$field} = null;
        }

        $service->delete();

        $this->logUserActivity('Service', 'Existing record deleted');
    }

    /**
     * Reorder (sequence-update) service records from a drag-sort payload.
     */
    public function updateSequence(UpdateServiceSequenceRequest $request): void
    {
        foreach ($request->input('order', []) as $item) {
            ServiceInfo::where('id', $item['id'])
                ->update(['service_sequence' => $item['sequence']]);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Internals
    |--------------------------------------------------------------------------
    */

    /**
     * Handle all three possible service images in one pass (store new,
     * delete old, and set the model attributes).
     */
    private function storeServiceImages(ServiceInfo $service, StoreServiceRequest|UpdateServiceRequest $request): void
    {
        foreach (self::IMAGE_DIRS as $field => $config) {
            if (! $request->hasFile($field)) {
                continue;
            }

            $this->deleteImage($service->{$field});

            $filename = Str::uuid().'.webp';
            $path = $config['dir'].'/'.$filename;

            $image = Image::read($request->file($field));
            $image->scale(width: $config['width']);

            Storage::disk('public')->put($path, $image->toWebp(80));

            $service->{$field} = $path;
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
