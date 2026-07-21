<?php

declare(strict_types=1);

namespace App\Modules\Plans\Enums;

/**
 * Lifecycle state of a plan pricing version.
 *
 * A draft is editable; publishing locks the version so existing subscriptions
 * always reference immutable pricing. Superseded versions are archived.
 */
enum PlanVersionStatus: string
{
    case Draft = 'draft';
    case Published = 'published';
    case Archived = 'archived';

    /**
     * @return list<string>
     */
    public static function values(): array
    {
        return array_map(static fn (self $status): string => $status->value, self::cases());
    }

    public function label(): string
    {
        return (string) __('plans.versions.statuses.'.$this->value);
    }

    public function badgeVariant(): string
    {
        return match ($this) {
            self::Draft => 'info',
            self::Published => 'success',
            self::Archived => 'neutral',
        };
    }
}
