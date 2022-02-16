<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'google' => [
        'client_id' => '523380684729-4a9l4ievbfge8gufsdt03p1rb41f2cde.apps.googleusercontent.com',
        'client_secret' => '_GBcG1PPdFOba-c5QrzuSAMV',
//        'redirect' => 'https://adpia.vn',
        'redirect' => 'https://newpub.adpia.vn/login/google/callback'
    ],
    'facebook' => [
        'client_id' => '1711250422442174',
        'client_secret' => '980a376b6020d7b6413418012bd46c4f',
        'redirect' => 'https://adpia.vn',
    ]

];
