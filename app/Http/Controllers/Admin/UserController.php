<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use App\Services\User\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct(
        private readonly UserService $user_service
    ) {}

    /**
     * Display the listing of users.
     */
    public function view(): View
    {
        return view(
            'admin.pages.management.user',
            [
                'user_list' => $this->user_service->listAll(),
            ]
        );
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  StoreUserRequest  $request  Validated payload
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        $this->user_service->store($request);

        return back()->with('success', 'A new user created. User will get an email to set password.');
    }

    /**
     * Get a user by id.
     */
    public function edit(string $user_id): JsonResponse
    {
        return response()->json($this->user_service->find($user_id));
    }

    /**
     * Update an existing user in storage.
     *
     * @param  UpdateUserRequest  $request  Validated payload
     */
    public function update(UpdateUserRequest $request): RedirectResponse
    {
        $this->user_service->update($request);

        return back()->with('success', 'User updated successfully.');
    }

    /**
     * Delete an existing user from storage.
     */
    public function delete(string $user_id): RedirectResponse
    {
        $this->user_service->delete($user_id);

        return back()->with('success', 'User deleted successfully.');
    }
}
