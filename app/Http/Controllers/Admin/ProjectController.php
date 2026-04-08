<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use App\Models\ClientInfo;
use App\Models\ProjectInfo;
use App\Models\ServiceInfo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\UserLogTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class ProjectController extends Controller
{
    use UserLogTrait;

    /**
     * Display the listing of the resource
     *
     * @return \Illuminate\View\View
     */
    public function view(): View
    {
        try {
            return view(
                'admin.pages.element.project',
                [
                    'project_list' => ProjectInfo::sorted()->get(),
                    'client_list' => ClientInfo::all(),
                    'service_list' => ServiceInfo::sorted()->get()
                ]
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return view('admin.error.404');
        }
    }

    /**
     * Store a newly created project info in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            // Validation
            $request->validate([
                'project_title'             => 'required|string|max:255',
                'project_details'           => 'nullable|string',
                'profile_image'             => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240', // max size 10MB
                'cover_image'               => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240', // max size 10MB
                'client_id'                 => 'nullable|exists:client_infos,id',
                'start_date'                => 'required|date',
                'end_date'                  => 'nullable|date|after_or_equal:start_date',
                'service_id'                => 'nullable|exists:service_infos,id',
                'project_location'          => 'nullable|string|max:255',
                'project_background'        => 'nullable|string',
                'project_challenges'        => 'nullable|string',
                'project_solution'          => 'nullable|string',
                'project_status'            => 'nullable|boolean',
            ]);

            // Store files in storage
            $profilePath = null;
            $coverPath = null;

            if ($request->hasFile('profile_image')) {
                $file = $request->file('profile_image');
                $filename = Str::uuid() . '.webp';
                $profilePath = 'uploads/project/' . $filename;
                $img = Image::read($file);
                $img->scale(width: 300);
                Storage::disk('public')->put($profilePath, $img->toWebp(80));
            }

            if ($request->hasFile('cover_image')) {
                $file = $request->file('cover_image');
                $filename = Str::uuid() . '.webp';
                $coverPath = 'uploads/project/' . $filename;
                $img = Image::read($file);
                $img->scale(width: 1200);
                Storage::disk('public')->put($coverPath, $img->toWebp(80));
            }

            // Save project info in DB
            $project = new ProjectInfo();
            $project->project_title = $request->project_title;
            $project->project_details = $request->project_details;
            $project->profile_image = $profilePath;
            $project->cover_image = $coverPath;
            $project->client_id = $request->client_id;
            $project->start_date = $request->start_date;
            $project->end_date = $request->end_date;
            $project->service_id = $request->service_id;
            $project->project_location = $request->project_location;
            $project->project_background = $request->project_background;
            $project->project_challenges = $request->project_challenges;
            $project->project_solution = $request->project_solution;
            $project->project_status = $request->project_status;
            $project->save();
            $this->logUserActivity('Project', 'New record created');
            return back()->with('success', 'Project added successfully.');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    /**
     * Get a project info by id
     *
     * @param string $project_id Project id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function edit($project_id): JsonResponse
    {
        try {
            $project = ProjectInfo::where('id', $project_id)->first();
            return response()->json($project);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['error' => 'Something went wrong'], 404);
        }
    }

    /**
     * Update an existing project info in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function update(Request $request): RedirectResponse
    {
        try {
            // Validation
            $request->validate([
                'project_id'                            => 'required|exists:project_infos,id',
                'project_title'                         => 'required|string|max:255',
                'project_details'                       => 'nullable|string',
                'profile_image'                         => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240', // max size 10MB
                'cover_image'                           => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240', // max size 10MB
                'client_id'                             => 'nullable|exists:client_infos,id',
                'start_date'                            => 'required|date',
                'end_date'                              => 'nullable|date|after_or_equal:start_date',
                'service_id'                            => 'nullable|exists:service_infos,id',
                'project_location'                      => 'nullable|string|max:255',
                'project_background'                    => 'nullable|string',
                'project_challenges'                    => 'nullable|string',
                'project_solution'                      => 'nullable|string',
                'project_status'                        => 'nullable|boolean'
            ]);

            // Find the project by ID
            $object = ProjectInfo::findOrFail($request->project_id);

            // Store files in storage
            if ($request->hasFile('profile_image')) {
                if ($object->profile_image && Storage::disk('public')->exists($object->profile_image)) {
                    Storage::disk('public')->delete($object->profile_image);
                }
                $file = $request->file('profile_image');
                $filename = Str::uuid() . '.webp';
                $profilePath = 'uploads/project/' . $filename;
                $img = Image::read($file);
                $img->scale(width: 300);
                Storage::disk('public')->put($profilePath, $img->toWebp(80));
                $object->profile_image = $profilePath;
            }

            if ($request->hasFile('cover_image')) {
                if ($object->cover_image && Storage::disk('public')->exists($object->cover_image)) {
                    Storage::disk('public')->delete($object->cover_image);
                }
                $file = $request->file('cover_image');
                $filename = Str::uuid() . '.webp';
                $coverPath = 'uploads/project/' . $filename;
                $img = Image::read($file);
                $img->scale(width: 1200);
                Storage::disk('public')->put($coverPath, $img->toWebp(80));
                $object->cover_image = $coverPath;
            }

            // Save project info in DB
            $object->fill([
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
                'project_status' => $request->project_status,
            ]);
            $object->save();
            $this->logUserActivity('Project', 'Existing record updated');
            return back()->with('success', 'Project info updated');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    /**
     * Delete an existing project info from storage.
     *
     * @param string $project_id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function delete($project_id): RedirectResponse
    {
        try {
            $object = ProjectInfo::findOrFail($project_id);
            
            // Delete all associated images
            if ($object->profile_image != null && Storage::disk('public')->exists($object->profile_image)) {
                Storage::disk('public')->delete($object->profile_image);
            }
            if ($object->cover_image != null && Storage::disk('public')->exists($object->cover_image)) {
                Storage::disk('public')->delete($object->cover_image);
            }
            
            $object->delete();
            $this->logUserActivity('Project', 'Existing record deleted');
            return back()->with('success', 'Project info deleted');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong']);
        }
    }

    /**
     * Update the sequence of multiple project info records
     *
     * @param Request $request
     * @return JsonResponse
     * @throws \Throwable
     */
    public function update_sequence(Request $request): JsonResponse
    {
        try {
            $order = $request->input('order');
            foreach ($order as $item) {
                ProjectInfo::where('id', $item['id'])->update(['project_sequence' => $item['sequence']]);
            }
            return response()->json(['status' => 'success']);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['status' => 'error']);
        }
    }
}
