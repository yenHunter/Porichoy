<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\Settings\ProfileUpdateRequest;
use App\Http\Requests\Admin\Settings\SelectTypeRequest;
use App\Http\Requests\Admin\Settings\StoreResearchSourceRequest;
use App\Http\Requests\Admin\Settings\UpdateResearchSourceRequest;
use App\Services\Settings\SettingsService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\SelectType;

class SettingsController extends Controller
{
    public function __construct(
        private readonly SettingsService $settings_service
    ) {
    }

    /**
     * Display the portfolio profile management view.
     *
     * @return \Illuminate\View\View
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
     *
     * @param  ProfileUpdateRequest $request
     * @return RedirectResponse
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
     *
     * @return \Illuminate\View\View
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
     *
     * @param  StoreResearchSourceRequest $request
     * @return RedirectResponse
     */
    public function storeResearchSource(StoreResearchSourceRequest $request): RedirectResponse
    {
        $this->settings_service->storeResearchSource($request);

        return back()->with('success', 'Research Source created');
    }

    /**
     * Get a research source by id.
     *
     * @param  string $research_source_id
     * @return JsonResponse
     */
    public function editResearchSource(string $research_source_id): JsonResponse
    {
        return response()->json(
            $this->settings_service->findResearchSource($research_source_id)
        );
    }

    /**
     * Update a research source.
     *
     * @param  UpdateResearchSourceRequest $request
     * @return RedirectResponse
     */
    public function updateResearchSource(UpdateResearchSourceRequest $request): RedirectResponse
    {
        $this->settings_service->updateResearchSource($request);

        return back()->with('success', 'Research Source updated');
    }

    /**
     * Delete a research source.
     *
     * @param  string $research_source_id
     * @return RedirectResponse
     */
    public function deleteResearchSource(string $research_source_id): RedirectResponse
    {
        $this->settings_service->deleteResearchSource($research_source_id);

        return back()->with('success', 'Research Source removed');
    }

    // ---------------------------------------------------------------------
    // Location Type CRUD (SelectType use_for = location_type)
    // ---------------------------------------------------------------------

    /**
     * Display the location type listing.
     *
     * @return \Illuminate\View\View
     */
    public function viewLocationType(): View
    {
        return view(
            'admin.pages.settings.location_type',
            [
                'location_type_list' => $this->settings_service->selectTypeViewData('location_type'),
            ]
        );
    }

    /**
     * Store a new location type.
     *
     * @param  SelectTypeRequest $request
     * @return RedirectResponse
     */
    public function storeLocationType(SelectTypeRequest $request): RedirectResponse
    {
        $this->settings_service->storeSelectType($request, 'location_type');

        return back()->with('success', 'Location Type created');
    }

    /**
     * Get a location type by id.
     *
     * @param  string $location_type_id
     * @return JsonResponse
     */
    public function editLocationType(string $location_type_id): JsonResponse
    {
        return response()->json(
            $this->settings_service->findSelectType($location_type_id, 'location_type')
        );
    }

    /**
     * Update a location type.
     *
     * @param  SelectTypeRequest $request
     * @return RedirectResponse
     */
    public function updateLocationType(SelectTypeRequest $request): RedirectResponse
    {
        $this->settings_service->updateSelectType($request, 'location_type', $request->input('location_type_id'));

        return back()->with('success', 'Location Type updated');
    }

    /**
     * Delete a location type.
     *
     * @param  string $location_type_id
     * @return RedirectResponse
     */
    public function deleteLocationType(string $location_type_id): RedirectResponse
    {
        $this->settings_service->deleteSelectType($location_type_id, 'location_type');

        return back()->with('success', 'Location Type removed');
    }

    // ---------------------------------------------------------------------
    // Employment Type CRUD (SelectType use_for = employment_type)
    // ---------------------------------------------------------------------

    /**
     * Display the employment type listing.
     *
     * @return \Illuminate\View\View
     */
    public function viewEmploymentType(): View
    {
        return view(
            'admin.pages.settings.employment_type',
            [
                'employment_type_list' => $this->settings_service->selectTypeViewData('employment_type'),
            ]
        );
    }

    /**
     * Store a new employment type.
     *
     * @param  SelectTypeRequest $request
     * @return RedirectResponse
     */
    public function storeEmploymentType(SelectTypeRequest $request): RedirectResponse
    {
        $this->settings_service->storeSelectType($request, 'employment_type');

        return back()->with('success', 'Employment Type created');
    }

    /**
     * Get an employment type by id.
     *
     * @param  string $employment_type_id
     * @return JsonResponse
     */
    public function editEmploymentType(string $employment_type_id): JsonResponse
    {
        return response()->json(
            $this->settings_service->findSelectType($employment_type_id, 'employment_type')
        );
    }

    /**
     * Update an employment type.
     *
     * @param  SelectTypeRequest $request
     * @return RedirectResponse
     */
    public function updateEmploymentType(SelectTypeRequest $request): RedirectResponse
    {
        $this->settings_service->updateSelectType($request, 'employment_type', $request->input('employment_type_id'));

        return back()->with('success', 'Employment Type updated');
    }

    /**
     * Delete an employment type.
     *
     * @param  string $employment_type_id
     * @return RedirectResponse
     */
    public function deleteEmploymentType(string $employment_type_id): RedirectResponse
    {
        $this->settings_service->deleteSelectType($employment_type_id, 'employment_type');

        return back()->with('success', 'Employment Type removed');
    }
}
