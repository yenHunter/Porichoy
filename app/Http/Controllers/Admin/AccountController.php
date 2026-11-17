<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Account\UpdatePasswordRequest;
use App\Http\Requests\Admin\Account\UpdateProfileRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Update the signed-in admin's own names from the topbar modal.
     *
     * The request never carries an email, so the address cannot be changed
     * here even if one is posted.
     */
    public function updateProfile(UpdateProfileRequest $request): JsonResponse
    {
        $user = $request->user();
        $user->fill($request->profile())->save();

        return response()->json([
            'message' => 'Your profile has been updated.',
            'user' => [
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'full_name' => $user->full_name,
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
