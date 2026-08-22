<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('subscriptions', function (Blueprint $table): void {
            $table->date('pause_started_on')->nullable()->after('start_date');
            $table->timestamp('paused_at')->nullable()->after('pause_started_on');
            $table->json('paused_schedule')->nullable()->after('meal_schedule');
        });
    }

    public function down(): void
    {
        Schema::table('subscriptions', function (Blueprint $table): void {
            $table->dropColumn(['pause_started_on', 'paused_at', 'paused_schedule']);
        });
    }
};
