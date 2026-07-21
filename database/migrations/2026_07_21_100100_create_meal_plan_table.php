<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('meal_plan', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('plan_id')->constrained('plans')->cascadeOnDelete();
            $table->foreignId('meal_id')->constrained('meals')->cascadeOnDelete();

            $table->unique(['plan_id', 'meal_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('meal_plan');
    }
};
