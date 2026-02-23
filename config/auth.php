<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Guards
    |--------------------------------------------------------------------------
    */

    'guards' => [

        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        // ✅ RECRUITER GUARD (INSIDE guards)
        'recruiter' => [
            'driver' => 'session',
            'provider' => 'recruiters',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Providers
    |--------------------------------------------------------------------------
    */

    'providers' => [

        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        // ✅ RECRUITER PROVIDER
        'recruiters' => [
            'driver' => 'eloquent',
            'model' => App\Models\Recruiter::class,
        ],

    ],

    'password_timeout' => 10800,
];
