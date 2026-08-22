<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Fulfillment state for a single subscription delivery day.
 *
 * The days themselves live in `subscriptions.meal_schedule`, which carries no
 * state at all. A row is written here the first time the shipping team acts on
 * a day, so an untouched day simply has no record and reads as "not delivered".
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subscription_deliveries', function (Blueprint $table): void {
            $table->id();
            $table->ulid('public_id')->unique();
            $table->foreignId('subscription_id')->constrained('subscriptions')->cascadeOnDelete();
            $table->date('delivery_date');
            $table->string('status')->default('pending')->index();
            $table->timestamp('dispatched_at')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->string('failure_reason', 500)->nullable();
            $table->foreignId('handled_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();

            // One record per delivery day: acting on the same day again updates it.
            $table->unique(['subscription_id', 'delivery_date']);
            $table->index(['delivery_date', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subscription_deliveries');
    }
};
