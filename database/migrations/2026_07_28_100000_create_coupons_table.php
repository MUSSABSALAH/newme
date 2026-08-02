<?php

declare(strict_types=1);

use App\Modules\Promotions\Enums\CouponScope;
use App\Modules\Promotions\Enums\CouponType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('coupons', function (Blueprint $table): void {
            $table->id();
            $table->ulid('public_id')->unique();
            $table->string('code')->unique(); // stored upper case
            $table->json('name')->nullable();
            $table->string('type')->default(CouponType::Percentage->value);
            $table->string('scope')->default(CouponScope::All->value)->index();

            // Only the column matching `type` is populated.
            $table->decimal('percent_off', 5, 2)->nullable();
            $table->bigInteger('amount_off_minor')->nullable(); // minor units (halalas)

            $table->bigInteger('min_subtotal_minor')->default(0); // minor units
            $table->bigInteger('max_discount_minor')->nullable(); // caps percentage codes

            $table->unsignedInteger('max_redemptions')->nullable(); // null = unlimited
            $table->unsignedInteger('max_redemptions_per_user')->nullable();
            $table->unsignedInteger('redemptions_count')->default(0);

            $table->timestamp('starts_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
