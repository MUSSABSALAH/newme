<?php

declare(strict_types=1);

namespace App\Modules\Payments\DTOs;

use App\Modules\Payments\Enums\PaymentDecline;
use Paytabs\Sdk\Response\Payload\Payloads\Callbacks\Browser;
use Paytabs\Sdk\Response\Payload\Payloads\Callbacks\Ipn;

/**
 * A verified answer from a hosted gateway: which cart, which transaction, paid or not.
 */
final readonly class PaymentCallback
{
    public function __construct(
        public string $cartId,
        public string $tranRef,
        public bool $successful,
        public bool $pending = false,
        public ?string $cardLast4 = null,
        public ?string $cardBrand = null,
        public ?PaymentDecline $decline = null,
    ) {}

    public static function fromBrowser(Browser $result): self
    {
        $pending = $result->tranStatus->isNotFinal();

        return new self(
            cartId: $result->cartId,
            tranRef: $result->tranRef,
            successful: $result->isTransactionSuccessful(),
            pending: $pending,
            decline: $result->isTransactionSuccessful() || $pending
                ? null
                : PaymentDecline::CardDeclined,
        );
    }

    public static function fromIpn(Ipn $payload): self
    {
        $pending = $payload->payment_result->tranStatus->isNotFinal();
        $last4 = null;
        $brand = null;

        if (isset($payload->payment_info)) {
            $last4 = self::last4FromDescription($payload->payment_info->payment_description ?? null);
            $brand = self::brandFromScheme($payload->payment_info->card_scheme ?? null);
        }

        return new self(
            cartId: $payload->cart_id,
            tranRef: $payload->tran_ref,
            successful: $payload->isPaymentSuccessful(),
            pending: $pending,
            cardLast4: $last4,
            cardBrand: $brand,
            decline: $payload->isPaymentSuccessful() || $pending
                ? null
                : PaymentDecline::CardDeclined,
        );
    }

    private static function last4FromDescription(?string $description): ?string
    {
        if (! is_string($description) || $description === '') {
            return null;
        }

        if (preg_match('/(\d{4})\s*$/', $description, $matches) !== 1) {
            return null;
        }

        return $matches[1];
    }

    private static function brandFromScheme(?string $scheme): ?string
    {
        if (! is_string($scheme) || $scheme === '') {
            return null;
        }

        return strtolower($scheme);
    }
}
