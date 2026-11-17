<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Account\UpdatePasswordRequest;
use App\Http\Requests\Admin\Account\UpdateProfileRequest;
use App\Services\User\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function __construct(
        private readonly UserService $user_service
    ) {}

    /**
     * Update the signed-in admin's own names and picture from the topbar modal.
     *
     * The request never carries an email, so the address cannot be changed
     * here even if one is posted. The picture goes through the same storage
     * path the user management screen uses (public disk, 300px wide WebP).
     */
    public function updateProfile(UpdateProfileRequest $request): JsonResponse
    {
        $user = $request->user();

        if ($request->hasFile('profile_picture')) {
            // Store first: a failed conversion must not cost the current picture.
            $stored = $this->user_service->storePicture($request->file('profile_picture'));
            $this->user_service->deletePicture($user);
            $user->profile_picture = $stored;
        } elseif ($request->boolean('remove_profile_picture')) {
            // Drop the file and fall back to the default avatar.
            $this->user_service->deletePicture($user);
            $user->profile_picture = null;
        }

        $user->fill($request->profile())->save();

        return response()->json([
            'message' => 'Your profile has been updated.',
            'user' => [
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'full_name' => $user->full_name,
                'profile_picture_url' => $user->profile_picture_url,
                'has_picture' => filled($user->profile_picture),
            ],
        ]);
    }

    /**
     * Change the signed-in admin's password after the current one is verified.
     */
    public function updatePassword(UpdatePasswordRequest $request): JsonResponse
    {
        $user = $request->user();
        $user->password = Hash::make((string) $request->input('password'));
        $user->save();

        return response()->json(['message' => 'Your password has been changed.']);
    }
}
