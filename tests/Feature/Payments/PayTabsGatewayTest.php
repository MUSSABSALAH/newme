<?php

declare(strict_types=1);

namespace Tests\Feature\Payments;

use App\Modules\Payments\Contracts\PayTabsClient;
use App\Modules\Payments\DTOs\ChargeRequest;
use App\Modules\Payments\DTOs\ChargeResult;
use App\Modules\Payments\DTOs\PayerDetails;
use App\Modules\Payments\Enums\PaymentDecline;
use App\Modules\Payments\Enums\PaymentMethod;
use App\Modules\Payments\Gateways\PayTabs\PayTabsGateway;
use App\Support\Money\Money;
use Mockery;
use Tests\TestCase;

final class PayTabsGatewayTest extends TestCase
{
    public function test_a_hosted_page_redirect_is_passed_through(): void
    {
        $client = Mockery::mock(PayTabsClient::class);
        $client->shouldReceive('createHostedPage')
            ->once()
            ->andReturn(ChargeResult::redirect('https://secure.paytabs.sa/page', 'TST_REF'));

        $result = (new PayTabsGateway($client))->charge($this->request());

        $this->assertTrue($result->requiresRedirect());
        $this->assertSame('https://secure.paytabs.sa/page', $result->redirectUrl);
        $this->assertSame('TST_REF', $result->gatewayReference);
        $this->assertFalse($result->approved);
    }

    public function test_a_gateway_error_is_a_decline(): void
    {
        $client = Mockery::mock(PayTabsClient::class);
        $client->shouldReceive('createHostedPage')
            ->once()
            ->andReturn(ChargeResult::declined('', PaymentDecline::GatewayError));

        $result = (new PayTabsGateway($client))->charge($this->request());

        $this->assertFalse($result->approved);
        $this->assertFalse($result->requiresRedirect());
        $this->assertSame(PaymentDecline::GatewayError, $result->decline);
    }

    private function request(): ChargeRequest
    {
        return new ChargeRequest(
            amount: Money::fromMinor(10000),
            method: PaymentMethod::Mada,
            reference: 'PAY_1',
            description: 'Order #1',
            payer: new PayerDetails(
                name: 'Sara',
                email: 'sara@example.com',
                phone: '966555555555',
                street: 'King Fahd Rd',
                city: 'Riyadh',
                state: 'Al Olaya',
                country: 'SAU',
                zip: 'RRRD2929',
            ),
            returnUrl: 'https://example.test/return',
            callbackUrl: 'https://example.test/paytabs/ipn',
            language: 'ar',
        );
    }
}
