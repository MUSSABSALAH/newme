<?php

declare(strict_types=1);

namespace Tests\Concerns;

use App\Models\User;
use App\Modules\Addresses\Models\Address;
use App\Modules\Payments\Enums\PaymentMethod;
use Illuminate\Testing\TestResponse;

/**
 * Helpers for driving the checkout the way a customer does: park what is being
 * bought, then post the address, the payment method and the card.
 */
trait PlacesCheckout
{
    /**
     * A card the simulated gateway approves.
     */
    protected const APPROVED_CARD = '4242424242424242';

    /**
     * A card the simulated gateway declines.
     */
    protected const DECLINED_CARD = '4000000000000002';

    protected function addressFor(User $user): Address
    {
        return Address::factory()->isDefault()->create([
            'user_id' => $user->id,
        ]);
    }

    /**
     * @param  array<string, mixed>  $overrides
     * @return array<string, mixed>
     */
    protected function placeOrderPayload(Address $address, array $overrides = []): array
    {
        return array_merge([
            'address' => $address->public_id,
            'payment_method' => PaymentMethod::Visa->value,
            'card_number' => self::APPROVED_CARD,
            'card_holder' => 'Test Customer',
            'card_expiry_month' => 12,
            'card_expiry_year' => (int) now()->addYears(2)->format('Y'),
            'card_cvv' => '123',
            'terms' => '1',
        ], $overrides);
    }

    /**
     * @param  array<string, mixed>  $overrides
     */
    protected function placeOrder(User $user, ?Address $address = null, array $overrides = []): TestResponse
    {
        $address ??= $this->addressFor($user);

        return $this->actingAs($user)->post(
            route('website.checkout.store'),
            $this->placeOrderPayload($address, $overrides),
        );
    }
}
