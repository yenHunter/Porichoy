<?php

namespace App\Http\Controllers;

use App\Models\SelectType;
use Illuminate\Http\Request;
use App\Traits\UserLogTrait;
use App\Models\ColumnSettings;
use App\Models\ExperienceInfo;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ExperienceController extends Controller
{
    use UserLogTrait;

    public function view()
    {
        return view(
            'admin.pages.module.experience',
            [
                'experience_list'           => ExperienceInfo::orderBy('sequence', 'asc')->get(),
                'experience_settings'       => ColumnSettings::where('module', 'experience')->get(),
                'employment_type'           => SelectType::where('use_for', 'employment_type')->get(),
                'location_type'             => SelectType::where('use_for', 'location_type')->get()
            ]
        );
    }

    public function store(Request $request)
    {
        try {
            // Validation
            $request->validate([
                'position'                      => 'required',
                'employment_type'               => 'required',
                'organization'                  => 'required',
                'start_date'                    => 'required',
                'organization_logo'             => 'image|mimes:jpeg,png,jpg,gif,webp|max:10240', // max size 10MB
            ]);

            // Store file in storage
            $path = null;
            if ($request->hasFile('organization_logo')) {
                $file = $request->file('organization_logo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/uploads/experience', $filename); // stored in storage/app/public/uploads
                $path = 'uploads/experience/' . $filename;
            }

            // Save experience info in DB
            $object = new ExperienceInfo();
            $object->position = $request->position;
            $object->employment_type = $request->employment_type;
            $object->department = $request->department;
            $object->organization = $request->organization;
            $object->organization_logo = $path;
            $object->organization_address = $request->organization_address;
            $object->start_date = $request->start_date;
            $object->end_date = $request->end_date;
            $object->location_type = $request->location_type;
            $object->details = $request->details;
            $object->status = $request->status;
            $object->sequence = ExperienceInfo::max('sequence') + 1;
            $object->updated_by = Auth::id();
            $object->save();
            $this->log_user_activity('Experience', 'Created a new Experience info');
            return back()->with('success', 'Experience info created');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    public function edit($experience_id)
    {
        try {
            return response()->json(ExperienceInfo::where('id', $experience_id)->first());
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->withErrors(['error' => 'Something went wrong']);
        }
    }

    public function update(Request $request)
    {
        try {
            // Validation
            $request->validate([
                'position'                      => 'required',
                'employment_type'               => 'required',
                'organization'                  => 'required',
                'start_date'                    => 'required',
                'organization_logo'             => 'image|mimes:jpeg,png,jpg,gif,webp|max:10240', // max size 10MB
            ]);

            $object = ExperienceInfo::where('id', $request->experience_id)->first();
            // Store file in storage
            $path = $object->organization_logo;
            if ($request->hasFile('organization_logo')) {
                if (Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                }
                $file = $request->file('organization_logo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/uploads/experience', $filename); // stored in storage/app/public/uploads
                $path = 'uploads/experience/' . $filename;
            }

            // Save experience info in DB
            $object->position = $request->position;
            $object->employment_type = $request->employment_type;
            $object->department = $request->department;
            $object->organization = $request->organization;
            $object->organization_logo = $path;
            $object->organization_address = $request->organization_address;
            $object->start_date = $request->start_date;
            $object->end_date = $request->end_date;
            $object->location_type = $request->location_type;
            $object->details = $request->details;
            $object->status = $request->status;
            $object->updated_by = Auth::id();
            $object->save();
            $this->log_user_activity('Experience', 'Updated Experience info');
            return back()->with('success', 'Experience info updated');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    public function delete($experience_id)
    {
        try {
            $object = ExperienceInfo::where('id', $experience_id)->first();
            if (!empty($object->organization_logo) && Storage::disk('public')->exists($object->organization_logo)) {
                Storage::disk('public')->delete($object->organization_logo);
            }
            $object->delete();
            $this->log_user_activity('Experience', 'Removed Experience info');
            return back()->with('success', 'Experience info removed');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->withErrors(['error' => 'Something went wrong']);
        }
    }

    public function update_sequence(Request $request)
    {
        try {
            $order = $request->input('order');
            foreach ($order as $item) {
                ExperienceInfo::where('id', $item['id'])->update(['sequence' => $item['sequence']]);
            }
            return response()->json(['status' => 'success']);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['status' => 'error']);
        }
    }

    public function settings_update(Request $request)
    {
        $experience_settings = ColumnSettings::where('module', 'experience')->get();
        try {
            foreach ($experience_settings as $value) {
                if ($request->has($value->column_name)) {
                    $value->visibility = 1;
                    $value->save();
                } else {
                    $value->visibility = 0;
                    $value->save();
                }
            }
            $this->log_user_activity('Experience', 'Updated Experience settings');
            return back()->with('success', 'Experience settings updated');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->withErrors(['error' => 'Something went wrong']);
        }
    }
}
