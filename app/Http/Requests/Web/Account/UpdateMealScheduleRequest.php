<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Account;

use Illuminate\Foundation\Http\FormRequest;

final class UpdateMealScheduleRequest extends FormRequest
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
            'meal_schedule' => ['required', 'array', 'max:400'],
            'meal_schedule.*.date' => ['required', 'date'],
            'meal_schedule.*.meals' => ['required', 'array', 'min:1'],
            'meal_schedule.*.meals.*' => ['nullable', 'string', 'max:255'],
        ];
    }

    /**
     * @return list<array{date: string, meals: array<string, string|null>}>
     */
    public function schedule(): array
    {
        /** @var list<array{date?: mixed, meals?: mixed}> $raw */
        $raw = $this->validated('meal_schedule');

        return $raw;
    }
}
