<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use App\Models\SkillInfo;
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

class ServiceController extends Controller
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
                'admin.pages.element.service',
                [
                    'service_list' => ServiceInfo::sorted()->get(),
                    'skill_list' => SkillInfo::sorted()->get()
                ]
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return view('admin.error.404');
        }
    }

    /**
     * Store a newly created service info in storage.
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
                'service_title'             => 'required|string|max:255',
                'service_subtitle'          => 'nullable|string|max:255',
                'service_icon'              => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240', // max size 10MB
                'profile_image'             => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240', // max size 10MB
                'cover_image'               => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240', // max size 10MB
                'service_details'           => 'nullable|string',
                'service_skills'            => 'nullable|array',
                'service_status'            => 'nullable|boolean',
            ]);

            // Store files in storage
            $iconPath = null;
            $profilePath = null;
            $coverPath = null;

            if ($request->hasFile('service_icon')) {
                $file = $request->file('service_icon');
                $filename = Str::uuid() . '.webp';
                $iconPath = 'uploads/service/' . $filename;
                $img = Image::read($file);
                $img->scale(width: 300);
                Storage::disk('public')->put($iconPath, $img->toWebp(80));
            }

            if ($request->hasFile('profile_image')) {
                $file = $request->file('profile_image');
                $filename = Str::uuid() . '.webp';
                $profilePath = 'uploads/service/' . $filename;
                $img = Image::read($file);
                $img->scale(width: 300);
                Storage::disk('public')->put($profilePath, $img->toWebp(80));
            }

            if ($request->hasFile('cover_image')) {
                $file = $request->file('cover_image');
                $filename = Str::uuid() . '.webp';
                $coverPath = 'uploads/service/' . $filename;
                $img = Image::read($file);
                $img->scale(width: 1200);
                Storage::disk('public')->put($coverPath, $img->toWebp(80));
            }

            // Save service info in DB
            $service = new ServiceInfo();
            $service->service_title = $request->service_title;
            $service->service_subtitle = $request->service_subtitle;
            $service->service_icon = $iconPath;
            $service->profile_image = $profilePath;
            $service->cover_image = $coverPath;
            $service->service_details = $request->service_details;
            $service->service_skills = $request->service_skills ? json_encode($request->service_skills) : null;
            $service->service_status = $request->service_status;
            $service->save();
            $this->logUserActivity('Service', 'New record created');
            return back()->with('success', 'Service added successfully.');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    /**
     * Get a service info by id
     *
     * @param int $service_id Service id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function edit($service_id): JsonResponse
    {
        try {
            $service = ServiceInfo::where('id', $service_id)->first();
            if ($service && $service->service_skills) {
                $service->service_skills = json_decode($service->service_skills, true);
            }
            return response()->json($service);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['error' => 'Something went wrong'], 404);
        }
    }

    /**
     * Update an existing service info in storage.
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
                'service_id'                            => 'required|exists:service_infos,id',
                'service_title'                         => 'required|string|max:255',
                'service_subtitle'                      => 'nullable|string|max:255',
                'service_icon'                          => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240', // max size 10MB
                'profile_image'                         => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240', // max size 10MB
                'cover_image'                           => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240', // max size 10MB
                'service_details'                       => 'nullable|string',
                'service_skills'                        => 'nullable|array',
                'service_status'                        => 'nullable|boolean'
            ]);

            // Find the service by ID
            $object = ServiceInfo::findOrFail($request->service_id);

            // Store files in storage
            if ($request->hasFile('service_icon')) {
                if ($object->service_icon && Storage::disk('public')->exists($object->service_icon)) {
                    Storage::disk('public')->delete($object->service_icon);
                }
                $file = $request->file('service_icon');
                $filename = Str::uuid() . '.webp';
                $iconPath = 'uploads/service/' . $filename;
                $img = Image::read($file);
                $img->scale(width: 300);
                Storage::disk('public')->put($iconPath, $img->toWebp(80));
                $object->service_icon = $iconPath;
            }

            if ($request->hasFile('profile_image')) {
                if ($object->profile_image && Storage::disk('public')->exists($object->profile_image)) {
                    Storage::disk('public')->delete($object->profile_image);
                }
                $file = $request->file('profile_image');
                $filename = Str::uuid() . '.webp';
                $profilePath = 'uploads/service/' . $filename;
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
                $coverPath = 'uploads/service/' . $filename;
                $img = Image::read($file);
                $img->scale(width: 1200);
                Storage::disk('public')->put($coverPath, $img->toWebp(80));
                $object->cover_image = $coverPath;
            }

            // Save service info in DB
            $object->fill([
                'service_title' => $request->service_title,
                'service_subtitle' => $request->service_subtitle,
                'service_details' => $request->service_details,
                'service_skills' => $request->service_skills ? json_encode($request->service_skills) : null,
                'service_status' => $request->service_status,
            ]);
            $object->save();
            $this->logUserActivity('Service', 'Existing record updated');
            return back()->with('success', 'Service info updated');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    /**
     * Delete an existing service info from storage.
     *
     * @param int $service_id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function delete($service_id): RedirectResponse
    {
        try {
            $object = ServiceInfo::findOrFail($service_id);
            
            // Delete all associated images
            if ($object->service_icon != null && Storage::disk('public')->exists($object->service_icon)) {
                Storage::disk('public')->delete($object->service_icon);
            }
            if ($object->profile_image != null && Storage::disk('public')->exists($object->profile_image)) {
                Storage::disk('public')->delete($object->profile_image);
            }
            if ($object->cover_image != null && Storage::disk('public')->exists($object->cover_image)) {
                Storage::disk('public')->delete($object->cover_image);
            }
            
            $object->delete();
            $this->logUserActivity('Service', 'Existing record deleted');
            return back()->with('success', 'Service info deleted');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong']);
        }
    }

    /**
     * Update the sequence of multiple service info records
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
                ServiceInfo::where('id', $item['id'])->update(['service_sequence' => $item['sequence']]);
            }
            return response()->json(['status' => 'success']);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['status' => 'error']);
        }
    }
}
