<?php

declare(strict_types=1);

namespace App\Modules\Cms\Services;

use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Audit\Services\AuditService;
use App\Modules\Cms\DTOs\RecipeData;
use App\Modules\Cms\Models\Recipe;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

final class RecipeService
{
    public function __construct(private readonly AuditService $audit) {}

    public function create(RecipeData $data): Recipe
    {
        return DB::transaction(function () use ($data): Recipe {
            $recipe = new Recipe;
            $this->fill($recipe, $data);
            $recipe->save();

            $this->audit->log(AuditAction::RecipeCreated, $recipe, [], $this->snapshot($recipe));

            return $recipe;
        });
    }

    public function update(Recipe $recipe, RecipeData $data): Recipe
    {
        return DB::transaction(function () use ($recipe, $data): Recipe {
            $old = $this->snapshot($recipe);

            $this->fill($recipe, $data);
            $recipe->save();

            $this->audit->log(AuditAction::RecipeUpdated, $recipe, $old, $this->snapshot($recipe->fresh() ?? $recipe));

            return $recipe;
        });
    }

    public function delete(Recipe $recipe): void
    {
        DB::transaction(function () use ($recipe): void {
            $old = $this->snapshot($recipe);

            $recipe->delete();

            $this->audit->log(AuditAction::RecipeArchived, $recipe, $old);
        });
    }

    private function fill(Recipe $recipe, RecipeData $data): void
    {
        $recipe->slug = $this->uniqueSlug($data->slug, $recipe->exists ? $recipe->id : null);
        $recipe->setTranslations('category', $data->category);
        $recipe->setTranslations('title', $data->title);
        $recipe->setTranslations('excerpt', $data->excerpt);
        $recipe->setTranslations('meta_title', $data->metaTitle);
        $recipe->setTranslations('time_label', $data->timeLabel);
        $recipe->setTranslations('kcal_label', $data->kcalLabel);
        $recipe->setTranslations('protein_label', $data->proteinLabel);
        $recipe->setTranslations('servings_label', $data->servingsLabel);
        $recipe->setTranslations('ingredients', $data->ingredients);
        $recipe->setTranslations('steps', $data->steps);
        $recipe->setTranslations('cta_label', $data->ctaLabel);
        $recipe->cta_url = $data->ctaUrl;
        $recipe->is_active = $data->isActive;
        $recipe->sort_order = $data->sortOrder;

        if ($data->imagePath !== null) {
            $recipe->image_path = $data->imagePath;
        }
    }

    private function uniqueSlug(string $slug, ?int $ignoreId = null): string
    {
        $base = Str::slug($slug) ?: 'recipe';
        $candidate = $base;
        $i = 2;

        while (
            Recipe::query()
                ->when($ignoreId !== null, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->where('slug', $candidate)
                ->exists()
        ) {
            $candidate = $base.'-'.$i;
            $i++;
        }

        return $candidate;
    }

    /**
     * @return array<string, mixed>
     */
    private function snapshot(Recipe $recipe): array
    {
        return [
            'slug' => $recipe->slug,
            'title' => $recipe->getTranslations('title'),
            'is_active' => $recipe->is_active,
            'sort_order' => $recipe->sort_order,
        ];
    }
}
