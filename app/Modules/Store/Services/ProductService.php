<?php

declare(strict_types=1);

namespace App\Modules\Store\Services;

use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Audit\Services\AuditService;
use App\Modules\Store\DTOs\ProductData;
use App\Modules\Store\Models\Product;
use Illuminate\Support\Facades\DB;

final class ProductService
{
    public function __construct(private readonly AuditService $audit) {}

    public function create(ProductData $data): Product
    {
        return DB::transaction(function () use ($data): Product {
            $product = new Product;
            $this->fill($product, $data);
            $product->save();

            $this->audit->log(AuditAction::ProductCreated, $product, [], $this->snapshot($product));

            return $product;
        });
    }

    public function update(Product $product, ProductData $data): Product
    {
        return DB::transaction(function () use ($product, $data): Product {
            $old = $this->snapshot($product);

            $this->fill($product, $data);
            $product->save();

            $this->audit->log(AuditAction::ProductUpdated, $product, $old, $this->snapshot($product->fresh() ?? $product));

            return $product;
        });
    }

    public function delete(Product $product): void
    {
        DB::transaction(function () use ($product): void {
            $old = $this->snapshot($product);

            $product->delete();

            $this->audit->log(AuditAction::ProductArchived, $product, $old);
        });
    }

    private function fill(Product $product, ProductData $data): void
    {
        $product->category_id = $data->categoryId;
        $product->slug = $data->slug;
        $product->setTranslations('name', $data->name);
        $product->setTranslations('description', $data->description);
        $product->external_url = $data->externalUrl;
        $product->price = $data->price;
        $product->calories = $data->calories;
        $product->serving_size = $data->servingSize;
        $product->protein_g = $data->proteinG;
        $product->carbs_g = $data->carbsG;
        $product->fat_g = $data->fatG;
        $product->nutrition_note = $data->nutritionNote;
        $product->flag = $data->flag;
        $product->is_featured = $data->isFeatured;
        $product->is_active = $data->isActive;
        $product->sort_order = $data->sortOrder;

        if ($data->imagePath !== null) {
            $product->image_path = $data->imagePath;
        }
    }

    /**
     * @return array<string, mixed>
     */
    private function snapshot(Product $product): array
    {
        return [
            'category_id' => $product->category_id,
            'slug' => $product->slug,
            'name' => $product->getTranslations('name'),
            'price' => $product->price,
            'flag' => $product->flag?->value,
            'is_featured' => $product->is_featured,
            'is_active' => $product->is_active,
        ];
    }
}
