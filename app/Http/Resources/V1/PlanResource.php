<?php

declare(strict_types=1);

namespace App\Http\Resources\V1;

use App\Modules\Plans\Models\Plan;
use App\Modules\Plans\Models\PlanVersion;
use App\Modules\Plans\Services\PlanPricingService;
use App\Support\Http\Responses\MoneyPresenter;
use App\Support\Money\Money;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Plan
 */
final class PlanResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $plan = $this->resource;

        if (! $plan instanceof Plan) {
            return [];
        }

        return [
            'id' => $plan->public_id,
            'goal' => $plan->goal->value,
            'goal_label' => $plan->goal->label(),
            'name' => $plan->getTranslations('name'),
            'description' => $plan->getTranslations('description'),
            'features' => $plan->getTranslations('features'),
            'image_url' => $plan->image_path !== null ? asset('storage/'.$plan->image_path) : null,
            'requires_day_selection' => $plan->requires_day_selection,
            'allows_pause' => $plan->allows_pause,
            'min_delivery_days_per_week' => $plan->min_delivery_days_per_week,
            'delivery_fee' => MoneyPresenter::toArray(Money::fromMinor($plan->delivery_fee)),
            'meals' => $this->meals($plan),
            'pricing' => $this->pricing($plan),
        ];
    }

    /**
     * Available meals grouped by meal type.
     *
     * @return array<string, list<array<string, mixed>>>
     */
    private function meals(Plan $plan): array
    {
        $grouped = [];

        foreach ($plan->meals()->where('is_active', true)->orderBy('sort_order')->get() as $meal) {
            $grouped[$meal->meal_type->value][] = (new MealResource($meal))->toArray(request());
        }

        return $grouped;
    }

    /**
     * Pricing options grouped by dishes-per-day for the published version.
     *
     * @return list<array<string, mixed>>
     */
    private function pricing(Plan $plan): array
    {
        $version = $plan->publishedVersion();

        if (! $version instanceof PlanVersion) {
            return [];
        }

        $service = app(PlanPricingService::class);
        $groups = [];

        foreach ($service->matrix($version) as $rules) {
            $durations = [];

            foreach ($rules as $rule) {
                $durations[] = [
                    'duration_unit' => $rule->duration_unit->value,
                    'duration_length' => $rule->duration_length,
                    'total_days' => $rule->totalDays(),
                    'price' => MoneyPresenter::toArray($rule->priceMoney()),
                    'discount_percent' => (string) $rule->discount_percent,
                ];
            }

            $first = $rules[0];

            $groups[] = [
                'meal_types' => $first->meal_types,
                'durations' => $durations,
            ];
        }

        return $groups;
    }
}
