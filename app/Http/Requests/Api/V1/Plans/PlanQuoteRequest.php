<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\V1\Plans;

use App\Modules\Plans\Enums\DurationUnit;
use App\Modules\Plans\Enums\MealType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class PlanQuoteRequest extends FormRequest
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
            'meal_types' => ['required', 'array', 'min:1'],
            'meal_types.*' => [Rule::in(MealType::values())],
            'duration_unit' => ['required', Rule::in(DurationUnit::values())],
            'duration_length' => ['required', 'integer', 'min:1', 'max:365'],
            'selected_days' => ['nullable', 'array', 'max:7'],
            'selected_days.*' => ['integer', 'between:0,6'],
        ];
    }
}
