<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('meals', function (Blueprint $table): void {
            $table->id();
            $table->ulid('public_id')->unique();
            $table->string('meal_type')->index();
            $table->json('name');
            $table->unsignedInteger('calories')->nullable();
            $table->unsignedInteger('protein_g')->nullable();
            $table->unsignedInteger('carbs_g')->nullable();
            $table->unsignedInteger('fat_g')->nullable();
            $table->string('image_path')->nullable();
            $table->boolean('is_active')->default(true)->index();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('meals');
    }
};
