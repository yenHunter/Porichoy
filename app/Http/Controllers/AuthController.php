<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\ReCaptcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    public function login_view()
    {
        return view(
            'admin.auth.page-login'
        );
    }

    public function register_view()
    {
        return view(
            'admin.auth.page-register'
        );
    }

    public function login(Request $request)
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

    public function register(Request $request)
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

    public function forgot_password_view()
    {
        return view(
            'admin.auth.forgot-password'
        );
    }

    public function forgot_password(Request $request)
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

    public function reset_password_view($token)
    {
        return view('admin.auth.reset-password', ['token' => $token]);
    }

    public function reset_password(Request $request)
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

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }

    public function session_lock()
    {
        session(['locked' => true]);
        return view(
            'admin.auth.lock-screen',
            [
                'user_info' => Auth::user()
            ]
        );
    }

    public function session_unlock(Request $request)
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
