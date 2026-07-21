<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('plans', function (Blueprint $table): void {
            $table->id();
            $table->ulid('public_id')->unique();
            $table->string('goal')->index();
            $table->json('name');
            $table->json('description')->nullable();
            $table->json('features')->nullable();
            $table->string('image_path')->nullable();
            $table->unsignedInteger('default_calories')->nullable();
            $table->unsignedTinyInteger('protein_pct')->nullable();
            $table->unsignedTinyInteger('carbs_pct')->nullable();
            $table->unsignedTinyInteger('fat_pct')->nullable();
            $table->boolean('requires_day_selection')->default(true);
            $table->unsignedTinyInteger('min_delivery_days_per_week')->default(5);
            // Delivery fee in integer minor units (e.g. halalas).
            $table->bigInteger('delivery_fee')->default(0);
            $table->boolean('is_active')->default(true)->index();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
