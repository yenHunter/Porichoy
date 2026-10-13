<?php

namespace App\Services\Research;

use App\Traits\UserLogTrait;
use App\Models\ResearchInfo;
use App\Models\SelectType;
use App\Models\ColumnSettings;
use App\Http\Requests\Admin\Research\UpdateResearchRequest;
use App\Http\Requests\Admin\Research\StoreResearchRequest;
use App\Http\Requests\Admin\Research\UpdateResearchSequenceRequest;
use App\Http\Requests\Admin\Research\UpdateResearchSettingsRequest;

class ResearchService
{
    use UserLogTrait;

    /**
     * Data for the research module admin view.
     *
     * @return array<string, \Illuminate\Database\Eloquent\Collection>
     */
    public function viewData(): array
    {
        return [
            'research_list'     => ResearchInfo::with('source')
                ->whereRelation('source', 'use_for', 'research_source')
                ->sorted()
                ->get(),
            'research_settings' => ColumnSettings::where('module', 'research')->get(),
            'research_source'   => SelectType::where('use_for', 'research_source')->get(),
        ];
    }

    /**
     * Store a newly created research record.
     *
     * @param  StoreResearchRequest $request  Validated payload
     * @return ResearchInfo                   The created model
     */
    public function store(StoreResearchRequest $request): ResearchInfo
    {
        $research                     = new ResearchInfo();
        $research->research_source    = $request->research_source;
        $research->research_category  = $request->research_category;
        $research->research_title     = $request->research_title;
        $research->published_date     = $request->published_date;
        $research->research_role      = $request->research_role;
        $research->research_authors   = $request->research_authors;
        $research->research_link      = $request->research_link;
        $research->research_details   = $request->research_details;
        $research->research_status    = $request->research_status;
        $research->save();

        $this->logUserActivity('Research', 'New record created');

        return $research;
    }

    /**
     * Find a single research record by id.
     *
     * @param  string $research_id
     * @return ResearchInfo|null
     */
    public function find(string $research_id): ?ResearchInfo
    {
        return ResearchInfo::where('id', $research_id)->first();
    }

    /**
     * Update an existing research record.
     *
     * @param  UpdateResearchRequest $request  Validated payload
     * @return ResearchInfo                    The updated model
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function update(UpdateResearchRequest $request): ResearchInfo
    {
        $research = ResearchInfo::findOrFail($request->research_id);

        $research->fill([
            'research_source'   => $request->research_source,
            'research_category' => $request->research_category,
            'research_title'    => $request->research_title,
            'research_role'     => $request->research_role,
            'research_authors'  => $request->research_authors,
            'research_link'     => $request->research_link,
            'research_details'  => $request->research_details,
            'research_status'   => $request->research_status,
        ]);
        $research->save();

        $this->logUserActivity('Research', 'Existing record updated');

        return $research;
    }

    /**
     * Delete a research record.
     *
     * @param  string $research_id
     * @return void
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function delete(string $research_id): void
    {
        $research = ResearchInfo::findOrFail($research_id);
        $research->delete();

        $this->logUserActivity('Research', 'Existing record removed');
    }

    /**
     * Reorder (sequence-update) research records from a drag-sort payload.
     *
     * @param  UpdateResearchSequenceRequest $request
     * @return void
     */
    public function updateSequence(UpdateResearchSequenceRequest $request): void
    {
        foreach ($request->input('order', []) as $item) {
            ResearchInfo::where('id', $item['id'])
                ->update(['research_sequence' => $item['sequence']]);
        }
    }

    /**
     * Toggle column visibility for the research module.
     *
     * @param  UpdateResearchSettingsRequest $request
     * @return void
     */
    public function updateSettings(UpdateResearchSettingsRequest $request): void
    {
        ColumnSettings::where('module', 'research')
            ->get()
            ->each(function (ColumnSettings $setting) use ($request) {
                $setting->visibility = $request->has($setting->column_name) ? 1 : 0;
                $setting->save();
            });

        $this->logUserActivity('Research', 'Updated Research settings');
    }
}
