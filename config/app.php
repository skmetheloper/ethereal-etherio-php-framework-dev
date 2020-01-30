<?php

return [
    'name' => env('APP_NAME', 'Ethereal'),
    'env' => env('APP_ENV', 'web'),
    'debug' => (bool) env('APP_DEBUG', false),

    'alias' => [
        'App' => Ethereal\Support\Facade\App::class,
    ],

    'timezone' => 'Asia/Yangon',
];
