<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('plans', function (Blueprint $table): void {
            $table->dropColumn(['default_calories', 'protein_pct', 'carbs_pct', 'fat_pct']);
        });
    }

    public function down(): void
    {
        Schema::table('plans', function (Blueprint $table): void {
            $table->unsignedInteger('default_calories')->nullable()->after('image_path');
            $table->unsignedTinyInteger('protein_pct')->nullable()->after('default_calories');
            $table->unsignedTinyInteger('carbs_pct')->nullable()->after('protein_pct');
            $table->unsignedTinyInteger('fat_pct')->nullable()->after('carbs_pct');
        });
    }
};
