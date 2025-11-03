<?php

namespace App\Http\Controllers;

use App\Models\SelectType;
use Illuminate\Http\Request;
use App\Traits\UserLogTrait;
use App\Models\ResearchInfo;
use App\Models\ColumnSettings;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ResearchController extends Controller
{
    use UserLogTrait;

    public function view()
    {
        return view(
            'admin.pages.module.research',
            [
                'research_list'           => ResearchInfo::with('source')->whereHas('source', function ($query) {
                    $query->where('use_for', 'research_source');
                })->orderBy('sequence', 'asc')->get(),
                'research_settings'       => ColumnSettings::where('module', 'research')->get(),
                'research_source'         => SelectType::where('use_for', 'research_source')->get()
            ]
        );
    }

    public function store(Request $request)
    {
        try {
            // Validation
            $request->validate([
                'source_id'                 => 'required',
                'category'                  => 'required',
                'title'                     => 'required'
            ]);

            // Save experience info in DB
            $object = new ResearchInfo();
            $object->source_id = $request->source_id;
            $object->category = $request->category;
            $object->title = $request->title;
            $object->published = $request->published;
            $object->role = $request->role;
            $object->authors = $request->authors;
            $object->link = $request->link;
            $object->details = $request->details;
            $object->status = $request->status;
            $object->sequence = ResearchInfo::max('sequence') + 1;
            $object->save();
            $this->log_user_activity('Research', 'Created a new Research info');
            return back()->with('success', 'Research info created');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    public function edit($research_id)
    {
        try {
            return response()->json(ResearchInfo::where('id', $research_id)->first());
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
                'source_id'                 => 'required',
                'category'                  => 'required',
                'title'                     => 'required'
            ]);

            // Save experience info in DB
            $object = ResearchInfo::where('id', $request->research_id)->first();
            $object->source_id = $request->source_id;
            $object->category = $request->category;
            $object->title = $request->title;
            $object->published = $request->published;
            $object->role = $request->role;
            $object->authors = $request->authors;
            $object->link = $request->link;
            $object->details = $request->details;
            $object->status = $request->status;
            $object->updated_by = Auth::id();
            $object->save();
            $this->log_user_activity('Research', 'Updated Research info');
            return back()->with('success', 'Research info updated');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    public function delete($research_id)
    {
        try {
            $object = ResearchInfo::where('id', $research_id)->first();
            $object->delete();
            $this->log_user_activity('Research', 'Removed Research info');
            return back()->with('success', 'Research info removed');
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
                ResearchInfo::where('id', $item['id'])->update(['sequence' => $item['sequence']]);
            }
            return response()->json(['status' => 'success']);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['status' => 'error']);
        }
    }

    public function settings_update(Request $request)
    {
        $research_settings = ColumnSettings::where('module', 'research')->get();
        try {
            foreach ($research_settings as $value) {
                if ($request->has($value->column_name)) {
                    $value->visibility = 1;
                    $value->save();
                } else {
                    $value->visibility = 0;
                    $value->save();
                }
            }
            $this->log_user_activity('Research', 'Updated Research settings');
            return back()->with('success', 'Research settings updated');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->withErrors(['error' => 'Something went wrong']);
        }
    }
}
