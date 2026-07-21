<?php

declare(strict_types=1);

namespace App\Http\Resources\V1;

use App\Modules\Plans\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Meal
 */
final class MealResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $meal = $this->resource;

        if (! $meal instanceof Meal) {
            return [];
        }

        return [
            'id' => $meal->public_id,
            'meal_type' => $meal->meal_type->value,
            'name' => $meal->getTranslations('name'),
            'nutrition' => [
                'calories' => $meal->calories,
                'protein_g' => $meal->protein_g,
                'carbs_g' => $meal->carbs_g,
                'fat_g' => $meal->fat_g,
            ],
            'image_url' => $meal->image_path !== null ? asset('storage/'.$meal->image_path) : null,
        ];
    }
}
