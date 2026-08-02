<?php

declare(strict_types=1);

namespace App\Modules\Store\Services;

use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Audit\Services\AuditService;
use App\Modules\Store\DTOs\CategoryData;
use App\Modules\Store\Models\Category;
use Illuminate\Support\Facades\DB;

final class CategoryService
{
    public function __construct(private readonly AuditService $audit) {}

    public function create(CategoryData $data): Category
    {
        return DB::transaction(function () use ($data): Category {
            $category = new Category;
            $this->fill($category, $data);
            $category->save();

            $this->audit->log(AuditAction::CategoryCreated, $category, [], $this->snapshot($category));

            return $category;
        });
    }

    public function update(Category $category, CategoryData $data): Category
    {
        return DB::transaction(function () use ($category, $data): Category {
            $old = $this->snapshot($category);

            $this->fill($category, $data);
            $category->save();

            $this->audit->log(AuditAction::CategoryUpdated, $category, $old, $this->snapshot($category->fresh() ?? $category));

            return $category;
        });
    }

    public function delete(Category $category): void
    {
        DB::transaction(function () use ($category): void {
            $old = $this->snapshot($category);

            $category->delete();

            $this->audit->log(AuditAction::CategoryArchived, $category, $old);
        });
    }

    private function fill(Category $category, CategoryData $data): void
    {
        $category->parent_id = $data->parentId;
        $category->slug = $data->slug;
        $category->setTranslations('name', $data->name);
        $category->setTranslations('description', $data->description);
        $category->is_active = $data->isActive;
        $category->sort_order = $data->sortOrder;

        if ($data->imagePath !== null) {
            $category->image_path = $data->imagePath;
        }
    }

    /**
     * @return array<string, mixed>
     */
    private function snapshot(Category $category): array
    {
        return [
            'parent_id' => $category->parent_id,
            'slug' => $category->slug,
            'name' => $category->getTranslations('name'),
            'description' => $category->getTranslations('description'),
            'is_active' => $category->is_active,
            'sort_order' => $category->sort_order,
        ];
    }
}
