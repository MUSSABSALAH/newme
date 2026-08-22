<?php

declare(strict_types=1);

namespace App\Modules\Cms\Policies;

use App\Models\User;
use App\Modules\Cms\Models\Article;
use App\Modules\Identity\Enums\PermissionName;

final class ArticlePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can(PermissionName::CmsView->value);
    }

    public function view(User $user, Article $article): bool
    {
        return $user->can(PermissionName::CmsView->value);
    }

    public function create(User $user): bool
    {
        return $user->can(PermissionName::CmsManage->value);
    }

    public function update(User $user, Article $article): bool
    {
        return $user->can(PermissionName::CmsManage->value);
    }

    public function delete(User $user, Article $article): bool
    {
        return $user->can(PermissionName::CmsManage->value);
    }
}
