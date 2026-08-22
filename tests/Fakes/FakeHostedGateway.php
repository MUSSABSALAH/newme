<?php

declare(strict_types=1);

namespace Tests\Fakes;

use App\Modules\Payments\Contracts\HostedPaymentGateway;
use App\Modules\Payments\DTOs\ChargeRequest;
use App\Modules\Payments\DTOs\ChargeResult;
use App\Modules\Payments\DTOs\PaymentCallback;
use Illuminate\Http\Request;

/**
 * Stand-in hosted provider for tests: always opens a fake payment page.
 */
final class FakeHostedGateway implements HostedPaymentGateway
{
    public const REDIRECT_URL = 'https://pay.example.test/hosted';

    public const TRAN_REF = 'PT_TEST_REF';

    public function name(): string
    {
        return 'fake-hosted';
    }

    public function usesHostedCheckout(): bool
    {
        return true;
    }

    public function charge(ChargeRequest $request): ChargeResult
    {
        return ChargeResult::redirect(self::REDIRECT_URL, self::TRAN_REF);
    }

    public function parseReturn(Request $request): PaymentCallback
    {
        return new PaymentCallback(
            cartId: (string) $request->query('cart_id', $request->input('cart_id', '')),
            tranRef: self::TRAN_REF,
            successful: $request->boolean('paid', true),
            pending: $request->boolean('pending'),
        );
    }
}
