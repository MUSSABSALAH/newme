<?php

declare(strict_types=1);

namespace App\Modules\Audit\Policies;

use App\Models\User;
use App\Modules\Identity\Enums\PermissionName;

final class AuditLogPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can(PermissionName::AuditView->value);
    }
}
