<?php

namespace Database\Seeders;

use App\Models\ColumnSettings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ColumnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'module'            => 'education',
                'column_title'      => 'Degree',
                'column_name'       => 'degree',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'education',
                'column_title'      => 'Subject',
                'column_name'       => 'subject',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'education',
                'column_title'      => 'Institute',
                'column_name'       => 'institute',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'education',
                'column_title'      => 'Institute Logo',
                'column_name'       => 'institute_logo',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'education',
                'column_title'      => 'Institute Address',
                'column_name'       => 'institute_address',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'education',
                'column_title'      => 'Start Date',
                'column_name'       => 'start_date',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'education',
                'column_title'      => 'End Date',
                'column_name'       => 'end_date',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'education',
                'column_title'      => 'Result',
                'column_name'       => 'result',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'education',
                'column_title'      => 'Education Details',
                'column_name'       => 'education_details',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'experience',
                'column_title'      => 'Position',
                'column_name'       => 'position',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'experience',
                'column_title'      => 'Employment Type',
                'column_name'       => 'employment_type',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'experience',
                'column_title'      => 'Department',
                'column_name'       => 'department',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'experience',
                'column_title'      => 'Organization',
                'column_name'       => 'organization',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'experience',
                'column_title'      => 'Organization Logo',
                'column_name'       => 'organization_logo',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'experience',
                'column_title'      => 'Organization Address',
                'column_name'       => 'organization_address',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'experience',
                'column_title'      => 'Start Date',
                'column_name'       => 'start_date',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'experience',
                'column_title'      => 'End Date',
                'column_name'       => 'end_date',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'experience',
                'column_title'      => 'Location Type',
                'column_name'       => 'location_type',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'experience',
                'column_title'      => 'Experience Details',
                'column_name'       => 'experience_details',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'research',
                'column_title'      => 'Source',
                'column_name'       => 'source',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'research',
                'column_title'      => 'Category',
                'column_name'       => 'category',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'research',
                'column_title'      => 'Title',
                'column_name'       => 'title',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'research',
                'column_title'      => 'Published',
                'column_name'       => 'published',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'research',
                'column_title'      => 'Role',
                'column_name'       => 'role',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'research',
                'column_title'      => 'Authors',
                'column_name'       => 'authors',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'research',
                'column_title'      => 'Link',
                'column_name'       => 'link',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'training',
                'column_title'      => 'Title',
                'column_name'       => 'title',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'training',
                'column_title'      => 'Category',
                'column_name'       => 'category_id',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'training',
                'column_title'      => 'Institute',
                'column_name'       => 'institute',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'training',
                'column_title'      => 'Start Date',
                'column_name'       => 'start_date',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'training',
                'column_title'      => 'Start Date',
                'column_name'       => 'start_date',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'training',
                'column_title'      => 'End Date',
                'column_name'       => 'end_date',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'training',
                'column_title'      => 'Location',
                'column_name'       => 'location',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'training',
                'column_title'      => 'Certificate',
                'column_name'       => 'certificate',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'research_source',
                'column_title'      => 'Title',
                'column_name'       => 'value',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'module'            => 'research_source',
                'column_title'      => 'Image',
                'column_name'       => 'details',
                'visibility'        => true,
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
        ];

        // Create Education Settings
        ColumnSettings::insert($data);
    }
}
