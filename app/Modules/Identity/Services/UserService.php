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
use App\Modules\Identity\Models\CustomerOtp;
use App\Modules\Orders\Enums\OrderStatus;
use App\Modules\Subscriptions\Enums\SubscriptionStatus;
use App\Support\Enums\ApiErrorCode;
use App\Support\Exceptions\DomainException;
use Illuminate\Support\Collection;
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
     * Soft-delete a staff member or customer after the blocking checks pass.
     *
     * Login identifiers are rewritten so the same email or phone can register again.
     */
    public function delete(User $user, int $actingUserId): void
    {
        $reason = $this->deletionBlocker($user, $actingUserId);

        if ($reason !== null) {
            throw new DomainException(
                ApiErrorCode::CONFLICT,
                409,
                $this->deletionErrorMessage($user, $reason),
            );
        }

        $this->archive($user);
    }

    /**
     * @param  Collection<int, User>  $users
     * @return array{deleted: Collection<int, User>, blocked: Collection<int, array{user: User, reason: string}>}
     */
    public function deleteMany(Collection $users, int $actingUserId): array
    {
        $deleted = new Collection;
        $blocked = new Collection;

        foreach ($users as $user) {
            $reason = $this->deletionBlocker($user, $actingUserId);

            if ($reason !== null) {
                $blocked->push([
                    'user' => $user,
                    'reason' => $reason,
                ]);

                continue;
            }

            $this->archive($user);
            $deleted->push($user);
        }

        return [
            'deleted' => $deleted,
            'blocked' => $blocked,
        ];
    }

    /**
     * Why this account cannot be removed, or null when deletion is allowed.
     */
    public function deletionBlocker(User $user, int $actingUserId): ?string
    {
        if ((int) $user->getKey() === $actingUserId) {
            return 'self';
        }

        if ($this->isLastActiveSuperAdmin($user)) {
            return 'last_super_admin';
        }

        if ($this->hasActiveSubscription($user)) {
            return 'active_subscription';
        }

        if ($this->hasIncompleteOrder($user)) {
            return 'incomplete_order';
        }

        return null;
    }

    public function deletionErrorMessage(User $user, string $reason): string
    {
        $key = 'users.errors.'.$reason;
        $message = __($key, ['name' => $user->name]);

        return is_string($message) ? $message : $reason;
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

    private function hasActiveSubscription(User $user): bool
    {
        if (isset($user->active_subscriptions_count)) {
            return (int) $user->active_subscriptions_count > 0;
        }

        return $user->subscriptions()
            ->where('status', SubscriptionStatus::Active)
            ->exists();
    }

    private function hasIncompleteOrder(User $user): bool
    {
        if (isset($user->incomplete_orders_count)) {
            return (int) $user->incomplete_orders_count > 0;
        }

        return $user->orders()
            ->whereNotIn('status', [
                OrderStatus::Delivered->value,
                OrderStatus::Cancelled->value,
            ])
            ->exists();
    }

    private function archive(User $user): void
    {
        DB::transaction(function () use ($user): void {
            $old = $this->snapshot($user);

            $this->releaseLoginIdentifiers($user);
            $user->status = UserStatus::Inactive;
            $user->remember_token = null;
            $user->save();

            $user->tokens()->delete();
            CustomerOtp::query()->where('user_id', $user->id)->delete();
            DB::table('sessions')->where('user_id', $user->id)->delete();

            $user->delete();

            $this->audit->log(AuditAction::UserArchived, $user, $old);
        });
    }

    /**
     * @return array<string, mixed>
     */
    private function snapshot(User $user): array
    {
        return [
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'status' => $user->status->value,
            'type' => $user->type->value,
        ];
    }

    private function releaseLoginIdentifiers(User $user): void
    {
        $id = (int) $user->getKey();

        if (is_string($user->email) && $user->email !== '') {
            $prefix = 'deleted.'.$id.'.';
            $user->email = $prefix.substr($user->email, 0, max(0, 255 - strlen($prefix)));
        }

        if (is_string($user->phone) && $user->phone !== '') {
            $tag = '#'.$id;
            $keep = max(0, 32 - strlen($tag));
            $user->phone = substr($user->phone, 0, $keep).$tag;
        }
    }
}
