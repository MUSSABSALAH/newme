<?php

declare(strict_types=1);

namespace App\Modules\Identity\Seeders;

use App\Models\User;
use App\Modules\Identity\Enums\RoleName;
use App\Modules\Identity\Enums\UserStatus;
use Illuminate\Database\Seeder;

final class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        $email = 'admin@newme.sa';
        $password = 'password';

        $user = User::query()->firstOrCreate(
            ['email' => $email],
            [
                'name' => 'Super Admin',
                'password' => $password,
                'status' => UserStatus::Active,
            ],
        );

        if (! $user->hasRole(RoleName::SuperAdmin->value)) {
            $user->assignRole(RoleName::SuperAdmin->value);
        }
    }
}
