<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Admin\Recipes;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

abstract class RecipeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        if ($this->input('slug') === '') {
            $this->merge(['slug' => null]);
        }
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $recipe = $this->route('recipe');

        return [
            'slug' => [
                'nullable',
                'string',
                'max:255',
                'alpha_dash',
                Rule::unique('recipes', 'slug')->ignore($recipe),
            ],
            'category' => ['required', 'array'],
            'category.ar' => ['required', 'string', 'max:100'],
            'category.en' => ['required', 'string', 'max:100'],
            'title' => ['required', 'array'],
            'title.ar' => ['required', 'string', 'max:255'],
            'title.en' => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'array'],
            'excerpt.ar' => ['nullable', 'string', 'max:1000'],
            'excerpt.en' => ['nullable', 'string', 'max:1000'],
            'meta_title' => ['nullable', 'array'],
            'meta_title.ar' => ['nullable', 'string', 'max:255'],
            'meta_title.en' => ['nullable', 'string', 'max:255'],
            'time_label' => ['nullable', 'array'],
            'time_label.ar' => ['nullable', 'string', 'max:100'],
            'time_label.en' => ['nullable', 'string', 'max:100'],
            'kcal_label' => ['nullable', 'array'],
            'kcal_label.ar' => ['nullable', 'string', 'max:100'],
            'kcal_label.en' => ['nullable', 'string', 'max:100'],
            'protein_label' => ['nullable', 'array'],
            'protein_label.ar' => ['nullable', 'string', 'max:100'],
            'protein_label.en' => ['nullable', 'string', 'max:100'],
            'servings_label' => ['nullable', 'array'],
            'servings_label.ar' => ['nullable', 'string', 'max:100'],
            'servings_label.en' => ['nullable', 'string', 'max:100'],
            'ingredients' => ['nullable', 'array'],
            'ingredients.ar' => ['nullable', 'string'],
            'ingredients.en' => ['nullable', 'string'],
            'steps' => ['nullable', 'array'],
            'steps.ar' => ['nullable', 'string'],
            'steps.en' => ['nullable', 'string'],
            'cta_label' => ['nullable', 'array'],
            'cta_label.ar' => ['nullable', 'string', 'max:255'],
            'cta_label.en' => ['nullable', 'string', 'max:255'],
            'cta_url' => ['nullable', 'string', 'max:500'],
            'is_active' => ['boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'image' => ['nullable', 'image', 'max:4096'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'slug' => (string) __('recipes.fields.slug'),
            'category.ar' => (string) __('recipes.fields.category_ar'),
            'category.en' => (string) __('recipes.fields.category_en'),
            'title.ar' => (string) __('recipes.fields.title_ar'),
            'title.en' => (string) __('recipes.fields.title_en'),
            'ingredients.ar' => (string) __('recipes.fields.ingredients_ar'),
            'ingredients.en' => (string) __('recipes.fields.ingredients_en'),
            'steps.ar' => (string) __('recipes.fields.steps_ar'),
            'steps.en' => (string) __('recipes.fields.steps_en'),
            'sort_order' => (string) __('recipes.fields.sort_order'),
        ];
    }
}
