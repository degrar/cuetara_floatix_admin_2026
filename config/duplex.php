<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Config duplex
    |--------------------------------------------------------------------------
     */
    'recaptcha' => [
        'secret' => env('RECAPTCHA_SECRET'),
        'public' => env('RECAPTCHA_SITE_KEY'),
        'lang' => env('APP_LOCALE')
    ],

    'promo' => [
        'type' => \Duplex\Enums\Game::Mmgg,

        'date' => [
            'start' => Carbon\Carbon::create(2024, 11, 28, 00, 00, 00, env('APP_TIMEZONE')),
            'end' => Carbon\Carbon::create(2025, 05, 15, 23,59,59, env('APP_TIMEZONE')),
            'timezone' => env('APP_TIMEZONE')
        ],

        'attemps' => [
            'day' => 5,
            'month' => 5,
            'total' => 10
        ],

        'url_project_name' => env('URL_PROJECT_NAME', ''),
        'url_prefix' => env('URL_PREFIX', ''),

        'onepage' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Features
    |--------------------------------------------------------------------------
    |
    | En un futur pot ser farem anar aixo...
    |
    */
    'features' => [

    ]
];
