<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Modules\Promotions\Enums\CouponScope;
use App\Modules\Promotions\Enums\CouponType;
use App\Modules\Promotions\Models\Coupon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * @var class-string<Coupon>
     */
    protected $model = Coupon::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'code' => Str::upper(Str::random(8)),
            'name' => ['en' => 'Campaign', 'ar' => 'حملة'],
            'type' => CouponType::Percentage->value,
            'scope' => CouponScope::All->value,
            'percent_off' => 10,
            'amount_off_minor' => null,
            'min_subtotal_minor' => 0,
            'max_discount_minor' => null,
            'max_redemptions' => null,
            'max_redemptions_per_user' => null,
            'redemptions_count' => 0,
            'starts_at' => null,
            'expires_at' => null,
            'is_active' => true,
        ];
    }

    public function code(string $code): static
    {
        return $this->state(fn (array $attributes): array => [
            'code' => Coupon::normalizeCode($code),
        ]);
    }

    public function percentage(float|int|string $percent): static
    {
        return $this->state(fn (array $attributes): array => [
            'type' => CouponType::Percentage->value,
            'percent_off' => $percent,
            'amount_off_minor' => null,
        ]);
    }

    public function fixed(int $amountMinor): static
    {
        return $this->state(fn (array $attributes): array => [
            'type' => CouponType::Fixed->value,
            'percent_off' => null,
            'amount_off_minor' => $amountMinor,
        ]);
    }

    public function scope(CouponScope $scope): static
    {
        return $this->state(fn (array $attributes): array => ['scope' => $scope->value]);
    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes): array => ['is_active' => false]);
    }

    public function expired(): static
    {
        return $this->state(fn (array $attributes): array => [
            'starts_at' => now()->subMonth(),
            'expires_at' => now()->subDay(),
        ]);
    }

    public function upcoming(): static
    {
        return $this->state(fn (array $attributes): array => [
            'starts_at' => now()->addWeek(),
            'expires_at' => now()->addMonth(),
        ]);
    }
}
