<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Left empty on existing addresses: checkout asks the customer for one.
        Schema::table('addresses', function (Blueprint $table): void {
            $table->string('backup_phone', 32)->nullable()->after('phone');
        });
    }

    public function down(): void
    {
        Schema::table('addresses', function (Blueprint $table): void {
            $table->dropColumn('backup_phone');
        });
    }
};
