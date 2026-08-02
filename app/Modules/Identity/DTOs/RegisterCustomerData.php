<?php

declare(strict_types=1);

namespace App\Modules\Identity\DTOs;

use App\Support\Dto\Data;

final class RegisterCustomerData extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly ?string $phone,
        public readonly string $password,
    ) {}

    /**
     * @param  array<string, mixed>  $attributes
     */
    public static function fromArray(array $attributes): static
    {
        $phone = $attributes['phone'] ?? null;

        return new self(
            name: (string) $attributes['name'],
            email: (string) $attributes['email'],
            phone: is_string($phone) && trim($phone) !== '' ? trim($phone) : null,
            password: (string) $attributes['password'],
        );
    }
}
