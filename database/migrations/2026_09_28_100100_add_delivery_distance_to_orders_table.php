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
            $table->decimal('delivery_distance_km', 8, 3)->nullable()->after('delivery_fee_minor');
            $table->string('delivery_distance_method', 16)->nullable()->after('delivery_distance_km');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table): void {
            $table->dropColumn(['delivery_distance_km', 'delivery_distance_method']);
        });
    }
};
