<?php

declare(strict_types=1);

namespace Tests\Feature\Web\Account;

use App\Models\User;
use App\Modules\Identity\Notifications\PasswordResetNotification;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

final class CustomerPasswordResetTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(RolesAndPermissionsSeeder::class);
    }

    public function test_forgot_password_screen_renders(): void
    {
        $this->get(route('website.password.request'))
            ->assertOk()
            ->assertSee(__('account.passwords.request_heading'));
    }

    public function test_login_screen_links_to_the_reset_flow(): void
    {
        $this->get(route('website.login'))
            ->assertOk()
            ->assertSee(route('website.password.request'));
    }

    public function test_reset_link_is_sent_for_a_customer(): void
    {
        Notification::fake();

        $customer = User::factory()->customer()->create(['email' => 'sara@example.com']);

        $this->from(route('website.password.request'))
            ->post(route('website.password.email'), ['email' => 'sara@example.com'])
            ->assertRedirect(route('website.password.request'))
            ->assertSessionHas('status');

        Notification::assertSentTo($customer, PasswordResetNotification::class);
        $this->assertDatabaseHas('password_reset_tokens', ['email' => 'sara@example.com']);
    }

    public function test_reset_link_is_not_sent_to_a_staff_account(): void
    {
        Notification::fake();

        User::factory()->create(['email' => 'staff@newme.sa']);

        $this->post(route('website.password.email'), ['email' => 'staff@newme.sa'])
            ->assertSessionHas('status');

        Notification::assertNothingSent();
        $this->assertDatabaseMissing('password_reset_tokens', ['email' => 'staff@newme.sa']);
    }

    public function test_customer_can_reset_password_with_a_valid_token(): void
    {
        $customer = User::factory()->customer()->create(['email' => 'sara@example.com']);
        $token = $this->issueTokenFor('sara@example.com');

        $this->post(route('website.password.update'), [
            'token' => $token,
            'email' => 'sara@example.com',
            'password' => 'new-secret-password',
            'password_confirmation' => 'new-secret-password',
        ])->assertRedirect(route('website.account'));

        $customer->refresh();
        $this->assertTrue(Hash::check('new-secret-password', (string) $customer->password));
        $this->assertAuthenticatedAs($customer);
        $this->assertDatabaseMissing('password_reset_tokens', ['email' => 'sara@example.com']);
    }

    public function test_staff_token_cannot_be_redeemed_on_the_website(): void
    {
        User::factory()->create(['email' => 'staff@newme.sa']);
        $token = $this->issueTokenFor('staff@newme.sa');

        $this->from(route('website.password.reset', ['token' => $token]))
            ->post(route('website.password.update'), [
                'token' => $token,
                'email' => 'staff@newme.sa',
                'password' => 'new-secret-password',
                'password_confirmation' => 'new-secret-password',
            ])
            ->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_reset_is_rejected_with_an_invalid_token(): void
    {
        User::factory()->customer()->create(['email' => 'sara@example.com']);
        $this->issueTokenFor('sara@example.com');

        $this->from(route('website.password.reset', ['token' => 'wrong-token']))
            ->post(route('website.password.update'), [
                'token' => 'wrong-token',
                'email' => 'sara@example.com',
                'password' => 'new-secret-password',
                'password_confirmation' => 'new-secret-password',
            ])
            ->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_reset_is_rejected_with_an_expired_token(): void
    {
        User::factory()->customer()->create(['email' => 'sara@example.com']);
        $token = $this->issueTokenFor('sara@example.com');

        DB::table('password_reset_tokens')
            ->where('email', 'sara@example.com')
            ->update(['created_at' => now()->subHours(2)]);

        $this->post(route('website.password.update'), [
            'token' => $token,
            'email' => 'sara@example.com',
            'password' => 'new-secret-password',
            'password_confirmation' => 'new-secret-password',
        ])->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_reset_requires_confirmation_and_minimum_length(): void
    {
        User::factory()->customer()->create(['email' => 'sara@example.com']);
        $token = $this->issueTokenFor('sara@example.com');

        $this->from(route('website.password.reset', ['token' => $token]))
            ->post(route('website.password.update'), [
                'token' => $token,
                'email' => 'sara@example.com',
                'password' => 'short',
                'password_confirmation' => 'mismatch',
            ])
            ->assertSessionHasErrors('password');
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
