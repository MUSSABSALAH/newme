<?php

declare(strict_types=1);

namespace App\Support\Ui;

use App\Models\User;
use App\Modules\Identity\Models\Role;
use App\Modules\Identity\Models\UserInvitation;
use App\Modules\Plans\Models\Meal;
use App\Modules\Plans\Models\Plan;

/**
 * Presentation helpers for rendering audit log rows.
 */
final class AuditActionPresenter
{
    /**
     * Badge variant for an audit action, driven by its verb suffix.
     */
    public static function variant(string $action): string
    {
        return match (true) {
            str_contains($action, '.created'), str_contains($action, '.activated'), str_contains($action, '.published') => 'success',
            str_contains($action, '.deleted'), str_contains($action, '.deactivated'), str_contains($action, '.archived') => 'danger',
            str_contains($action, '.invited'), str_contains($action, '.resent'), str_contains($action, '.accepted') => 'info',
            default => 'neutral',
        };
    }

    /**
     * Localized label for an auditable model class.
     */
    public static function targetLabel(string $type): string
    {
        $key = match ($type) {
            User::class => 'audit.targets.user',
            Role::class => 'audit.targets.role',
            UserInvitation::class => 'audit.targets.invitation',
            Plan::class => 'audit.targets.plan',
            Meal::class => 'audit.targets.meal',
            default => null,
        };

        return $key !== null ? (string) __($key) : class_basename($type);
    }
}
