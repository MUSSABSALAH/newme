<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Admin\Settings;

use App\Modules\Settings\Enums\SettingType;
use App\Modules\Settings\Support\SettingsRegistry;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

final class UpdateSettingsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $settings = $this->input('settings', []);
        if (! is_array($settings)) {
            $settings = [];
        }

        foreach (SettingsRegistry::all() as $definition) {
            if ($definition->type === SettingType::MultiSelect) {
                $name = $definition->fieldName();
                if (! array_key_exists($name, $settings) || $settings[$name] === null || $settings[$name] === '') {
                    $settings[$name] = [];
                } elseif (! is_array($settings[$name])) {
                    $settings[$name] = [$settings[$name]];
                }

                continue;
            }

            if ($definition->type === SettingType::Time) {
                $name = $definition->fieldName();
                $raw = $settings[$name] ?? null;
                if (is_string($raw) && preg_match('/^(\d{1,2}):(\d{2})(?::\d{2})?$/', $raw, $m) === 1) {
                    $settings[$name] = sprintf('%02d:%02d', (int) $m[1], (int) $m[2]);
                }
            }
        }

        $this->merge(['settings' => $settings]);
    }

    /**
     * Rules are derived from the settings registry, keyed by each setting's
     * HTML-safe field name (dots encoded as `__`).
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $rules = ['settings' => ['array']];

        foreach (SettingsRegistry::all() as $definition) {
            $field = 'settings.'.$definition->fieldName();
            $rules[$field] = $definition->rules;

            if ($definition->type === SettingType::MultiSelect && $definition->options !== []) {
                $rules[$field.'.*'] = ['string', Rule::in($definition->options)];
            }
        }

        return $rules;
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        $attributes = [];

        foreach (SettingsRegistry::all() as $definition) {
            $attributes['settings.'.$definition->fieldName()] = (string) __($definition->labelKey());
        }

        return $attributes;
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator): void {
            $settings = $this->input('settings', []);
            if (! is_array($settings)) {
                return;
            }

            $start = $settings['operations__consultation_hours_start'] ?? null;
            $end = $settings['operations__consultation_hours_end'] ?? null;
            $duration = (int) ($settings['operations__consultation_duration_minutes'] ?? 0);

            if (! is_string($start) || ! is_string($end) || $duration < 5) {
                return;
            }

            if ($end <= $start) {
                $validator->errors()->add(
                    'settings.operations__consultation_hours_end',
                    (string) __('settings.validation.consultation_end_after_start'),
                );

                return;
            }

            $startMinutes = $this->timeToMinutes($start);
            $endMinutes = $this->timeToMinutes($end);

            if ($startMinutes === null || $endMinutes === null) {
                return;
            }

            if (($endMinutes - $startMinutes) < $duration) {
                $validator->errors()->add(
                    'settings.operations__consultation_duration_minutes',
                    (string) __('settings.validation.consultation_duration_too_long'),
                );
            }
        });
    }

    private function timeToMinutes(string $time): ?int
    {
        if (preg_match('/^(\d{2}):(\d{2})$/', $time, $m) !== 1) {
            return null;
        }

        return ((int) $m[1] * 60) + (int) $m[2];
    }

    /**
     * Validated values re-keyed back to real setting keys, limited to the
     * registry.
     *
     * @return array<string, mixed>
     */
    public function settings(): array
    {
        $validated = $this->validated();
        $input = is_array($validated['settings'] ?? null) ? $validated['settings'] : [];

        $result = [];

        foreach (SettingsRegistry::all() as $key => $definition) {
            if (array_key_exists($definition->fieldName(), $input)) {
                $result[$key] = $input[$definition->fieldName()];
            }
        }

        return $result;
    }
}
