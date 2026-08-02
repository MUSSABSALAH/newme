<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Admin\Products;

use App\Modules\Store\Enums\NutritionNote;
use App\Modules\Store\Enums\ProductFlag;
use App\Modules\Store\Enums\ServingSize;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

abstract class ProductRequest extends FormRequest
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
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'slug' => [
                'required', 'string', 'max:255', 'alpha_dash',
                Rule::unique('products', 'slug')->ignore($this->route('product')),
            ],
            'name' => ['required', 'array'],
            'name.ar' => ['required', 'string', 'max:255'],
            'name.en' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'array'],
            'description.ar' => ['nullable', 'string', 'max:2000'],
            'description.en' => ['nullable', 'string', 'max:2000'],
            'external_url' => ['nullable', 'url', 'max:255'],
            'price' => ['required', 'numeric', 'min:0', 'max:1000000'],
            'calories' => ['nullable', 'integer', 'min:0', 'max:20000'],
            'serving_size' => ['nullable', Rule::in(ServingSize::values())],
            'protein_g' => ['nullable', 'numeric', 'min:0', 'max:2000'],
            'carbs_g' => ['nullable', 'numeric', 'min:0', 'max:2000'],
            'fat_g' => ['nullable', 'numeric', 'min:0', 'max:2000'],
            'nutrition_note' => ['nullable', Rule::in(NutritionNote::values())],
            'flag' => ['nullable', Rule::in(ProductFlag::values())],
            'image' => ['nullable', 'image', 'max:2048'],
            'is_featured' => ['boolean'],
            'is_active' => ['boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'category_id' => (string) __('products.fields.category'),
            'slug' => (string) __('products.fields.slug'),
            'name.ar' => (string) __('products.fields.name_ar'),
            'name.en' => (string) __('products.fields.name_en'),
            'price' => (string) __('products.fields.price'),
            'calories' => (string) __('products.fields.calories'),
            'protein_g' => (string) __('products.fields.protein_g'),
            'carbs_g' => (string) __('products.fields.carbs_g'),
            'fat_g' => (string) __('products.fields.fat_g'),
            'sort_order' => (string) __('products.fields.sort_order'),
        ];
    }
}
