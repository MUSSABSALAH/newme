<?php

declare(strict_types=1);

namespace App\Modules\Plans\Enums;

/**
 * Time unit a plan duration option is expressed in.
 */
enum DurationUnit: string
{
    case Day = 'day';
    case Week = 'week';
    case Month = 'month';

    /**
     * @return list<string>
     */
    public static function values(): array
    {
        return array_map(static fn (self $unit): string => $unit->value, self::cases());
    }

    /**
     * Number of calendar days one unit represents.
     */
    public function days(): int
    {
        return match ($this) {
            self::Day => 1,
            self::Week => 7,
            self::Month => 30,
        };
    }

    /**
     * Total calendar days for a given length of this unit.
     */
    public function toDays(int $length): int
    {
        return $this->days() * $length;
    }

    /**
     * Localized, human-readable label for this unit.
     */
    public function label(): string
    {
        return (string) __('plans.units.'.$this->value);
    }
}
