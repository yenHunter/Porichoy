<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Attempt limits for the public posts
    |--------------------------------------------------------------------------
    |
    | Attempts per minute on the forms a stranger can post to, plus the
    | per-address window on password reset requests. They are read from the
    | environment because the browser suite signs in and submits the contact
    | form dozens of times from a single loopback address; the defaults below
    | apply everywhere else.
    |
    */

    'throttle' => [
        'login' => (int) env('THROTTLE_LOGIN', 5),
        'register' => (int) env('THROTTLE_REGISTER', 5),
        'contact' => (int) env('THROTTLE_CONTACT', 5),

        // The two password-reset posts. `forgot` is per IP per minute;
        // `forgot_email` is per address per hour, so rotating addresses does
        // not mail-bomb one inbox.
        'forgot' => (int) env('THROTTLE_FORGOT', 5),
        'forgot_email' => (int) env('THROTTLE_FORGOT_EMAIL', 5),
        'reset' => (int) env('THROTTLE_RESET', 5),
    ],

];
