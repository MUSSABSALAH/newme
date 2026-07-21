<?php

declare(strict_types=1);

namespace Tests\Feature\Web\Admin\Auth;

use App\Models\User;
use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Identity\Enums\UserStatus;
use App\Modules\Identity\Notifications\PasswordResetNotification;
use App\Modules\Identity\Services\PasswordResetService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

final class PasswordResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_forgot_password_screen_renders(): void
    {
        $this->get(route('admin.password.request'))
            ->assertOk()
            ->assertSee(__('auth.passwords.request_heading'));
    }

    public function test_reset_link_is_sent_for_an_active_user(): void
    {
        Notification::fake();

        $user = User::factory()->create(['email' => 'staff@newme.sa']);

        $this->from(route('admin.password.request'))
            ->post(route('admin.password.email'), ['email' => 'staff@newme.sa'])
            ->assertRedirect(route('admin.password.request'))
            ->assertSessionHas('status');

        Notification::assertSentTo($user, PasswordResetNotification::class);
        $this->assertDatabaseHas('password_reset_tokens', ['email' => 'staff@newme.sa']);
    }

    public function test_reset_link_is_not_sent_for_unknown_email(): void
    {
        Notification::fake();

        $this->post(route('admin.password.email'), ['email' => 'ghost@newme.sa'])
            ->assertSessionHas('status');

        Notification::assertNothingSent();
        $this->assertDatabaseMissing('password_reset_tokens', ['email' => 'ghost@newme.sa']);
    }

    public function test_reset_link_is_not_sent_for_inactive_user(): void
    {
        Notification::fake();

        User::factory()->inactive()->create(['email' => 'off@newme.sa']);

        $this->post(route('admin.password.email'), ['email' => 'off@newme.sa'])
            ->assertSessionHas('status');

        Notification::assertNothingSent();
    }

    public function test_reset_link_is_not_sent_to_a_pending_invitation(): void
    {
        Notification::fake();

        User::factory()->create([
            'email' => 'invited@newme.sa',
            'password' => null,
            'status' => UserStatus::Invited->value,
        ]);

        $this->post(route('admin.password.email'), ['email' => 'invited@newme.sa'])
            ->assertSessionHas('status');

        Notification::assertNothingSent();
    }

    public function test_user_can_reset_password_with_a_valid_token(): void
    {
        $user = User::factory()->create(['email' => 'staff@newme.sa']);
        $token = $this->issueTokenFor('staff@newme.sa');

        $this->post(route('admin.password.update'), [
            'token' => $token,
            'email' => 'staff@newme.sa',
            'password' => 'new-secret-password',
            'password_confirmation' => 'new-secret-password',
        ])->assertRedirect(route('admin.dashboard'));

        $user->refresh();
        $this->assertTrue(Hash::check('new-secret-password', (string) $user->password));
        $this->assertAuthenticatedAs($user);
        $this->assertDatabaseMissing('password_reset_tokens', ['email' => 'staff@newme.sa']);
    }

    public function test_reset_is_rejected_with_an_invalid_token(): void
    {
        User::factory()->create(['email' => 'staff@newme.sa']);
        $this->issueTokenFor('staff@newme.sa');

        $this->from(route('admin.password.reset', ['token' => 'wrong-token']))
            ->post(route('admin.password.update'), [
                'token' => 'wrong-token',
                'email' => 'staff@newme.sa',
                'password' => 'new-secret-password',
                'password_confirmation' => 'new-secret-password',
            ])
            ->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_reset_is_rejected_with_an_expired_token(): void
    {
        User::factory()->create(['email' => 'staff@newme.sa']);
        $token = $this->issueTokenFor('staff@newme.sa');

        DB::table('password_reset_tokens')
            ->where('email', 'staff@newme.sa')
            ->update(['created_at' => now()->subHours(2)]);

        $this->post(route('admin.password.update'), [
            'token' => $token,
            'email' => 'staff@newme.sa',
            'password' => 'new-secret-password',
            'password_confirmation' => 'new-secret-password',
        ])->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_reset_requires_confirmation_and_minimum_length(): void
    {
        User::factory()->create(['email' => 'staff@newme.sa']);
        $token = $this->issueTokenFor('staff@newme.sa');

        $this->from(route('admin.password.reset', ['token' => $token]))
            ->post(route('admin.password.update'), [
                'token' => $token,
                'email' => 'staff@newme.sa',
                'password' => 'short',
                'password_confirmation' => 'mismatch',
            ])
            ->assertSessionHasErrors('password');
    }

    public function test_successful_reset_is_audited(): void
    {
        $user = User::factory()->create(['email' => 'staff@newme.sa']);
        $token = $this->issueTokenFor('staff@newme.sa');

        app(PasswordResetService::class)->reset('staff@newme.sa', $token, 'new-secret-password');

        $this->assertDatabaseHas('audit_logs', [
            'action' => AuditAction::PasswordReset->value,
            'auditable_type' => User::class,
            'auditable_id' => $user->getKey(),
            'actor_id' => null,
        ]);
    }

    private function issueTokenFor(string $email): string
    {
        $token = 'known-reset-token-'.$email;

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $email],
            ['token' => hash('sha256', $token), 'created_at' => now()],
        );

        return $token;
    }
}
