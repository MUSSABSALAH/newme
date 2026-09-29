<?php

declare(strict_types=1);

namespace App\Modules\Delivery\Enums;

/**
 * Where a shipment handed to an outside courier stands on our side.
 *
 * Pending means the task has not been created yet (never sent, or the last
 * attempt failed); from Sent onwards the courier owns the task and its
 * webhooks move it along.
 */
enum ShipmentStatus: string
{
    case Pending = 'pending';
    case Sent = 'sent';
    case OnTheWay = 'on_the_way';
    case Delivered = 'delivered';
    case Failed = 'failed';
    case Cancelled = 'cancelled';

    public function label(): string
    {
        return (string) __('deliveries.walim.statuses.'.$this->value);
    }

    public function badge(): string
    {
        return match ($this) {
            self::Pending => 'neutral',
            self::Sent => 'info',
            self::OnTheWay => 'warning',
            self::Delivered => 'success',
            self::Failed, self::Cancelled => 'danger',
        };
    }

    /**
     * A live task exists at the courier, so sending again would duplicate it.
     */
    public function isLive(): bool
    {
        return $this === self::Sent || $this === self::OnTheWay || $this === self::Delivered;
    }

    /**
     * A task the courier may still act on, and so one worth cancelling.
     */
    public function isCancellable(): bool
    {
        return $this === self::Sent || $this === self::OnTheWay;
    }
}
