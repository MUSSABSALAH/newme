<?php

declare(strict_types=1);

namespace Tests\Feature\Web\Admin;

use App\Models\User;
use App\Modules\Identity\Enums\PermissionName;
use App\Modules\Identity\Enums\RoleName;
use App\Modules\Identity\Enums\UserStatus;
use App\Modules\Identity\Exceptions\InvitationAlreadyAcceptedException;
use App\Modules\Identity\Models\Role;
use App\Modules\Identity\Models\UserInvitation;
use App\Modules\Identity\Notifications\UserInvitationNotification;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use App\Modules\Identity\Services\InvitationService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

final class InvitationManagementTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(RolesAndPermissionsSeeder::class);
    }

    private function admin(): User
    {
        $user = User::factory()->create();
        $user->assignRole(RoleName::SuperAdmin->value);

        return $user;
    }

    public function test_user_without_permission_cannot_open_invite_form(): void
    {
        $user = User::factory()->create();
        $user->assignRole(RoleName::Driver->value);

        $this->actingAs($user)
            ->get(route('admin.users.create'))
            ->assertForbidden();
    }

    public function test_admin_can_send_an_invitation(): void
    {
        Notification::fake();

        $this->actingAs($this->admin())
            ->post(route('admin.users.store'), [
                'name' => 'Sara Ali',
                'email' => 'sara@newme.sa',
                'roles' => [RoleName::Accountant->value],
            ])
            ->assertRedirect(route('admin.users.index'));

        $user = User::query()->where('email', 'sara@newme.sa')->firstOrFail();

        $this->assertSame(UserStatus::Invited, $user->status);
        $this->assertNull($user->password);
        $this->assertTrue($user->hasRole(RoleName::Accountant->value));
        $this->assertDatabaseHas('user_invitations', ['user_id' => $user->getKey()]);

        Notification::assertSentTo($user, UserInvitationNotification::class);
    }

    public function test_invitation_requires_unique_email(): void
    {
        User::factory()->create(['email' => 'taken@newme.sa']);

        $this->actingAs($this->admin())
            ->from(route('admin.users.create'))
            ->post(route('admin.users.store'), [
                'name' => 'Sara Ali',
                'email' => 'taken@newme.sa',
            ])
            ->assertRedirect(route('admin.users.create'))
            ->assertSessionHasErrors('email');
    }

    public function test_invitation_requires_at_least_one_role(): void
    {
        $this->actingAs($this->admin())
            ->from(route('admin.users.create'))
            ->post(route('admin.users.store'), [
                'name' => 'Sara Ali',
                'email' => 'sara@newme.sa',
                'roles' => [],
            ])
            ->assertRedirect(route('admin.users.create'))
            ->assertSessionHasErrors('roles');

        $this->assertDatabaseMissing('users', ['email' => 'sara@newme.sa']);
    }

    public function test_invited_user_can_accept_and_activate_account(): void
    {
        $token = $this->issueInvitationFor('sara@newme.sa');

        $this->get(route('invitations.accept', ['token' => $token]))
            ->assertOk()
            ->assertSee('sara@newme.sa');

        $this->post(route('invitations.accept', ['token' => $token]), [
            'password' => 'secret-password',
            'password_confirmation' => 'secret-password',
        ])->assertRedirect(route('admin.dashboard'));

        $user = User::query()->where('email', 'sara@newme.sa')->firstOrFail();

        $this->assertSame(UserStatus::Active, $user->status);
        $this->assertTrue(Hash::check('secret-password', (string) $user->password));
        $this->assertAuthenticatedAs($user);
    }

    public function test_accepting_with_invalid_token_is_rejected(): void
    {
        $this->get(route('invitations.accept', ['token' => 'nonexistent-token']))
            ->assertRedirect(route('admin.login'))
            ->assertSessionHas('error');
    }

    public function test_expired_invitation_cannot_be_accepted(): void
    {
        $token = $this->issueInvitationFor('sara@newme.sa');

        UserInvitation::query()->update(['expires_at' => now()->subDay()]);

        $this->post(route('invitations.accept', ['token' => $token]), [
            'password' => 'secret-password',
            'password_confirmation' => 'secret-password',
        ])->assertRedirect(route('admin.login'))
            ->assertSessionHas('error');

        $user = User::query()->where('email', 'sara@newme.sa')->firstOrFail();
        $this->assertSame(UserStatus::Invited, $user->status);
    }

    public function test_invitation_cannot_be_accepted_twice(): void
    {
        $token = $this->issueInvitationFor('sara@newme.sa');
        $service = app(InvitationService::class);

        $service->accept($token, 'secret-password');

        // The same link cannot be reused once the invitation has been accepted.
        $this->expectException(InvitationAlreadyAcceptedException::class);
        $service->accept($token, 'another-password');
    }

    public function test_admin_can_resend_a_pending_invitation(): void
    {
        Notification::fake();

        $invitation = app(InvitationService::class)->invite(
            \App\Modules\Identity\DTOs\InvitationData::fromArray([
                'name' => 'Sara Ali',
                'email' => 'sara@newme.sa',
                'roles' => [],
            ]),
            $this->admin(),
        );

        $originalHash = $invitation->token_hash;

        $this->actingAs($this->admin())
            ->post(route('admin.users.invitations.resend', $invitation))
            ->assertRedirect(route('admin.users.index'));

        $this->assertDatabaseMissing('user_invitations', ['token_hash' => $originalHash]);
        $this->assertSame(1, UserInvitation::query()->count());
    }

    private function issueInvitationFor(string $email): string
    {
        $role = Role::create(['name' => 'inviter', 'guard_name' => 'web']);
        $role->syncPermissions([PermissionName::UsersInvite->value]);

        $inviter = User::factory()->create();
        $inviter->assignRole($role);

        $user = User::factory()->create([
            'email' => $email,
            'password' => null,
            'status' => UserStatus::Invited->value,
        ]);

        // Mirror InvitationService::issue with a known plaintext token.
        $token = 'known-plaintext-token-'.$user->getKey();
        UserInvitation::create([
            'user_id' => $user->getKey(),
            'invited_by' => $inviter->getKey(),
            'token_hash' => hash('sha256', $token),
            'expires_at' => now()->addHours(48),
        ]);

        return $token;
    }
}
