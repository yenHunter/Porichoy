<?php

namespace Database\Seeders;

use App\Models\SelectType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class SetectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'use_for'               => 'employment_type',
                'value'                 => 'Full-time',
                'details'               => null,
                'status'                => 1,
                'created_at'            => Carbon::now()->toDateTimeString(),
                'updated_at'            => Carbon::now()->toDateTimeString()
            ],
            [
                'use_for'               => 'employment_type',
                'value'                 => 'Part-time',
                'details'               => null,
                'status'                => 1,
                'created_at'            => Carbon::now()->toDateTimeString(),
                'updated_at'            => Carbon::now()->toDateTimeString()
            ],
            [
                'use_for'               => 'employment_type',
                'value'                 => 'Self-employed',
                'details'               => null,
                'status'                => 1,
                'created_at'            => Carbon::now()->toDateTimeString(),
                'updated_at'            => Carbon::now()->toDateTimeString()
            ],
            [
                'use_for'               => 'employment_type',
                'value'                 => 'Freelancer',
                'details'               => null,
                'status'                => 1,
                'created_at'            => Carbon::now()->toDateTimeString(),
                'updated_at'            => Carbon::now()->toDateTimeString()
            ],
            [
                'use_for'               => 'employment_type',
                'value'                 => 'Contarct',
                'details'               => null,
                'status'                => 1,
                'created_at'            => Carbon::now()->toDateTimeString(),
                'updated_at'            => Carbon::now()->toDateTimeString()
            ],
            [
                'use_for'               => 'employment_type',
                'value'                 => 'Internship',
                'details'               => null,
                'status'                => 1,
                'created_at'            => Carbon::now()->toDateTimeString(),
                'updated_at'            => Carbon::now()->toDateTimeString()
            ],
            [
                'use_for'               => 'employment_type',
                'value'                 => 'Apprenticeship',
                'details'               => null,
                'status'                => 1,
                'created_at'            => Carbon::now()->toDateTimeString(),
                'updated_at'            => Carbon::now()->toDateTimeString()
            ],
            [
                'use_for'               => 'employment_type',
                'value'                 => 'Seasonal',
                'details'               => null,
                'status'                => 1,
                'created_at'            => Carbon::now()->toDateTimeString(),
                'updated_at'            => Carbon::now()->toDateTimeString()
            ],
            [
                'use_for'               => 'location_type',
                'value'                 => 'On-site',
                'details'               => null,
                'status'                => 1,
                'created_at'            => Carbon::now()->toDateTimeString(),
                'updated_at'            => Carbon::now()->toDateTimeString()
            ],
            [
                'use_for'               => 'location_type',
                'value'                 => 'Remote',
                'details'               => null,
                'status'                => 1,
                'created_at'            => Carbon::now()->toDateTimeString(),
                'updated_at'            => Carbon::now()->toDateTimeString()
            ],
            [
                'use_for'               => 'location_type',
                'value'                 => 'Hybrid',
                'details'               => null,
                'status'                => 1,
                'created_at'            => Carbon::now()->toDateTimeString(),
                'updated_at'            => Carbon::now()->toDateTimeString()
            ],
            [
                'use_for'               => 'research_source',
                'value'                 => 'Proceedings of the National Academy of Sciences',
                'details'               => 'uploads/settings/research-source/1754808757.png',
                'status'                => 1,
                'created_at'            => Carbon::now()->toDateTimeString(),
                'updated_at'            => Carbon::now()->toDateTimeString()
            ],
            [
                'use_for'               => 'training_category',
                'value'                 => 'Training Category 1',
                'details'               => null,
                'status'                => 1,
                'created_at'            => Carbon::now()->toDateTimeString(),
                'updated_at'            => Carbon::now()->toDateTimeString()
            ],
        ];

        SelectType::insert($data);
    }
}
