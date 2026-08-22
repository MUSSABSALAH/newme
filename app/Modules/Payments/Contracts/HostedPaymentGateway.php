<?php

declare(strict_types=1);

namespace App\Modules\Payments\Contracts;

use App\Modules\Payments\DTOs\PaymentCallback;
use Illuminate\Http\Request;

/**
 * A gateway that sends the customer to a hosted payment page and then back.
 */
interface HostedPaymentGateway extends PaymentGateway
{
    /**
     * Read the browser return after the customer leaves the hosted page.
     */
    public function parseReturn(Request $request): PaymentCallback;
}
