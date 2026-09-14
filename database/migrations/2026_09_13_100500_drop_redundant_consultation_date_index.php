<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * consultations carries both (scheduled_on, starts_at) and (scheduled_on). The
 * second is the leftmost prefix of the first, so MySQL will never pick it —
 * it only costs time on every insert and update.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('consultations', function (Blueprint $table): void {
            $table->dropIndex('consultations_scheduled_on_index');
        });
    }

    public function down(): void
    {
        Schema::table('consultations', function (Blueprint $table): void {
            $table->index('scheduled_on', 'consultations_scheduled_on_index');
        });
    }
};
