<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Modules\Delivery\Enums\DeliveryStatus;
use App\Modules\Delivery\Models\SubscriptionDelivery;
use App\Modules\Subscriptions\Models\Subscription;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<SubscriptionDelivery>
 */
class SubscriptionDeliveryFactory extends Factory
{
    protected $model = SubscriptionDelivery::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'subscription_id' => Subscription::factory(),
            'delivery_date' => now()->toDateString(),
            'status' => DeliveryStatus::Pending,
            'dispatched_at' => null,
            'delivered_at' => null,
            'failure_reason' => null,
            'handled_by' => null,
        ];
    }

    public function status(DeliveryStatus $status): self
    {
        return $this->state(fn (): array => [
            'status' => $status,
            'dispatched_at' => $status === DeliveryStatus::Pending ? null : now(),
            'delivered_at' => $status === DeliveryStatus::Delivered ? now() : null,
        ]);
    }
}
