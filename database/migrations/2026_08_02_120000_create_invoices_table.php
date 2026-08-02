<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table): void {
            $table->id();
            $table->ulid('public_id')->unique();
            $table->string('number', 32)->unique();

            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->morphs('invoiceable');
            $table->foreignId('payment_id')->nullable()->constrained('payments')->nullOnDelete();

            $table->timestamp('issued_at');
            $table->string('currency', 3)->default('SAR');
            $table->unsignedInteger('tax_rate_bps')->default(1500);

            // Invariants: lines_total - discount = net, and net + tax = total.
            $table->integer('lines_total_minor');
            $table->integer('discount_minor')->default(0);
            $table->integer('net_minor');
            $table->integer('tax_minor')->default(0);
            $table->integer('total_minor');

            $table->json('seller');
            $table->json('buyer');
            $table->json('lines');

            $table->timestamps();

            // One invoice per payable: the database is the last line of defence
            // against a double issue when two confirmations race.
            $table->unique(['invoiceable_type', 'invoiceable_id'], 'invoices_payable_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
