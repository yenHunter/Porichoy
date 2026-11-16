<?php

namespace Database\Seeders;

use App\Models\SelectType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class SelectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'use_for' => SelectType::EMPLOYMENT_TYPE,
                'value' => 'Full-time',
                'details' => null,
                'status' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'use_for' => SelectType::EMPLOYMENT_TYPE,
                'value' => 'Part-time',
                'details' => null,
                'status' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'use_for' => SelectType::EMPLOYMENT_TYPE,
                'value' => 'Self-employed',
                'details' => null,
                'status' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'use_for' => SelectType::EMPLOYMENT_TYPE,
                'value' => 'Freelancer',
                'details' => null,
                'status' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'use_for' => SelectType::EMPLOYMENT_TYPE,
                'value' => 'Contarct',
                'details' => null,
                'status' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'use_for' => SelectType::EMPLOYMENT_TYPE,
                'value' => 'Internship',
                'details' => null,
                'status' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'use_for' => SelectType::EMPLOYMENT_TYPE,
                'value' => 'Apprenticeship',
                'details' => null,
                'status' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'use_for' => SelectType::EMPLOYMENT_TYPE,
                'value' => 'Seasonal',
                'details' => null,
                'status' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'use_for' => SelectType::LOCATION_TYPE,
                'value' => 'On-site',
                'details' => null,
                'status' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'use_for' => SelectType::LOCATION_TYPE,
                'value' => 'Remote',
                'details' => null,
                'status' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'use_for' => SelectType::LOCATION_TYPE,
                'value' => 'Hybrid',
                'details' => null,
                'status' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'use_for' => SelectType::RESEARCH_SOURCE,
                'value' => 'Proceedings of the National Academy of Sciences',
                'details' => 'static/settings/research-source/proceedings-of-the-national-academy-of-sciences.png',
                'status' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'use_for' => SelectType::TRAINING_CATEGORY,
                'value' => 'Training Category 1',
                'details' => null,
                'status' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
        ];

        SelectType::insert($data);
    }
}
