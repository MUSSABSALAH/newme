<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table): void {
            $table->id();
            $table->ulid('public_id')->unique();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->string('slug')->unique();
            $table->json('name');
            $table->json('description')->nullable();
            $table->string('image_path')->nullable();
            $table->string('external_url')->nullable();
            $table->bigInteger('price')->default(0); // minor units (halalas)
            $table->unsignedInteger('calories')->nullable();
            $table->string('serving_size')->nullable();
            $table->decimal('protein_g', 6, 2)->nullable();
            $table->decimal('carbs_g', 6, 2)->nullable();
            $table->decimal('fat_g', 6, 2)->nullable();
            $table->string('nutrition_note')->nullable();
            $table->string('flag')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true)->index();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
