<?php

declare(strict_types=1);

namespace App\Modules\Subscriptions\Enums;

enum SubscriptionStatus: string
{
    case Pending = 'pending';
    case Active = 'active';
    case Paused = 'paused';
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
        return (string) __('subscriptions.statuses.'.$this->value);
    }

    /**
     * Variant for the x-ui.badge component.
     */
    public function badge(): string
    {
        return match ($this) {
            self::Pending => 'warning',
            self::Active => 'success',
            self::Paused => 'info',
            self::Cancelled => 'danger',
        };
    }
}
