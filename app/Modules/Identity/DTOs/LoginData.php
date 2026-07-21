<?php

declare(strict_types=1);

namespace App\Modules\Identity\DTOs;

use App\Support\Dto\Data;

final class LoginData extends Data
{
    public function __construct(
        public readonly string $email,
        public readonly string $password,
        public readonly string $deviceName,
    ) {}

    /**
     * @param  array<string, mixed>  $attributes
     */
    public static function fromArray(array $attributes): static
    {
        $deviceName = $attributes['device_name'] ?? 'api';

        return new self(
            email: (string) $attributes['email'],
            password: (string) $attributes['password'],
            deviceName: is_string($deviceName) && $deviceName !== '' ? $deviceName : 'api',
        );
    }
}
