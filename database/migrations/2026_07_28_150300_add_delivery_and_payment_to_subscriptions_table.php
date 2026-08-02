<?php

declare(strict_types=1);

use App\Modules\Payments\Enums\PaymentStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('subscriptions', function (Blueprint $table): void {
            $table->foreignId('address_id')->nullable()->after('user_id')->constrained('addresses')->nullOnDelete();
            $table->json('shipping_address')->nullable()->after('address_id');
            $table->string('payment_method')->nullable()->after('total_minor');
            $table->string('payment_status')->default(PaymentStatus::Pending->value)->after('payment_method')->index();
        });
    }

    public function down(): void
    {
        Schema::table('subscriptions', function (Blueprint $table): void {
            $table->dropConstrainedForeignId('address_id');
            $table->dropColumn(['shipping_address', 'payment_method', 'payment_status']);
        });
    }
};
