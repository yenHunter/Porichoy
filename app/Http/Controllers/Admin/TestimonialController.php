<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Testimonial\StoreTestimonialRequest;
use App\Http\Requests\Admin\Testimonial\UpdateTestimonialRequest;
use App\Http\Requests\Admin\Testimonial\UpdateTestimonialSequenceRequest;
use App\Services\Testimonial\TestimonialService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    public function __construct(
        private readonly TestimonialService $testimonial_service
    ) {}

    /**
     * Display the listing of testimonials.
     */
    public function view(): View
    {
        return view('admin.pages.element.testimonial', $this->testimonial_service->viewData());
    }

    /**
     * Store a newly created testimonial in storage.
     *
     * @param  StoreTestimonialRequest  $request  Validated payload
     */
    public function store(StoreTestimonialRequest $request): RedirectResponse
    {
        $this->testimonial_service->store($request);

        return back()->with('success', 'Testimonial added successfully.');
    }

    /**
     * Get a testimonial by id.
     */
    public function edit(string $testimonial_id): JsonResponse
    {
        return response()->json($this->testimonial_service->find($testimonial_id));
    }

    /**
     * Update an existing testimonial in storage.
     *
     * @param  UpdateTestimonialRequest  $request  Validated payload
     */
    public function update(UpdateTestimonialRequest $request): RedirectResponse
    {
        $this->testimonial_service->update($request);

        return back()->with('success', 'Testimonial updated');
    }

    /**
     * Delete an existing testimonial from storage.
     */
    public function delete(string $testimonial_id): RedirectResponse
    {
        $this->testimonial_service->delete($testimonial_id);

        return back()->with('success', 'Testimonial deleted');
    }

    /**
     * Update the sequence of multiple testimonial records.
     */
    public function update_sequence(UpdateTestimonialSequenceRequest $request): JsonResponse
    {
        $this->testimonial_service->updateSequence($request);

        return response()->json(['status' => 'success']);
    }
}
