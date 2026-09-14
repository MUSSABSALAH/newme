<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Both order lists already find their rows through an index but then sort them
 * in memory: EXPLAIN showed "Using filesort" for the customer's own orders and
 * for the admin list. Adding created_at to each index removes the sort.
 *
 * MySQL retires orders_user_id_foreign once the wider index starting with
 * user_id exists, so down() puts it back before dropping this one — the foreign
 * key needs an index to sit on.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table): void {
            $table->index(['user_id', 'created_at'], 'orders_user_created_index');
            $table->index(['status', 'created_at'], 'orders_status_created_index');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table): void {
            $table->index('user_id', 'orders_user_id_foreign');
        });

        Schema::table('orders', function (Blueprint $table): void {
            $table->dropIndex('orders_user_created_index');
            $table->dropIndex('orders_status_created_index');
        });
    }
};
