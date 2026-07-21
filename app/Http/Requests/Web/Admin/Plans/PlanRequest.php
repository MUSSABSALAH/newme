<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Admin\Plans;

use App\Modules\Plans\DTOs\PricingRuleData;
use App\Modules\Plans\Enums\DurationUnit;
use App\Modules\Plans\Enums\MealType;
use App\Modules\Plans\Enums\PlanGoal;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

abstract class PlanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'goal' => ['required', Rule::in(PlanGoal::values())],
            'name' => ['required', 'array'],
            'name.ar' => ['required', 'string', 'max:255'],
            'name.en' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'array'],
            'description.ar' => ['nullable', 'string', 'max:1000'],
            'description.en' => ['nullable', 'string', 'max:1000'],
            'features' => ['nullable', 'array'],
            'features.ar' => ['nullable', 'string', 'max:5000'],
            'features.en' => ['nullable', 'string', 'max:5000'],
            'requires_day_selection' => ['boolean'],
            'min_delivery_days_per_week' => ['required', 'integer', 'min:1', 'max:7'],
            'delivery_fee' => ['required', 'numeric', 'min:0'],
            'is_active' => ['boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'image' => ['nullable', 'image', 'max:2048'],

            // Pricing matrix (saved to the plan's draft version).
            'rules' => ['nullable', 'array'],
            'rules.*.meal_types' => ['required', 'array', 'min:1'],
            'rules.*.meal_types.*' => [Rule::in(MealType::values())],
            'rules.*.duration_unit' => ['required', Rule::in(DurationUnit::values())],
            'rules.*.duration_length' => ['required', 'integer', 'min:1', 'max:365'],
            'rules.*.price' => ['required', 'numeric', 'min:0'],
            'rules.*.discount_percent' => ['nullable', 'numeric', 'min:0', 'max:100'],

            // Meals available to customers of this plan.
            'meals' => ['nullable', 'array'],
            'meals.*' => ['integer', 'exists:meals,id'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'goal' => (string) __('plans.fields.goal'),
            'name.ar' => (string) __('plans.fields.name_ar'),
            'name.en' => (string) __('plans.fields.name_en'),
            'description.ar' => (string) __('plans.fields.description_ar'),
            'description.en' => (string) __('plans.fields.description_en'),
            'features.ar' => (string) __('plans.fields.features_ar'),
            'features.en' => (string) __('plans.fields.features_en'),
            'min_delivery_days_per_week' => (string) __('plans.fields.min_delivery_days_per_week'),
            'delivery_fee' => (string) __('plans.fields.delivery_fee'),
            'sort_order' => (string) __('plans.fields.sort_order'),
            'rules.*.meal_types' => (string) __('plans.pricing.meal_types'),
            'rules.*.duration_unit' => (string) __('plans.pricing.duration_unit'),
            'rules.*.duration_length' => (string) __('plans.pricing.duration_length'),
            'rules.*.price' => (string) __('plans.pricing.price'),
            'rules.*.discount_percent' => (string) __('plans.pricing.discount'),
        ];
    }

    /**
     * The submitted pricing rows as DTOs.
     *
     * @return list<PricingRuleData>
     */
    public function pricingRules(): array
    {
        $rows = $this->input('rules');
        $rows = is_array($rows) ? $rows : [];

        $rules = [];

        foreach ($rows as $index => $row) {
            if (! is_array($row)) {
                continue;
            }

            $row['sort_order'] = (int) $index;
            $rules[] = PricingRuleData::fromArray($row);
        }

        return $rules;
    }

    /**
     * The selected meal ids for this plan.
     *
     * @return list<int>
     */
    public function mealIds(): array
    {
        $meals = $this->input('meals');
        $meals = is_array($meals) ? $meals : [];

        return array_values(array_unique(array_map(static fn ($id): int => (int) $id, $meals)));
    }
}
