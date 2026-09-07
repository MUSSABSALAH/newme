<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Modules\Plans\Models\Meal;
use App\Modules\Plans\Models\Plan;
use App\Modules\Plans\Seeders\PlanSeeder;
use App\Modules\Subscriptions\Models\Subscription;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Throwable;

/**
 * Wipes the subscription-plan catalogue — plans, versions, price tables, meals
 * and every customer subscription built on them — then reseeds the current
 * programs from `database/data/newme-programs-1400.json`.
 *
 * Subscriptions must go first: `subscriptions.plan_id` is nullOnDelete, so
 * dropping plans alone would leave orphaned subscriptions behind.
 */
final class ResetPlanCatalog extends Command
{
    protected $signature = 'plans:reset {--force : Skip the confirmation prompt}';

    protected $description = 'Delete all plans, meals and subscriptions, then reseed the current programs';

    public function handle(): int
    {
        $counts = [
            'subscriptions' => Subscription::withTrashed()->count(),
            'plans' => Plan::withTrashed()->count(),
            'meals' => Meal::withTrashed()->count(),
        ];

        $this->warn(sprintf(
            'About to delete %d subscription(s), %d plan(s) and %d meal(s), including their invoices and payments.',
            $counts['subscriptions'],
            $counts['plans'],
            $counts['meals'],
        ));

        if (! $this->option('force') && ! $this->confirm('This cannot be undone. Continue?', false)) {
            $this->info('Aborted.');

            return self::SUCCESS;
        }

        try {
            DB::transaction(function (): void {
                $this->wipe();
            });
        } catch (Throwable $e) {
            $this->error('Wipe failed, nothing was changed: '.$e->getMessage());

            return self::FAILURE;
        }

        $this->call('db:seed', ['--class' => PlanSeeder::class, '--force' => true]);

        $this->newLine();
        $this->info(sprintf(
            'Seeded %d plan(s) and %d meal(s).',
            Plan::query()->count(),
            Meal::query()->count(),
        ));

        return self::SUCCESS;
    }

    private function wipe(): void
    {
        $subscriptionType = Subscription::class;

        // Morph relations carry no database foreign key, so clear them by type.
        DB::table('invoices')->where('invoiceable_type', $subscriptionType)->delete();
        DB::table('payments')->where('payable_type', $subscriptionType)->delete();
        DB::table('coupon_redemptions')->where('redeemable_type', $subscriptionType)->delete();

        // subscription_deliveries cascades with its subscription.
        DB::table('subscriptions')->delete();

        // plan_versions, plan_pricing_rules and meal_plan cascade with the plan.
        DB::table('plans')->delete();
        DB::table('meals')->delete();
    }
}
