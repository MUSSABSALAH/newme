<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\User;
use App\Modules\Audit\Models\AuditLog;
use App\Modules\Audit\Policies\AuditLogPolicy;
use App\Modules\Identity\Models\Role;
use App\Modules\Identity\Policies\RolePolicy;
use App\Modules\Identity\Policies\UserPolicy;
use App\Modules\Plans\Models\Meal;
use App\Modules\Plans\Models\Plan;
use App\Modules\Plans\Policies\MealPolicy;
use App\Modules\Plans\Policies\PlanPolicy;
use App\Modules\Settings\Models\Setting;
use App\Modules\Settings\Policies\SettingsPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Role::class, RolePolicy::class);
        Gate::policy(User::class, UserPolicy::class);
        Gate::policy(AuditLog::class, AuditLogPolicy::class);
        Gate::policy(Setting::class, SettingsPolicy::class);
        Gate::policy(Plan::class, PlanPolicy::class);
        Gate::policy(Meal::class, MealPolicy::class);
    }
}
