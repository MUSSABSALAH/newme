<?php

declare(strict_types=1);

use App\Modules\Identity\Support\LogSmsSender;

return [

    /*
    |--------------------------------------------------------------------------
    | Outbound SMS driver
    |--------------------------------------------------------------------------
    |
    | Which implementation of SmsSender delivers messages. The default writes
    | to the log, which is right for local work and wrong for production: with
    | SMS OTP switched on, a "log" driver means nobody receives a login code.
    |
    | To add a provider, write a class implementing SmsSender, list it below,
    | and set SMS_DRIVER. No other code changes.
    |
    */

    'driver' => env('SMS_DRIVER', 'log'),

    'drivers' => [
        'log' => LogSmsSender::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Sender identity
    |--------------------------------------------------------------------------
    |
    | The alphanumeric sender name registered with the provider. Saudi
    | operators only deliver from a pre-approved sender ID.
    |
    */

    'sender_id' => env('SMS_SENDER_ID', 'NewMe'),

];
