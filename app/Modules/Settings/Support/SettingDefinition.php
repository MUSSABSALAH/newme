<?php

declare(strict_types=1);

namespace App\Modules\Settings\Support;

use App\Modules\Settings\Enums\SettingGroup;
use App\Modules\Settings\Enums\SettingType;

/**
 * Structural description of a single platform setting.
 *
 * The catalog of definitions is the source of truth for a setting's type,
 * group, default value, validation rules, and whether it must be encrypted at
 * rest. Human-readable labels/hints live in the translation files, keyed by the
 * setting key, so they stay localizable.
 */
final class SettingDefinition
{
    /**
     * @param  list<string>  $rules  Laravel validation rules for the value.
     * @param  list<string>  $options  Allowed values for a Select setting.
     */
    public function __construct(
        public readonly string $key,
        public readonly SettingGroup $group,
        public readonly SettingType $type,
        public readonly string|int|bool|null $default = null,
        public readonly array $rules = [],
        public readonly array $options = [],
        public readonly bool $encrypted = false,
    ) {}

    public function labelKey(): string
    {
        return 'settings.fields.'.$this->key;
    }

    public function hintKey(): string
    {
        return 'settings.hints.'.$this->key;
    }

    /**
     * HTML-safe field name for this setting.
     *
     * Keys contain dots, which Laravel treats as nested paths in field names,
     * `old()`, and error bags. Dots are encoded as `__` so the value lives at a
     * flat `settings.<field>` path and repopulation/error display work cleanly.
     */
    public function fieldName(): string
    {
        return str_replace('.', '__', $this->key);
    }
}
