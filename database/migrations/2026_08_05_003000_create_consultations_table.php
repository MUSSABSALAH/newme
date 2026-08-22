<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('consultations', function (Blueprint $table): void {
            $table->id();
            $table->ulid('public_id')->unique();
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('goal')->nullable();
            $table->date('scheduled_on')->index();
            $table->time('starts_at');
            $table->time('ends_at');
            $table->string('status')->default('pending')->index();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['scheduled_on', 'starts_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
