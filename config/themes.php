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
            'colors' => ['light', 'dark'],
        ],
        'dorbesh' => [
            'name' => 'Dorbesh',
            'view_path' => resource_path('views/visitor/dorbesh'),
            'colors' => ['light'],
        ],
        'reeni' => [
            'name' => 'Reeni',
            'view_path' => resource_path('views/visitor/reeni'),
            'colors' => ['light', 'dark'],
        ],
        'flixta' => [
            'name' => 'Flixta',
            'view_path' => resource_path('views/visitor/flixta'),
            'colors' => ['light', 'dark'],
        ],
    ],

];
