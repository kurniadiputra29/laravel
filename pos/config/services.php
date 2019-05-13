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
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],




    'github' => [
        'client_id' => '115f8a166e7f7873a225',
        'client_secret' => '3e85c5fb707042d9d9a60fa293dd479f6408a82e',
        'redirect' => 'http://localhost:8000/social-media/registered/github',
    ],

    'google' => [
        'client_id' => '253147592275-s8arbg8gjdijdcg7a4o8nq5pnge6cntu.apps.googleusercontent.com',
        'client_secret' => 'U1wMkd-Nz_TSmVo3MOa3V-5K',
        'redirect' => 'http://localhost:8000/social-media/registered/google',
    ],

    'facebook' => [
        'client_id' => '847870148895133',
        'client_secret' => '8eea2091582f647e4f32931b721e10be',
        'redirect' => 'http://localhost:8000/social-media/registered/facebook',
    ],

    'bitbucket' => [
        'client_id' => env('BITBUCKET_KEY'),
        'client_secret' => env('BITBUCKET_SECRET'),
        'redirect' => env('BITBUCKET_CALLBACK_URL'),
    ],

    'linkedin' => [
        'client_id' => env('LINKEDIN_KEY'),
        'client_secret' => env('LINKEDIN_SECRET'),
        'redirect' => env('LINKEDIN_CALLBACK_URL'),
    ],

];
