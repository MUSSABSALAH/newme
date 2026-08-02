<?php

declare(strict_types=1);

use App\Modules\Identity\Enums\UserType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table): void {
            // Existing accounts are all internal staff.
            $table->string('type')->default(UserType::Staff->value)->after('status')->index();
            $table->string('phone', 32)->nullable()->after('email');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table): void {
            $table->dropColumn(['type', 'phone']);
        });
    }
};
