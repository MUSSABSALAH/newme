<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('plan_pricing_rules', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('plan_version_id')->constrained('plan_versions')->cascadeOnDelete();
            $table->unsignedSmallInteger('dishes_per_day');
            $table->string('duration_unit');
            $table->unsignedInteger('duration_length');
            // Package price for this combination, in integer minor units.
            $table->bigInteger('price');
            $table->decimal('discount_percent', 5, 2)->default(0);
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();

            $table->unique(
                ['plan_version_id', 'dishes_per_day', 'duration_unit', 'duration_length'],
                'plan_pricing_rules_combo_unique',
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plan_pricing_rules');
    }
};
