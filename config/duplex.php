<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Config duplex
    |--------------------------------------------------------------------------
     */
    'recaptcha' => [
        'secret' => env('RECAPTCHA_SECRET'),
        'public' => env('RECAPTCHA_SITE_KEY')
    ],

    'promo' => [
        'type' => \Duplex\Enums\Game::Mmgg,

        'date' => [
            'start' => Carbon\Carbon::create(2024, 04, 20, 00, 00, 00),
            'end' => Carbon\Carbon::create(2024, 07, 07, 23,59,59),
        ],

        'attemps' => [
            'day' => 1,
            'total' => 1
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
