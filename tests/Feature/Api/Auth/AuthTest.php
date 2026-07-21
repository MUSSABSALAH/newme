<?php

declare(strict_types=1);

namespace Tests\Feature\Api\Auth;

use App\Models\User;
use App\Modules\Identity\Enums\UserStatus;
use App\Support\Enums\ApiErrorCode;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_succeeds_with_valid_credentials(): void
    {
        User::factory()->create(['email' => 'admin@example.com']);

        $response = $this->postJson('/api/v1/auth/login', [
            'email' => 'admin@example.com',
            'password' => 'password',
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure(['data' => ['token', 'user' => ['id', 'email', 'roles', 'permissions']], 'meta' => ['request_id']])
            ->assertJsonPath('data.user.email', 'admin@example.com');

        $this->assertNotEmpty($response->json('data.token'));
    }

    public function test_login_fails_with_invalid_password(): void
    {
        User::factory()->create(['email' => 'admin@example.com']);

        $this->postJson('/api/v1/auth/login', [
            'email' => 'admin@example.com',
            'password' => 'wrong-password',
        ])
            ->assertStatus(401)
            ->assertJsonPath('error.code', ApiErrorCode::UNAUTHENTICATED->value);
    }

    public function test_login_is_forbidden_for_inactive_user(): void
    {
        User::factory()->create([
            'email' => 'inactive@example.com',
            'status' => UserStatus::Inactive->value,
        ]);

        $this->postJson('/api/v1/auth/login', [
            'email' => 'inactive@example.com',
            'password' => 'password',
        ])
            ->assertStatus(403)
            ->assertJsonPath('error.code', ApiErrorCode::FORBIDDEN->value);
    }

    public function test_login_validation_fails_without_email(): void
    {
        $this->postJson('/api/v1/auth/login', ['password' => 'password'])
            ->assertStatus(422)
            ->assertJsonPath('error.code', ApiErrorCode::VALIDATION_FAILED->value);
    }

    public function test_me_requires_authentication(): void
    {
        $this->getJson('/api/v1/auth/me')
            ->assertStatus(401)
            ->assertJsonPath('error.code', ApiErrorCode::UNAUTHENTICATED->value);
    }

    public function test_me_returns_authenticated_user(): void
    {
        User::factory()->create(['email' => 'admin@example.com']);

        $token = $this->postJson('/api/v1/auth/login', [
            'email' => 'admin@example.com',
            'password' => 'password',
        ])->json('data.token');

        $this->withHeader('Authorization', "Bearer {$token}")
            ->getJson('/api/v1/auth/me')
            ->assertOk()
            ->assertJsonPath('data.email', 'admin@example.com');
    }

    public function test_logout_revokes_the_current_token(): void
    {
        User::factory()->create(['email' => 'admin@example.com']);

        $token = $this->postJson('/api/v1/auth/login', [
            'email' => 'admin@example.com',
            'password' => 'password',
        ])->json('data.token');

        $this->withHeader('Authorization', "Bearer {$token}")
            ->postJson('/api/v1/auth/logout')
            ->assertOk();

        // The token row is actually revoked.
        $this->assertDatabaseCount('personal_access_tokens', 0);

        // Simulate a fresh request so the auth guard re-resolves from the token store.
        $this->app['auth']->forgetGuards();

        $this->withHeader('Authorization', "Bearer {$token}")
            ->getJson('/api/v1/auth/me')
            ->assertStatus(401);
    }
}
