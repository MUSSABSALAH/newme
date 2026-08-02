<?php

declare(strict_types=1);

namespace App\Modules\Store\Policies;

use App\Models\User;
use App\Modules\Identity\Enums\PermissionName;
use App\Modules\Store\Models\Category;

final class CategoryPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can(PermissionName::CatalogView->value);
    }

    public function view(User $user, Category $category): bool
    {
        return $user->can(PermissionName::CatalogView->value);
    }

    public function create(User $user): bool
    {
        return $user->can(PermissionName::CatalogCreate->value);
    }

    public function update(User $user, Category $category): bool
    {
        return $user->can(PermissionName::CatalogUpdate->value);
    }

    public function delete(User $user, Category $category): bool
    {
        return $user->can(PermissionName::CatalogDelete->value);
    }
}
