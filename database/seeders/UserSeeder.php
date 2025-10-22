<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_info = new User();
        $user_info->first_name = 'Cyberjatra';
        $user_info->last_name = 'Ltd.';
        $user_info->email = 'admin@cyberjatra.com';
        $user_info->password = Hash::make('Admin#123');
        $user_info->profile_picture = 'cj-logo.png';
        $user_info->status = 1;
        $user_info->save();
    }
}
