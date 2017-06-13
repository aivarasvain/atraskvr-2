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

    'facebook' => [
        'client_id' => '1392711654098872',
        'client_secret' => '6a41b502976b80aa1e694787f73ec366',
        'redirect' => 'http://atraskvr.dev/auth/facebook/callback',
    ],

    'google' => [
        'client_id' => '495915112267-e16814q7uf268tees1s81266l71gv1d2.apps.googleusercontent.com',
        'client_secret' => '_Gf9wESzMlcV2ANxSeiVnP-f',
        'redirect' => 'http://atraskvr.dev/auth/google/callback',
    ],

];
