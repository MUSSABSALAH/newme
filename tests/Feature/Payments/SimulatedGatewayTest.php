<?php

declare(strict_types=1);

namespace Tests\Feature\Payments;

use App\Modules\Payments\Contracts\PaymentGateway;
use App\Modules\Payments\DTOs\CardDetails;
use App\Modules\Payments\DTOs\ChargeRequest;
use App\Modules\Payments\Enums\PaymentDecline;
use App\Modules\Payments\Enums\PaymentMethod;
use App\Modules\Payments\Gateways\SimulatedGateway;
use App\Support\Money\Money;
use Tests\TestCase;

final class SimulatedGatewayTest extends TestCase
{
    private function card(string $number, ?int $month = null, ?int $year = null): CardDetails
    {
        return CardDetails::fromArray([
            'number' => $number,
            'holder' => 'Test Customer',
            'expiry_month' => $month ?? 12,
            'expiry_year' => $year ?? (int) now()->addYears(2)->format('Y'),
            'cvv' => '123',
        ]);
    }

    private function charge(PaymentMethod $method, ?CardDetails $card): ChargeRequest
    {
        return new ChargeRequest(
            amount: Money::fromMinor(10000),
            method: $method,
            reference: 'REF123',
            description: 'Order #1',
            card: $card,
        );
    }

    public function test_the_container_resolves_the_configured_gateway(): void
    {
        $this->assertInstanceOf(SimulatedGateway::class, app(PaymentGateway::class));
        $this->assertFalse(app(PaymentGateway::class)->usesHostedCheckout());
    }

    public function test_a_valid_card_is_approved_with_a_reference(): void
    {
        $result = (new SimulatedGateway)->charge(
            $this->charge(PaymentMethod::Visa, $this->card('4242424242424242')),
        );

        $this->assertTrue($result->approved);
        $this->assertNull($result->decline);
        $this->assertStringStartsWith('SIM_', $result->gatewayReference);
    }

    public function test_reserved_test_numbers_are_declined_with_their_reason(): void
    {
        $cases = [
            '4000000000000002' => PaymentDecline::CardDeclined,
            '4000000000000069' => PaymentDecline::ExpiredCard,
            '4000000000000119' => PaymentDecline::InsufficientFunds,
            '4000000000000127' => PaymentDecline::InvalidCard,
        ];

        foreach ($cases as $number => $expected) {
            $result = (new SimulatedGateway)->charge(
                $this->charge(PaymentMethod::Visa, $this->card((string) $number)),
            );

            $this->assertFalse($result->approved, "Expected {$number} to be declined.");
            $this->assertSame($expected, $result->decline);
        }
    }

    public function test_a_past_expiry_is_declined(): void
    {
        $result = (new SimulatedGateway)->charge(
            $this->charge(PaymentMethod::Visa, $this->card('4242424242424242', 1, 2020)),
        );

        $this->assertFalse($result->approved);
        $this->assertSame(PaymentDecline::ExpiredCard, $result->decline);
    }

    public function test_a_number_that_fails_the_luhn_check_is_declined(): void
    {
        $result = (new SimulatedGateway)->charge(
            $this->charge(PaymentMethod::Visa, $this->card('4242424242424241')),
        );

        $this->assertFalse($result->approved);
        $this->assertSame(PaymentDecline::InvalidCard, $result->decline);
    }

    public function test_a_card_method_without_a_card_is_declined(): void
    {
        $result = (new SimulatedGateway)->charge($this->charge(PaymentMethod::Visa, null));

        $this->assertFalse($result->approved);
        $this->assertSame(PaymentDecline::InvalidCard, $result->decline);
    }

    public function test_methods_that_need_no_card_are_approved(): void
    {
        $result = (new SimulatedGateway)->charge($this->charge(PaymentMethod::ApplePay, null));

        $this->assertTrue($result->approved);
    }

    public function test_a_two_digit_expiry_year_is_read_as_this_century(): void
    {
        $card = $this->card('4242424242424242', 12, 34);

        $this->assertSame(2034, $card->expiryYear);
        $this->assertFalse($card->hasExpired());
    }

    public function test_a_card_reports_its_brand_and_last_four(): void
    {
        $this->assertSame('visa', $this->card('4242 4242 4242 4242')->brand());
        $this->assertSame('mada', $this->card('5555555555554444')->brand());
        $this->assertSame('4242', $this->card('4242 4242 4242 4242')->last4());
    }
}
