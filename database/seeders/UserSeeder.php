<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Creates the Super Admin with a secure, RANDOM password.
     * The generated password is printed once to the console output —
     * copy it immediately and change it after first sign-in. It is not
     * recoverable anywhere else (re-seeding generates a different one).
     */
    public function run(): void
    {
        // Re-running the seeder must not silently create a second super admin.
        if (User::where('email', 'admin@yenhunter.com')->exists()) {
            $this->command?->warn('Super Admin already exists — skipping creation (no new password generated).');

            return;
        }

        $randomPassword = 'P.' . Str::random(28); // ≥30 chars, passes any sensible policy

        $user_info = new User();
        $user_info->first_name = 'Super';
        $user_info->last_name = 'Admin';
        $user_info->email = 'admin@yenhunter.com';
        $user_info->password = Hash::make($randomPassword);
        $user_info->profile_picture = 'static/logo.png';
        $user_info->user_status = 1;
        $user_info->save();

        $this->command?->alert('!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!');
        $this->command?->alert("SUPER ADMIN EMAIL: admin@yenhunter.com");
        $this->command?->alert("SUPER ADMIN PASSWORD (copy it NOW, shown once): {$randomPassword}");
        $this->command?->alert('!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!');
    }
}
