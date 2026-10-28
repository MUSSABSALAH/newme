<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mail_quota_days', function (Blueprint $table): void {
            $table->date('day')->primary();
            $table->unsignedInteger('sent')->default(0);
        });

        Schema::create('staff_email_recipients', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('event', 64);
            $table->unique(['user_id', 'event']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('staff_email_recipients');
        Schema::dropIfExists('mail_quota_days');
    }
};
