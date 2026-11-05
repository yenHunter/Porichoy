<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Http\Requests\Auth\UnlockScreenRequest;
use App\Services\Auth\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function __construct(
        private readonly AuthService $auth_service
    ) {}

    /**
     * Show the login page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function login_view(): View
    {
        return view(
            'admin.auth.sign-in'
        );
    }

    /**
     * Show the registration page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function register_view(): View
    {
        return view(
            'admin.auth.sign-up'
        );
    }

    /**
     * Attempt to log in.
     *
     * @param  LoginRequest  $request  Validated login credentials
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $error = $this->auth_service->login($request);

        if ($error !== null) {
            return back()->withErrors(['error' => $error])->withInput();
        }

        return redirect()->intended('home');
    }

    /**
     * Register a new, inactive account.
     *
     * @param  RegisterRequest  $request  Validated registration data
     */
    public function register(RegisterRequest $request): RedirectResponse
    {
        return $this->auth_service->register($request);
    }

    /**
     * Show the forgot-password page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function forgot_password_view(): View
    {
        return view(
            'admin.auth.reset-pass'
        );
    }

    /**
     * Send a password-reset link.
     *
     * @param  ForgotPasswordRequest  $request  Validated e-mail
     */
    public function forgot_password(ForgotPasswordRequest $request): RedirectResponse
    {
        $status = $this->auth_service->sendResetLink($request);

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)])->withInput();
    }

    /**
     * Show the reset-password page (accessed via e-mail link).
     *
     * @param  string  $token  The password reset token.
     * @return \Illuminate\Contracts\View\View
     */
    public function reset_password_view(string $token): View
    {
        return view('admin.auth.new-pass', ['token' => $token]);
    }

    /**
     * Reset a password using a token from the reset e-mail.
     *
     * @param  ResetPasswordRequest  $request  Validated reset payload
     */
    public function reset_password(ResetPasswordRequest $request): RedirectResponse
    {
        $status = $this->auth_service->resetPassword($request);

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    /**
     * Logs the user out.
     */
    public function logout(): RedirectResponse
    {
        Session::flush();
        auth()->logout();

        return redirect()->route('login');
    }

    /**
     * Locks the session and shows the lock screen.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function session_lock(): View
    {
        session(['locked' => true]);

        return view(
            'admin.auth.lock-screen',
            [
                'user_info' => auth()->user(),
            ]
        );
    }

    /**
     * Unlocks a locked session.
     *
     * @param  UnlockScreenRequest  $request  Validated unlock password
     */
    public function session_unlock(UnlockScreenRequest $request): RedirectResponse
    {
        if ($this->auth_service->unlock($request)) {
            session()->forget('locked');

            return redirect()->route('home');
        }

        return back()->withErrors(['password' => 'Incorrect password']);
    }
}
