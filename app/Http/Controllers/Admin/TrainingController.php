<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use App\Models\SelectType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\UserLogTrait;
use App\Models\TrainingInfo;
use App\Models\ColumnSettings;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class TrainingController extends Controller
{
    use UserLogTrait;

    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\View\View
     */
    public function view(): View
    {
        try {
            return view(
                'admin.pages.module.training',
                [
                    'training_list'           => TrainingInfo::with('category')->whereRelation('category', 'use_for', 'training_category')->sorted()->get(),
                    'training_settings'       => ColumnSettings::where('module', 'training')->get(),
                    'training_category'       => SelectType::where('use_for', 'training_category')->get()
                ]
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return view('admin.error.404');
        }
    }

    /**
     * Store a newly created resource in storage.
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
                'training_title'                     => 'required|string|max:255',
                'training_category'                  => 'required|integer|exists:select_types,id',
                'training_institute'                 => 'required|string|max:255',
                'start_date'                         => 'nullable|date|before_or_equal:today',
                'end_date'                           => 'nullable|date|after_or_equal:start_date',
                'training_location'                  => 'nullable|string|max:255',
                'training_certificate'               => [
                    'nullable',
                    function ($attribute, $value, $fail) {
                        // Check if it's a valid upload
                        if ($value instanceof \Illuminate\Http\UploadedFile) {
                            if (!$value->isValid() || !in_array($value->extension(), ['pdf', 'jpg', 'png'])) {
                                $fail('The certificate must be a valid PDF, JPG, or PNG file.');
                            }
                            return;
                        }

                        // If not a file, check if it's a valid URL string
                        if (!is_string($value) || !filter_var($value, FILTER_VALIDATE_URL)) {
                            $fail('The certificate must be a valid file upload or a web URL.');
                        }
                    },
                ],
                'training_details'                   => 'nullable|string',
                'training_status'                    => 'nullable|boolean'
            ]);

            $path = $request->training_certificate;
            if ($request->hasFile('training_certificate')) {
                $file = $request->file('training_certificate');
                $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('uploads/training', $file, $filename);
                $path = 'uploads/training/' . $filename;
            }

            // Save experience info in DB
            $object = new TrainingInfo();
            $object->training_title = $request->training_title;
            $object->training_category = $request->training_category;
            $object->training_institute = $request->training_institute;
            $object->start_date = $request->start_date;
            $object->end_date = $request->end_date;
            $object->training_location = $request->training_location;
            $object->training_certificate = $path;
            $object->training_details = $request->training_details;
            $object->training_status = $request->training_status;
            $object->save();
            $this->logUserActivity('Training', 'Created a new Training info');
            return back()->with('success', 'Training info created');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    public function edit($training_id): JsonResponse
    {
        try {
            return response()->json(TrainingInfo::where('id', $training_id)->first());
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['error' => 'Something went wrong'], 404);
        }
    }

    /**
     * Update an existing training info in storage.
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
                'training_title'                     => 'required|string|max:255',
                'training_category'                  => 'required|integer|exists:select_types,id',
                'training_institute'                 => 'required|string|max:255',
                'start_date'                         => 'nullable|date|before_or_equal:today',
                'end_date'                           => 'nullable|date|after_or_equal:start_date',
                'training_location'                  => 'nullable|string|max:255',
                'training_certificate'               => [
                    'nullable',
                    function ($attribute, $value, $fail) {
                        // Check if it's a valid upload
                        if ($value instanceof \Illuminate\Http\UploadedFile) {
                            if (!$value->isValid() || !in_array($value->extension(), ['pdf', 'jpg', 'png'])) {
                                $fail('The certificate must be a valid PDF, JPG, or PNG file.');
                            }
                            return;
                        }

                        // If not a file, check if it's a valid URL string
                        if (!is_string($value) || !filter_var($value, FILTER_VALIDATE_URL)) {
                            $fail('The certificate must be a valid file upload or a web URL.');
                        }
                    },
                ],
                'training_details'                   => 'nullable|string',
                'training_status'                    => 'nullable|boolean'
            ]);

            $object = TrainingInfo::findOrFail($request->training_id);
            if ($request->hasFile('training_certificate')) {
                if (!empty($object->training_certificate) && Storage::disk('public')->exists($object->training_certificate)) {
                    Storage::disk('public')->delete($object->training_certificate);
                }
                $file = $request->file('training_certificate');
                $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('uploads/training', $file, $filename);
                $object->training_certificate = 'uploads/training/' . $filename;
            } else {
                $object->training_certificate = $request->training_certificate;
            }

            // Save training info in DB
            $object->fill([
                'training_title' => $request->training_title,
                'training_category' => $request->training_category,
                'training_institute' => $request->training_institute,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'training_location' => $request->training_location,
                'training_details' => $request->training_details,
                'training_status' => $request->training_status
            ]);
            $object->save();
            $this->logUserActivity('Training', 'Updated Training info');
            return back()->with('success', 'Training info updated');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    /**
     * Delete an existing training info from storage.
     *
     * @param int $training_id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function delete($training_id): RedirectResponse
    {
        try {
            $object = TrainingInfo::findOrFail($training_id);
            if (!empty($object->training_certificate) && Storage::disk('public')->exists($object->training_certificate)) {
                Storage::disk('public')->delete($object->training_certificate);
            }
            $object->delete();
            $this->logUserActivity('Training', 'Removed Training info');
            return back()->with('success', 'Training info removed');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong']);
        }
    }

    /**
     * Update the sequence of multiple training info records
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
                TrainingInfo::where('id', $item['id'])->update(['training_sequence' => $item['sequence']]);
            }
            return response()->json(['status' => 'success']);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['status' => 'error']);
        }
    }

    // public function settings_update(Request $request)
    // {
    //     $training_settings = ColumnSettings::where('module', 'training')->get();
    //     try {
    //         foreach ($training_settings as $value) {
    //             if ($request->has($value->column_name)) {
    //                 $value->visibility = 1;
    //                 $value->save();
    //             } else {
    //                 $value->visibility = 0;
    //                 $value->save();
    //             }
    //         }
    //         $this->logUserActivity('Training', 'Updated Training settings');
    //         return back()->with('success', 'Training settings updated');
    //     } catch (\Exception $exception) {
    //         Log::error($exception->getMessage());
    //         return back()->withErrors(['error' => 'Something went wrong']);
    //     }
    // }
}
