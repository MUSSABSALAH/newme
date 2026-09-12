<?php

declare(strict_types=1);

namespace App\Modules\Cms\Policies;

use App\Models\User;
use App\Modules\Identity\Enums\PermissionName;

final class PageContentPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can(PermissionName::CmsView->value);
    }

    public function manage(User $user): bool
    {
        return $user->can(PermissionName::CmsManage->value);
    }
}
