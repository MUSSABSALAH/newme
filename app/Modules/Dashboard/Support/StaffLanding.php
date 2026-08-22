<?php

declare(strict_types=1);

namespace App\Modules\Dashboard\Support;

use App\Models\User;
use App\Modules\Dashboard\Enums\DashboardPanel;

/**
 * Where a staff member should land after signing in.
 *
 * Most of the team starts on the dashboard. Someone whose whole job is one
 * panel is taken straight to the screen they work on instead of a home page
 * that only summarizes it — the shipping team opens the system on their run.
 */
final class StaffLanding
{
    /** Panels that own a working screen worth landing on directly. */
    private const DIRECT = [
        'deliveries' => 'admin.deliveries.index',
    ];

    public static function routeFor(User $user): string
    {
        $panels = DashboardPanel::visibleTo($user);

        if (count($panels) === 1) {
            $route = self::DIRECT[$panels[0]->value] ?? null;

            if ($route !== null) {
                return route($route);
            }
        }

        return route('admin.dashboard');
    }
}
