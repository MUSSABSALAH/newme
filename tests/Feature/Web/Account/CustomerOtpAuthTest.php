<?php

declare(strict_types=1);

namespace Tests\Feature\Web\Account;

use App\Models\User;
use App\Modules\Identity\Contracts\SmsSender;
use App\Modules\Identity\Jobs\SendSmsJob;
use App\Modules\Identity\Notifications\EmailOtpNotification;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use App\Modules\Identity\Support\RecordingSmsSender;
use App\Modules\Notifications\Enums\MessageQueue;
use App\Modules\Settings\Services\SettingsService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

final class CustomerOtpAuthTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(RolesAndPermissionsSeeder::class);
    }

    public function test_email_otp_hides_phone_and_password_on_register_and_login(): void
    {
        $this->enableOtp(email: true, sms: false);

        $this->get(route('website.register'))
            ->assertOk()
            ->assertSee(__('account.fields.email'))
            ->assertSee(__('account.fields.name'))
            ->assertDontSee('name="phone"', false)
            ->assertDontSee('name="password"', false);

        $this->get(route('website.login'))
            ->assertOk()
            ->assertSee(__('account.fields.email'))
            ->assertSee('novalidate', false)
            ->assertSee('data-busy-label', false)
            ->assertDontSee('name="phone"', false)
            ->assertDontSee('name="password"', false)
            ->assertDontSee(route('website.password.request'), false);
    }

    public function test_sms_otp_hides_email_and_password_on_register_and_login(): void
    {
        $this->enableOtp(email: false, sms: true);

        $this->get(route('website.register'))
            ->assertOk()
            ->assertSee(__('account.fields.phone'))
            ->assertSee(__('account.fields.name'))
            ->assertDontSee('name="email"', false)
            ->assertDontSee('name="password"', false);

        $this->get(route('website.login'))
            ->assertOk()
            ->assertSee(__('account.fields.phone'))
            ->assertDontSee('name="email"', false)
            ->assertDontSee('name="password"', false);
    }

    public function test_customer_registers_with_email_otp(): void
    {
        Notification::fake();
        $this->enableOtp(email: true, sms: false);

        $this->post(route('website.register'), [
            'name' => 'Sara Customer',
            'email' => 'sara@example.com',
        ])->assertRedirect(route('website.otp.create'));

        $this->assertGuest();

        $user = User::query()->where('email', 'sara@example.com')->first();
        $this->assertNotNull($user);
        $this->assertTrue($user->isCustomer());

        $code = null;
        Notification::assertSentTo($user, EmailOtpNotification::class, function (EmailOtpNotification $notification) use (&$code): bool {
            $code = $notification->code;

            return strlen($notification->code) === 6
                && $notification->queue === MessageQueue::Otp->value;
        });

        $this->post(route('website.otp.store'), ['code' => $code])
            ->assertRedirect(route('website.account'));

        $this->assertAuthenticatedAs($user);
    }

    public function test_sms_otp_is_queued_on_the_highest_priority_lane(): void
    {
        Queue::fake();
        $this->enableOtp(email: false, sms: true);

        $this->post(route('website.register'), [
            'name' => 'Sara Customer',
            'phone' => '0551234567',
        ])->assertRedirect(route('website.otp.create'));

        Queue::assertPushedOn(MessageQueue::Otp->value, SendSmsJob::class);
    }

    public function test_customer_registers_with_sms_otp(): void
    {
        $this->enableOtp(email: false, sms: true);

        $this->post(route('website.register'), [
            'name' => 'Sara Customer',
            'phone' => '0551234567',
        ])->assertRedirect(route('website.otp.create'));

        $this->assertGuest();

        $user = User::query()->where('phone', '0551234567')->first();
        $this->assertNotNull($user);
        $this->assertNull($user->email);

        $sms = app(SmsSender::class);
        $this->assertInstanceOf(RecordingSmsSender::class, $sms);
        $code = $sms->lastCode();
        $this->assertNotNull($code);
        $this->assertMatchesRegularExpression('/@[^\s]+ #'.$code.'/', (string) $sms->lastMessage());

        $this->get(route('website.otp.create'))
            ->assertOk()
            ->assertSee('otp-cell', false)
            ->assertSee('autocomplete="one-time-code"', false)
            ->assertSee('inputmode="numeric"', false);

        $this->post(route('website.otp.store'), ['code' => $code])
            ->assertRedirect(route('website.account'));

        $this->assertAuthenticatedAs($user);
    }

    public function test_the_queued_otp_email_uses_the_language_the_customer_was_browsing_in(): void
    {
        Notification::fake();
        $this->enableOtp(email: true, sms: false);

        $this->withSession(['locale' => 'ar'])
            ->post(route('website.register'), [
                'name' => 'سارة',
                'email' => 'sara@example.com',
            ])
            ->assertRedirect(route('website.otp.create'));

        $user = User::query()->where('email', 'sara@example.com')->firstOrFail();

        Notification::assertSentTo(
            $user,
            EmailOtpNotification::class,
            static fn (EmailOtpNotification $notification): bool => $notification->locale === 'ar',
        );
    }

    public function test_customer_logs_in_with_email_otp(): void
    {
        Notification::fake();
        $this->enableOtp(email: true, sms: false);

        $user = User::factory()->customer()->create(['email' => 'sara@example.com']);

        $this->post(route('website.login'), [
            'email' => 'sara@example.com',
        ])->assertRedirect(route('website.otp.create'));

        $this->assertGuest();

        $code = null;
        Notification::assertSentTo($user, EmailOtpNotification::class, function (EmailOtpNotification $notification) use (&$code): bool {
            $code = $notification->code;

            return true;
        });

        $this->post(route('website.otp.store'), ['code' => $code])
            ->assertRedirect(route('website.account'));

        $this->assertAuthenticatedAs($user);
    }

    public function test_a_wrong_otp_is_rejected(): void
    {
        Notification::fake();
        $this->enableOtp(email: true, sms: false);

        $this->post(route('website.register'), [
            'name' => 'Sara Customer',
            'email' => 'sara@example.com',
        ]);

        $this->from(route('website.otp.create'))
            ->post(route('website.otp.store'), ['code' => '000000'])
            ->assertRedirect(route('website.otp.create'))
            ->assertSessionHasErrors('code');

        $this->assertGuest();
    }

    public function test_staff_cannot_request_a_website_otp(): void
    {
        Notification::fake();
        $this->enableOtp(email: true, sms: false);

        User::factory()->create(['email' => 'admin@example.com']);

        $this->from(route('website.login'))
            ->post(route('website.login'), ['email' => 'admin@example.com'])
            ->assertRedirect(route('website.login'))
            ->assertSessionHasErrors('email');

        Notification::assertNothingSent();
        $this->assertGuest();
    }

    public function test_register_rejects_email_when_email_otp_is_off(): void
    {
        $this->enableOtp(email: false, sms: true);

        $this->from(route('website.register'))
            ->post(route('website.register'), [
                'name' => 'Sara Customer',
                'email' => 'sara@example.com',
            ])
            ->assertRedirect(route('website.register'))
            ->assertSessionHasErrors('phone');

        $this->assertDatabaseMissing('users', ['email' => 'sara@example.com']);
    }

    public function test_forgot_password_is_hidden_when_otp_is_on(): void
    {
        $this->enableOtp(email: true, sms: false);

        $this->get(route('website.password.request'))
            ->assertRedirect(route('website.login'));
    }

    public function test_sms_otp_profile_keeps_email_optional(): void
    {
        $this->enableOtp(email: false, sms: true);

        $customer = User::factory()->customer()->create([
            'name' => 'Sara Customer',
            'email' => null,
            'phone' => '0551234567',
        ]);

        $this->actingAs($customer)
            ->get(route('website.account'))
            ->assertOk()
            ->assertSee(__('account.fields.phone'))
            ->assertSee(__('account.fields.email'))
            ->assertSee(__('account.fields.optional'))
            ->assertDontSee('name="password"', false);

        $this->actingAs($customer)
            ->put(route('website.account.profile'), [
                'name' => 'Sara Updated',
                'phone' => '0559999999',
            ])
            ->assertRedirect(route('website.account', ['tab' => 'profile']));

        $customer->refresh();

        $this->assertSame('Sara Updated', $customer->name);
        $this->assertSame('0559999999', $customer->phone);
        $this->assertNull($customer->email);

        $this->actingAs($customer)
            ->put(route('website.account.profile'), [
                'name' => 'Sara Updated',
                'email' => 'sara@example.com',
                'phone' => '0559999999',
            ])
            ->assertRedirect(route('website.account', ['tab' => 'profile']));

        $this->assertSame('sara@example.com', $customer->fresh()->email);
    }

    public function test_email_otp_profile_keeps_phone_optional(): void
    {
        $this->enableOtp(email: true, sms: false);

        $customer = User::factory()->customer()->create([
            'email' => 'sara@example.com',
            'phone' => null,
        ]);

        $this->actingAs($customer)
            ->get(route('website.account'))
            ->assertOk()
            ->assertSee(__('account.fields.email'))
            ->assertSee(__('account.fields.phone'))
            ->assertSee(__('account.fields.optional'))
            ->assertDontSee('name="password"', false);

        $this->actingAs($customer)
            ->put(route('website.account.profile'), [
                'name' => $customer->name,
                'email' => 'sara@example.com',
            ])
            ->assertRedirect(route('website.account', ['tab' => 'profile']));

        $this->assertNull($customer->fresh()->phone);
    }

    private function enableOtp(bool $email, bool $sms): void
    {
        app(SettingsService::class)->update([
            'authentication.email_otp' => $email,
            'authentication.sms_otp' => $sms,
        ]);
    }
}
