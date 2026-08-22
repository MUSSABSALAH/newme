<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('subscriptions', function (Blueprint $table): void {
            $table->string('mode', 20)->default('once')->change();
        });

        // Nothing ever renewed a "flex" subscription, so the label was cosmetic.
        DB::table('subscriptions')->where('mode', '!=', 'once')->update(['mode' => 'once']);
    }

    public function down(): void
    {
        Schema::table('subscriptions', function (Blueprint $table): void {
            $table->string('mode', 20)->default('flex')->change();
        });
    }
};
