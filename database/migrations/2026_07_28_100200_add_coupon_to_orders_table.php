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
            $table->foreignId('coupon_id')->nullable()->after('currency')
                ->constrained('coupons')->nullOnDelete();

            // Snapshot so the order still shows its code if the coupon is gone.
            $table->string('coupon_code')->nullable()->after('coupon_id');
            $table->unsignedBigInteger('discount_minor')->default(0)->after('subtotal_minor');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table): void {
            $table->dropConstrainedForeignId('coupon_id');
            $table->dropColumn(['coupon_code', 'discount_minor']);
        });
    }
};
