<?php

declare(strict_types=1);

namespace App\Modules\Identity\Services;

use App\Models\User;
use App\Modules\Identity\DTOs\AuthResult;
use App\Modules\Identity\DTOs\LoginData;
use App\Modules\Identity\Exceptions\InactiveUserException;
use App\Modules\Identity\Exceptions\InvalidCredentialsException;
use Illuminate\Support\Facades\Hash;

final class AuthService
{
    /**
     * Verify credentials and account status, returning the matching user.
     *
     * Shared by the token-based API login and the session-based web login so
     * both channels enforce identical business rules.
     *
     * @throws InvalidCredentialsException
     * @throws InactiveUserException
     */
    public function attempt(LoginData $data): User
    {
        $user = User::query()->where('email', $data->email)->first();

        if (! $user instanceof User || ! Hash::check($data->password, (string) $user->password)) {
            throw new InvalidCredentialsException;
        }

        if (! $user->isActive()) {
            throw new InactiveUserException;
        }

        return $user;
    }

    /**
     * Authenticate a user and issue a personal access token (API channel).
     *
     * @throws InvalidCredentialsException
     * @throws InactiveUserException
     */
    public function login(LoginData $data): AuthResult
    {
        $user = $this->attempt($data);

        $token = $user->createToken($data->deviceName)->plainTextToken;

        return new AuthResult($user, $token);
    }

    /**
     * Revoke the token currently used by the authenticated user.
     */
    public function logout(User $user): void
    {
        $user->currentAccessToken()->delete();
    }
}
