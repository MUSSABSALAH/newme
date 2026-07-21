<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private function table(): string
    {
        return config('permission.table_names.roles', 'roles');
    }

    public function up(): void
    {
        Schema::table($this->table(), function (Blueprint $table): void {
            $table->json('display_name')->nullable()->after('name');
        });
    }

    public function down(): void
    {
        Schema::table($this->table(), function (Blueprint $table): void {
            $table->dropColumn('display_name');
        });
    }
};
