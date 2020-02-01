<?php

return [
    'name' => env('APP_NAME', 'Ethereal'),
    'env' => env('APP_ENV', 'web'),
    'debug' => (bool) env('APP_DEBUG', false),

    'alias' => [
        'App' => Ethereal\Support\Facade\App::class,
        'Route' => Ethereal\Support\Facade\Route::class,
    ],

    'services' => [
        'route' => Ethereal\Routing\Router::class,
    ],

    'timezone' => 'Asia/Yangon',
];
