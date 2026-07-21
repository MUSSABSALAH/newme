<?php

declare(strict_types=1);

namespace App\Modules\Identity\DTOs;

use App\Support\Dto\Data;

final class RoleData extends Data
{
    /**
     * @param  array<string, string>  $displayName  Locale-keyed display names (e.g. ['ar' => '...', 'en' => '...']).
     * @param  list<string>  $permissions
     */
    public function __construct(
        public readonly array $displayName,
        public readonly array $permissions,
    ) {}

    /**
     * @param  array<string, mixed>  $attributes
     */
    public static function fromArray(array $attributes): static
    {
        $displayName = $attributes['display_name'] ?? [];
        $permissions = $attributes['permissions'] ?? [];

        return new self(
            displayName: array_filter(
                is_array($displayName) ? $displayName : [],
                static fn ($value): bool => is_string($value) && trim($value) !== '',
            ),
            permissions: array_values(array_filter(
                is_array($permissions) ? $permissions : [],
                'is_string',
            )),
        );
    }
}
