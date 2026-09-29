<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('addresses', function (Blueprint $table): void {
            $table->decimal('lat', 10, 7)->nullable()->after('national_address');
            $table->decimal('lng', 10, 7)->nullable()->after('lat');
            $table->decimal('distance_km', 8, 3)->nullable()->after('lng');
            $table->string('distance_method', 16)->nullable()->after('distance_km');
            $table->string('distance_fingerprint', 64)->nullable()->after('distance_method');
            $table->timestamp('distance_measured_at')->nullable()->after('distance_fingerprint');
        });
    }

    public function down(): void
    {
        Schema::table('addresses', function (Blueprint $table): void {
            $table->dropColumn([
                'lat',
                'lng',
                'distance_km',
                'distance_method',
                'distance_fingerprint',
                'distance_measured_at',
            ]);
        });
    }
};
