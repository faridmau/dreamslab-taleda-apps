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

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],
    'diamond_seven' => [
        'base_url' => env('DIAMOND_SEVEN_BASE_URL', 'https://server.diamondseven.swiss:10555/api/v1/diamond/dataexchange'),
        'PartnerKey' => env('DIAMOND_SEVEN_PARTNER_KEY'),
        'use_proxy' => env('DIAMOND_SEVEN_USE_PROXY', false),
        'proxy' => env('DIAMOND_SEVEN_PROXY', 'socks5://127.0.0.1:9090'),
        'verify_ssl' => env('DIAMOND_SEVEN_VERIFY_SSL', true),
    ],

];
