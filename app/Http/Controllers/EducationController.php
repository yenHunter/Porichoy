<?php

namespace App\Http\Controllers;

use App\Models\EducationInfo;
use App\Models\ColumnSettings;
use App\Models\Module;
use Illuminate\Http\Request;
use App\Traits\UserLogTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class EducationController extends Controller
{
    use UserLogTrait;

    public function view()
    {
        return view(
            'admin.pages.module.education',
            [
                'education_list'            => EducationInfo::get(),
                'education_settings'        => ColumnSettings::where('module', 'education')->get()
            ]
        );
    }

    public function store(Request $request)
    {
        try {
            // Validation
            $request->validate([
                'degree'                => 'required',
                'institute'             => 'required',
                'start_date'            => 'required',
                'institute_logo'        => 'image|mimes:jpeg,png,jpg,gif,webp|max:10240', // max size 10MB
            ]);

            // Store file in storage
            $path = null;
            if ($request->hasFile('institute_logo')) {
                $file = $request->file('institute_logo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/uploads/education', $filename); // stored in storage/app/public/uploads
                $path = 'uploads/education/' . $filename;
            }

            // Save education info in DB
            $object = new EducationInfo();
            $object->degree = $request->degree;
            $object->subject = $request->subject;
            $object->institute = $request->institute;
            $object->institute_logo = $path;
            $object->institute_address = $request->institute_address;
            $object->start_date = $request->start_date;
            $object->end_date = $request->end_date;
            $object->result = $request->result;
            $object->details = $request->details;
            $object->status = $request->status;
            $object->sequence = EducationInfo::max('sequence') + 1;
            $object->updated_by = Auth::id();
            $object->save();
            $this->log_user_activity(Module::get_id_by_name('education'), 'Created a new Education info');
            return back()->with('success', 'Education info created');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    public function edit($education_id)
    {
        try {
            return response()->json(EducationInfo::where('id', $education_id)->first());
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
                'degree'                => 'required',
                'institute'             => 'required',
                'start_date'            => 'required',
                'institute_logo'        => 'image|mimes:jpeg,png,jpg,gif,webp|max:10240', // max size 10MB
            ]);

            $object = EducationInfo::where('id', $request->education_id)->first();
            // Store file in storage
            $path = $object->institute_logo;
            if ($request->hasFile('institute_logo')) {
                if (Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                }
                $file = $request->file('institute_logo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/uploads/education', $filename); // stored in storage/app/public/uploads
                $path = 'uploads/education/' . $filename;
            }

            // Save education info in DB
            $object->degree = $request->degree;
            $object->subject = $request->subject;
            $object->institute = $request->institute;
            $object->institute_logo = $path;
            $object->institute_address = $request->institute_address;
            $object->start_date = $request->start_date;
            $object->end_date = $request->end_date;
            $object->result = $request->result;
            $object->details = $request->details;
            $object->status = $request->status;
            $object->updated_by = Auth::id();
            $object->save();
            $this->log_user_activity(Module::get_id_by_name('education'), 'Updated Education info');
            return back()->with('success', 'Education info updated');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    public function delete($education_id)
    {
        try {
            $object = EducationInfo::where('id', $education_id)->first();
            if (!empty($object->institute_logo) && Storage::disk('public')->exists($object->institute_logo)) {
                Storage::disk('public')->delete($object->institute_logo);
            }
            $object->delete();
            $this->log_user_activity(Module::get_id_by_name('education'), 'Removed Education info');
            return back()->with('success', 'Education info removed');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong']);
        }
    }

    public function settings_update(Request $request)
    {
        $education_settings = ColumnSettings::where('module', 'education')->get();
        try {
            foreach ($education_settings as $value) {
                if ($request->has($value->column_name)) {
                    $value->visibility = 1;
                    $value->save();
                } else {
                    $value->visibility = 0;
                    $value->save();
                }
            }
            $this->log_user_activity(Module::get_id_by_name('education'), 'Updated Education settings');
            return back()->with('success', 'Education settings updated');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong']);
        }
    }
}
