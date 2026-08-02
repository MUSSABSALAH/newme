<?php

declare(strict_types=1);

use App\Modules\Subscriptions\Enums\SubscriptionStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $table): void {
            $table->id();
            $table->ulid('public_id')->unique();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('plan_id')->nullable()->constrained('plans')->nullOnDelete();
            $table->string('plan_name');
            $table->string('status')->default(SubscriptionStatus::Pending->value)->index();
            $table->string('mode', 20)->default('flex');
            $table->json('meal_types');
            $table->string('duration_unit', 20);
            $table->unsignedInteger('duration_length');
            $table->unsignedInteger('total_days');
            $table->json('selected_days')->nullable();
            $table->date('start_date')->nullable();
            $table->string('currency', 3)->default('SAR');
            $table->unsignedBigInteger('subtotal_minor')->default(0);
            $table->unsignedBigInteger('discount_minor')->default(0);
            $table->unsignedBigInteger('delivery_fee_minor')->default(0);
            $table->unsignedBigInteger('tax_minor')->default(0);
            $table->unsignedBigInteger('total_minor')->default(0);
            $table->unsignedBigInteger('per_day_minor')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
