<?php

declare(strict_types=1);

namespace Tests\Feature\Web\Admin\Auth;

use App\Models\User;
use App\Modules\Identity\Enums\RoleName;
use App\Modules\Identity\Enums\UserStatus;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_are_redirected_to_the_login_screen(): void
    {
        $this->get('/admin')->assertRedirect(route('admin.login'));
    }

    public function test_login_screen_renders(): void
    {
        $this->get(route('admin.login'))
            ->assertOk()
            ->assertSee('Sign in');
    }

    public function test_user_can_log_in_with_valid_credentials(): void
    {
        $user = User::factory()->create(['email' => 'admin@example.com']);

        $response = $this->post(route('admin.login'), [
            'email' => 'admin@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_a_shipping_officer_lands_on_todays_board(): void
    {
        $this->seed(RolesAndPermissionsSeeder::class);

        $officer = User::factory()->create(['email' => 'ship@example.com']);
        $officer->assignRole(RoleName::ShippingOfficer->value);

        $this->post(route('admin.login'), [
            'email' => 'ship@example.com',
            'password' => 'password',
        ])->assertRedirect(route('admin.deliveries.index'));
    }

    public function test_login_fails_with_invalid_password(): void
    {
        User::factory()->create(['email' => 'admin@example.com']);

        $this->from(route('admin.login'))
            ->post(route('admin.login'), [
                'email' => 'admin@example.com',
                'password' => 'wrong-password',
            ])
            ->assertRedirect(route('admin.login'))
            ->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_inactive_user_cannot_log_in(): void
    {
        User::factory()->create([
            'email' => 'inactive@example.com',
            'status' => UserStatus::Inactive->value,
        ]);

        $this->from(route('admin.login'))
            ->post(route('admin.login'), [
                'email' => 'inactive@example.com',
                'password' => 'password',
            ])
            ->assertRedirect(route('admin.login'))
            ->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_login_requires_email_and_password(): void
    {
        $this->from(route('admin.login'))
            ->post(route('admin.login'), [])
            ->assertRedirect(route('admin.login'))
            ->assertSessionHasErrors(['email', 'password']);
    }

    public function test_authenticated_user_can_view_the_dashboard(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('Dashboard');
    }

    public function test_user_can_log_out(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('admin.logout'))
            ->assertRedirect(route('admin.login'));

        $this->assertGuest();
    }
}
