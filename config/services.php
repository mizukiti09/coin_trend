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

    "twitter" => [
        "client_id" => 'xsYUt3hlynQz7ttyllsSHWsFK',
        "client_secret" => 'MbjjhM4eM7a8kz0Gzca8xKwO6mrkDk3kmzPmO0QIOQkHyjHt0B',
        "access_token" => '1506369696261877762-nLoZgIHJGgaXutNdSEFG29kaGW4kXf',
        "access_token_secret" => 'ZpeW6PyhK7hFmAhMM3eS23dF5RoHdjrmzEbCyKpXDC9rk',
        "redirect" => 'https://coin-trend.herokuapp.com/login/twitter/callback',
    ],

];
