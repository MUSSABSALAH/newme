<?php

declare(strict_types=1);

namespace App\Modules\Identity\Services;

use App\Models\User;
use App\Modules\Identity\DTOs\HealthProfile;

final class CustomerProfileService
{
    /**
     * Keep what the customer declared while subscribing so the wizard can offer
     * it back next time. Blank answers never wipe details we already hold.
     */
    public function rememberHealth(User $user, HealthProfile $health): void
    {
        if ($health->isEmpty()) {
            return;
        }

        $user->birth_date = $health->birthDate ?? $user->birth_date;
        $user->allergies = $health->allergies ?? $user->allergies;
        $user->medications = $health->medications ?? $user->medications;

        $user->save();
    }
}
