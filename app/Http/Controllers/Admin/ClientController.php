<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use App\Models\ClientInfo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\UserLogTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class ClientController extends Controller
{
    use UserLogTrait;

    /**
     * Display the listing of the resource
     *
     * @return \Illuminate\View\View
     */
    public function view(): View
    {
        try {
            return view(
                'admin.pages.element.client',
                [
                    'client_list' => ClientInfo::sorted()->get()
                ]
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return view('admin.error.404');
        }
    }

    /**
     * Store a newly created client info in storage.
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
                'client_name'               => 'required|string|max:255',
                'client_email'              => 'required|email|max:255',
                'client_mobile'             => 'nullable|string|max:20',
                'client_picture'            => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240', // max size 10MB
                'client_designation'        => 'nullable|string|max:255',
                'client_organization'       => 'nullable|string|max:255',
                'client_address'            => 'nullable|string|max:500',
                'organization_logo'         => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:10240', // max size 10MB
                'organization_website'      => 'nullable|url|max:255',
                'client_status'             => 'nullable|boolean',
            ]);

            // Store client picture
            $picture_path = null;
            if ($request->hasFile('client_picture')) {
                $file = $request->file('client_picture');
                $filename = Str::uuid() . '.webp';
                $picture_path = 'uploads/client/' . $filename;
                $img = Image::read($file);
                $img->scale(width: 300);
                Storage::disk('public')->put($picture_path, $img->toWebp(80));
            }

            // Store organization logo
            $logo_path = null;
            if ($request->hasFile('organization_logo')) {
                $file = $request->file('organization_logo');
                $filename = Str::uuid() . '.webp';
                $logo_path = 'uploads/organization-logo/' . $filename;
                $img = Image::read($file);
                $img->scale(width: 300);
                Storage::disk('public')->put($logo_path, $img->toWebp(80));
            }

            // Save client info in DB
            $client = new ClientInfo();
            $client->client_name = $request->client_name;
            $client->client_email = $request->client_email;
            $client->client_mobile = $request->client_mobile;
            $client->client_picture = $picture_path;
            $client->client_designation = $request->client_designation;
            $client->client_organization = $request->client_organization;
            $client->client_address = $request->client_address;
            $client->organization_logo = $logo_path;
            $client->organization_website = $request->organization_website;
            $client->client_status = $request->client_status;
            $client->save();
            $this->logUserActivity('Client', 'New record created');
            return back()->with('success', 'Client added successfully.');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    /**
     * Get a client info by id
     *
     * @param string $client_id Client id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function edit($client_id): JsonResponse
    {
        try {
            return response()->json(ClientInfo::where('id', $client_id)->first());
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['error' => 'Something went wrong'], 404);
        }
    }

    /**
     * Update an existing client info in storage.
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
                'client_id'                             => 'required|exists:client_infos,id',
                'client_name'                           => 'required|string|max:255',
                'client_email'                          => 'required|email|max:255',
                'client_mobile'                         => 'nullable|string|max:20',
                'client_picture'                        => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240', // max size 10MB
                'client_designation'                    => 'nullable|string|max:255',
                'client_organization'                   => 'nullable|string|max:255',
                'client_address'                        => 'nullable|string|max:500',
                'organization_logo'                     => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240', // max size 10MB
                'organization_website'                  => 'nullable|url|max:255',
                'client_status'                         => 'nullable|boolean'
            ]);

            // Find the client by ID
            $object = ClientInfo::findOrFail($request->client_id);

            // Store client picture
            if ($request->hasFile('client_picture')) {
                if ($object->client_picture && Storage::disk('public')->exists($object->client_picture)) {
                    Storage::disk('public')->delete($object->client_picture);
                }
                $file = $request->file('client_picture');
                $filename = Str::uuid() . '.webp';
                $picture_path = 'uploads/client/' . $filename;
                $img = Image::read($file);
                $img->scale(width: 300);
                Storage::disk('public')->put($picture_path, $img->toWebp(80));
                $object->client_picture = $picture_path;
            }

            // Store organization logo
            if ($request->hasFile('organization_logo')) {
                if ($object->organization_logo && Storage::disk('public')->exists($object->organization_logo)) {
                    Storage::disk('public')->delete($object->organization_logo);
                }
                $file = $request->file('organization_logo');
                $filename = Str::uuid() . '.webp';
                $logo_path = 'uploads/organization-logo/' . $filename;
                $img = Image::read($file);
                $img->scale(width: 300);
                Storage::disk('public')->put($logo_path, $img->toWebp(80));
                $object->organization_logo = $logo_path;
            }

            // Save client info in DB
            $object->fill([
                'client_name' => $request->client_name,
                'client_email' => $request->client_email,
                'client_mobile' => $request->client_mobile,
                'client_designation' => $request->client_designation,
                'client_organization' => $request->client_organization,
                'client_address' => $request->client_address,
                'organization_website' => $request->organization_website,
                'client_status' => $request->client_status,
            ]);
            $object->save();
            $this->logUserActivity('Client', 'Existing record updated');
            return back()->with('success', 'Client info updated');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    /**
     * Delete an existing client info from storage.
     *
     * @param string $client_id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function delete($client_id): RedirectResponse
    {
        try {
            $object = ClientInfo::findOrFail($client_id);
            if ($object->client_picture != null && Storage::disk('public')->exists($object->client_picture)) {
                Storage::disk('public')->delete($object->client_picture);
            }
            if ($object->organization_logo != null && Storage::disk('public')->exists($object->organization_logo)) {
                Storage::disk('public')->delete($object->organization_logo);
            }
            $object->delete();
            $this->logUserActivity('Client', 'Existing record deleted');
            return back()->with('success', 'Client info deleted');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong']);
        }
    }

    /**
     * Update the sequence of multiple client info records
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
                ClientInfo::where('id', $item['id'])->update(['client_sequence' => $item['sequence']]);
            }
            return response()->json(['status' => 'success']);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['status' => 'error']);
        }
    }
}
