<?php

declare(strict_types=1);

namespace App\Modules\Plans\Services;

use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Audit\Services\AuditService;
use App\Modules\Plans\DTOs\MealData;
use App\Modules\Plans\Models\Meal;
use App\Modules\Plans\Models\Plan;
use Illuminate\Support\Facades\DB;

final class MealService
{
    public function __construct(private readonly AuditService $audit) {}

    public function create(MealData $data): Meal
    {
        return DB::transaction(function () use ($data): Meal {
            $meal = new Meal;
            $this->fill($meal, $data);
            $meal->save();

            $this->audit->log(AuditAction::MealCreated, $meal, [], $this->snapshot($meal));

            return $meal;
        });
    }

    public function update(Meal $meal, MealData $data): Meal
    {
        return DB::transaction(function () use ($meal, $data): Meal {
            $old = $this->snapshot($meal);

            $this->fill($meal, $data);
            $meal->save();

            $this->audit->log(AuditAction::MealUpdated, $meal, $old, $this->snapshot($meal->fresh() ?? $meal));

            return $meal;
        });
    }

    public function delete(Meal $meal): void
    {
        DB::transaction(function () use ($meal): void {
            $old = $this->snapshot($meal);

            $meal->delete();

            $this->audit->log(AuditAction::MealArchived, $meal, $old);
        });
    }

    /**
     * Sync the meals made available to a plan.
     *
     * @param  list<int>  $mealIds
     */
    public function syncPlanMeals(Plan $plan, array $mealIds): void
    {
        DB::transaction(function () use ($plan, $mealIds): void {
            $old = $plan->meals()->pluck('meals.id')->all();

            $plan->meals()->sync($mealIds);

            $this->audit->log(
                AuditAction::PlanMealsUpdated,
                $plan,
                ['meals' => $old],
                ['meals' => $plan->meals()->pluck('meals.id')->all()],
            );
        });
    }

    private function fill(Meal $meal, MealData $data): void
    {
        $meal->meal_type = $data->mealType;
        $meal->setTranslations('name', $data->name);
        $meal->calories = $data->calories;
        $meal->protein_g = $data->proteinG;
        $meal->carbs_g = $data->carbsG;
        $meal->fat_g = $data->fatG;
        $meal->is_active = $data->isActive;
        $meal->sort_order = $data->sortOrder;

        if ($data->imagePath !== null) {
            $meal->image_path = $data->imagePath;
        }
    }

    /**
     * @return array<string, mixed>
     */
    private function snapshot(Meal $meal): array
    {
        return [
            'meal_type' => $meal->meal_type->value,
            'name' => $meal->getTranslations('name'),
            'calories' => $meal->calories,
            'protein_g' => $meal->protein_g,
            'carbs_g' => $meal->carbs_g,
            'fat_g' => $meal->fat_g,
            'is_active' => $meal->is_active,
        ];
    }
}
