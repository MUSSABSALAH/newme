<?php

declare(strict_types=1);

namespace App\Modules\Delivery\Walim;

/**
 * Task states as Walim reports them in job_status.
 */
enum WalimJobStatus: int
{
    case Assigned = 0;
    case Started = 1;
    case Successful = 2;
    case Failed = 3;
    case Arrived = 4;
    case Unassigned = 6;
    case Accepted = 7;
    case Declined = 8;
    case Cancelled = 9;
    case Deleted = 10;

    public function label(): string
    {
        return (string) __('deliveries.walim.job_statuses.'.$this->value);
    }

    /**
     * The task no longer exists as far as the courier is concerned.
     */
    public function isGone(): bool
    {
        return $this === self::Cancelled || $this === self::Deleted;
    }
}
