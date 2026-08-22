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
    case MultiSelect = 'multi_select';
    case Time = 'time';

    /**
     * Cast a stored (string) value to its typed PHP representation.
     */
    public function cast(?string $value): string|int|bool|array|null
    {
        if ($value === null || $value === '') {
            return match ($this) {
                self::Boolean => false,
                self::MultiSelect => [],
                default => null,
            };
        }

        return match ($this) {
            self::Boolean => $value === '1' || $value === 'true',
            self::Integer => (int) $value,
            self::MultiSelect => $this->decodeList($value),
            self::Time => $this->normalizeTime($value),
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

        if ($this === self::MultiSelect) {
            return json_encode($this->normalizeList($value), JSON_UNESCAPED_UNICODE);
        }

        if ($this === self::Time) {
            if ($value === null || $value === '') {
                return null;
            }

            return $this->normalizeTime((string) $value);
        }

        if ($value === null) {
            return null;
        }

        if (is_bool($value)) {
            return $value ? '1' : '0';
        }

        if (is_array($value)) {
            return json_encode($this->normalizeList($value), JSON_UNESCAPED_UNICODE);
        }

        return (string) $value;
    }

    private function normalizeTime(string $value): string
    {
        $value = trim($value);

        if (preg_match('/^(\d{1,2}):(\d{2})(?::\d{2})?$/', $value, $m) === 1) {
            return sprintf('%02d:%02d', (int) $m[1], (int) $m[2]);
        }

        return $value;
    }

    /**
     * @return list<string>
     */
    private function decodeList(string $value): array
    {
        $decoded = json_decode($value, true);

        if (! is_array($decoded)) {
            // Tolerate a comma-separated fallback.
            $decoded = array_map('trim', explode(',', $value));
        }

        return $this->normalizeList($decoded);
    }

    /**
     * @return list<string>
     */
    private function normalizeList(mixed $value): array
    {
        if (! is_array($value)) {
            return [];
        }

        $out = [];
        foreach ($value as $item) {
            if (! is_string($item) && ! is_int($item)) {
                continue;
            }

            $item = trim((string) $item);
            if ($item === '') {
                continue;
            }

            $out[] = $item;
        }

        return array_values(array_unique($out));
    }
}
