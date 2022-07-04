<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
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

    'google' => [
    'client_id' => "1036731497180-nt38k1oe2euhvfcbuj4f5n7uaqa2isq4.apps.googleusercontent.com",
    'client_secret' =>"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",
    'redirect' => 'http://127.0.0.1:8000/user/dashboard',
],
 'facebook' => [
    'client_id' => "483439543347497",
    'client_secret' => "d6a6551c15bd8e4a79453c3b4b3daa75",
    'redirect' => 'http://localhost:8000/user/dashboard/callback',
],


];
