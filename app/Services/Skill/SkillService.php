<?php

namespace App\Services\Skill;

use Illuminate\Support\Str;
use App\Traits\UserLogTrait;
use App\Models\SkillInfo;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use App\Http\Requests\Admin\Skill\StoreSkillRequest;
use App\Http\Requests\Admin\Skill\UpdateSkillRequest;
use App\Http\Requests\Admin\Skill\UpdateSkillSequenceRequest;

class SkillService
{
    use UserLogTrait;

    /**
     * Logo storage directory (on the 'public' disk) and geometry.
     */
    private const LOGO_DIR   = 'uploads/skill';
    private const LOGO_WIDTH = 300;

    /**
     * Data for the skill element admin view.
     *
     * @return array<string, \Illuminate\Database\Eloquent\Collection>
     */
    public function viewData(): array
    {
        return [
            'skill_list' => SkillInfo::sorted()->get(),
        ];
    }

    /**
     * Store a newly created skill record.
     *
     * @param  StoreSkillRequest $request  Validated payload
     * @return SkillInfo                   The created model
     */
    public function store(StoreSkillRequest $request): SkillInfo
    {
        $skill               = new SkillInfo();
        $skill->skill_title  = $request->skill_title;
        $skill->skill_logo   = $this->storeLogo($request);
        $skill->skill_score  = $request->skill_score;
        $skill->skill_details = $request->skill_details;
        $skill->skill_status = $request->skill_status;
        $skill->save();

        $this->logUserActivity('Skill', 'New record created');

        return $skill;
    }

    /**
     * Find a single skill record by id.
     *
     * @param  string $skill_id
     * @return SkillInfo|null
     */
    public function find(string $skill_id): ?SkillInfo
    {
        return SkillInfo::where('id', $skill_id)->first();
    }

    /**
     * Update an existing skill record (and replace the logo if given).
     *
     * @param  UpdateSkillRequest $request  Validated payload
     * @return SkillInfo                    The updated model
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function update(UpdateSkillRequest $request): SkillInfo
    {
        $skill = SkillInfo::findOrFail($request->skill_id);

        if ($request->hasFile('skill_logo')) {
            $this->deleteLogo($skill);

            $skill->skill_logo = $this->storeLogo($request);
        }

        $skill->fill([
            'skill_title'   => $request->skill_title,
            'skill_score'   => $request->skill_score,
            'skill_details' => $request->skill_details,
            'skill_status'  => $request->skill_status,
        ]);
        $skill->save();

        $this->logUserActivity('Skill', 'Existing record updated');

        return $skill;
    }

    /**
     * Delete a skill record (and its stored logo).
     *
     * @param  string $skill_id
     * @return void
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function delete(string $skill_id): void
    {
        $skill = SkillInfo::findOrFail($skill_id);

        $this->deleteLogo($skill);

        $skill->delete();

        $this->logUserActivity('Skill', 'Existing record deleted');
    }

    /**
     * Reorder (sequence-update) skill records from a drag-sort payload.
     *
     * @param  UpdateSkillSequenceRequest $request
     * @return void
     */
    public function updateSequence(UpdateSkillSequenceRequest $request): void
    {
        foreach ($request->input('order', []) as $item) {
            SkillInfo::where('id', $item['id'])
                ->update(['skill_sequence' => $item['sequence']]);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Internals
    |--------------------------------------------------------------------------
    */

    /**
     * Persist an uploaded skill logo (rescaled, re-coded as WebP).
     */
    private function storeLogo(StoreSkillRequest|UpdateSkillRequest $request): ?string
    {
        if (!$request->hasFile('skill_logo')) {
            return null;
        }

        $file     = $request->file('skill_logo');
        $filename = Str::uuid() . '.webp';
        $path     = self::LOGO_DIR . '/' . $filename;

        $image = Image::read($file);
        $image->scale(width: self::LOGO_WIDTH);

        Storage::disk('public')->put($path, $image->toWebp(80));

        return $path;
    }

    /**
     * Remove a stored logo from disk (silently no-ops when absent).
     */
    private function deleteLogo(SkillInfo $skill): void
    {
        if ($skill->skill_logo && Storage::disk('public')->exists($skill->skill_logo)) {
            Storage::disk('public')->delete($skill->skill_logo);
        }
    }
}
