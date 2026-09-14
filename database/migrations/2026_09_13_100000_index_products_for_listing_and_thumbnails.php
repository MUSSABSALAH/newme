<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * The store listing and the category thumbnail lookup both read
 * "is_active = 1 ... order by sort_order, id", which EXPLAIN reported as a full
 * table scan plus a filesort. These two indexes cover the filter and the sort.
 *
 * The old single-column is_active index is dropped because it is the leftmost
 * prefix of the new one, so it can no longer be chosen — it was pure write cost.
 *
 * MySQL also retires products_category_id_foreign on its own once the wider
 * index starting with category_id exists, which is why down() has to put that
 * index back before dropping this one: the foreign key needs an index to sit on.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table): void {
            $table->index(['is_active', 'sort_order', 'id'], 'products_active_order_index');
            $table->index(['category_id', 'is_active', 'sort_order', 'id'], 'products_category_active_order_index');
        });

        Schema::table('products', function (Blueprint $table): void {
            $table->dropIndex('products_is_active_index');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table): void {
            $table->index('is_active', 'products_is_active_index');
            $table->index('category_id', 'products_category_id_foreign');
        });

        Schema::table('products', function (Blueprint $table): void {
            $table->dropIndex('products_active_order_index');
            $table->dropIndex('products_category_active_order_index');
        });
    }
};
