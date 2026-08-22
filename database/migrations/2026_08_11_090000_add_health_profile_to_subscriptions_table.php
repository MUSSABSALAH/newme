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
            // Snapshot of what the customer declared when this subscription was placed.
            $table->date('health_birth_date')->nullable()->after('start_date');
            $table->text('health_allergies')->nullable()->after('health_birth_date');
            $table->text('health_medications')->nullable()->after('health_allergies');
        });
    }

    public function down(): void
    {
        Schema::table('subscriptions', function (Blueprint $table): void {
            $table->dropColumn(['health_birth_date', 'health_allergies', 'health_medications']);
        });
    }
};
