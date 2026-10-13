<?php

namespace App\Services\User;

use Illuminate\Support\Str;
use App\Traits\UserLogTrait;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Password;
use Intervention\Image\Laravel\Facades\Image;
use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;

class UserService
{
    use UserLogTrait;

    /**
     * Profile picture storage directory (on the 'public' disk).
     */
    private const PICTURE_DIR = 'uploads/users';

    /**
     * List users for the admin page (super admin id=1 is hidden).
     *
     * @return \Illuminate\Database\Eloquent\Collection<int, User>
     */
    public function listAll(): \Illuminate\Database\Eloquent\Collection
    {
        return User::whereNot('id', 1)->get();
    }

    /**
     * Store a newly created user (inactive; auto-random password) and send
     * the welcome/set-password notification.
     *
     * @param  StoreUserRequest $request  Validated payload
     * @return User                       The created model
     */
    public function store(StoreUserRequest $request): User
    {
        $user = new User();
        $user->fill([
            'first_name'      => $request->first_name,
            'last_name'       => $request->last_name,
            'email'           => $request->email,
            'password'        => Hash::make(Str::random(20)),
            'profile_picture' => $this->storePicture($request),
            'user_status'     => $request->user_status ?? false,
        ]);
        $user->save();

        // Send the "set your password" link.
        $token = Password::createToken($user);
        $user->sendWelcomeNotification($token);

        $this->logUserActivity('User', 'New user created: ' . $request->email);

        return $user;
    }

    /**
     * Find a user by id (404 when absent).
     *
     * @param  string $user_id
     * @return User
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function find(string $user_id): User
    {
        return User::findOrFail($user_id);
    }

    /**
     * Update an existing user (and replace the picture when given).
     *
     * @param  UpdateUserRequest $request  Validated payload
     * @return User                        The updated model
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function update(UpdateUserRequest $request): User
    {
        $user = User::findOrFail($request->user_id);

        $picture = $user->profile_picture;
        if ($request->hasFile('profile_picture')) {
            $this->deletePicture($user);
            $picture = $this->storePicture($request);
        }

        $user->fill([
            'first_name'      => $request->first_name,
            'last_name'       => $request->last_name,
            'email'           => $request->email,
            'profile_picture' => $picture,
            'user_status'     => $request->user_status ?? false,
        ]);
        $user->save();

        $this->logUserActivity('User', 'User updated: ' . $request->email);

        return $user;
    }

    /**
     * Delete a user (and its stored picture).
     *
     * @param  string $user_id
     * @return void
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function delete(string $user_id): void
    {
        $user = User::findOrFail($user_id);

        $this->deletePicture($user);

        $user->delete();

        $this->logUserActivity('User', 'User deleted: ' . $user->email);
    }

    /*
    |--------------------------------------------------------------------------
    | Internals
    |--------------------------------------------------------------------------
    */

    /**
     * Persist an uploaded profile picture (rescaled, re-coded as WebP).
     */
    private function storePicture(StoreUserRequest|UpdateUserRequest $request): ?string
    {
        if (!$request->hasFile('profile_picture')) {
            return null;
        }

        $file     = $request->file('profile_picture');
        $filename = Str::uuid() . '.webp';
        $path     = self::PICTURE_DIR . '/' . $filename;

        $image = Image::read($file);
        $image->scale(width: 300);

        Storage::disk('public')->put($path, $image->toWebp(80));

        return $path;
    }

    /**
     * Remove a stored picture from disk (silently no-ops when absent).
     */
    private function deletePicture(User $user): void
    {
        if ($user->profile_picture && Storage::disk('public')->exists($user->profile_picture)) {
            Storage::disk('public')->delete($user->profile_picture);
        }
    }
}
