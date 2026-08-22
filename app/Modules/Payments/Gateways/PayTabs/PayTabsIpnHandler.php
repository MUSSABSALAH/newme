<?php

declare(strict_types=1);

namespace App\Modules\Payments\Gateways\PayTabs;

use App\Modules\Payments\DTOs\PaymentCallback;
use App\Modules\Payments\Services\CompletePaymentService;
use Illuminate\Support\Facades\Log;
use Paytabs\Laravel\Contracts\IpnHandlerInterface;
use Paytabs\Sdk\Response\Payload\Payloads\Callbacks\Ipn;
use Paytabs\Sdk\Response\Responses\Webhook\AbstractTransactionResult;

/**
 * Applies a verified PayTabs IPN to the matching payment.
 *
 * Signature checks happen in the official SDK before this class runs.
 */
final class PayTabsIpnHandler implements IpnHandlerInterface
{
    public function __construct(
        private readonly CompletePaymentService $completions,
    ) {}

    public function handleIpn(
        AbstractTransactionResult $transactionResult,
        Ipn $mappedPayload,
    ): void {
        $callback = PaymentCallback::fromIpn($mappedPayload);

        Log::info('PayTabs IPN received.', [
            'cart_id' => $callback->cartId,
            'tran_ref' => $callback->tranRef,
            'successful' => $callback->successful,
            'pending' => $callback->pending,
        ]);

        $this->completions->applyIfFound($callback);
    }
}
