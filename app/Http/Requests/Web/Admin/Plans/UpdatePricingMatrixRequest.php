<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Admin\Plans;

use App\Modules\Plans\DTOs\PricingRuleData;
use App\Modules\Plans\Enums\DurationUnit;
use App\Modules\Plans\Enums\MealType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class UpdatePricingMatrixRequest extends FormRequest
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
            'rules' => ['nullable', 'array'],
            'rules.*.meal_types' => ['required', 'array', 'min:1'],
            'rules.*.meal_types.*' => [Rule::in(MealType::values())],
            'rules.*.duration_unit' => ['required', Rule::in(DurationUnit::values())],
            'rules.*.duration_length' => ['required', 'integer', 'min:1', 'max:365'],
            'rules.*.price' => ['required', 'numeric', 'min:0'],
            'rules.*.discount_percent' => ['nullable', 'numeric', 'min:0', 'max:100'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'rules.*.meal_types' => (string) __('plans.pricing.meal_types'),
            'rules.*.duration_unit' => (string) __('plans.pricing.duration_unit'),
            'rules.*.duration_length' => (string) __('plans.pricing.duration_length'),
            'rules.*.price' => (string) __('plans.pricing.price'),
            'rules.*.discount_percent' => (string) __('plans.pricing.discount'),
        ];
    }

    /**
     * Validated rows mapped to pricing DTOs.
     *
     * @return list<PricingRuleData>
     */
    public function pricingRules(): array
    {
        $validated = $this->validated();
        $rows = is_array($validated['rules'] ?? null) ? $validated['rules'] : [];

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
}
