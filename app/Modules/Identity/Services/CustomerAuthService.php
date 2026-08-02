<?php

declare(strict_types=1);

namespace App\Modules\Identity\Services;

use App\Models\User;
use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Audit\Services\AuditService;
use App\Modules\Identity\DTOs\RegisterCustomerData;
use App\Modules\Identity\Enums\RoleName;
use App\Modules\Identity\Enums\UserStatus;
use App\Modules\Identity\Enums\UserType;
use Illuminate\Support\Facades\DB;

/**
 * Self-service registration for public store customers.
 *
 * Customers live in the same `users` table as staff but are flagged with
 * UserType::Customer and carry the `customer` role, which grants no admin
 * permissions. Login is handled by the shared {@see AuthService}.
 */
final class CustomerAuthService
{
    public function __construct(private readonly AuditService $audit) {}

    public function register(RegisterCustomerData $data): User
    {
        return DB::transaction(function () use ($data): User {
            $user = new User;
            $user->name = $data->name;
            $user->email = $data->email;
            $user->phone = $data->phone;
            $user->password = $data->password;
            $user->status = UserStatus::Active;
            $user->type = UserType::Customer;
            $user->save();

            $user->assignRole(RoleName::Customer->value);

            $this->audit->log(AuditAction::CustomerRegistered, $user, [], [
                'name' => $data->name,
                'email' => $data->email,
            ]);

            return $user;
        });
    }
}
