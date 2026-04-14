<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use App\Models\SelectType;
use App\Models\ProfileInfo;
use Illuminate\Http\Request;
use App\Traits\UserLogTrait;
use App\Models\ColumnSettings;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
class SettingsController extends Controller
{
    use UserLogTrait;

    /**
     * Display the portfolio profile management view with categorized data
     *
     * @return \Illuminate\View\View
     */
    public function profile_management(): View
    {
        try {
            $profileData = [
                'basic' => ProfileInfo::basicInfo()->active()->get()->toArray(),
                'personal' => ProfileInfo::personalInfo()->active()->get()->toArray(),
                'address' => ProfileInfo::addressInfo()->active()->get()->toArray(),
                'social' => ProfileInfo::socialInfo()->active()->get()->toArray(),
            ];

            return view('admin.pages.management.profile', ['profileData' => $profileData]);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return view('admin.error.404');
        }
    }

    /**
     * Update portfolio profile information
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function profile_update(Request $request): RedirectResponse
    {
        try {
            // Update basic info
            if ($request->has('basic')) {
                foreach ($request->input('basic', []) as $id => $value) {
                    ProfileInfo::findOrFail($id)->update(['column_value' => $value]);
                }
            }

            // Update personal info
            if ($request->has('personal')) {
                foreach ($request->input('personal', []) as $id => $value) {
                    ProfileInfo::findOrFail($id)->update(['column_value' => $value]);
                }
            }

            // Update address info
            if ($request->has('address')) {
                foreach ($request->input('address', []) as $id => $value) {
                    ProfileInfo::findOrFail($id)->update(['column_value' => $value]);
                }
            }

            // Update social info
            if ($request->has('social')) {
                foreach ($request->input('social', []) as $id => $value) {
                    ProfileInfo::findOrFail($id)->update(['column_value' => $value]);
                }
            }

            $this->logUserActivity('ProfileInfo', 'Portfolio profile information updated');
            return back()->with('success', 'Portfolio profile information updated successfully.');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong while updating profile information.'])->withInput();
        }
    }

    // Functions for Research Source start
    public function viewResearchSource()
    {
        return view(
            'admin.pages.settings.research_source',
            [
                'research_source_list'          => SelectType::where('use_for', 'research_source')->orderBy('id', 'asc')->get(),
                'research_source_settings'      => ColumnSettings::where('module', 'research_source')->get(),
            ]
        );
    }

    public function storeResearchSource(Request $request)
    {
        try {
            // Validation
            $request->validate([
                'title'                     => 'required',
                'thumbnail'                 => 'image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            ]);

            $path = $request->thumbnail;
            if ($request->hasFile('thumbnail')) {
                $file = $request->file('thumbnail');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/uploads/settings/research-source', $filename);
                $path = 'uploads/settings/research-source/' . $filename;
            }

            // Save experience info in DB
            $object = new SelectType();
            $object->use_for = 'research_source';
            $object->value = $request->title;
            $object->details = $path;
            $object->status = $request->status;
            $object->save();
            $this->logUserActivity('Research Source', 'Created a new Research Source');
            return back()->with('success', 'Research Source created');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    public function editResearchSource($research_source_id)
    {
        try {
            return response()->json(SelectType::where('id', $research_source_id)->first());
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->withErrors(['error' => 'Something went wrong']);
        }
    }

    public function updateResearchSource(Request $request)
    {
        try {
            // Validation
            $request->validate([
                'title'                     => 'required',
                'thumbnail'                 => 'image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            ]);

            $object = SelectType::where('id', $request->research_source_id)->first();
            $path = $object->details;
            if ($request->hasFile('thumbnail')) {
                if (Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                }
                $file = $request->file('thumbnail');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/uploads/settings/research-source', $filename);
                $path = 'uploads/settings/research-source/' . $filename;
            }

            // Save experience info in DB
            $object->value = $request->title;
            $object->details = $path;
            $object->status = $request->status;
            $object->save();
            $this->logUserActivity('Research Source', 'Updated Research Source');
            return back()->with('success', 'Research Source updated');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    public function deleteResearchSource($research_source_id)
    {
        try {
            $object = SelectType::where('id', $research_source_id)->first();
            $object->delete();
            if (!empty($object->details) && Storage::disk('public')->exists($object->details)) {
                Storage::disk('public')->delete($object->details);
            }
            $this->logUserActivity('Research Source', 'Removed Research Source');
            return back()->with('success', 'Research Source removed');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->withErrors(['error' => 'Something went wrong']);
        }
    }

    public function viewLocationType()
    {
        return view(
            'admin.pages.settings.location_type',
            [
                'location_type_list'          => SelectType::where('use_for', 'location_type')->orderBy('id', 'asc')->get(),
            ]
        );
    }

    public function storeLocationType(Request $request)
    {
        try {
            // Validation
            $request->validate([
                'title'                     => 'required|string|max:255',
                'details'                   => 'nullable|string|max:255',
            ]);

            // Save experience info in DB
            $object = new SelectType();
            $object->use_for = 'location_type';
            $object->value = $request->title;
            $object->details = $request->details;
            $object->status = $request->status;
            $object->save();
            $this->logUserActivity('Location Type', 'Created a new Location Type');
            return back()->with('success', 'Location Type created');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    public function editLocationType($location_type_id)
    {
        try {
            return response()->json(SelectType::where('id', $location_type_id)->first());
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->withErrors(['error' => 'Something went wrong']);
        }
    }

    public function updateLocationType(Request $request)
    {
        try {
            // Validation
            $request->validate([
                'title'                     => 'required|string|max:255',
                'details'                   => 'nullable|string|max:255',
            ]);

            $object = SelectType::where('id', $request->location_type_id)->first();

            // Save experience info in DB
            $object->value = $request->title;
            $object->details = $request->details;
            $object->status = $request->status;
            $object->save();
            $this->logUserActivity('Location Type', 'Updated Location Type');
            return back()->with('success', 'Location Type updated');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    public function deleteLocationType($location_type_id)
    {
        try {
            $object = SelectType::where('id', $location_type_id)->first();
            $object->delete();
            $this->logUserActivity('Location Type', 'Removed Location Type');
            return back()->with('success', 'Location Type removed');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->withErrors(['error' => 'Something went wrong']);
        }
    }
    public function viewEmploymentType()
    {
        return view(
            'admin.pages.settings.employment_type',
            [
                'employment_type_list'          => SelectType::where('use_for', 'employment_type')->orderBy('id', 'asc')->get(),
            ]
        );
    }

    public function storeEmploymentType(Request $request)
    {
        try {
            // Validation
            $request->validate([
                'title'                     => 'required|string|max:255',
                'details'                   => 'nullable|string|max:255',
            ]);

            // Save experience info in DB
            $object = new SelectType();
            $object->use_for = 'employment_type';
            $object->value = $request->title;
            $object->details = $request->details;
            $object->status = $request->status;
            $object->save();
            $this->logUserActivity('Employment Type', 'Created a new Employment Type');
            return back()->with('success', 'Employment Type created');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    public function editEmploymentType($employment_type_id)
    {
        try {
            return response()->json(SelectType::where('id', $employment_type_id)->first());
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->withErrors(['error' => 'Something went wrong']);
        }
    }

    public function updateEmploymentType(Request $request)
    {
        try {
            // Validation
            $request->validate([
                'title'                     => 'required|string|max:255',
                'details'                   => 'nullable|string|max:255',
            ]);

            $object = SelectType::where('id', $request->employment_type_id)->first();

            // Save experience info in DB
            $object->value = $request->title;
            $object->details = $request->details;
            $object->status = $request->status;
            $object->save();
            $this->logUserActivity('Employment Type', 'Updated Employment Type');
            return back()->with('success', 'Employment Type updated');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    public function deleteEmploymentType($employment_type_id)
    {
        try {
            $object = SelectType::where('id', $employment_type_id)->first();
            $object->delete();
            $this->logUserActivity('Employment Type', 'Removed Employment Type');
            return back()->with('success', 'Employment Type removed');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->withErrors(['error' => 'Something went wrong']);
        }
    }
}
