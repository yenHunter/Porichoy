<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Settings\ProfileUpdateRequest;
use App\Http\Requests\Admin\Settings\SelectTypeRequest;
use App\Http\Requests\Admin\Settings\StoreResearchSourceRequest;
use App\Http\Requests\Admin\Settings\UpdateResearchSourceRequest;
use App\Models\SelectType;
use App\Services\Settings\SettingsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
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

    // ---------------------------------------------------------------------
    // Location Type CRUD (SelectType use_for = location_type)
    // ---------------------------------------------------------------------

    /**
     * Display the location type listing.
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
     */
    public function storeLocationType(SelectTypeRequest $request): RedirectResponse
    {
        $this->settings_service->storeSelectType($request, 'location_type');

        return back()->with('success', 'Location Type created');
    }

    /**
     * Get a location type by id.
     */
    public function editLocationType(string $location_type_id): JsonResponse
    {
        return response()->json(
            $this->settings_service->findSelectType($location_type_id, 'location_type')
        );
    }

    /**
     * Update a location type.
     */
    public function updateLocationType(SelectTypeRequest $request): RedirectResponse
    {
        $this->settings_service->updateSelectType($request, 'location_type', $request->input('location_type_id'));

        return back()->with('success', 'Location Type updated');
    }

    /**
     * Delete a location type.
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
     */
    public function storeEmploymentType(SelectTypeRequest $request): RedirectResponse
    {
        $this->settings_service->storeSelectType($request, 'employment_type');

        return back()->with('success', 'Employment Type created');
    }

    /**
     * Get an employment type by id.
     */
    public function editEmploymentType(string $employment_type_id): JsonResponse
    {
        return response()->json(
            $this->settings_service->findSelectType($employment_type_id, 'employment_type')
        );
    }

    /**
     * Update an employment type.
     */
    public function updateEmploymentType(SelectTypeRequest $request): RedirectResponse
    {
        $this->settings_service->updateSelectType($request, 'employment_type', $request->input('employment_type_id'));

        return back()->with('success', 'Employment Type updated');
    }

    /**
     * Delete an employment type.
     */
    public function deleteEmploymentType(string $employment_type_id): RedirectResponse
    {
        $this->settings_service->deleteSelectType($employment_type_id, 'employment_type');

        return back()->with('success', 'Employment Type removed');
    }

    // ---------------------------------------------------------------------
    // Training Category CRUD (SelectType use_for = training_category)
    // ---------------------------------------------------------------------

    /**
     * Display the training category listing.
     */
    public function viewTrainingCategory(): View
    {
        return view(
            'admin.pages.settings.training_category',
            [
                'training_category_list' => $this->settings_service->selectTypeViewData('training_category'),
            ]
        );
    }

    /**
     * Store a new training category.
     */
    public function storeTrainingCategory(SelectTypeRequest $request): RedirectResponse
    {
        $this->settings_service->storeSelectType($request, 'training_category');

        return back()->with('success', 'Training Category created');
    }

    /**
     * Get a training category by id.
     */
    public function editTrainingCategory(string $training_category_id): JsonResponse
    {
        return response()->json(
            $this->settings_service->findSelectType($training_category_id, 'training_category')
        );
    }

    /**
     * Update a training category.
     */
    public function updateTrainingCategory(SelectTypeRequest $request): RedirectResponse
    {
        $this->settings_service->updateSelectType($request, 'training_category', $request->input('training_category_id'));

        return back()->with('success', 'Training Category updated');
    }

    /**
     * Delete a training category.
     */
    public function deleteTrainingCategory(string $training_category_id): RedirectResponse
    {
        $this->settings_service->deleteSelectType($training_category_id, 'training_category');

        return back()->with('success', 'Training Category removed');
    }
}
