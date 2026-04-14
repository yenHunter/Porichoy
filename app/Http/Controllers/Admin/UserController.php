<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Module;
use App\Traits\UserLogTrait;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Intervention\Image\Laravel\Facades\Image;

class UserController extends Controller
{
    use UserLogTrait;

    /**
     * Display the listing of users
     *
     * @return \Illuminate\View\View
     */
    public function view(): View
    {
        try {
            return view(
                'admin.pages.management.user',
                [
                    'user_list' => User::whereNot('id', 1)->get()
                ]
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return view('admin.error.404');
        }
    }

    /**
     * Store a newly created user in storage.
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
                'first_name'            => 'required|string|max:255',
                'last_name'             => 'required|string|max:255',
                'email'                 => 'required|unique:users|email',
                'profile_picture'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
                'user_status'           => 'nullable|boolean',
            ]);

            // Store file in storage
            $path = null;
            if ($request->hasFile('profile_picture')) {
                $file = $request->file('profile_picture');
                $filename = Str::uuid() . '.webp';
                $path = 'uploads/users/' . $filename;
                $img = Image::read($file);
                $img->scale(width: 300);
                Storage::disk('public')->put($path, $img->toWebp(80));
            }

            // Save user info in DB
            $user = new User();
            $user->fill([
                'first_name'            => $request->first_name,
                'last_name'             => $request->last_name,
                'email'                 => $request->email,
                'password'              => Hash::make(Str::random(20)),
                'profile_picture'       => $path,
                'user_status'           => $request->user_status ?? false,
            ]);
            $user->save();

            // Create password reset token and send welcome notification
            $token = Password::createToken($user);
            $user->sendWelcomeNotification($token);

            $this->logUserActivity('User', 'New user created: ' . $request->email);
            return back()->with('success', 'A new user created. User will get an email to set password.');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    /**
     * Get a user by id
     *
     * @param int $user_id User id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function edit($user_id): JsonResponse
    {
        try {
            return response()->json(User::findOrFail($user_id));
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['error' => 'Something went wrong'], 404);
        }
    }

    /**
     * Update an existing user in storage.
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
                'user_id'               => 'required|exists:users,id',
                'first_name'            => 'required|string|max:255',
                'last_name'             => 'required|string|max:255',
                'email'                 => 'required|email',
                'profile_picture'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
                'user_status'           => 'nullable|boolean',
            ]);

            $user = User::findOrFail($request->user_id);
            $path = $user->profile_picture;

            // Store file in storage
            if ($request->hasFile('profile_picture')) {
                if ($user->profile_picture && Storage::disk('public')->exists($user->profile_picture)) {
                    Storage::disk('public')->delete($user->profile_picture);
                }
                $file = $request->file('profile_picture');
                $filename = Str::uuid() . '.webp';
                $path = 'uploads/users/' . $filename;
                $img = Image::read($file);
                $img->scale(width: 300);
                Storage::disk('public')->put($path, $img->toWebp(80));
            }

            // Save user info in DB
            $user->fill([
                'first_name'            => $request->first_name,
                'last_name'             => $request->last_name,
                'email'                 => $request->email,
                'profile_picture'       => $path,
                'user_status'           => $request->user_status ?? false,
            ]);
            $user->save();
            $this->logUserActivity('User', 'User updated: ' . $request->email);
            return back()->with('success', 'User updated successfully.');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    /**
     * Delete an existing user from storage.
     *
     * @param int $user_id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function delete($user_id): RedirectResponse
    {
        try {
            $user = User::findOrFail($user_id);
            if ($user->profile_picture && Storage::disk('public')->exists($user->profile_picture)) {
                Storage::disk('public')->delete($user->profile_picture);
            }
            $user->delete();
            $this->logUserActivity('User', 'User deleted: ' . $user->email);
            return back()->with('success', 'User deleted successfully.');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong']);
        }
    }
}
