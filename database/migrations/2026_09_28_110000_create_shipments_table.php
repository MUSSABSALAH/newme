<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shipments', function (Blueprint $table): void {
            $table->id();
            $table->ulid('public_id')->unique();
            $table->morphs('shippable');
            $table->string('provider', 16)->default('walim');
            // The order_id sent to the provider: one live task per reference.
            $table->string('reference', 64)->unique();
            $table->string('status', 16)->default('pending')->index();
            $table->unsignedBigInteger('pickup_job_id')->nullable()->index();
            $table->unsignedBigInteger('delivery_job_id')->nullable()->index();
            $table->string('job_hash', 64)->nullable();
            $table->string('tracking_link', 500)->nullable();
            $table->string('pickup_tracking_link', 500)->nullable();
            $table->unsignedTinyInteger('provider_status')->nullable();
            $table->string('fleet_name')->nullable();
            $table->text('last_error')->nullable();
            $table->unsignedInteger('attempts')->default(0);
            $table->foreignId('sent_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('sent_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
