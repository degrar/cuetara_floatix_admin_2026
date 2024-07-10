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
            'start' => Carbon\Carbon::create(2024, 6, 9, 00, 00, 00),
            'end' => Carbon\Carbon::create(2024, 11, 9, 23,59,59),
        ],

        'attemps' => [
            'day' => 1,
            'total' => 10000
        ],

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
