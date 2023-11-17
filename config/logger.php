<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Logger
    |--------------------------------------------------------------------------
    |
    | This option defines the default logger that gets used when writing
    | messages to the logs. The name specified in this option should match
    | one of the loggers defined in the "loggers" configuration array.
    |
    */

  'default' => env('LOG_DEFAULT', 'file'),

    /*
    |--------------------------------------------------------------------------
    | Loggers
    |--------------------------------------------------------------------------
    |
    | Here you may configure the loggers for your application. You can
    | add your custom loggers here. Each logger can have its own
    | specific configuration options.
    |
    */

  'types' => [
    'email' => [
      'driver' => 'email',
      'class' => \App\Service\Logger\Factory\EmailLogger::class,
      'email' => env('LOG_EMAIL_ADDRESS', 'example@example.com'),
      'path' => storage_path('logs/email_log.log'),
      'message' => 'email message',
    ],
    'database' => [
      'driver' => 'database',
      'class' => \App\Service\Logger\Factory\DatabaseLogger::class,
      'message' => 'database message',
    ],
    'file' => [
      'driver' => 'file',
      'class' => \App\Service\Logger\Factory\FileLogger::class,
      'path' => storage_path('logs/file.log'),
      'message' => 'file message',
    ],

  ],

];
