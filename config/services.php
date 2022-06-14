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

    // "twitter" => [
    //     "client_id" => env('TWITTER_AUTH_CLIENT_ID'),
    //     "client_secret" => env('TWITTER_AUTH_CLIENT_SECRET'),
    //     "access_token" => env('TWITTER_ACCESS_TOKEN'),
    //     "access_token_secret" => env('TWITTER_ACCESS_TOKEN_SECRET'),
    //     "redirect" => env('CALLBACK_URL'),
    // ],
    "twitter" => [
        "client_id" => 'RzhBRjgtQVlZRVBfaGpDZUgxMnc6MTpjaQ',
        "client_secret" => 'RUZ3yX8fkwZTJubt_RUEwuXB8fbb_0UEX7YC_n_5IioZETXs_E',
        "access_token" => '1506369696261877762-38yZelui47WYC1lEc7GmFh5zK3eY8M',
        "access_token_secret" => 'TX4GSrmSnRM6Qqb0sp0n3i3YAh3IxAyhjoz39Fj6PZEaH',
        "redirect" => 'https://coin-trend.herokuapp.com/login/twitter/callback
        ',
    ],

];
