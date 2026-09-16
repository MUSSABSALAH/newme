<?php

declare(strict_types=1);

use App\Modules\Identity\Support\CequensSmsSender;
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
    | OTP itself is unchanged: CustomerOtpService still sends the same code on
    | every enabled channel. Point SMS_DRIVER at a provider the same way MAIL_*
    | points email OTP at a mailer. Toggle authentication.sms_otp /
    | authentication.email_otp in settings to switch channels.
    |
    */

    'driver' => env('SMS_DRIVER', 'log'),

    'drivers' => [
        'log' => LogSmsSender::class,
        'cequens' => CequensSmsSender::class,
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

    /*
    |--------------------------------------------------------------------------
    | Cequens
    |--------------------------------------------------------------------------
    |
    | POST https://apis.cequens.com/sms/v1/messages with a JWT minted from
    | CEQUENS_USERNAME + CEQUENS_API_KEY. The sample /sms/messages + raw
    | API key is a different gateway and returns AWS 403 on this account.
    |
    */

    'cequens' => [
        'base_url' => env('CEQUENS_BASE_URL', 'https://apis.cequens.com'),
        'token' => env('CEQUENS_TOKEN'),
        'api_key' => env('CEQUENS_API_KEY'),
        'username' => env('CEQUENS_USERNAME'),
        'timeout' => (int) env('CEQUENS_TIMEOUT', 8),
    ],

];
