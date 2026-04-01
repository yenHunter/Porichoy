<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use App\Models\SelectType;
use Illuminate\Http\Request;
use App\Traits\UserLogTrait;
use App\Models\TrainingInfo;
use App\Models\ColumnSettings;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class TrainingController extends Controller
{
    use UserLogTrait;

    public function view(): View
    {
        return view(
            'admin.pages.module.training',
            [
                'training_list'           => TrainingInfo::with('category')->whereRelation('category', 'use_for', 'training_category')->sorted()->get(),
                'training_settings'       => ColumnSettings::where('module', 'training')->get(),
                'training_category'       => SelectType::where('use_for', 'training_category')->get()
            ]
        );
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            // Validation
            $request->validate([
                'title'                     => 'required',
                'category_id'               => 'required',
                'institute'                 => 'required',
                'start_date'                => 'date|before_or_equal:today',
                'end_date'                  => 'date|after_or_equal:start_date',
            ]);

            $path = $request->certificate;
            if ($request->hasFile('certificate')) {
                $file = $request->file('certificate');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/uploads/training', $filename);
                $path = 'uploads/training/' . $filename;
            }

            // Save experience info in DB
            $object = new TrainingInfo();
            $object->title = $request->title;
            $object->category_id = $request->category_id;
            $object->title = $request->title;
            $object->institute = $request->institute;
            $object->start_date = $request->start_date;
            $object->end_date = $request->end_date;
            $object->location = $request->location;
            $object->certificate = $path;
            $object->status = $request->status;
            $object->sequence = TrainingInfo::max('sequence') + 1;
            $object->updated_by = Auth::id();
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

    public function update(Request $request): RedirectResponse
    {
        try {
            // Validation
            $request->validate([
                'title'                     => 'required',
                'category_id'               => 'required',
                'institute'                 => 'required',
                'start_date'                => 'date|before_or_equal:today',
                'end_date'                  => 'date|after_or_equal:start_date',
            ]);

            $object = TrainingInfo::where('id', $request->training_id)->first();
            $path = $object->certificate;
            if ($request->hasFile('certificate')) {
                if (Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                }
                $file = $request->file('certificate');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/uploads/training', $filename);
                $path = 'uploads/training/' . $filename;
            }

            // Save experience info in DB
            $object->title = $request->title;
            $object->category_id = $request->category_id;
            $object->title = $request->title;
            $object->institute = $request->institute;
            $object->start_date = $request->start_date;
            $object->end_date = $request->end_date;
            $object->location = $request->location;
            $object->certificate = $path;
            $object->details = $request->details;
            $object->status = $request->status;
            $object->updated_by = Auth::id();
            $object->save();
            $this->logUserActivity('Training', 'Updated Training info');
            return back()->with('success', 'Training info updated');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    public function delete($training_id): RedirectResponse
    {
        try {
            $object = TrainingInfo::where('id', $training_id)->first();
            $object->delete();
            if (!empty($object->certificate) && Storage::disk('public')->exists($object->certificate)) {
                Storage::disk('public')->delete($object->certificate);
            }
            $this->logUserActivity('Training', 'Removed Training info');
            return back()->with('success', 'Training info removed');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong']);
        }
    }

    public function update_sequence(Request $request): JsonResponse
    {
        try {
            $order = $request->input('order');
            foreach ($order as $item) {
                TrainingInfo::where('id', $item['id'])->update(['sequence' => $item['sequence']]);
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
