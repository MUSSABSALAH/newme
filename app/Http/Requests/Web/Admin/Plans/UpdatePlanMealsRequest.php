<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Admin\Plans;

use Illuminate\Foundation\Http\FormRequest;

final class UpdatePlanMealsRequest extends FormRequest
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
            'meals' => ['nullable', 'array'],
            'meals.*' => ['integer', 'exists:meals,id'],
        ];
    }

    /**
     * Selected meal ids.
     *
     * @return list<int>
     */
    public function mealIds(): array
    {
        $validated = $this->validated();
        $meals = is_array($validated['meals'] ?? null) ? $validated['meals'] : [];

        return array_values(array_unique(array_map(static fn ($id): int => (int) $id, $meals)));
    }
}
