<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * The blog reads both tables as "is_active = 1 order by sort_order, id", which
 * EXPLAIN reported as a scan plus a filesort on each. As with products, the old
 * single-column is_active index becomes the leftmost prefix of the new one.
 *
 * Note the columns are is_active and sort_order, not the published_at pair the
 * audit assumed — neither of those columns exists on these tables.
 */
return new class extends Migration
{
    public function up(): void
    {
        foreach (['articles', 'recipes'] as $table) {
            Schema::table($table, function (Blueprint $blueprint) use ($table): void {
                $blueprint->index(['is_active', 'sort_order', 'id'], $table.'_active_order_index');
            });

            Schema::table($table, function (Blueprint $blueprint) use ($table): void {
                $blueprint->dropIndex($table.'_is_active_index');
            });
        }
    }

    public function down(): void
    {
        foreach (['articles', 'recipes'] as $table) {
            Schema::table($table, function (Blueprint $blueprint) use ($table): void {
                $blueprint->index('is_active', $table.'_is_active_index');
            });

            Schema::table($table, function (Blueprint $blueprint) use ($table): void {
                $blueprint->dropIndex($table.'_active_order_index');
            });
        }
    }
};
