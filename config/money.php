<?php

return [
    /*
     |--------------------------------------------------------------------------
     | Laravel money
     |--------------------------------------------------------------------------
     */
    'locale' => config('app.locale', 'en_PK'),
    'defaultCurrency' => config('app.currency', 'PKR'),
    'defaultFormatter' => null,
    'isoCurrenciesPath' => __DIR__ . '/../vendor/moneyphp/money/resources/currency.php',
    'currencies' => [
        'iso' => 'all',
        'bitcoin' => 'all',
        'custom' => [
            // 'MY1' => 2,
            // 'MY2' => 3
        ],
    ],
];