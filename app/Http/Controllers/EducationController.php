<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\UserLogTrait;
use App\Models\EducationInfo;
use App\Models\ColumnSettings;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class EducationController extends Controller
{
    use UserLogTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function view(): View
    {
        return view(
            'admin.pages.module.education',
            [
                'education_list'            => EducationInfo::sorted()->get(),
                'education_settings'        => ColumnSettings::where('module', 'education')->get()
            ]
        );
    }

    /**
     * Store a newly created education info in storage.
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
                'degree'                => 'required|string|max:255',
                'subject'               => 'nullable|string|max:255',
                'institute'             => 'required|string|max:255',
                'institute_logo'        => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
                'institute_address'     => 'nullable|string|max:255',
                'start_date'            => 'required|date',
                'end_date'              => 'nullable|date|after_or_equal:start_date',
                'result'                => 'nullable|string|max:255',
                'details'               => 'nullable|string',
                'status'                => 'required|boolean',
            ]);

            // Store file in storage
            $path = null;
            if ($request->hasFile('institute_logo')) {
                $file = $request->file('institute_logo');
                $filename = Str::uuid() . '.webp';
                $path = 'uploads/education/' . $filename;
                $img = Image::read($file);
                $img->scale(width: 300);
                Storage::disk('public')->put($path, $img->toWebp(80));
            }

            // Save education info in DB
            $education = new EducationInfo();
            $education->degree = $request->degree;
            $education->subject = $request->subject;
            $education->institute = $request->institute;
            $education->institute_logo = $path;
            $education->institute_address = $request->institute_address;
            $education->start_date = $request->start_date;
            $education->end_date = $request->end_date;
            $education->result = $request->result;
            $education->details = $request->details;
            $education->status = $request->status;
            $education->save();
            $this->logUserActivity('Education', 'Created a new Education info');
            return back()->with('success', 'Education info created');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    /**
     * Get an education info by id
     *
     * @param int $education_id Education id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function edit($education_id): JsonResponse
    {
        try {
            return response()->json(EducationInfo::where('id', $education_id)->first(), 200);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['error' => 'Something went wrong'], 404);
        }
    }

    /**
     * Update an existing education info in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function update(Request $request): RedirectResponse
    {
        try {
            // Validation
            $validated = $request->validate([
                'education_id'          => 'required|integer|exists:education_infos,id',
                'degree'                => 'required|string|max:255',
                'subject'               => 'nullable|string|max:255',
                'institute'             => 'required|string|max:255',
                'institute_logo'        => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
                'institute_address'     => 'nullable|string|max:255',
                'start_date'            => 'required|date',
                'end_date'              => 'nullable|date|after_or_equal:start_date',
                'result'                => 'nullable|string|max:255',
                'details'               => 'nullable|string',
                'status'                => 'required|boolean',
            ]);

            $education = EducationInfo::findOrFail($request->education_id);
            // Store file in storage
            if ($request->hasFile('institute_logo')) {
                // Check if old file exists and is not null
                if ($education->institute_logo && Storage::disk('public')->exists($education->institute_logo)) {
                    Storage::disk('public')->delete($education->institute_logo);
                }
                $file = $request->file('institute_logo');
                $filename = Str::uuid() . '.webp';
                $path = 'uploads/education/' . $filename;
                $img = Image::read($file);
                $img->scale(width: 300);
                Storage::disk('public')->put($path, $img->toWebp(80));
                $education->institute_logo = $path;
            }

            // Save education info in DB
            $education->fill([
                'degree'                => $request->degree,
                'subject'               => $request->subject,
                'institute'             => $request->institute,
                'institute_address'     => $request->institute_address,
                'start_date'            => $request->start_date,
                'end_date'              => $request->end_date,
                'result'                => $request->result,
                'details'               => $request->details,
                'status'                => $request->status,
            ]);
            $education->save();
            $this->logUserActivity('Education', 'Updated Education info');
            return back()->with('success', 'Education info updated');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    /**
     * Remove an existing education info from storage.
     *
     * @param int $education_id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function delete($education_id): RedirectResponse
    {
        try {
            $object = EducationInfo::where('id', $education_id)->first();
            if ($object->institute_logo != null && Storage::disk('public')->exists($object->institute_logo)) {
                Storage::disk('public')->delete($object->institute_logo);
            }
            $object->delete();
            $this->log_user_activity('Education', 'Removed Education info');
            return back()->with('success', 'Education info removed');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong']);
        }
    }

    /**
     * Update education sequence.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function update_sequence(Request $request): JsonResponse
    {
        try {
            $order = $request->input('order');
            foreach ($order as $item) {
                EducationInfo::where('id', $item['id'])->update(['sequence' => $item['sequence']]);
            }
            return response()->json(['status' => 'success']);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['status' => 'error']);
        }
    }

    /**
     * Update education settings visibility.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function settings_update(Request $request): RedirectResponse
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
            $this->log_user_activity('Education', 'Updated Education settings');
            return back()->with('success', 'Education settings updated');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong']);
        }
    }
}
