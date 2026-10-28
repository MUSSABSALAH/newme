<?php

declare(strict_types=1);

use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Subscriptions\Models\Subscription;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('subscriptions', function (Blueprint $table): void {
            $table->unsignedSmallInteger('pause_count')->default(0)->after('paused_at');
        });

        // Earlier customer pauses only live in the audit trail; staff pauses
        // carry "by_staff" and never use up the customer's allowance.
        DB::table('audit_logs')
            ->where('action', AuditAction::SubscriptionPaused->value)
            ->where('auditable_type', Subscription::class)
            ->whereNotNull('auditable_id')
            ->whereNull('new_values->by_staff')
            ->groupBy('auditable_id')
            ->select('auditable_id', DB::raw('count(*) as pauses'))
            ->orderBy('auditable_id')
            ->chunk(500, function ($rows): void {
                foreach ($rows as $row) {
                    DB::table('subscriptions')
                        ->where('id', $row->auditable_id)
                        ->update(['pause_count' => min(65535, (int) $row->pauses)]);
                }
            });
    }

    public function down(): void
    {
        Schema::table('subscriptions', function (Blueprint $table): void {
            $table->dropColumn('pause_count');
        });
    }
};
