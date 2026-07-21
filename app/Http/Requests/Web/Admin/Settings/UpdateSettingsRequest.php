<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Admin\Settings;

use App\Modules\Settings\Support\SettingsRegistry;
use Illuminate\Foundation\Http\FormRequest;

final class UpdateSettingsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
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
            $rules['settings.'.$definition->fieldName()] = $definition->rules;
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
