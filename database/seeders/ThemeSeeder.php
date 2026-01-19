<?php

namespace Database\Seeders;

use App\Models\ThemeInfo;
use App\Models\SectionInfo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        ThemeInfo::truncate();
        SectionInfo::truncate();
        Schema::enableForeignKeyConstraints();

        $themeData = [
            [
                'title'         => 'Antux',
                'description'   => 'Antux – Personal Portfolio HTML Template',
                'version'       => 1.0,
                'resource_path' => 'views/visitor/antux',
                'preview_image' => 'visitor/antux/img/preview_image.jpg',
                'status'        => 1
            ],
            [
                'title'         => 'Dorbesh',
                'description'   => 'Dorbesh – Personal Portfolio HTML Template',
                'version'       => 1.0,
                'resource_path' => 'views/visitor/dorbesh',
                'preview_image' => 'visitor/dorbesh/images/preview_image.jpg',
                'status'        => 1
            ]
        ];

        foreach ($themeData as $item) {
            ThemeInfo::create($item);
        }
    }
}
