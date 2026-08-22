<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recipes', function (Blueprint $table): void {
            $table->id();
            $table->ulid('public_id')->unique();
            $table->string('slug')->unique();
            $table->json('category');
            $table->json('title');
            $table->json('excerpt')->nullable();
            $table->json('meta_title')->nullable();
            $table->json('time_label')->nullable();
            $table->json('kcal_label')->nullable();
            $table->json('protein_label')->nullable();
            $table->json('servings_label')->nullable();
            $table->json('ingredients')->nullable();
            $table->json('steps')->nullable();
            $table->json('cta_label')->nullable();
            $table->string('cta_url')->nullable();
            $table->string('image_path')->nullable();
            $table->boolean('is_active')->default(true)->index();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
