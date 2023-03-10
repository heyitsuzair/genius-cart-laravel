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
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'facebook' => [
        'client_id' => env('FACEBOOK_C_ID'), //USE FROM FACEBOOK DEVELOPER ACCOUNT
        'client_secret' => env('FACEBOOK_C_SK'), //USE FROM FACEBOOK DEVELOPER ACCOUNT
        'redirect' => 'http://localhost:8000/facebook/callback'
    ],

    'google' => [
        'client_id'     => env('GOOGLE_C_ID'),
        'client_secret' => env('GOOGLE_C_SK'),
        'redirect'      => "http://localhost:8000/google/callback",
    ],

    'github' => [
        'client_id'     => env('GITHUB_C_ID'),
        'client_secret' => env('GITHUB_C_SK'),
        'redirect'      => "http://localhost:8000/github/callback",
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

];