<?php

declare(strict_types=1);

namespace App\Modules\Identity\DTOs;

use App\Support\Dto\Data;

final class InvitationData extends Data
{
    /**
     * @param  list<string>  $roles
     */
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly array $roles,
    ) {}

    /**
     * @param  array<string, mixed>  $attributes
     */
    public static function fromArray(array $attributes): static
    {
        $roles = $attributes['roles'] ?? [];

        return new self(
            name: (string) ($attributes['name'] ?? ''),
            email: (string) ($attributes['email'] ?? ''),
            roles: array_values(array_filter(
                is_array($roles) ? $roles : [],
                'is_string',
            )),
        );
    }
}
