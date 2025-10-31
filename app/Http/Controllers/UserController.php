<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Module;
use App\Traits\UserLogTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    use UserLogTrait;
    public function user_view()
    {
        return view(
            'admin.pages.user',
            [
                'user_list'         => User::whereNot('id', 1)->get()
            ]
        );
    }

    public function user_store(Request $request)
    {
        try {
            // Validation
            $request->validate([
                'first_name'                => 'required',
                'last_name'                 => 'required',
                'email'                     => 'required|unique:users|email',
                'password'                  => 'required|confirmed',
                'profile_picture'           => 'image|mimes:jpeg,png,jpg,gif,webp|max:10240', // max size 10MB
            ]);

            // Store file in storage
            $path = 'admin/images/cj-logo.png';
            if ($request->hasFile('profile_picture')) {
                $file = $request->file('profile_picture');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/uploads/users', $filename); // stored in storage/app/public/uploads
                $path = 'uploads/users/' . $filename;
            }

            // Save user info in DB
            $object = new User();
            $object->first_name = $request->first_name;
            $object->last_name = $request->last_name;
            $object->email = $request->email;
            $object->password = Hash::make($request->password);
            $object->profile_picture = $path;
            $object->status = $request->status;
            $object->save();
            $this->log_user_activity('User', 'Created a new user: ' . $request->email);
            return back()->with('success', 'User created');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong']);
        }
    }

    public function user_update(Request $request)
    {
        try {
            // Validation
            $request->validate([
                'first_name'                    => 'required',
                'last_name'                     => 'required',
                'email'                         => 'required|email',
                'password'                      => 'confirmed',
                'profile_picture'               => 'image|mimes:jpeg,png,jpg,gif,webp|max:10240', // max size 10MB
            ]);

            $object = User::where('id', $request->user_id)->first();
            // Store file in storage
            $path = $object->profile_picture;
            if ($request->hasFile('profile_picture')) {
                if ($path !== 'cj-logo.png' && Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                }
                $file = $request->file('profile_picture');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/uploads/users', $filename); // stored in storage/app/public/uploads
                $path = 'uploads/users/' . $filename;
            }

            // Save user info in DB
            $object->first_name = $request->first_name;
            $object->last_name = $request->last_name;
            $object->email = $request->email;
            $object->password = Hash::make($request->password);
            $object->profile_picture = $path;
            $object->status = $request->status;
            $object->save();
            $this->log_user_activity('User', 'Updated user for: ' . $request->email);
            return back()->with('success', 'User updated');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong']);
        }
    }

    public function user_delete($user_id)
    {
        try {
            $object = User::where('id', $user_id)->first();
            if ($object->profile_picture !== 'cj-logo.png' && Storage::disk('public')->exists($object->profile_picture)) {
                Storage::disk('public')->delete($object->profile_picture);
            }
            $object->delete();
            $this->log_user_activity('User', 'Updated user for: ' . $object->email);
            return back()->with('success', 'User removed');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->withErrors(['error' => 'Something went wrong']);
        }
    }

    public function profile_view()
    {
        return view(
            'admin.pages.profile'
        );
    }
}
