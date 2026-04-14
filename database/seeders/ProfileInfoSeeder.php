<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Basic Information
        $basicInfoData = [
            ['column_title' => 'Full Name', 'column_name' => 'full_name', 'column_value' => 'Jashim Uddin'],
            ['column_title' => 'Professional Headline', 'column_name' => 'headline', 'column_value' => 'UI/UX Designer & Full-Stack Developer'],
            ['column_title' => 'Email Address', 'column_name' => 'email', 'column_value' => 'hello@example.com'],
            ['column_title' => 'Phone Number', 'column_name' => 'phone', 'column_value' => '+1-123-456-7890'],
            ['column_title' => 'Website', 'column_name' => 'website', 'column_value' => 'https://www.example.dev'],
        ];

        // Personal Information
        $personalInfoData = [
            ['column_title' => 'Date of Birth', 'column_name' => 'date_of_birth', 'column_value' => '1990-05-15'],
            ['column_title' => 'Nationality', 'column_name' => 'nationality', 'column_value' => 'Bangladesh'],
            ['column_title' => 'Languages', 'column_name' => 'languages', 'column_value' => 'English, Bengali, Hindi'],
            ['column_title' => 'Bio', 'column_name' => 'bio', 'column_value' => 'I\'m an experienced UI/UX designer and full-stack developer passionate about creating beautiful and functional digital experiences.'],
        ];

        // Address Information
        $addressInfoData = [
            ['column_title' => 'Street Address', 'column_name' => 'street_address', 'column_value' => '123 Main Street'],
            ['column_title' => 'City', 'column_name' => 'city', 'column_value' => 'San Francisco'],
            ['column_title' => 'State/Province', 'column_name' => 'state_province', 'column_value' => 'California'],
            ['column_title' => 'Postal Code', 'column_name' => 'postal_code', 'column_value' => '94102'],
            ['column_title' => 'Country', 'column_name' => 'country', 'column_value' => 'United States'],
        ];

        // Social Links
        $socialInfoData = [
            ['column_title' => 'LinkedIn', 'column_name' => 'linkedin', 'column_value' => 'https://linkedin.com/in/jashim-uddin'],
            ['column_title' => 'GitHub', 'column_name' => 'github', 'column_value' => 'https://github.com/jashim-uddin'],
            ['column_title' => 'Twitter', 'column_name' => 'twitter', 'column_value' => 'https://twitter.com/jashim_uddin'],
            ['column_title' => 'Instagram', 'column_name' => 'instagram', 'column_value' => 'https://instagram.com/jashim_uddin'],
            ['column_title' => 'Facebook', 'column_name' => 'facebook', 'column_value' => 'https://facebook.com/jashim.uddin'],
            ['column_title' => 'Dribbble', 'column_name' => 'dribbble', 'column_value' => 'https://dribbble.com/jashim-uddin'],
        ];

        // Insert data for each category
        foreach ($basicInfoData as $data) {
            DB::table('profile_infos')->insert(array_merge($data, [
                'use_for' => 'basic',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        foreach ($personalInfoData as $data) {
            DB::table('profile_infos')->insert(array_merge($data, [
                'use_for' => 'personal',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        foreach ($addressInfoData as $data) {
            DB::table('profile_infos')->insert(array_merge($data, [
                'use_for' => 'address',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        foreach ($socialInfoData as $data) {
            DB::table('profile_infos')->insert(array_merge($data, [
                'use_for' => 'social',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
