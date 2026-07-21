<?php

declare(strict_types=1);

namespace App\Modules\Identity\DTOs;

use App\Models\User;

/**
 * Result of a successful authentication: the user plus the issued plain-text token.
 */
final readonly class AuthResult
{
    public function __construct(
        public User $user,
        public string $token,
    ) {}
}
