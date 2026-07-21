<?php

declare(strict_types=1);

namespace App\Modules\Settings\Policies;

use App\Models\User;
use App\Modules\Identity\Enums\PermissionName;

final class SettingsPolicy
{
    public function manage(User $user): bool
    {
        return $user->can(PermissionName::SettingsManage->value);
    }
}
