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
        "client_id" => env('TWITTER_AUTH_CLIENT_ID'),
        "client_secret" => env('TWITTER_AUTH_CLIENT_SECRET'),
        "access_token" => env('TWITTER_ACCESS_TOKEN'),
        "access_token_secret" => env('TWITTER_ACCESS_TOKEN_SECRET'),
        "redirect" => env('CALLBACK_URL'),
    ],
    // "twitter" => [
    //     "client_id" => 'm6bpOUCsmDLHy5VeRVynins89',
    //     "client_secret" => 'IFKNuc6mYjqlf3JEYoH9RljMf9AnsVt21BWx2GL9v4oGxQ5OVI',
    //     "access_token" => '1506369696261877762-Ly3XQ22dOwguilCdhiKRnRpSZVNWUf',
    //     "access_token_secret" => 'FReklyxGAMLSHmlSY6e2JOACsQfwt4By99XcoDE1KxMOp',
    //     "redirect" => 'https://coin-trend.herokuapp.com/login/twitter/callback
    //     ',
    // ],

];
