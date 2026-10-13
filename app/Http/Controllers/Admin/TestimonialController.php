<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Testimonial\TestimonialService;
use App\Http\Requests\Admin\Testimonial\StoreTestimonialRequest;
use App\Http\Requests\Admin\Testimonial\UpdateTestimonialRequest;
use App\Http\Requests\Admin\Testimonial\UpdateTestimonialSequenceRequest;

class TestimonialController extends Controller
{
    public function __construct(
        private readonly TestimonialService $testimonial_service
    ) {
    }

    /**
     * Display the listing of testimonials.
     *
     * @return \Illuminate\View\View
     */
    public function view(): View
    {
        return view('admin.pages.element.testimonial', $this->testimonial_service->viewData());
    }

    /**
     * Store a newly created testimonial in storage.
     *
     * @param  StoreTestimonialRequest $request Validated payload
     * @return RedirectResponse
     */
    public function store(StoreTestimonialRequest $request): RedirectResponse
    {
        $this->testimonial_service->store($request);

        return back()->with('success', 'Testimonial added successfully.');
    }

    /**
     * Get a testimonial by id.
     *
     * @param  string $testimonial_id
     * @return JsonResponse
     */
    public function edit(string $testimonial_id): JsonResponse
    {
        return response()->json($this->testimonial_service->find($testimonial_id));
    }

    /**
     * Update an existing testimonial in storage.
     *
     * @param  UpdateTestimonialRequest $request Validated payload
     * @return RedirectResponse
     */
    public function update(UpdateTestimonialRequest $request): RedirectResponse
    {
        $this->testimonial_service->update($request);

        return back()->with('success', 'Testimonial updated');
    }

    /**
     * Delete an existing testimonial from storage.
     *
     * @param  string $testimonial_id
     * @return RedirectResponse
     */
    public function delete(string $testimonial_id): RedirectResponse
    {
        $this->testimonial_service->delete($testimonial_id);

        return back()->with('success', 'Testimonial deleted');
    }

    /**
     * Update the sequence of multiple testimonial records.
     *
     * @param  UpdateTestimonialSequenceRequest $request
     * @return JsonResponse
     */
    public function update_sequence(UpdateTestimonialSequenceRequest $request): JsonResponse
    {
        $this->testimonial_service->updateSequence($request);

        return response()->json(['status' => 'success']);
    }
}
