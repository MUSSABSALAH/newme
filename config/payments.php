<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Active gateway
    |--------------------------------------------------------------------------
    |
    | Which implementation of App\Modules\Payments\Contracts\PaymentGateway
    | handles charges. "simulated" approves cards that look valid and declines a
    | few reserved test numbers; swap in a real provider by adding it to the
    | "gateways" map below.
    |
    */

    'driver' => env('PAYMENTS_DRIVER', 'simulated'),

    'gateways' => [
        'simulated' => App\Modules\Payments\Gateways\SimulatedGateway::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Methods offered at checkout
    |--------------------------------------------------------------------------
    |
    | Values from App\Modules\Payments\Enums\PaymentMethod, in display order.
    |
    */

    'methods' => [
        'mada',
        'visa',
        'apple_pay',
        'cash_on_delivery',
    ],

];
