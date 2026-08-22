<?php

declare(strict_types=1);

namespace App\Modules\Checkout\DTOs;

use App\Modules\Identity\DTOs\HealthProfile;
use App\Modules\Subscriptions\Support\MealSchedule;
use App\Support\Dto\Data;

/**
 * The selection a customer made in the subscribe wizard, parked in the session
 * while they sign in, confirm an address and pay.
 *
 * It holds selections only — never prices. Every figure shown at checkout is
 * re-quoted server-side from this draft.
 */
final class SubscriptionDraft extends Data
{
    /**
     * @param  list<string>  $mealTypes
     * @param  list<int>  $selectedDays
     * @param  list<array{date: string, meals: array<string, string|null>}>  $mealSchedule
     */
    public function __construct(
        public readonly string $planPublicId,
        public readonly array $mealTypes,
        public readonly string $durationUnit,
        public readonly int $durationLength,
        public readonly array $selectedDays,
        public readonly ?string $startDate,
        public readonly ?string $couponCode,
        public readonly HealthProfile $health,
        public readonly array $mealSchedule = [],
    ) {}

    /**
     * @param  array<string, mixed>  $attributes
     */
    public static function fromArray(array $attributes): static
    {
        $mealTypes = $attributes['meal_types'] ?? [];
        $selectedDays = $attributes['selected_days'] ?? [];
        $coupon = $attributes['coupon_code'] ?? null;
        $startDate = $attributes['start_date'] ?? null;
        $health = $attributes['health'] ?? [];

        return new self(
            planPublicId: (string) ($attributes['plan_public_id'] ?? ''),
            mealTypes: array_values(array_map(
                static fn ($value): string => (string) $value,
                is_array($mealTypes) ? $mealTypes : [],
            )),
            durationUnit: (string) ($attributes['duration_unit'] ?? 'day'),
            durationLength: max(1, (int) ($attributes['duration_length'] ?? 1)),
            selectedDays: array_values(array_map(
                static fn ($value): int => (int) $value,
                is_array($selectedDays) ? $selectedDays : [],
            )),
            startDate: is_string($startDate) && $startDate !== '' ? $startDate : null,
            couponCode: is_string($coupon) && trim($coupon) !== '' ? trim($coupon) : null,
            health: HealthProfile::fromArray(is_array($health) ? $health : []),
            mealSchedule: MealSchedule::normalize($attributes['meal_schedule'] ?? []),
        );
    }

    /**
     * Shape expected by the pricing request data and the session store.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'plan_public_id' => $this->planPublicId,
            'meal_types' => $this->mealTypes,
            'duration_unit' => $this->durationUnit,
            'duration_length' => $this->durationLength,
            'selected_days' => $this->selectedDays,
            'start_date' => $this->startDate,
            'coupon_code' => $this->couponCode,
            'health' => $this->health->toArray(),
            'meal_schedule' => $this->mealSchedule,
        ];
    }
}
