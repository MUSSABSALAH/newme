<?php

declare(strict_types=1);

namespace App\Modules\Settings\Enums;

enum SettingType: string
{
    case String = 'string';
    case Text = 'text';
    case Boolean = 'boolean';
    case Integer = 'integer';
    case Decimal = 'decimal';
    case Select = 'select';

    /**
     * Cast a stored (string) value to its typed PHP representation.
     */
    public function cast(?string $value): string|int|bool|null
    {
        if ($value === null) {
            return match ($this) {
                self::Boolean => false,
                default => null,
            };
        }

        return match ($this) {
            self::Boolean => $value === '1' || $value === 'true',
            self::Integer => (int) $value,
            default => $value,
        };
    }

    /**
     * Serialize a typed value into its stored string representation.
     */
    public function serialize(mixed $value): ?string
    {
        if ($this === self::Boolean) {
            return filter_var($value, FILTER_VALIDATE_BOOLEAN) ? '1' : '0';
        }

        if ($value === null) {
            return null;
        }

        if (is_bool($value)) {
            return $value ? '1' : '0';
        }

        return (string) $value;
    }
}
