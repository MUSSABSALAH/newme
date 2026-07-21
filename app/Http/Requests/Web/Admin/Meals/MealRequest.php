<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Admin\Meals;

use App\Modules\Plans\Enums\MealType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

abstract class MealRequest extends FormRequest
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
            'meal_type' => ['required', Rule::in(MealType::values())],
            'name' => ['required', 'array'],
            'name.ar' => ['required', 'string', 'max:255'],
            'name.en' => ['required', 'string', 'max:255'],
            'calories' => ['nullable', 'integer', 'min:0', 'max:20000'],
            'protein_g' => ['nullable', 'integer', 'min:0', 'max:2000'],
            'carbs_g' => ['nullable', 'integer', 'min:0', 'max:2000'],
            'fat_g' => ['nullable', 'integer', 'min:0', 'max:2000'],
            'is_active' => ['boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'image' => ['nullable', 'image', 'max:2048'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'meal_type' => (string) __('meals.fields.meal_type'),
            'name.ar' => (string) __('meals.fields.name_ar'),
            'name.en' => (string) __('meals.fields.name_en'),
            'calories' => (string) __('meals.fields.calories'),
            'protein_g' => (string) __('meals.fields.protein_g'),
            'carbs_g' => (string) __('meals.fields.carbs_g'),
            'fat_g' => (string) __('meals.fields.fat_g'),
            'sort_order' => (string) __('meals.fields.sort_order'),
        ];
    }
}
