<?php

declare(strict_types=1);

namespace App\Modules\Consultations\Enums;

enum ConsultationStatus: string
{
    case Pending = 'pending';
    case Confirmed = 'confirmed';
    case Completed = 'completed';
    case NoShow = 'no_show';
    case Cancelled = 'cancelled';

    /**
     * @return list<string>
     */
    public static function values(): array
    {
        return array_map(static fn (self $status): string => $status->value, self::cases());
    }

    /**
     * Statuses that still hold the calendar slot.
     *
     * @return list<string>
     */
    public static function occupyingValues(): array
    {
        return array_values(array_map(
            static fn (self $status): string => $status->value,
            array_filter(self::cases(), static fn (self $status): bool => $status->occupiesSlot()),
        ));
    }

    public function label(): string
    {
        return (string) __('consultations.statuses.'.$this->value);
    }

    public function badge(): string
    {
        return match ($this) {
            self::Pending => 'warning',
            self::Confirmed => 'info',
            self::Completed => 'success',
            self::NoShow => 'neutral',
            self::Cancelled => 'danger',
        };
    }

    public function isTerminal(): bool
    {
        return in_array($this, [self::Completed, self::NoShow, self::Cancelled], true);
    }

    public function occupiesSlot(): bool
    {
        return $this === self::Pending || $this === self::Confirmed;
    }

    /**
     * @return list<self>
     */
    public function nextStatuses(): array
    {
        return match ($this) {
            self::Pending => [self::Confirmed, self::Completed, self::NoShow, self::Cancelled],
            self::Confirmed => [self::Completed, self::NoShow, self::Cancelled],
            self::Completed, self::NoShow, self::Cancelled => [],
        };
    }

    public function canTransitionTo(self $next): bool
    {
        if ($this === $next) {
            return true;
        }

        return in_array($next, $this->nextStatuses(), true);
    }
}
