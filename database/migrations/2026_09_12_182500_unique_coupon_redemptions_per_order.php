<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('coupon_redemptions', function (Blueprint $table): void {
            $table->unique(
                ['coupon_id', 'redeemable_type', 'redeemable_id'],
                'coupon_redemptions_coupon_redeemable_unique',
            );
        });
    }

    public function down(): void
    {
        Schema::table('coupon_redemptions', function (Blueprint $table): void {
            $table->dropUnique('coupon_redemptions_coupon_redeemable_unique');
        });
    }
};
