<?php

declare(strict_types=1);

namespace App\Modules\Delivery\DTOs;

use App\Modules\Addresses\DTOs\AddressSnapshot;
use App\Modules\Delivery\Enums\DeliveryStatus;
use App\Modules\Delivery\Models\SubscriptionDelivery;
use App\Modules\Subscriptions\Models\Subscription;
use Illuminate\Support\Carbon;

/**
 * One subscription delivery due on a given day.
 *
 * A stop is a schedule day, not a database row: the day comes from the
 * subscription's meal schedule and only carries a delivery record once the
 * shipping team has acted on it, which is why the record is nullable and an
 * untouched stop reads as pending.
 */
final class SubscriptionStop
{
    /**
     * @param  list<array{type: string, label: string, dish: string, is_chef: bool}>  $meals
     */
    public function __construct(
        public readonly Subscription $subscription,
        public readonly Carbon $date,
        public readonly array $meals,
        public readonly ?SubscriptionDelivery $record = null,
    ) {}

    public function status(): DeliveryStatus
    {
        return $this->record?->status ?? DeliveryStatus::Pending;
    }

    public function isSettled(): bool
    {
        return $this->status()->isSettled();
    }

    public function customerName(): string
    {
        return $this->subscription->user?->name
            ?? $this->address()?->recipientName
            ?? '—';
    }

    public function phone(): ?string
    {
        $phone = $this->address()?->phone ?? $this->subscription->user?->phone;

        return $phone === '' ? null : $phone;
    }

    public function address(): ?AddressSnapshot
    {
        return $this->subscription->deliveryAddress();
    }

    /**
     * Meal names for a packing list, e.g. "Lunch: Grilled chicken".
     *
     * @return list<string>
     */
    public function mealLines(): array
    {
        return array_map(
            static fn (array $meal): string => $meal['label'].': '.$meal['dish'],
            $this->meals,
        );
    }
}
