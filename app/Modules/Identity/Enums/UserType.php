<?php

declare(strict_types=1);

namespace App\Modules\Identity\Enums;

/**
 * Distinguishes internal staff accounts from public store customers.
 *
 * Both live in the same `users` table but are kept strictly separate: staff
 * sign in through the admin panel, customers through the public website, and
 * neither can authenticate on the other channel.
 */
enum UserType: string
{
    case Staff = 'staff';
    case Customer = 'customer';

    /**
     * @return list<string>
     */
    public static function values(): array
    {
        return array_map(static fn (self $type): string => $type->value, self::cases());
    }
}
