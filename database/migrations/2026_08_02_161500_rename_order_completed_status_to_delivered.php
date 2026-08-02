<?php

declare(strict_types=1);

use App\Modules\Orders\Enums\OrderStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('orders')
            ->where('status', 'completed')
            ->update(['status' => OrderStatus::Delivered->value]);
    }

    public function down(): void
    {
        DB::table('orders')
            ->where('status', OrderStatus::Delivered->value)
            ->update(['status' => 'completed']);
    }
};
