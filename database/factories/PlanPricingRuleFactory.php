<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Modules\Plans\Enums\DurationUnit;
use App\Modules\Plans\Enums\MealType;
use App\Modules\Plans\Models\PlanPricingRule;
use App\Modules\Plans\Models\PlanVersion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PlanPricingRule>
 */
class PlanPricingRuleFactory extends Factory
{
    /**
     * @var class-string<PlanPricingRule>
     */
    protected $model = PlanPricingRule::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $mealTypes = [MealType::Breakfast->value, MealType::Lunch->value];

        return [
            'plan_version_id' => PlanVersion::factory(),
            'meal_types' => $mealTypes,
            'meal_types_key' => MealType::key($mealTypes),
            'duration_unit' => DurationUnit::Day->value,
            'duration_length' => 30,
            'price' => 40000,
            'discount_percent' => '0.00',
            'is_active' => true,
            'sort_order' => 0,
        ];
    }

    /**
     * @param  list<string>  $mealTypes
     */
    public function mealTypes(array $mealTypes): self
    {
        return $this->state(fn (): array => [
            'meal_types' => $mealTypes,
            'meal_types_key' => MealType::key($mealTypes),
        ]);
    }
}
