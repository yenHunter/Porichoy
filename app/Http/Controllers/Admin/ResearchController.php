<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use App\Models\SelectType;
use Illuminate\Http\Request;
use App\Traits\UserLogTrait;
use App\Models\ResearchInfo;
use App\Models\ColumnSettings;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class ResearchController extends Controller
{
    use UserLogTrait;

    /**
     * Show the research management page.
     *
     * @return \Illuminate\View\View
     */
    public function view(): View
    {
        try {
            return view(
                'admin.pages.module.research',
                [
                    'research_list'           => ResearchInfo::with('source')->whereRelation('source', 'use_for', 'research_source')->sorted()->get(),
                    'research_settings'       => ColumnSettings::where('module', 'research')->get(),
                    'research_source'         => SelectType::where('use_for', 'research_source')->get()
                ]
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return view('admin.error.404');
        }
    }

    /**
     * Store a new research info in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Throwable
     */
    public function store(Request $request): RedirectResponse
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

    /**
     * Get an existing research info by id.
     *
     * @param int $research_id Research id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function edit($research_id): JsonResponse
    {
        try {
            return response()->json(ResearchInfo::where('id', $research_id)->first());
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['error' => 'Something went wrong'], 404);
        }
    }

    /**
     * Update an existing research info in storage.
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
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    /**
     * Delete an existing research info by id.
     *
     * @param int $research_id Research id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function delete($research_id): RedirectResponse
    {
        try {
            $object = ResearchInfo::findOrFail($research_id);
            $object->delete();
            $this->logUserActivity('Research', 'Existing record removed');
            return back()->with('success', 'Research info removed');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong']);
        }
    }

    /**
     * Update the sequence of multiple research info records
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
                ResearchInfo::where('id', $item['id'])->update(['research_sequence' => $item['sequence']]);
            }
            return response()->json(['status' => 'success']);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['status' => 'error']);
        }
    }
}
