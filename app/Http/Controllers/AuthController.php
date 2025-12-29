<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\ReCaptcha;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    /**
     * Show the login page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function login_view(): View
    {
        return view(
            'admin.auth.page-login'
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
            'admin.auth.page-register'
        );
    }

    /**
     * Attempt to login to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Throwable
     */
    public function login(Request $request): RedirectResponse
    {
        try {
            // Validation
            $request->validate([
                'email'                 => 'required',
                'password'              => 'required',
                'g-recaptcha-response'  => [new ReCaptcha()], // Validate reCAPTCHA
            ]);

            $user_info = User::where('email', $request->email)->first();

            if (!$user_info) {
                return back()->withErrors(['error' => 'User not found'])->withInput();
            }

            // Login Attempt
            if ($user_info->status === 1) {
                if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
                    return redirect()->intended('home');
                }
                return back()->withErrors(['error' => 'Password incorrect'])->withInput();
            }

            return back()->withErrors(['error' => 'User not activated'])->withInput();
        } catch (\Throwable $th) {
            return back()->withErrors(['error' => $th->getMessage()]);
        }
    }

    /**
     * Attempt to register a user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Throwable
     */
    public function register(Request $request): RedirectResponse
    {
        try {
            // Validation
            $request->validate([
                'first_name'                => 'required',
                'last_name'                 => 'required',
                'email'                     => 'required|unique:users|email',
                'password'                  => 'required|confirmed',
                'g-recaptcha-response'      => [new ReCaptcha()], // Validate reCAPTCHA
            ]);

            // Save user info in DB
            $object = new User();
            $object->first_name = $request->first_name;
            $object->last_name = $request->last_name;
            $object->email = $request->email;
            $object->password = Hash::make($request->password);
            $object->status = 0;
            $object->save();
            return redirect('login')->withErrors(['error' => 'Please contact admin for activation']);
        } catch (\Throwable $th) {
            return back()->withErrors(['error' => $th->getMessage()])->withInput();
        }
    }

    /**
     * Forgot password view
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function forgot_password_view(): View
    {
        return view(
            'admin.auth.forgot-password'
        );
    }

    /**
     * Forgot password.
     *
     * This endpoint is used to send a password reset link to a user.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Throwable
     */
    public function forgot_password(Request $request): RedirectResponse
    {
        try {
            $request->validate(['email' => 'required|email']);

            $status = Password::sendResetLink(
                $request->only('email')
            );

            return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)])->withInput();
        } catch (\Throwable $th) {
            return back()->withErrors(['error' => $th->getMessage()])->withInput();
        }
    }

    /**
     * Show the reset password page.
     *
     * @param string $token The password reset token.
     * @return \Illuminate\Contracts\View\View
     */
    public function reset_password_view($token): View
    {
        return view('admin.auth.reset-password', ['token' => $token]);
    }

    /**
     * Resets the password for a user.
     *
     * This endpoint is used to reset a user's password.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Throwable
     */
    public function reset_password(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'token'         => 'required',
                'email'         => 'required|email',
                'password'      => 'required|confirmed',
            ]);

            $status = Password::reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($user, $password) {
                    $user->password = Hash::make($password);
                    $user->save();
                }
            );

            return $status === Password::PASSWORD_RESET
                ? redirect()->route('login.view')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
        } catch (\Throwable $th) {
            return back()->withErrors(['error' => $th->getMessage()])->withInput();
        }
    }

    /**
     * Logs a user out of the system.
     *
     * This endpoint is used to log a user out of the system.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }

    /**
     * Locks the user's session.
     *
     * This endpoint is used to lock a user's session. When a user's session is locked,
     * they will be redirected to the lock screen page where they will need to enter
     * their password to unlock their session.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function session_lock(): View
    {
        session(['locked' => true]);
        return view(
            'admin.auth.lock-screen',
            [
                'user_info' => Auth::user()
            ]
        );
    }

    /**
     * Unlocks a user's session.
     *
     * This endpoint is used to unlock a user's session. When a user's session is unlocked,
     * they will be redirected to the home page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function session_unlock(Request $request): RedirectResponse
    {
        try {
            // Validation
            $request->validate([
                'password'              => 'required',
                'g-recaptcha-response'  => [new ReCaptcha()], // Validate reCAPTCHA
            ]);

            $user = Auth::user();

            if (Hash::check($request->password, $user->password)) {
                session()->forget('locked');
                return redirect()->intended('home');
            }

            return back()->withErrors(['password' => 'Incorrect password']);
        } catch (\Throwable $th) {
            return back()->withErrors(['error' => $th->getMessage()])->withInput();
        }
    }
}
