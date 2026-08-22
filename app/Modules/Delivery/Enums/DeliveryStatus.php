<?php

declare(strict_types=1);

namespace App\Modules\Delivery\Enums;

/**
 * Fulfillment state of one subscription delivery day.
 *
 * A day starts as Pending simply by being on the schedule — no record exists
 * until the shipping team touches it. From there the happy path is
 * pending → dispatched → delivered, and a run that could not be handed over
 * ends as Failed so the day stays visible instead of quietly disappearing.
 */
enum DeliveryStatus: string
{
    case Pending = 'pending';
    case Dispatched = 'dispatched';
    case Delivered = 'delivered';
    case Failed = 'failed';

    /**
     * @return list<string>
     */
    public static function values(): array
    {
        return array_map(static fn (self $status): string => $status->value, self::cases());
    }

    public function label(): string
    {
        return (string) __('deliveries.statuses.'.$this->value);
    }

    public function badge(): string
    {
        return match ($this) {
            self::Pending => 'neutral',
            self::Dispatched => 'warning',
            self::Delivered => 'success',
            self::Failed => 'danger',
        };
    }

    /**
     * Nothing left for the shipping team to do on this day.
     */
    public function isSettled(): bool
    {
        return $this === self::Delivered || $this === self::Failed;
    }

    /**
     * @return list<self>
     */
    public function nextStatuses(): array
    {
        return match ($this) {
            self::Pending => [self::Dispatched, self::Delivered, self::Failed],
            self::Dispatched => [self::Delivered, self::Failed],
            // A failed run is re-attempted by dispatching it again.
            self::Failed => [self::Dispatched, self::Delivered],
            self::Delivered => [],
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
