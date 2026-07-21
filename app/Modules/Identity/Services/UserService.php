<?php

declare(strict_types=1);

namespace App\Modules\Identity\Services;

use App\Models\User;
use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Audit\Services\AuditService;
use App\Modules\Identity\DTOs\UserData;
use App\Modules\Identity\Enums\RoleName;
use App\Modules\Identity\Enums\UserStatus;
use App\Modules\Identity\Exceptions\CannotDeactivateSelfException;
use App\Modules\Identity\Exceptions\LastSuperAdminException;
use Illuminate\Support\Facades\DB;

final class UserService
{
    public function __construct(private readonly AuditService $audit) {}

    public function update(User $user, UserData $data): User
    {
        return DB::transaction(function () use ($user, $data): User {
            $this->guardSuperAdminDemotion($user, $data->roles);

            $old = [
                'name' => $user->name,
                'email' => $user->email,
                'status' => $user->status->value,
                'roles' => $user->roles->pluck('name')->all(),
            ];

            $user->name = $data->name;
            $user->email = $data->email;
            $user->status = $data->status;

            if ($data->password !== null) {
                $user->password = $data->password;
            }

            $user->save();

            $user->syncRoles($data->roles);

            $this->audit->log(AuditAction::UserUpdated, $user, $old, [
                'name' => $data->name,
                'email' => $data->email,
                'status' => $data->status->value,
                'roles' => $data->roles,
            ]);

            return $user;
        });
    }

    public function activate(User $user): User
    {
        $user->status = UserStatus::Active;
        $user->save();

        $this->audit->log(AuditAction::UserActivated, $user);

        return $user;
    }

    /**
     * @throws CannotDeactivateSelfException
     * @throws LastSuperAdminException
     */
    public function deactivate(User $user, int $actingUserId): User
    {
        if ($user->getKey() === $actingUserId) {
            throw new CannotDeactivateSelfException;
        }

        if ($this->isLastActiveSuperAdmin($user)) {
            throw new LastSuperAdminException;
        }

        $user->status = UserStatus::Inactive;
        $user->save();

        $this->audit->log(AuditAction::UserDeactivated, $user);

        return $user;
    }

    /**
     * Prevent removing the Super Admin role from the only remaining Super Admin.
     *
     * @param  list<string>  $newRoles
     *
     * @throws LastSuperAdminException
     */
    private function guardSuperAdminDemotion(User $user, array $newRoles): void
    {
        $superAdmin = RoleName::SuperAdmin->value;

        $isLosingSuperAdmin = $user->hasRole($superAdmin) && ! in_array($superAdmin, $newRoles, true);

        if ($isLosingSuperAdmin && $this->superAdminCount() <= 1) {
            throw new LastSuperAdminException;
        }
    }

    private function isLastActiveSuperAdmin(User $user): bool
    {
        if (! $user->hasRole(RoleName::SuperAdmin->value) || ! $user->isActive()) {
            return false;
        }

        return $this->activeSuperAdminCount() <= 1;
    }

    private function superAdminCount(): int
    {
        return User::query()->role(RoleName::SuperAdmin->value)->count();
    }

    private function activeSuperAdminCount(): int
    {
        return User::query()
            ->role(RoleName::SuperAdmin->value)
            ->where('status', UserStatus::Active->value)
            ->count();
    }
}
