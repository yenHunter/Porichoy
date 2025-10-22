<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name'          => 'education',
                'title'         => 'Education',
                'description'   => 'This is education section',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => Carbon::now()->toDateTimeString(),
                'updated_at'    => Carbon::now()->toDateTimeString()
            ],
            [
                'name'          => 'experience',
                'title'         => 'Experience',
                'description'   => 'This is experience section',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => Carbon::now()->toDateTimeString(),
                'updated_at'    => Carbon::now()->toDateTimeString()
            ],
            [
                'name'          => 'research',
                'title'         => 'Research',
                'description'   => 'This is research section',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => Carbon::now()->toDateTimeString(),
                'updated_at'    => Carbon::now()->toDateTimeString()
            ],
            [
                'name'          => 'training',
                'title'         => 'Training',
                'description'   => 'This is training section',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => Carbon::now()->toDateTimeString(),
                'updated_at'    => Carbon::now()->toDateTimeString()
            ],
            [
                'name'          => 'user',
                'title'         => 'User',
                'description'   => 'This is user section',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => Carbon::now()->toDateTimeString(),
                'updated_at'    => Carbon::now()->toDateTimeString()
            ],
        ];
        Module::insert($data);
    }
}
