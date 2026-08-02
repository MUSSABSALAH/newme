<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use App\Modules\Payments\Enums\PaymentMethod;
use App\Modules\Payments\Enums\PaymentStatus;
use App\Modules\Plans\Enums\MealType;
use App\Modules\Subscriptions\Enums\HandlingStatus;
use App\Modules\Subscriptions\Enums\SubscriptionStatus;
use App\Modules\Subscriptions\Models\Subscription;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Subscription>
 */
class SubscriptionFactory extends Factory
{
    protected $model = Subscription::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subtotal = fake()->numberBetween(50_000, 200_000);
        $tax = (int) round($subtotal * 0.15);

        return [
            'public_id' => (string) Str::ulid(),
            'user_id' => User::factory()->customer(),
            'plan_id' => null,
            'plan_name' => fake()->words(2, true),
            'status' => SubscriptionStatus::Pending,
            'handling_status' => HandlingStatus::New,
            'mode' => 'daily',
            'meal_types' => [MealType::Lunch->value],
            'duration_unit' => 'week',
            'duration_length' => 4,
            'total_days' => 20,
            'selected_days' => null,
            'start_date' => now()->addWeek()->toDateString(),
            'currency' => 'SAR',
            'subtotal_minor' => $subtotal,
            'discount_minor' => 0,
            'coupon_discount_minor' => 0,
            'delivery_fee_minor' => 0,
            'tax_minor' => $tax,
            'total_minor' => $subtotal + $tax,
            'per_day_minor' => (int) round(($subtotal + $tax) / 20),
            'payment_method' => PaymentMethod::Visa,
            'payment_status' => PaymentStatus::Paid,
        ];
    }

    public function status(SubscriptionStatus $status): static
    {
        return $this->state(fn (array $attributes): array => [
            'status' => $status,
        ]);
    }

    public function handling(HandlingStatus $status, ?User $handler = null): static
    {
        return $this->state(fn (array $attributes): array => [
            'handling_status' => $status,
            'handled_by' => $handler?->getKey(),
            'handled_at' => $handler === null ? null : now(),
        ]);
    }

    /**
     * @param  list<array{date: string, meals: array<string, string|null>}>|null  $schedule
     */
    public function withMealSchedule(?array $schedule = null): static
    {
        return $this->state(fn (array $attributes): array => [
            'meal_schedule' => $schedule ?? [
                [
                    'date' => now()->addDays(2)->toDateString(),
                    'meals' => [
                        MealType::Breakfast->value => 'Oatmeal bowl',
                        MealType::Lunch->value => null,
                    ],
                ],
                [
                    'date' => now()->addDays(3)->toDateString(),
                    'meals' => [
                        MealType::Breakfast->value => 'Shakshuka',
                        MealType::Lunch->value => 'Grilled chicken',
                    ],
                ],
            ],
        ]);
    }
}
