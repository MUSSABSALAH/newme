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
    | few reserved test numbers. Set PAYMENTS_DRIVER=paytabs to send customers
    | to PayTabs' hosted page instead. A later provider is another class in the
    | "gateways" map — checkout never talks to PayTabs directly.
    |
    */

    'driver' => env('PAYMENTS_DRIVER', 'simulated'),

    'gateways' => [
        'simulated' => App\Modules\Payments\Gateways\SimulatedGateway::class,
        'paytabs' => App\Modules\Payments\Gateways\PayTabs\PayTabsGateway::class,
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
