<?php

declare(strict_types=1);

namespace App\Modules\Consultations\Policies;

use App\Models\User;
use App\Modules\Consultations\Models\Consultation;
use App\Modules\Identity\Enums\PermissionName;

final class ConsultationPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can(PermissionName::ConsultationsView->value);
    }

    public function view(User $user, Consultation $consultation): bool
    {
        return $user->can(PermissionName::ConsultationsView->value);
    }

    public function update(User $user, Consultation $consultation): bool
    {
        return $user->can(PermissionName::ConsultationsManage->value);
    }
}
