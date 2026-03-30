<?php

namespace App\Http\Controllers\Admin;

use App\Models\SelectType;
use Illuminate\Http\Request;
use App\Traits\UserLogTrait;
use App\Models\ResearchInfo;
use App\Models\ColumnSettings;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ResearchController extends Controller
{
    use UserLogTrait;

    public function view()
    {
        return view(
            'admin.pages.module.research',
            [
                'research_list'           => ResearchInfo::with('source')->whereRelation('source', 'use_for', 'research_source')->sorted()->get(),
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
                'research_source'                       => 'required|integer|exists:select_types,id',
                'research_category'                     => 'required|string|max:255',
                'research_title'                        => 'required|string|max:255',
                'published_date'                        => 'nullable|date',
                'research_role'                         => 'nullable|string|max:8',
                'research_authors'                      => 'nullable|string|max:255',
                'research_link'                         => 'nullable|string|max:255',
                'research_details'                      => 'nullable|string',
                'research_status'                       => 'nullable|boolean'
            ]);

            // Save research info in DB
            $object = new ResearchInfo();
            $object->research_source = $request->research_source;
            $object->research_category = $request->research_category;
            $object->research_title = $request->research_title;
            $object->published_date = $request->published_date;
            $object->research_role = $request->research_role;
            $object->research_authors = $request->research_authors;
            $object->research_link = $request->research_link;
            $object->research_details = $request->research_details;
            $object->research_status = $request->research_status;
            $object->save();
            $this->logUserActivity('Research', 'New record created');
            return back()->with('success', 'Research info created');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
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
                'research_id'                           => 'required|exists:research_infos,id',
                'research_source'                       => 'required|integer|exists:select_types,id',
                'research_category'                     => 'required|string|max:255',
                'research_title'                        => 'required|string|max:255',
                'published_date'                        => 'nullable|date',
                'research_role'                         => 'nullable|string|max:8',
                'research_authors'                      => 'nullable|string|max:255',
                'research_link'                         => 'nullable|string|max:255',
                'research_details'                      => 'nullable|string',
                'research_status'                       => 'nullable|boolean'
            ]);

            // Save research info in DB
            $object = ResearchInfo::findOrFail($request->research_id);
            $object->fill([
                'research_source'                   => $request->research_source,
                'research_category'                 => $request->research_category,
                'research_title'                    => $request->research_title,
                'research_role'                     => $request->research_role,
                'research_authors'                  => $request->research_authors,
                'research_link'                     => $request->research_link,
                'research_details'                  => $request->research_details,
                'research_status'                   => $request->research_status,
            ]);
            $object->save();
            $this->logUserActivity('Research', 'Existing record updated');
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
            $this->logUserActivity('Research', 'Existing record removed');
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
                ResearchInfo::where('id', $item['id'])->update(['research_sequence' => $item['sequence']]);
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
            $this->logUserActivity('Research', 'Updated Research settings');
            return back()->with('success', 'Research settings updated');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->withErrors(['error' => 'Something went wrong']);
        }
    }
}
