<?php

declare(strict_types=1);

namespace App\Modules\Payments\Gateways\PayTabs;

use App\Modules\Payments\Contracts\HostedPaymentGateway;
use App\Modules\Payments\Contracts\PayTabsClient;
use App\Modules\Payments\DTOs\ChargeRequest;
use App\Modules\Payments\DTOs\ChargeResult;
use App\Modules\Payments\DTOs\PaymentCallback;
use Illuminate\Http\Request;

/**
 * PayTabs hosted checkout: create a payment page, send the customer there, then
 * finish the charge from the browser return and the server-to-server IPN.
 */
final class PayTabsGateway implements HostedPaymentGateway
{
    public function __construct(
        private readonly PayTabsClient $client,
    ) {}

    public function name(): string
    {
        return 'paytabs';
    }

    public function usesHostedCheckout(): bool
    {
        return true;
    }

    public function charge(ChargeRequest $request): ChargeResult
    {
        return $this->client->createHostedPage($request);
    }

    public function parseReturn(Request $request): PaymentCallback
    {
        return $this->client->parseBrowserReturn();
    }
}
