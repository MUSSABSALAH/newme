<?php

declare(strict_types=1);

namespace App\Modules\Identity\DTOs;

use App\Modules\Identity\Enums\UserStatus;
use App\Support\Dto\Data;

final class UserData extends Data
{
    /**
     * @param  list<string>  $roles
     */
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly ?string $password,
        public readonly UserStatus $status,
        public readonly array $roles,
    ) {}

    /**
     * @param  array<string, mixed>  $attributes
     */
    public static function fromArray(array $attributes): static
    {
        $password = $attributes['password'] ?? null;
        $roles = $attributes['roles'] ?? [];
        $status = $attributes['status'] ?? UserStatus::Active->value;

        return new self(
            name: (string) ($attributes['name'] ?? ''),
            email: (string) ($attributes['email'] ?? ''),
            password: is_string($password) && $password !== '' ? $password : null,
            status: $status instanceof UserStatus ? $status : UserStatus::from((string) $status),
            roles: array_values(array_filter(
                is_array($roles) ? $roles : [],
                'is_string',
            )),
        );
    }
}
