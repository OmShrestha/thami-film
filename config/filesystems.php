<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been set up for each driver as an example of the required values.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => 'assets/lfm', //storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        //Production S3 bucket
        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
            'visibility' => env('AWS_VISIBILITY', 'private'),
            'directory_visibility' => env('AWS_DIRECTORY_VISIBILITY', 'private'),
            // 'root' => env('AWS_ROOT_FOLDER', ''),
        ],

        //Staging S3 bucket
        's3_staging' => [
            'driver' => 's3',
            'key' => env('AWS_STAGING_ACCESS_KEY_ID'),
            'secret' => env('AWS_STAGING_SECRET_ACCESS_KEY'),
            'region' => env('AWS_STAGING_DEFAULT_REGION'),
            'bucket' => env('AWS_STAGING_BUCKET'),
            'url' => env('AWS_STAGING_URL'),
            'endpoint' => env('AWS_STAGING_ENDPOINT'),
            'visibility' => env('AWS_STAGING_VISIBILITY', 'private'),
            'directory_visibility' => env('AWS_STAGING_DIRECTORY_VISIBILITY', 'private'),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
