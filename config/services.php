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
        'region' => 'us-east-1',
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
       'client_id' => '216397423072-inf2v3vudivl89n75q85btplaarmhb8o.apps.googleusercontent.com', //google API
       'client_secret' => 'ngCEC5chLBi2QKeiY4XxK5av', //google Secret
       'redirect' => 'https://gesap.herokuapp.com/login/google/callback',
    ],
    'facebook' => [
       'client_id' => '579870502373202', //Facebook API
       'client_secret' => 'd59c6d1e8118ea19f5da7992be2b81af', //Facebook Secret
       'redirect' => 'https://gesap.herokuapp.com/login/facebook/callback',
    ],
];
