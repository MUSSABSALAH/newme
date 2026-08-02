<?php

declare(strict_types=1);

namespace App\Modules\Subscriptions\Enums;

/**
 * How far the team has got with a subscription request.
 *
 * This tracks the staff side of the work and is deliberately separate from
 * {@see SubscriptionStatus}, which describes the subscription itself. A paid,
 * active subscription can still be waiting for someone to call the customer.
 */
enum HandlingStatus: string
{
    case New = 'new';
    case Viewed = 'viewed';
    case Contacted = 'contacted';
    case Handled = 'handled';
    case OnHold = 'on_hold';

    /**
     * @return list<string>
     */
    public static function values(): array
    {
        return array_map(static fn (self $status): string => $status->value, self::cases());
    }

    public function label(): string
    {
        return (string) __('subscriptions.handling.statuses.'.$this->value);
    }

    /**
     * Variant for the x-ui.badge component, running red to green as the work
     * progresses.
     */
    public function badge(): string
    {
        return match ($this) {
            self::New => 'danger',
            self::Viewed => 'warning',
            self::Contacted => 'info',
            self::Handled => 'success',
            self::OnHold => 'neutral',
        };
    }

    /**
     * Whether the request is still on someone's plate.
     */
    public function needsAttention(): bool
    {
        return $this !== self::Handled;
    }
}
