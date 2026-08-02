<?php

declare(strict_types=1);

namespace App\Modules\Orders\Enums;

/**
 * Fulfillment state for a store order with in-house delivery.
 *
 * Payment settlement is tracked separately on {@see \App\Modules\Payments\Enums\PaymentStatus}.
 * Happy path: pending → confirmed → preparing → out_for_delivery → delivered.
 */
enum OrderStatus: string
{
    case Pending = 'pending';
    case Confirmed = 'confirmed';
    case Preparing = 'preparing';
    case OutForDelivery = 'out_for_delivery';
    case Delivered = 'delivered';
    case Cancelled = 'cancelled';

    /**
     * @return list<string>
     */
    public static function values(): array
    {
        return array_map(static fn (self $status): string => $status->value, self::cases());
    }

    public function label(): string
    {
        return (string) __('orders.statuses.'.$this->value);
    }

    /**
     * Variant for {@see \Illuminate\View\Component} x-ui.badge.
     */
    public function badge(): string
    {
        return match ($this) {
            self::Pending => 'warning',
            self::Confirmed => 'info',
            self::Preparing => 'info',
            self::OutForDelivery => 'warning',
            self::Delivered => 'success',
            self::Cancelled => 'danger',
        };
    }

    public function isTerminal(): bool
    {
        return $this === self::Delivered || $this === self::Cancelled;
    }

    /**
     * Statuses staff may move this order to next (excluding the current one).
     *
     * @return list<self>
     */
    public function nextStatuses(): array
    {
        return match ($this) {
            self::Pending => [self::Confirmed, self::Cancelled],
            self::Confirmed => [self::Preparing, self::Cancelled],
            self::Preparing => [self::OutForDelivery, self::Cancelled],
            self::OutForDelivery => [self::Delivered, self::Cancelled],
            self::Delivered, self::Cancelled => [],
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
