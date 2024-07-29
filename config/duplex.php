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
            'start' => Carbon\Carbon::create(2024, 6, 9, 00, 00, 00, env('APP_TIMEZONE')),
            'end' => Carbon\Carbon::create(2024, 11, 9, 23,59,59, env('APP_TIMEZONE')),
            'timezone' => env('APP_TIMEZONE')
        ],

        'attemps' => [
            'day' => 10,
            'total' => 10000
        ],

        'url_project_name' => env('URL_PROJECT_NAME', ''),

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
