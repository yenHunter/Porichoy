<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Per-IP attempt limits
    |--------------------------------------------------------------------------
    |
    | Attempts per minute on the forms a stranger can post to. They are read
    | from the environment because the browser suite signs in and submits the
    | contact form dozens of times from a single loopback address; the defaults
    | below apply everywhere else.
    |
    */

    'throttle' => [
        'login' => (int) env('THROTTLE_LOGIN', 5),
        'register' => (int) env('THROTTLE_REGISTER', 5),
        'contact' => (int) env('THROTTLE_CONTACT', 5),
    ],

];
