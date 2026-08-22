<?php

declare(strict_types=1);

namespace App\Modules\Identity\DTOs;

use App\Support\Dto\Data;

final class RegisterCustomerData extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly ?string $email,
        public readonly ?string $phone,
        public readonly ?string $password,
    ) {}

    /**
     * @param  array<string, mixed>  $attributes
     */
    public static function fromArray(array $attributes): static
    {
        return new self(
            name: (string) $attributes['name'],
            email: self::nullableString($attributes['email'] ?? null),
            phone: self::nullableString($attributes['phone'] ?? null),
            password: self::nullableString($attributes['password'] ?? null),
        );
    }

    private static function nullableString(mixed $value): ?string
    {
        if (! is_string($value) || trim($value) === '') {
            return null;
        }

        return trim($value);
    }
}
