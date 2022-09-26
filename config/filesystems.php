<?php

return [

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'avatars' => [
            'driver' => 'local',
            'root' => storage_path('app/public/avatars'),
            'url' => env('APP_URL').'/storage/avatars',
            'visibility' => 'public',
        ],

        'recipes' => [
            'driver' => 'local',
            'root' => storage_path('app/public/recipes'),
            'url' => env('APP_URL').'/storage/recipes',
            'visibility' => 'public',
        ],

        'ingredients' => [
            'driver' => 'local',
            'root' => storage_path('app/public/ingredients'),
            'url' => env('APP_URL').'/storage/ingredients',
            'visibility' => 'public',
        ],

        'categories' => [
            'driver' => 'local',
            'root' => storage_path('app/public/categories'),
            'url' => env('APP_URL').'/storage/categories',
            'visibility' => 'public',
        ],

        'reaction_types' => [
            'driver' => 'local',
            'root' => storage_path('app/public/reaction_types'),
            'url' => env('APP_URL').'/storage/reaction_types',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
        ],

    ],

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
