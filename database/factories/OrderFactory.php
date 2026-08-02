<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use App\Modules\Orders\Enums\OrderStatus;
use App\Modules\Orders\Models\Order;
use App\Modules\Payments\Enums\PaymentMethod;
use App\Modules\Payments\Enums\PaymentStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subtotal = fake()->numberBetween(5_000, 50_000);

        return [
            'public_id' => (string) Str::ulid(),
            'user_id' => User::factory()->customer(),
            'status' => OrderStatus::Pending,
            'currency' => 'SAR',
            'subtotal_minor' => $subtotal,
            'discount_minor' => 0,
            'total_minor' => $subtotal,
            'payment_method' => PaymentMethod::Mada,
            'payment_status' => PaymentStatus::Paid,
            'placed_at' => now(),
        ];
    }

    public function status(OrderStatus $status): static
    {
        return $this->state(fn (array $attributes): array => [
            'status' => $status,
        ]);
    }

    public function discounted(string $code, int $discountMinor): static
    {
        return $this->state(fn (array $attributes): array => [
            'coupon_code' => $code,
            'discount_minor' => $discountMinor,
            'total_minor' => max(0, (int) $attributes['subtotal_minor'] - $discountMinor),
        ]);
    }
}
