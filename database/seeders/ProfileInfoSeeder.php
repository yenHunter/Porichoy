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
            ['column_title' => 'First Name', 'column_name' => 'first_name', 'column_value' => 'Mohammed'],
            ['column_title' => 'Last Name', 'column_name' => 'last_name', 'column_value' => 'Shahabuddin'],
            ['column_title' => 'Professional Headline', 'column_name' => 'headline', 'column_value' => 'President of Bangladesh'],
            ['column_title' => 'Designation', 'column_name' => 'designation', 'column_value' => 'President'],
            ['column_title' => 'Organization', 'column_name' => 'organization', 'column_value' => 'Government of Bangladesh'],
            ['column_title' => 'Email Address', 'column_name' => 'email', 'column_value' => 'president@bangabhaban.gov.bd'],
            ['column_title' => 'Phone Number', 'column_name' => 'phone', 'column_value' => '+880123456789'],
            ['column_title' => 'Website', 'column_name' => 'website', 'column_value' => 'https://bangabhaban.gov.bd/'],
            ['column_title' => 'Profile Picture', 'column_name' => 'profile_picture', 'column_value' => 'static/profile.png'],
            ['column_title' => 'Country Flag', 'column_name' => 'country_flag', 'column_value' => 'images/flags/bd.svg'],
            ['column_title' => 'Bio', 'column_name' => 'bio', 'column_value' => "I'm the President of Bangladesh, dedicated to serving my country and its people. With a background in law and politics, I have been committed to promoting democracy, economic development, and social welfare. I strive to foster unity and progress for all citizens of Bangladesh."],
        ];

        // Personal Information
        $personalInfoData = [
            ['column_title' => "Father's Name", 'column_name' => 'father_name', 'column_value' => 'Shahabuddin Ansari'],
            ['column_title' => "Mother's Name", 'column_name' => 'mother_name', 'column_value' => 'Khairun Nesa'],
            ['column_title' => 'Date of Birth', 'column_name' => 'date_of_birth', 'column_value' => '1949-12-10'],
            ['column_title' => 'Nationality', 'column_name' => 'nationality', 'column_value' => 'Bangladesh'],
            ['column_title' => 'Gender', 'column_name' => 'gender', 'column_value' => 'Male'],
            ['column_title' => 'Marital Status', 'column_name' => 'marital_status', 'column_value' => 'Married'],
            ['column_title' => 'Spouse Name', 'column_name' => 'spouse_name', 'column_value' => 'Dr. Rebecca Sultana'],
            ['column_title' => 'Languages', 'column_name' => 'languages', 'column_value' => 'English, Bengali'],
        ];

        // Address Information
        $addressInfoData = [
            ['column_title' => 'Street Address', 'column_name' => 'street_address', 'column_value' => "President's Office, Bangabhaban"],
            ['column_title' => 'City', 'column_name' => 'city', 'column_value' => 'Dhaka'],
            ['column_title' => 'State/Province', 'column_name' => 'state_province', 'column_value' => 'Dhaka'],
            ['column_title' => 'Postal Code', 'column_name' => 'postal_code', 'column_value' => '1205'],
            ['column_title' => 'Country', 'column_name' => 'country', 'column_value' => 'Bangladesh'],
        ];

        // Social Links
        $socialInfoData = [
            ['column_title' => 'LinkedIn', 'column_name' => 'linkedin', 'column_value' => 'https://linkedin.com/in/mohammed-shahabuddin'],
            ['column_title' => 'GitHub', 'column_name' => 'github', 'column_value' => 'https://github.com/mohammed-shahabuddin'],
            ['column_title' => 'Twitter', 'column_name' => 'twitter', 'column_value' => 'https://twitter.com/mohammed_shahabuddin'],
            ['column_title' => 'Instagram', 'column_name' => 'instagram', 'column_value' => 'https://instagram.com/mohammed_shahabuddin'],
            ['column_title' => 'Facebook', 'column_name' => 'facebook', 'column_value' => 'https://www.facebook.com/mohammed-shahabuddin/'],
            ['column_title' => 'YouTube', 'column_name' => 'youtube', 'column_value' => 'https://youtube.com/mohammed-shahabuddin'],
            ['column_title' => 'ResearchGate', 'column_name' => 'researchgate', 'column_value' => 'https://researchgate.net/profile/Mohammed_Shahabuddin'],
            ['column_title' => 'WhatsApp', 'column_name' => 'whatsapp', 'column_value' => 'https://wa.me/8801712345678'],
        ];

        DB::table('profile_infos')->truncate(); // Clear existing data

        // Insert data for each category
        foreach ($basicInfoData as $data) {
            DB::table('profile_infos')->insert(array_merge($data, [
                'use_for' => 'basic',
                'column_status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        foreach ($personalInfoData as $data) {
            DB::table('profile_infos')->insert(array_merge($data, [
                'use_for' => 'personal',
                'column_status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        foreach ($addressInfoData as $data) {
            DB::table('profile_infos')->insert(array_merge($data, [
                'use_for' => 'address',
                'column_status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        foreach ($socialInfoData as $data) {
            DB::table('profile_infos')->insert(array_merge($data, [
                'use_for' => 'social',
                'column_status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
