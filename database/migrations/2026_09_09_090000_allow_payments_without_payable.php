<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('payments', function (Blueprint $table): void {
            $table->string('payable_type')->nullable()->change();
            $table->unsignedBigInteger('payable_id')->nullable()->change();
            $table->json('checkout_intent')->nullable()->after('decline_reason');
        });
    }

    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table): void {
            $table->dropColumn('checkout_intent');
            $table->string('payable_type')->nullable(false)->change();
            $table->unsignedBigInteger('payable_id')->nullable(false)->change();
        });
    }
};
