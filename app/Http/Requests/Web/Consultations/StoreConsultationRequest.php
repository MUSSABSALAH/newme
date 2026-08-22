<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Consultations;

use App\Modules\Settings\Support\ConsultationSchedule;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

final class StoreConsultationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $starts = $this->input('starts_at');
        $ends = $this->input('ends_at');

        $this->merge([
            'email' => is_string($this->input('email')) ? strtolower(trim($this->input('email'))) : $this->input('email'),
            'goal' => is_string($this->input('goal')) && trim($this->input('goal')) !== ''
                ? trim($this->input('goal'))
                : null,
            'starts_at' => is_string($starts) ? $this->normalizeTime($starts) : $starts,
            'ends_at' => is_string($ends) ? $this->normalizeTime($ends) : $ends,
        ]);
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $user = $this->user();
        $hasEmail = is_string($user?->email) && $user->email !== '';

        $rules = [
            'goal' => ['nullable', 'string', 'max:255'],
            'date' => ['required', 'date', 'after_or_equal:today'],
            'starts_at' => ['required', 'date_format:H:i'],
            'ends_at' => ['required', 'date_format:H:i', 'after:starts_at'],
        ];

        if (! $hasEmail) {
            $rules['email'] = ['required', 'email', 'max:255'];
        }

        return $rules;
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'email' => (string) __('consultations.fields.customer_email'),
            'goal' => (string) __('consultations.fields.goal'),
            'date' => (string) __('consultations.fields.scheduled_on'),
            'starts_at' => (string) __('consultations.fields.starts_at'),
            'ends_at' => (string) __('consultations.fields.ends_at'),
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator): void {
            if ($validator->errors()->isNotEmpty()) {
                return;
            }

            $date = Carbon::parse((string) $this->input('date'));
            $schedule = app(ConsultationSchedule::class);

            if (! $schedule->isWorkingDay($date)) {
                $validator->errors()->add('date', (string) __('consultations.errors.non_working_day'));

                return;
            }

            $starts = (string) $this->input('starts_at');
            $ends = (string) $this->input('ends_at');
            $match = collect($schedule->slots())->contains(
                static fn (array $slot): bool => $slot['start'] === $starts && $slot['end'] === $ends,
            );

            if (! $match) {
                $validator->errors()->add('starts_at', (string) __('consultations.errors.invalid_slot'));
            }
        });
    }

    private function normalizeTime(string $value): string
    {
        $value = trim($value);

        if (preg_match('/^(\d{1,2}):(\d{2})(?::\d{2})?$/', $value, $m) === 1) {
            return sprintf('%02d:%02d', (int) $m[1], (int) $m[2]);
        }

        return $value;
    }
}
