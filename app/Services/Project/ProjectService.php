<?php

namespace App\Services\Project;

use App\Http\Requests\Admin\Project\StoreProjectRequest;
use App\Http\Requests\Admin\Project\UpdateProjectRequest;
use App\Http\Requests\Admin\Project\UpdateProjectSequenceRequest;
use App\Models\ClientInfo;
use App\Models\ProjectInfo;
use App\Models\ServiceInfo;
use App\Traits\UserLogTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class ProjectService
{
    use UserLogTrait;

    /**
     * Image storage directories (on the 'public' disk) and their target width.
     */
    private const IMAGE_DIRS = [
        'profile_image' => ['dir' => 'uploads/project/profile', 'width' => 768],
        'cover_image' => ['dir' => 'uploads/project/cover', 'width' => 840],
    ];

    /**
     * Data for the project element admin view.
     *
     * @return array<string, mixed>
     */
    public function viewData(): array
    {
        return [
            'project_list' => ProjectInfo::sorted()->get(),
            'client_list' => ClientInfo::all(),
            'service_list' => ServiceInfo::sorted()->get(),
        ];
    }

    /**
     * Store a newly created project record.
     *
     * @param  StoreProjectRequest  $request  Validated payload
     * @return ProjectInfo The created model
     */
    public function store(StoreProjectRequest $request): ProjectInfo
    {
        $project = new ProjectInfo;
        $project->project_title = $request->project_title;
        $project->project_details = $request->project_details;
        $project->client_id = $request->client_id;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->service_id = $request->service_id;
        $project->project_location = $request->project_location;
        $project->project_background = $request->project_background;
        $project->project_challenges = $request->project_challenges;
        $project->project_solution = $request->project_solution;
        $project->project_status = $request->project_status;

        $this->storeProjectImages($project, $request);

        $project->save();

        $this->logUserActivity('Project', 'New record created');

        return $project;
    }

    /**
     * Find a single project record by id.
     */
    public function find(string $project_id): ?ProjectInfo
    {
        return ProjectInfo::where('id', $project_id)->first();
    }

    /**
     * Find one record plus the values the edit form reads back.
     *
     * The date inputs are local dates in the application timezone; a raw ISO
     * value would show the previous day whenever the app is ahead of UTC.
     *
     * @return array<string, mixed>|null
     */
    public function findForEdit(string $project_id): ?array
    {
        $project = ProjectInfo::where('id', $project_id)->first();

        if ($project === null) {
            return null;
        }

        return $project->toArray() + [
            'profile_image_url' => $project->project_profile_image_url,
            'cover_image_url' => $project->project_cover_image_url,
            'start_date_input' => $project->start_date?->format('Y-m-d'),
            'end_date_input' => $project->end_date?->format('Y-m-d'),
        ];
    }

    /**
     * Update an existing project record (and replace images when given).
     *
     * @param  UpdateProjectRequest  $request  Validated payload
     * @return ProjectInfo The updated model
     *
     * @throws ModelNotFoundException
     */
    public function update(UpdateProjectRequest $request): ProjectInfo
    {
        $project = ProjectInfo::findOrFail($request->project_id);

        $this->storeProjectImages($project, $request);

        $project->fill([
            'project_title' => $request->project_title,
            'project_details' => $request->project_details,
            'client_id' => $request->client_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'service_id' => $request->service_id,
            'project_location' => $request->project_location,
            'project_background' => $request->project_background,
            'project_challenges' => $request->project_challenges,
            'project_solution' => $request->project_solution,
            // `project_status` is NOT NULL; when the field is omitted keep the stored
            // value instead of writing null (which threw a constraint violation).
            'project_status' => $request->has('project_status')
                ? $request->project_status
                : $project->project_status,
        ]);
        $project->save();

        $this->logUserActivity('Project', 'Existing record updated');

        return $project;
    }

    /**
     * Delete a project record (and all its stored images).
     *
     * @throws ModelNotFoundException
     */
    public function delete(string $project_id): void
    {
        $project = ProjectInfo::findOrFail($project_id);

        foreach (array_keys(self::IMAGE_DIRS) as $field) {
            $this->deleteImage($project->{$field});
        }

        $project->delete();

        $this->logUserActivity('Project', 'Existing record deleted');
    }

    /**
     * Reorder (sequence-update) project records from a drag-sort payload.
     */
    public function updateSequence(UpdateProjectSequenceRequest $request): void
    {
        foreach ($request->input('order', []) as $item) {
            ProjectInfo::where('id', $item['id'])
                ->update(['project_sequence' => $item['sequence']]);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Internals
    |--------------------------------------------------------------------------
    */

    /**
     * Handle both project images in one pass.
     *
     * A picked file replaces the stored image; otherwise a removal request
     * clears it; otherwise the stored image is kept, so saving an edit without
     * touching an image cannot wipe it.
     */
    private function storeProjectImages(ProjectInfo $project, StoreProjectRequest|UpdateProjectRequest $request): void
    {
        foreach (self::IMAGE_DIRS as $field => $config) {
            if ($request->hasFile($field)) {
                // Convert and store the replacement before dropping the old
                // file, so a failed conversion cannot leave the record without
                // an image.
                $path = $this->storeImage($request->file($field), $config);

                $this->deleteImage($project->{$field});

                $project->{$field} = $path;

                continue;
            }

            if ($request->boolean('remove_'.$field)) {
                $this->deleteImage($project->{$field});

                $project->{$field} = null;
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
