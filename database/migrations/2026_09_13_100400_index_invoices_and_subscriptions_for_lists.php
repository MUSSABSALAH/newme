<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * The customer invoice list reads "user_id = ? order by issued_at desc", which
 * EXPLAIN reported as a filesort on top of the foreign-key index.
 *
 * The delivery board reads active subscriptions and then works out the dates in
 * PHP, so the index pairs status with start_date. The audit suggested pairing it
 * with next_delivery_at, but that column does not exist on this table.
 *
 * MySQL retires invoices_user_id_foreign once the wider index starting with
 * user_id exists, so down() puts it back before dropping this one.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('invoices', function (Blueprint $table): void {
            $table->index(['user_id', 'issued_at'], 'invoices_user_issued_index');
        });

        Schema::table('subscriptions', function (Blueprint $table): void {
            $table->index(['status', 'start_date'], 'subscriptions_status_start_index');
        });
    }

    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table): void {
            $table->index('user_id', 'invoices_user_id_foreign');
        });

        Schema::table('invoices', function (Blueprint $table): void {
            $table->dropIndex('invoices_user_issued_index');
        });

        Schema::table('subscriptions', function (Blueprint $table): void {
            $table->dropIndex('subscriptions_status_start_index');
        });
    }
};
