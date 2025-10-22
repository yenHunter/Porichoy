<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Rules\ReCaptcha;

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
                'email' => 'required',
                'password' => 'required',
                'g-recaptcha-response' => [new ReCaptcha()], // Validate reCAPTCHA
            ]);

            $user_info = User::where('email', $request->email)->first();

            if (!$user_info) {
                return back()->withErrors(['error' => 'User not found'])->withInput();
            }

            // Login Attempt
            if ($user_info->status === 1) {
                if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
                    return redirect('home');
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
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|unique:users|email',
                'password' => 'required|confirmed',
                'g-recaptcha-response' => [new ReCaptcha()], // Validate reCAPTCHA
            ]);

            // Save user info in DB
            $object = new User();
            $object->first_name = $request->first_name;
            $object->last_name = $request->last_name;
            $object->email = $request->email;
            $object->password = Hash::make($request->password);
            $object->profile_picture = 'admin/images/cj-logo.png';
            $object->status = 0;
            $object->save();
            return redirect('login')->withErrors(['error' => 'Please contact admin for activation']);
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
}
