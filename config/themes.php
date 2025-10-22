<?php

return [

    // Default visitor theme
    'default_theme' => 'antux',
    'default_color' => 'light',

    // Available visitor themes
    'available' => [
        'antux' => [
            'name' => 'Antux',
            'view_path' => resource_path('views/visitor/antux'),
        ],
        'dorbesh' => [
            'name' => 'Dorbesh',
            'view_path' => resource_path('views/visitor/dorbesh'),
        ],
    ],

];
