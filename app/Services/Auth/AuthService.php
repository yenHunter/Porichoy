<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\UnlockScreenRequest;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Http\Requests\Auth\ForgotPasswordRequest;

class AuthService
{
    /**
     * Error meaning: the e-mail does not belong to a registered user.
     */
    public const ERR_UNKNOWN_USER = 'User not found';

    /**
     * Error meaning: credentials do not match an existing user.
     */
    public const ERR_BAD_PASSWORD = 'Password incorrect';

    /**
     * Error meaning: the account exists but has not been activated yet.
     */
    public const ERR_NOT_ACTIVATED = 'User not activated';

    /**
     * Attempt to authenticate the incoming credentials.
     *
     * Returns null on success (the user is now signed in), or a
     * self-descriptive error key on failure.
     *
     * @param  LoginRequest          $request  Validated credentials
     * @return string|null                     Error key, or null on success
     */
    public function login(LoginRequest $request): ?string
    {
        $user = User::where('email', $request->input('email'))->first();

        if (!$user) {
            return self::ERR_UNKNOWN_USER;
        }

        if ($user->user_status !== true) {
            return self::ERR_NOT_ACTIVATED;
        }

        if (!Auth::attempt(
            $request->only('email', 'password'),
            $request->boolean('remember')
        )) {
            return self::ERR_BAD_PASSWORD;
        }

        return null;
    }

    /**
     * Register a new, inactive user awaiting admin approval.
     *
     * @param  RegisterRequest $request      Validated registration data
     * @return Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function register(RegisterRequest $request): RedirectResponse
    {
        $user = new User();
        $user->fill($request->safe()->only(['first_name', 'last_name', 'email']));
        $user->password = Hash::make($request->input('password'));
        $user->user_status = false; // pending admin activation
        $user->save();

        return redirect()->route('login.view')
            ->withErrors(['error' => 'Please contact admin for activation']);
    }

    /**
     * Send a password-reset link for the given e-mail address.
     *
     * Returns the Password-broker status string (RESET_LINK_SENT or a
     * USER_* error constant) for the controller to translate and flash.
     *
     * @param  ForgotPasswordRequest $request  Validated e-mail
     * @return string                         Password-broker status
     */
    public function sendResetLink(ForgotPasswordRequest $request): string
    {
        return Password::sendResetLink(
            $request->only('email')
        );
    }

    /**
     * Reset a password using the token from the reset e-mail.
     *
     * Returns the Password-broker status string (PASSWORD_RESET or a
     * PASSWORD_* error constant) for the controller to translate and flash.
     *
     * @param  ResetPasswordRequest $request  Validated reset payload
     * @return string                        Password-broker status
     */
    public function resetPassword(ResetPasswordRequest $request): string
    {
        return Password::reset(
            $request->credentials(),
            function (User $user, string $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );
    }

    /**
     * Unlock the currently signed-in user's locked session.
     *
     * Returns true on success (the session is unlocked), or false when the
     * password check fails.
     *
     * @param  UnlockScreenRequest $request  Validated unlock password
     * @return bool                        True when unlocked
     */
    public function unlock(UnlockScreenRequest $request): bool
    {
        return Hash::check(
            $request->input('password'),
            auth()->user()->password
        );
    }
}
