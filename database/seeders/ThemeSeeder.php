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
        SectionInfo::truncate();
        ThemeInfo::truncate();
        Schema::enableForeignKeyConstraints();

        $themeData = [
            [
                'title'         => 'Antux',
                'description'   => 'Antux – Personal Portfolio HTML Template',
                'version'       => 1,
                'resource_path' => 'views/visitor/antux',
                'preview_image' => 'visitor/antux/img/preview_image.jpg'
            ],
            [
                'title'         => 'Dorbesh',
                'description'   => 'Dorbesh – Personal Portfolio HTML Template',
                'version'       => 1,
                'resource_path' => 'views/visitor/dorbesh',
                'preview_image' => 'visitor/dorbesh/images/preview_image.jpg'
            ]
        ];

        foreach ($themeData as $item) {
            ThemeInfo::create($item);
        }

        $sectionData = [
            // Antux Sections
            [
                'theme_id'      => 1,
                'title'         => "Banner",
                'description'   => "Banner section is to show user's basic information"
            ],
            [
                'theme_id'      => 1,
                'title'         => "About",
                'description'   => "About section is to show user's overview"
            ],
            [
                'theme_id'      => 1,
                'title'         => "Service",
                'description'   => "Service section is to show services provided by user"
            ],
            [
                'theme_id'      => 1,
                'title'         => "Portfolio",
                'description'   => "Portfolio section is to show projects showcase by user"
            ],
            [
                'theme_id'      => 1,
                'title'         => "Skill",
                'description'   => "Skill section is to show user's skills in perticular sector"
            ],
            [
                'theme_id'      => 1,
                'title'         => "Resume",
                'description'   => "Resume section is to show user's experience & education information"
            ],
            [
                'theme_id'      => 1,
                'title'         => "Client",
                'description'   => "Client section is to show client logos"
            ],
            [
                'theme_id'      => 1,
                'title'         => "Testimonial",
                'description'   => "Testimonial section is to show client reviews"
            ],
            [
                'theme_id'      => 1,
                'title'         => "Price",
                'description'   => "Price section is to show user's pricing information"
            ],
            [
                'theme_id'      => 1,
                'title'         => "FAQ",
                'description'   => "FAQ section is to show frequently asked questions set by user"
            ],
            [
                'theme_id'      => 1,
                'title'         => "Contact",
                'description'   => "Contact section is to show contact form"
            ],
            [
                'theme_id'      => 1,
                'title'         => "Blog",
                'description'   => "Blog section is to show blogs published by user"
            ],
            [
                'theme_id'      => 1,
                'title'         => "Action",
                'description'   => "Action section is to show call to action"
            ],
            // Dorbesh Sections
            [
                'theme_id'      => 2,
                'title'         => "About",
                'description'   => "About section is to show user's basic information"
            ],
            [
                'theme_id'      => 2,
                'title'         => "Service",
                'description'   => "Service section is to show services provided by user"
            ],
            [
                'theme_id'      => 2,
                'title'         => "Resume",
                'description'   => "Resume section is to show user's experience & education information"
            ],
            [
                'theme_id'      => 2,
                'title'         => "Skill",
                'description'   => "Skill section is to show user's skills in perticular sector"
            ],
            [
                'theme_id'      => 2,
                'title'         => "Work",
                'description'   => "Work section is to show projects showcase by user"
            ],
            [
                'theme_id'      => 2,
                'title'         => "Price",
                'description'   => "Price section is to show user's pricing information"
            ],
            [
                'theme_id'      => 2,
                'title'         => "Testimonial",
                'description'   => "Testimonial section is to show client reviews"
            ],
            [
                'theme_id'      => 2,
                'title'         => "Client",
                'description'   => "Client section is to show client logos"
            ],
            [
                'theme_id'      => 2,
                'title'         => "Blog",
                'description'   => "Blog section is to show blogs published by user"
            ],
            [
                'theme_id'      => 2,
                'title'         => "Contact",
                'description'   => "Contact section is to show contact information & form"
            ],
            [
                'theme_id'      => 2,
                'title'         => "Action",
                'description'   => "Action section is to show call to action"
            ],
            [
                'theme_id'      => 2,
                'title'         => "Map",
                'description'   => "Map section is to show user's location on map"
            ]
        ];

        foreach ($sectionData as $item) {
            SectionInfo::create($item);
        }
    }
}
