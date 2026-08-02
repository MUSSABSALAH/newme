<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\User;
use App\Modules\Audit\Models\AuditLog;
use App\Modules\Audit\Policies\AuditLogPolicy;
use App\Modules\Identity\Models\Role;
use App\Modules\Identity\Policies\RolePolicy;
use App\Modules\Identity\Policies\UserPolicy;
use App\Modules\Invoices\Models\Invoice;
use App\Modules\Invoices\Policies\InvoicePolicy;
use App\Modules\Notifications\Support\NotificationPresenter;
use App\Modules\Orders\Models\Order;
use App\Modules\Orders\Policies\OrderPolicy;
use App\Modules\Payments\Contracts\PaymentGateway;
use App\Modules\Plans\Models\Meal;
use App\Modules\Plans\Models\Plan;
use App\Modules\Plans\Policies\MealPolicy;
use App\Modules\Plans\Policies\PlanPolicy;
use App\Modules\Promotions\Models\Coupon;
use App\Modules\Promotions\Policies\CouponPolicy;
use App\Modules\Settings\Models\Setting;
use App\Modules\Settings\Policies\SettingsPolicy;
use App\Modules\Store\Models\Category;
use App\Modules\Store\Models\Product;
use App\Modules\Store\Policies\CategoryPolicy;
use App\Modules\Store\Policies\ProductPolicy;
use App\Modules\Store\Services\CartService;
use App\Modules\Subscriptions\Models\Subscription;
use App\Modules\Subscriptions\Policies\SubscriptionPolicy;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use InvalidArgumentException;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PaymentGateway::class, function (): PaymentGateway {
            $driver = (string) config('payments.driver', 'simulated');
            $gateway = config('payments.gateways.'.$driver);

            if (! is_string($gateway) || ! class_exists($gateway)) {
                throw new InvalidArgumentException("Unknown payment gateway [{$driver}].");
            }

            return $this->app->make($gateway);
        });
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
        Gate::policy(Category::class, CategoryPolicy::class);
        Gate::policy(Product::class, ProductPolicy::class);
        Gate::policy(Coupon::class, CouponPolicy::class);
        Gate::policy(Order::class, OrderPolicy::class);
        Gate::policy(Subscription::class, SubscriptionPolicy::class);
        Gate::policy(Invoice::class, InvoicePolicy::class);

        // Expose the live cart count to the shared website navigation.
        View::composer('website.partials.nav', function ($view): void {
            $view->with('cartCount', app(CartService::class)->count());
        });

        // The admin topbar bell needs the signed-in staff member's inbox.
        View::composer('components.layouts.admin', function ($view): void {
            $user = Auth::user();

            if (! $user instanceof User) {
                $view->with(['bellUnread' => 0, 'bellRecent' => collect()]);

                return;
            }

            $view->with([
                'bellUnread' => $user->unreadNotifications()->count(),
                'bellRecent' => $user->notifications()->latest()->limit(5)->get()
                    ->map(static fn (DatabaseNotification $note): array => NotificationPresenter::describe($note)),
            ]);
        });
    }
}
