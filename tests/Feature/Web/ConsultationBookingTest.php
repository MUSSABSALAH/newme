<?php

declare(strict_types=1);

namespace Tests\Feature\Web;

use App\Models\User;
use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Consultations\Enums\ConsultationStatus;
use App\Modules\Consultations\Models\Consultation;
use App\Modules\Consultations\Notifications\ConsultationConfirmationNotification;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use App\Modules\Settings\Support\ConsultationSchedule;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

final class ConsultationBookingTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(RolesAndPermissionsSeeder::class);
    }

    private function customer(array $attributes = []): User
    {
        return User::factory()->customer()->create($attributes);
    }

    private function nextWorkingDay(): Carbon
    {
        $schedule = app(ConsultationSchedule::class);
        $date = Carbon::today()->addDay();

        for ($i = 0; $i < 14; $i++) {
            if ($schedule->isWorkingDay($date)) {
                return $date;
            }
            $date->addDay();
        }

        $this->fail('No working day found in the next two weeks.');
    }

    /**
     * @return array{start: string, end: string}
     */
    private function firstSlot(): array
    {
        $slots = app(ConsultationSchedule::class)->slots();
        $this->assertNotEmpty($slots);

        return $slots[0];
    }

    public function test_guest_is_redirected_to_login_from_consult(): void
    {
        $this->get(route('website.consult'))
            ->assertRedirect(route('website.login', ['next' => 'consult']));
    }

    public function test_guest_cannot_book_a_consultation(): void
    {
        $this->postJson(route('website.consult.store'), [
            'name' => 'سارة العتيبي',
            'email' => 'sara@example.com',
            'date' => $this->nextWorkingDay()->toDateString(),
            'starts_at' => $this->firstSlot()['start'],
            'ends_at' => $this->firstSlot()['end'],
        ])->assertUnauthorized();

        $this->assertSame(0, Consultation::query()->count());
    }

    public function test_customer_can_book_a_consultation(): void
    {
        $date = $this->nextWorkingDay();
        $slot = $this->firstSlot();
        $customer = $this->customer([
            'name' => 'سارة العتيبي',
            'email' => 'sara@example.com',
        ]);

        Notification::fake();

        $this->actingAs($customer)
            ->postJson(route('website.consult.store'), [
                'goal' => 'خسارة الوزن',
                'date' => $date->toDateString(),
                'starts_at' => $slot['start'],
                'ends_at' => $slot['end'],
            ])
            ->assertOk()
            ->assertJsonPath('ok', true);

        $consultation = Consultation::query()->firstOrFail();

        Notification::assertSentTo(
            $customer,
            ConsultationConfirmationNotification::class,
            function (ConsultationConfirmationNotification $notification) use ($consultation, $customer): bool {
                $mail = $notification->toMail($customer);

                return $mail->view === 'mail.operations.consultation-booked'
                    && str_contains((string) $mail->subject, $consultation->whenLabel());
            },
        );

        $this->assertSame('سارة العتيبي', $consultation->customer_name);
        $this->assertSame('sara@example.com', $consultation->customer_email);
        $this->assertSame($date->toDateString(), $consultation->scheduled_on->toDateString());
        $this->assertSame($slot['start'], $consultation->startsAtDisplay());
        $this->assertSame(ConsultationStatus::Pending, $consultation->status);
        $this->assertDatabaseHas('audit_logs', ['action' => AuditAction::ConsultationCreated->value]);
    }

    public function test_consult_page_marks_booked_slots_only(): void
    {
        $date = $this->nextWorkingDay();
        $slot = $this->firstSlot();

        Consultation::factory()->create([
            'scheduled_on' => $date->toDateString(),
            'starts_at' => $slot['start'],
            'ends_at' => $slot['end'],
            'status' => ConsultationStatus::Pending,
        ]);

        $this->actingAs($this->customer())
            ->get(route('website.consult'))
            ->assertOk()
            ->assertSee('"days_ahead":30', false)
            ->assertSee('"'.$date->toDateString().'":["'.$slot['start'].'"]', false);
    }

    public function test_duplicate_slot_is_rejected(): void
    {
        $date = $this->nextWorkingDay();
        $slot = $this->firstSlot();

        $payload = [
            'date' => $date->toDateString(),
            'starts_at' => $slot['start'],
            'ends_at' => $slot['end'],
        ];

        $this->actingAs($this->customer(['email' => 'first@example.com']))
            ->postJson(route('website.consult.store'), $payload)
            ->assertOk();

        $this->actingAs($this->customer(['email' => 'second@example.com']))
            ->postJson(route('website.consult.store'), $payload)
            ->assertStatus(422)
            ->assertJsonPath('ok', false);

        $this->assertSame(1, Consultation::query()->count());
    }

    public function test_invalid_slot_is_rejected(): void
    {
        $date = $this->nextWorkingDay();

        $this->actingAs($this->customer())
            ->postJson(route('website.consult.store'), [
                'date' => $date->toDateString(),
                'starts_at' => '03:00',
                'ends_at' => '04:00',
            ])->assertStatus(422);

        $this->assertSame(0, Consultation::query()->count());
    }

    public function test_the_consultation_email_renders_in_both_languages_without_a_missing_phrase(): void
    {
        $consultation = Consultation::factory()->create([
            'customer_name' => 'سارة',
            'customer_email' => 'sara@example.com',
            'goal' => 'خسارة الوزن',
        ]);
        $customer = $this->customer(['email' => 'sara@example.com']);

        foreach (['en', 'ar'] as $locale) {
            $this->app->setLocale($locale);

            $mail = (new ConsultationConfirmationNotification($consultation))->toMail($customer);
            $html = (string) $mail->render();

            $this->assertSame('mail.operations.consultation-booked', $mail->view);
            $this->assertStringContainsString('assets/images/mail/renew-strip.jpg', $html);
            $this->assertStringNotContainsString('consultations.mail.', $html);
            $this->assertStringNotContainsString('mail.headings.', $html);
        }
    }
}
