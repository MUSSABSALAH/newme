<?php

declare(strict_types=1);

namespace App\Modules\Plans\Services;

use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Audit\Services\AuditService;
use App\Modules\Plans\DTOs\MealData;
use App\Modules\Plans\Models\Meal;
use App\Modules\Plans\Models\Plan;
use App\Modules\Subscriptions\Enums\SubscriptionStatus;
use App\Modules\Subscriptions\Models\Subscription;
use App\Modules\Subscriptions\Support\MealSchedule;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

final class MealService
{
    /**
     * Lowercased dish names currently picked on an active customer subscription.
     *
     * @var array<string, true>|null
     */
    private ?array $activeDishNames = null;

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
     * Archive meals that are not currently picked on an active subscription.
     *
     * @param  Collection<int, Meal>  $meals
     * @return array{deleted: Collection<int, Meal>, blocked: Collection<int, Meal>}
     */
    public function deleteMany(Collection $meals): array
    {
        $deleted = new Collection;
        $blocked = new Collection;

        foreach ($meals as $meal) {
            if ($this->isLinkedToActiveSubscription($meal)) {
                $blocked->push($meal);

                continue;
            }

            $this->delete($meal);
            $deleted->push($meal);
        }

        return [
            'deleted' => $deleted,
            'blocked' => $blocked,
        ];
    }

    /**
     * True when a live customer currently has this dish on their meal schedule.
     */
    public function isLinkedToActiveSubscription(Meal $meal): bool
    {
        $used = $this->activeDishNames();

        foreach ($meal->getTranslations('name') as $translated) {
            if (! is_string($translated)) {
                continue;
            }

            $key = mb_strtolower(trim($translated));

            if ($key !== '' && isset($used[$key])) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return array<string, true>
     */
    private function activeDishNames(): array
    {
        if ($this->activeDishNames !== null) {
            return $this->activeDishNames;
        }

        $names = [];

        Subscription::query()
            ->where('status', SubscriptionStatus::Active)
            ->whereNotNull('meal_schedule')
            ->select(['id', 'meal_schedule'])
            ->orderBy('id')
            ->chunkById(100, function (Collection $subscriptions) use (&$names): void {
                foreach ($subscriptions as $subscription) {
                    if (! $subscription instanceof Subscription) {
                        continue;
                    }

                    foreach (MealSchedule::normalize($subscription->meal_schedule) as $day) {
                        foreach ($day['meals'] as $dish) {
                            if (! is_string($dish)) {
                                continue;
                            }

                            $key = mb_strtolower(trim($dish));

                            if ($key !== '') {
                                $names[$key] = true;
                            }
                        }
                    }
                }
            });

        return $this->activeDishNames = $names;
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
