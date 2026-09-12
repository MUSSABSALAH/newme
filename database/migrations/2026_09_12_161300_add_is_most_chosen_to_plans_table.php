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
        Schema::table('plans', function (Blueprint $table): void {
            $table->boolean('is_most_chosen')->default(false)->after('is_active');
        });

        DB::table('plans')
            ->where('goal', 'keto')
            ->whereNull('deleted_at')
            ->update(['is_most_chosen' => true]);
    }

    public function down(): void
    {
        Schema::table('plans', function (Blueprint $table): void {
            $table->dropColumn('is_most_chosen');
        });
    }
};
