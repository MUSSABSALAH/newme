<?php

declare(strict_types=1);

namespace App\Modules\Plans\DTOs;

use App\Modules\Plans\Enums\PlanGoal;
use App\Support\Dto\Data;
use App\Support\Money\Money;

final class PlanData extends Data
{
    /**
     * @param  array<string, string>  $name  Locale-keyed display names.
     * @param  array<string, string>  $description  Locale-keyed descriptions.
     * @param  array<string, list<string>>  $features  Locale-keyed feature lists.
     * @param  int  $deliveryFee  Delivery fee in integer minor units.
     */
    public function __construct(
        public readonly PlanGoal $goal,
        public readonly array $name,
        public readonly array $description,
        public readonly array $features,
        public readonly ?string $imagePath,
        public readonly bool $requiresDaySelection,
        public readonly int $minDeliveryDaysPerWeek,
        public readonly int $deliveryFee,
        public readonly bool $isActive,
        public readonly int $sortOrder,
    ) {}

    /**
     * @param  array<string, mixed>  $attributes
     */
    public static function fromArray(array $attributes): static
    {
        $goal = $attributes['goal'] ?? PlanGoal::Balanced->value;
        $deliveryFee = $attributes['delivery_fee'] ?? null;

        return new self(
            goal: $goal instanceof PlanGoal ? $goal : PlanGoal::from((string) $goal),
            name: self::localeStrings($attributes['name'] ?? []),
            description: self::localeStrings($attributes['description'] ?? []),
            features: self::localeLists($attributes['features'] ?? []),
            imagePath: self::nullableString($attributes['image_path'] ?? null),
            requiresDaySelection: (bool) ($attributes['requires_day_selection'] ?? false),
            minDeliveryDaysPerWeek: max(1, (int) ($attributes['min_delivery_days_per_week'] ?? 5)),
            deliveryFee: is_string($deliveryFee) && $deliveryFee !== ''
                ? Money::fromMajor($deliveryFee)->toMinor()
                : (int) ($deliveryFee ?? 0),
            isActive: (bool) ($attributes['is_active'] ?? false),
            sortOrder: (int) ($attributes['sort_order'] ?? 0),
        );
    }

    /**
     * @param  mixed  $value
     * @return array<string, string>
     */
    private static function localeStrings($value): array
    {
        if (! is_array($value)) {
            return [];
        }

        return array_filter(
            $value,
            static fn ($v): bool => is_string($v) && trim($v) !== '',
        );
    }

    /**
     * Split newline-separated textarea input into a list per locale.
     *
     * @param  mixed  $value
     * @return array<string, list<string>>
     */
    private static function localeLists($value): array
    {
        if (! is_array($value)) {
            return [];
        }

        $result = [];

        foreach ($value as $locale => $raw) {
            if (! is_string($locale) || ! is_string($raw)) {
                continue;
            }

            $lines = array_values(array_filter(
                array_map('trim', preg_split('/\r\n|\r|\n/', $raw) ?: []),
                static fn (string $line): bool => $line !== '',
            ));

            if ($lines !== []) {
                $result[$locale] = $lines;
            }
        }

        return $result;
    }

    /**
     * @param  mixed  $value
     */
    private static function nullableString($value): ?string
    {
        return is_string($value) && $value !== '' ? $value : null;
    }
}
