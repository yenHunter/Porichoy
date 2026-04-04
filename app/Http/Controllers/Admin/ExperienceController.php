<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use App\Models\SelectType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\UserLogTrait;
use App\Models\ColumnSettings;
use App\Models\ExperienceInfo;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use App\Http\Controllers\Controller;

class ExperienceController extends Controller
{
    use UserLogTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function view(): View
    {
        try {
            return view(
                'admin.pages.module.experience',
                [
                    'experience_list'           => ExperienceInfo::sorted()->get(),
                    'experience_settings'       => ColumnSettings::where('module', 'experience')->get(),
                    'employment_type'           => SelectType::where('use_for', 'employment_type')->get(),
                    'location_type'             => SelectType::where('use_for', 'location_type')->get()
                ]
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return view('admin.error.404');
        }
    }

    /**
     * Store a newly created experience info in storage.
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
                'employment_position'                       => 'required|string|max:255',
                'employment_type'                           => 'required|integer|exists:select_types,id',
                'employment_department'                     => 'nullable|string|max:255',
                'employment_organization'                   => 'required|string|max:255',
                'organization_logo'                         => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240', // max size 10MB
                'start_date'                                => 'required|date',
                'end_date'                                  => 'nullable|date|after:start_date',
                'location_type'                             => 'nullable|integer|exists:select_types,id',
                'employment_details'                        => 'nullable|string',
                'employment_status'                         => 'nullable|boolean',
            ]);

            // Store file in storage
            $path = null;
            if ($request->hasFile('organization_logo')) {
                $file = $request->file('organization_logo');
                $filename = Str::uuid() . '.webp';
                $path = 'uploads/experience/' . $filename;
                $img = Image::read($file);
                $img->scale(width: 300);
                Storage::disk('public')->put($path, $img->toWebp(80));
            }

            // Save experience info in DB
            $object = new ExperienceInfo();
            $object->employment_position = $request->employment_position;
            $object->employment_type = $request->employment_type;
            $object->employment_department = $request->employment_department;
            $object->employment_organization = $request->employment_organization;
            $object->organization_logo = $path;
            $object->organization_address = $request->organization_address;
            $object->start_date = $request->start_date;
            $object->end_date = $request->end_date;
            $object->location_type = $request->location_type;
            $object->employment_details = $request->employment_details;
            $object->employment_status = $request->employment_status;
            $object->save();
            $this->logUserActivity('ExperienceInfo', 'A new record created');
            return back()->with('success', 'Experience info created');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    /**
     * Get an experience info by id.
     *
     * @param int $experience_id Experience id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function edit($experience_id): JsonResponse
    {
        try {
            return response()->json(ExperienceInfo::where('id', $experience_id)->first());
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['error' => 'Something went wrong'], 404);
        }
    }

    /**
     * Update an existing experience info in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function update(Request $request): RedirectResponse
    {
        try {
            // Validation
            $request->validate([
                'experience_id'                             => 'required|exists:experience_infos,id',
                'employment_position'                       => 'required|string|max:255',
                'employment_type'                           => 'required|integer|exists:select_types,id',
                'employment_department'                     => 'nullable|string|max:255',
                'employment_organization'                   => 'required|string|max:255',
                'organization_logo'                         => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240', // max size 10MB
                'start_date'                                => 'required|date',
                'end_date'                                  => 'nullable|date|after:start_date',
                'location_type'                             => 'nullable|integer|exists:select_types,id',
                'employment_details'                        => 'nullable|string',
                'employment_status'                         => 'nullable|boolean',
            ]);

            $experience = ExperienceInfo::findOrFail($request->experience_id);
            // Store file in storage
            if ($request->hasFile('organization_logo')) {
                // Check if old file exists and is not null
                if ($experience->organization_logo && Storage::disk('public')->exists($experience->organization_logo)) {
                    Storage::disk('public')->delete($experience->organization_logo);
                }
                $file = $request->file('organization_logo');
                $filename = Str::uuid() . '.webp';
                $path = 'uploads/experience/' . $filename;
                $img = Image::read($file);
                $img->scale(width: 300);
                Storage::disk('public')->put($path, $img->toWebp(80));
                $experience->organization_logo = $path;
            }

            // Save experience info in DB
            $experience->fill([
                'employment_position'           => $request->employment_position,
                'employment_type'               => $request->employment_type,
                'employment_department'         => $request->employment_department,
                'employment_organization'       => $request->employment_organization,
                'organization_address'          => $request->organization_address,
                'start_date'                    => $request->start_date,
                'end_date'                      => $request->end_date,
                'location_type'                 => $request->location_type,
                'employment_details'            => $request->employment_details,
                'employment_status'             => $request->employment_status,
            ]);
            $experience->save();

            $this->logUserActivity('ExperienceInfo', 'An existing record updated');
            return back()->with('success', 'Experience info updated');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    /**
     * Remove an existing experience info from storage.
     *
     * @param int $experience_id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function delete($experience_id): RedirectResponse
    {
        try {
            $object = ExperienceInfo::where('id', $experience_id)->first();
            if ($object->organization_logo != null && Storage::disk('public')->exists($object->organization_logo)) {
                Storage::disk('public')->delete($object->organization_logo);
            }
            $object->delete();
            $this->logUserActivity('Experience', 'An existing record removed');
            return back()->with('success', 'Experience info removed');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong']);
        }
    }

    /**
     * Update the employment sequence for multiple experience info records
     *
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function update_sequence(Request $request): JsonResponse
    {
        try {
            $order = $request->input('order');
            foreach ($order as $item) {
                ExperienceInfo::where('id', $item['id'])->update(['employment_sequence' => $item['sequence']]);
            }
            return response()->json(['status' => 'success']);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['status' => 'error']);
        }
    }

    // public function settings_update(Request $request)
    // {
    //     $experience_settings = ColumnSettings::where('module', 'experience')->get();
    //     try {
    //         foreach ($experience_settings as $value) {
    //             if ($request->has($value->column_name)) {
    //                 $value->visibility = 1;
    //                 $value->save();
    //             } else {
    //                 $value->visibility = 0;
    //                 $value->save();
    //             }
    //         }
    //         $this->logUserActivity('Experience', 'Updated Experience settings');
    //         return back()->with('success', 'Experience settings updated');
    //     } catch (\Exception $exception) {
    //         Log::error($exception->getMessage());
    //         return back()->withErrors(['error' => 'Something went wrong']);
    //     }
    // }
}
