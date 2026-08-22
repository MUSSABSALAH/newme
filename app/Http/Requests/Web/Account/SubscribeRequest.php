<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Account;

use App\Modules\Identity\DTOs\HealthProfile;
use App\Modules\Plans\Enums\DurationUnit;
use App\Modules\Plans\Enums\MealType;
use App\Modules\Subscriptions\Support\SubscriptionStartRules;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class SubscribeRequest extends FormRequest
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
        $earliest = SubscriptionStartRules::earliestDateString();
        $birth = HealthProfile::birthDateRange();

        return [
            'plan_public_id' => ['required', 'string', 'exists:plans,public_id'],
            'meal_types' => ['required', 'array', 'min:1'],
            'meal_types.*' => [Rule::in(MealType::values())],
            'duration_unit' => ['required', Rule::in(DurationUnit::values())],
            'duration_length' => ['required', 'integer', 'min:1', 'max:365'],
            'selected_days' => ['nullable', 'array', 'max:7'],
            'selected_days.*' => ['integer', 'between:0,6'],
            'start_date' => ['nullable', 'date', 'after_or_equal:'.$earliest],
            'coupon_code' => ['nullable', 'string', 'max:64'],
            // Health step: the date of birth drives the plan, the notes are volunteered.
            'health' => ['required', 'array'],
            'health.birth_date' => ['required', 'date', 'after_or_equal:'.$birth['min'], 'before_or_equal:'.$birth['max']],
            'health.allergies' => ['nullable', 'string', 'max:'.HealthProfile::MAX_NOTE_LENGTH],
            'health.medications' => ['nullable', 'string', 'max:'.HealthProfile::MAX_NOTE_LENGTH],
            // Per delivery day dish picks from the "choose dishes" wizard step.
            'meal_schedule' => ['nullable', 'array', 'max:400'],
            'meal_schedule.*.date' => ['required', 'date'],
            'meal_schedule.*.meals' => ['required', 'array', 'min:1'],
            'meal_schedule.*.meals.*' => ['nullable', 'string', 'max:255'],
        ];
    }
}
