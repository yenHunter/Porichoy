<?php

namespace App\Services\Testimonial;

use App\Traits\UserLogTrait;
use App\Models\TestimonialInfo;
use App\Models\ClientInfo;
use App\Http\Requests\Admin\Testimonial\StoreTestimonialRequest;
use App\Http\Requests\Admin\Testimonial\UpdateTestimonialRequest;
use App\Http\Requests\Admin\Testimonial\UpdateTestimonialSequenceRequest;

class TestimonialService
{
    use UserLogTrait;

    /**
     * Data for the testimonial element admin view.
     *
     * @return array<string, \Illuminate\Database\Eloquent\Collection>
     */
    public function viewData(): array
    {
        return [
            'testimonial_list' => TestimonialInfo::sorted()->get(),
            'client_list'      => ClientInfo::active()->sorted()->get(),
        ];
    }

    /**
     * Store a newly created testimonial.
     *
     * @param  StoreTestimonialRequest $request  Validated payload
     * @return TestimonialInfo                   The created model
     */
    public function store(StoreTestimonialRequest $request): TestimonialInfo
    {
        $testimonial                       = new TestimonialInfo();
        $testimonial->client_id            = $request->client_id;
        $testimonial->testimonial_title    = $request->testimonial_title;
        $testimonial->testimonial_details  = $request->testimonial_details;
        $testimonial->testimonial_review   = $request->testimonial_review;
        $testimonial->testimonial_status   = $request->testimonial_status;
        $testimonial->save();

        $this->logUserActivity('Testimonial', 'New record created');

        return $testimonial;
    }

    /**
     * Find a single testimonial by id.
     *
     * @param  string $testimonial_id
     * @return TestimonialInfo|null
     */
    public function find(string $testimonial_id): ?TestimonialInfo
    {
        return TestimonialInfo::where('id', $testimonial_id)->first();
    }

    /**
     * Update an existing testimonial.
     *
     * @param  UpdateTestimonialRequest $request  Validated payload
     * @return TestimonialInfo                    The updated model
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function update(UpdateTestimonialRequest $request): TestimonialInfo
    {
        $testimonial = TestimonialInfo::findOrFail($request->testimonial_id);

        $testimonial->fill([
            'client_id'           => $request->client_id,
            'testimonial_title'   => $request->testimonial_title,
            'testimonial_details' => $request->testimonial_details,
            'testimonial_review'  => $request->testimonial_review,
            'testimonial_status'  => $request->testimonial_status,
        ]);
        $testimonial->save();

        $this->logUserActivity('Testimonial', 'Existing record updated');

        return $testimonial;
    }

    /**
     * Delete a testimonial.
     *
     * @param  string $testimonial_id
     * @return void
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function delete(string $testimonial_id): void
    {
        $testimonial = TestimonialInfo::findOrFail($testimonial_id);
        $testimonial->delete();

        $this->logUserActivity('Testimonial', 'Existing record deleted');
    }

    /**
     * Reorder (sequence-update) testimonials from a drag-sort payload.
     *
     * @param  UpdateTestimonialSequenceRequest $request
     * @return void
     */
    public function updateSequence(UpdateTestimonialSequenceRequest $request): void
    {
        foreach ($request->input('order', []) as $item) {
            TestimonialInfo::where('id', $item['id'])
                ->update(['testimonial_sequence' => $item['sequence']]);
        }
    }
}
