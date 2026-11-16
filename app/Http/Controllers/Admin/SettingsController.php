<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Settings\ProfileUpdateRequest;
use App\Http\Requests\Admin\Settings\SelectTypeRequest;
use App\Http\Requests\Admin\Settings\StoreResearchSourceRequest;
use App\Http\Requests\Admin\Settings\UpdateResearchSourceRequest;
use App\Http\Requests\Admin\Settings\UpdateSelectTypeSequenceRequest;
use App\Models\SelectType;
use App\Services\Settings\SettingsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingsController extends Controller
{
    public function __construct(
        private readonly SettingsService $settings_service
    ) {}

    /**
     * Display the portfolio profile management view.
     */
    public function profile_management(): View
    {
        return view(
            'admin.pages.management.profile',
            $this->settings_service->profileViewData()
        );
    }

    /**
     * Update portfolio profile information.
     */
    public function profile_update(ProfileUpdateRequest $request): RedirectResponse
    {
        $this->settings_service->updateProfile($request);

        return back()->with('success', 'Portfolio profile information updated successfully.');
    }

    // ---------------------------------------------------------------------
    // Research Source CRUD
    // ---------------------------------------------------------------------

    /**
     * Display the research source listing.
     */
    public function viewResearchSource(): View
    {
        return view(
            'admin.pages.settings.research_source',
            $this->settings_service->researchSourceViewData()
        );
    }

    /**
     * Store a new research source.
     */
    public function storeResearchSource(StoreResearchSourceRequest $request): RedirectResponse
    {
        $this->settings_service->storeResearchSource($request);

        return back()->with('success', 'Research Source created');
    }

    /**
     * Get a research source by id.
     */
    public function editResearchSource(string $research_source_id): JsonResponse
    {
        return response()->json(
            $this->settings_service->findResearchSource($research_source_id)
        );
    }

    /**
     * Update a research source.
     */
    public function updateResearchSource(UpdateResearchSourceRequest $request): RedirectResponse
    {
        $this->settings_service->updateResearchSource($request);

        return back()->with('success', 'Research Source updated');
    }

    /**
     * Delete a research source.
     */
    public function deleteResearchSource(string $research_source_id): RedirectResponse
    {
        $this->settings_service->deleteResearchSource($research_source_id);

        return back()->with('success', 'Research Source removed');
    }

    /**
     * Persist the drag/drop order of the research source table.
     */
    public function updateResearchSourceSequence(UpdateSelectTypeSequenceRequest $request): JsonResponse
    {
        $this->settings_service->updateSelectTypeSequence($request->input('order', []));

        return response()->json(['status' => 'success']);
    }

    // ---------------------------------------------------------------------
    // Select-type lookups
    //
    // Location types, employment types, training categories and blog
    // categories share one action set. The route carries the use_for value as
    // a `lookup` default, so which list is served is decided in routes/admin.php.
    // ---------------------------------------------------------------------

    /**
     * Per-lookup wiring.
     *
     * `with_count` names a relation that is counted in the listing and checked
     * before deleting a row; `blocked_message` (a printf template taking the
     * count and the noun) and `blocked_noun` (singular, plural) override the
     * refusal wording for that list. Both fall back to a generic sentence, so a
     * new list only has to set `with_count`.
     *
     * @var array<string, array{view: string, view_key: string, with_count?: string, blocked_message?: string, blocked_noun?: array{0: string, 1: string}}>
     */
    private const LOOKUPS = [
        SelectType::LOCATION_TYPE => [
            'view' => 'admin.pages.settings.location_type',
            'view_key' => 'location_type_list',
        ],
        SelectType::EMPLOYMENT_TYPE => [
            'view' => 'admin.pages.settings.employment_type',
            'view_key' => 'employment_type_list',
        ],
        SelectType::TRAINING_CATEGORY => [
            'view' => 'admin.pages.settings.training_category',
            'view_key' => 'training_category_list',
        ],
        SelectType::BLOG_CATEGORY => [
            'view' => 'admin.pages.settings.blog_category',
            'view_key' => 'blog_category_list',
            'with_count' => 'blogs',
            'blocked_message' => 'This category is used by %d %s. Reassign them before deleting it.',
            'blocked_noun' => ['post', 'posts'],
        ],
    ];

    /**
     * Display a lookup listing.
     */
    public function viewLookup(Request $request): View
    {
        $lookup = $this->lookup($request);

        return view($lookup['view'], [
            $lookup['view_key'] => $this->settings_service->selectTypeViewData(
                $this->lookupKey($request),
                $lookup['with_count'] ?? null,
            ),
        ]);
    }

    /**
     * Store a new lookup row.
     */
    public function storeLookup(SelectTypeRequest $request): RedirectResponse
    {
        $this->settings_service->storeSelectType($request, $this->lookupKey($request));

        return back()->with('success', $this->lookupLabel($request).' created');
    }

    /**
     * Get a lookup row by id.
     */
    public function editLookup(Request $request, string $lookup_id): JsonResponse
    {
        return response()->json(
            $this->settings_service->findSelectType($lookup_id, $this->lookupKey($request))
        );
    }

    /**
     * Update a lookup row.
     */
    public function updateLookup(SelectTypeRequest $request): RedirectResponse
    {
        // Every lookup form posts its id as `<use_for>_id`.
        $useFor = $this->lookupKey($request);

        $this->settings_service->updateSelectType($request, $useFor, $request->input($useFor.'_id'));

        return back()->with('success', $this->lookupLabel($request).' updated');
    }

    /**
     * Delete a lookup row, unless records still reference it.
     */
    public function deleteLookup(Request $request, string $lookup_id): RedirectResponse
    {
        $useFor = $this->lookupKey($request);
        $lookup = $this->lookup($request);

        if (isset($lookup['with_count'])) {
            $used = $this->settings_service->selectTypeUsageCount($lookup_id, $useFor, $lookup['with_count']);

            // The foreign keys are `onDelete('set null')`, so an unguarded
            // delete would silently strip the reference from those records.
            if ($used > 0) {
                // A list that counts a relation without naming its wording
                // still gets a usable sentence instead of a TypeError.
                $message = $lookup['blocked_message']
                    ?? 'This value is used by %d %s. Reassign them before deleting it.';
                $noun = ($lookup['blocked_noun'] ?? ['record', 'records'])[$used === 1 ? 0 : 1];

                return back()->with('error', sprintf($message, $used, $noun));
            }
        }

        $this->settings_service->deleteSelectType($lookup_id, $useFor);

        return back()->with('success', $this->lookupLabel($request).' removed');
    }

    /**
     * Persist the drag/drop order of a lookup table.
     */
    public function updateLookupSequence(UpdateSelectTypeSequenceRequest $request): JsonResponse
    {
        $this->settings_service->updateSelectTypeSequence($request->input('order', []));

        return response()->json(['status' => 'success']);
    }

    /*
    |--------------------------------------------------------------------------
    | Lookup internals
    |--------------------------------------------------------------------------
    */

    /**
     * The use_for value of the list the current route serves.
     */
    private function lookupKey(Request $request): string
    {
        return $request->route()->defaults['lookup'];
    }

    /**
     * The view wiring for the current route's list.
     *
     * @return array{view: string, view_key: string, with_count?: string, blocked_message?: string, blocked_noun?: array{0: string, 1: string}}
     */
    private function lookup(Request $request): array
    {
        return self::LOOKUPS[$this->lookupKey($request)];
    }

    /**
     * Human label for flash messages, e.g. "Blog Category".
     */
    private function lookupLabel(Request $request): string
    {
        return ucwords(str_replace('_', ' ', $this->lookupKey($request)));
    }
}
