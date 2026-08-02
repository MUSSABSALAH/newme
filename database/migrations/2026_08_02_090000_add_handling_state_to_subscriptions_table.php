<?php

declare(strict_types=1);

use App\Modules\Subscriptions\Enums\HandlingStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('subscriptions', function (Blueprint $table): void {
            $table->string('handling_status')
                ->default(HandlingStatus::New->value)
                ->after('status')
                ->index();

            // Who last moved the request along, and when.
            $table->foreignId('handled_by')
                ->nullable()
                ->after('handling_status')
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('handled_at')->nullable()->after('handled_by');
        });
    }

    public function down(): void
    {
        Schema::table('subscriptions', function (Blueprint $table): void {
            $table->dropConstrainedForeignId('handled_by');
            $table->dropColumn(['handling_status', 'handled_at']);
        });
    }
};
