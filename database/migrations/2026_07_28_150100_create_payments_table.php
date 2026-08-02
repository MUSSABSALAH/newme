<?php

declare(strict_types=1);

use App\Modules\Payments\Enums\PaymentStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table): void {
            $table->id();
            $table->ulid('public_id')->unique();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->morphs('payable');
            $table->string('method');
            $table->string('status')->default(PaymentStatus::Pending->value)->index();
            $table->string('currency', 3)->default('SAR');
            $table->unsignedBigInteger('amount_minor')->default(0);
            $table->string('gateway');
            $table->string('gateway_reference')->nullable()->index();
            $table->string('card_brand', 32)->nullable();
            $table->string('card_last4', 4)->nullable();
            $table->string('decline_reason')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
