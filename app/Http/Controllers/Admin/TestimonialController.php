<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use App\Models\ClientInfo;
use Illuminate\Http\Request;
use App\Traits\UserLogTrait;
use App\Models\TestimonialInfo;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class TestimonialController extends Controller
{
    use UserLogTrait;

    /**
     * Display the listing of testimonials
     *
     * @return \Illuminate\View\View
     */
    public function view(): View
    {
        try {
            return view(
                'admin.pages.element.testimonial',
                [
                    'testimonial_list'      => TestimonialInfo::sorted()->get(),
                    'client_list'           => ClientInfo::active()->sorted()->get(),
                ]
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return view('admin.error.404');
        }
    }

    /**
     * Store a newly created testimonial in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            // Validation
            $request->validate([
                'client_id'         => 'required|exists:client_infos,id',
                'title'             => 'nullable|string|max:255',
                'details'           => 'required|string',
                'review'            => 'required|integer|min:1|max:5',
                'status'            => 'nullable|boolean',
            ]);

            // Save testimonial info in DB
            $testimonial = new TestimonialInfo();
            $testimonial->client_id = $request->client_id;
            $testimonial->title = $request->title;
            $testimonial->details = $request->details;
            $testimonial->review = $request->review;
            $testimonial->status = $request->status;
            $testimonial->save();
            $this->logUserActivity('Testimonial', 'New record created');
            return back()->with('success', 'Testimonial added successfully.');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    /**
     * Get a testimonial by id
     *
     * @param string $testimonial_id Testimonial id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function edit($testimonial_id): JsonResponse
    {
        try {
            return response()->json(TestimonialInfo::where('id', $testimonial_id)->first());
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['error' => 'Something went wrong'], 404);
        }
    }

    /**
     * Update an existing testimonial in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function update(Request $request): RedirectResponse
    {
        try {
            // Validation
            $request->validate([
                'testimonial_id'    => 'required|exists:testimonial_infos,id',
                'client_id'         => 'required|exists:client_infos,id',
                'title'             => 'nullable|string|max:255',
                'details'           => 'required|string',
                'review'            => 'required|integer|min:1|max:5',
                'status'            => 'nullable|boolean'
            ]);

            // Find the testimonial by ID
            $object = TestimonialInfo::findOrFail($request->testimonial_id);

            // Update testimonial info in DB
            $object->fill([
                'client_id' => $request->client_id,
                'title' => $request->title,
                'details' => $request->details,
                'review' => $request->review,
                'status' => $request->status,
            ]);
            $object->save();
            $this->logUserActivity('Testimonial', 'Existing record updated');
            return back()->with('success', 'Testimonial updated');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    /**
     * Delete an existing testimonial from storage.
     *
     * @param string $testimonial_id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function delete($testimonial_id): RedirectResponse
    {
        try {
            $object = TestimonialInfo::findOrFail($testimonial_id);
            $object->delete();
            $this->logUserActivity('Testimonial', 'Existing record deleted');
            return back()->with('success', 'Testimonial deleted');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong']);
        }
    }

    /**
     * Update the sequence of multiple testimonial records
     *
     * @param Request $request
     * @return JsonResponse
     * @throws \Throwable
     */
    public function update_sequence(Request $request)
    {
        try {
            $order = $request->input('order');
            foreach ($order as $item) {
                TestimonialInfo::where('id', $item['id'])->update(['sequence' => $item['sequence']]);
            }
            return response()->json(['status' => 'success']);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['status' => 'error']);
        }
    }
}
