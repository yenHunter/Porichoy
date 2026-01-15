<?php

return [

    // Default visitor theme
    'default_theme' => env('APP_THEME', 'antux'),
    'default_color' => env('APP_COLOR', 'light'),

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
