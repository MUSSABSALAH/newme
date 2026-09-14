<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table): void {
            $table->string('fulfillment_method')->default('delivery')->after('address_id');
            $table->unsignedBigInteger('delivery_fee_minor')->default(0)->after('discount_minor');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table): void {
            $table->dropColumn(['fulfillment_method', 'delivery_fee_minor']);
        });
    }
};
