<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // The combo unique index is the leftmost index MySQL uses for the
        // plan_version_id foreign key, so add a dedicated index before dropping it.
        Schema::table('plan_pricing_rules', function (Blueprint $table): void {
            $table->index('plan_version_id', 'plan_pricing_rules_plan_version_id_index');
        });

        Schema::table('plan_pricing_rules', function (Blueprint $table): void {
            $table->dropUnique('plan_pricing_rules_combo_unique');
            $table->dropColumn('dishes_per_day');
        });

        Schema::table('plan_pricing_rules', function (Blueprint $table): void {
            $table->json('meal_types')->after('plan_version_id');
            // Sorted, comma-joined meal-type values for matching and uniqueness.
            $table->string('meal_types_key')->after('meal_types');

            $table->unique(
                ['plan_version_id', 'meal_types_key', 'duration_unit', 'duration_length'],
                'plan_pricing_rules_combo_unique',
            );
        });
    }

    public function down(): void
    {
        Schema::table('plan_pricing_rules', function (Blueprint $table): void {
            $table->dropUnique('plan_pricing_rules_combo_unique');
            $table->dropColumn(['meal_types', 'meal_types_key']);
        });

        Schema::table('plan_pricing_rules', function (Blueprint $table): void {
            $table->unsignedSmallInteger('dishes_per_day')->after('plan_version_id');

            $table->unique(
                ['plan_version_id', 'dishes_per_day', 'duration_unit', 'duration_length'],
                'plan_pricing_rules_combo_unique',
            );
        });

        Schema::table('plan_pricing_rules', function (Blueprint $table): void {
            $table->dropIndex('plan_pricing_rules_plan_version_id_index');
        });
    }
};
