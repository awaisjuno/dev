<?php

return [
    'meta' => [
        'entity_path' => [
            base_path('app/Entities'),
        ],
        'auto_generate_proxies' => true,
        'proxy_dir' => storage_path('app/doctrine/proxies'),
        'cache' => null,
    ],

    'connection' => [
        'driver' => 'mysql',
        'host' => env('DB_HOST', '127.0.0.1'),
        'port' => env('DB_PORT', '3306'),
        'database' => env('DB_DATABASE', 'root'),
        'username' => env('DB_USERNAME', 'db'),
        'password' => env('DB_PASSWORD', ''),
    ],
];
