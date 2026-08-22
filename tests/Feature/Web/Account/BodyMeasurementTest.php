<?php

declare(strict_types=1);

namespace Tests\Feature\Web\Account;

use App\Models\User;
use App\Modules\Identity\Models\BodyMeasurement;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class BodyMeasurementTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(RolesAndPermissionsSeeder::class);
    }

    /**
     * @param  array<string, mixed>  $overrides
     * @return array<string, mixed>
     */
    private function reading(array $overrides = []): array
    {
        return array_merge([
            'measured_on' => now()->toDateString(),
            'weight_kg' => 82.5,
            'height_cm' => 176,
        ], $overrides);
    }

    public function test_a_customer_can_log_a_reading(): void
    {
        $customer = User::factory()->customer()->create();

        $this->actingAs($customer)
            ->post(route('website.account.measurements.store'), $this->reading([
                'waist_cm' => 94.5,
                'hip_cm' => 104,
                'body_fat_percent' => 24.2,
                'notes' => ' After the first month ',
            ]))
            ->assertRedirect(route('website.account', ['tab' => 'measurements']))
            ->assertSessionHas('success');

        $measurement = BodyMeasurement::query()->firstOrFail();

        $this->assertSame($customer->id, $measurement->user_id);
        $this->assertSame(82.5, $measurement->weight_kg);
        $this->assertSame(94.5, $measurement->waist_cm);
        $this->assertSame(104.0, $measurement->hip_cm);
        $this->assertSame(24.2, $measurement->body_fat_percent);
        $this->assertSame('After the first month', $measurement->notes);
        $this->assertNull($measurement->chest_cm);
    }

    public function test_logging_the_same_date_twice_corrects_the_reading(): void
    {
        $customer = User::factory()->customer()->create();
        $today = now()->toDateString();

        $this->actingAs($customer)
            ->post(route('website.account.measurements.store'), $this->reading(['weight_kg' => 82.5]));

        $this->actingAs($customer)
            ->post(route('website.account.measurements.store'), $this->reading([
                'measured_on' => $today,
                'weight_kg' => 81,
            ]));

        $this->assertSame(1, BodyMeasurement::query()->count());
        $this->assertSame(81.0, BodyMeasurement::query()->firstOrFail()->weight_kg);
    }

    public function test_a_reading_without_a_height_reuses_the_last_one_recorded(): void
    {
        $customer = User::factory()->customer()->create();

        $this->actingAs($customer)
            ->post(route('website.account.measurements.store'), $this->reading([
                'measured_on' => now()->subMonth()->toDateString(),
                'height_cm' => 176,
            ]));

        $this->actingAs($customer)
            ->post(route('website.account.measurements.store'), $this->reading([
                'measured_on' => now()->toDateString(),
                'height_cm' => null,
                'weight_kg' => 80,
            ]));

        $latest = BodyMeasurement::query()->where('measured_on', now()->toDateString())->firstOrFail();

        $this->assertSame(176.0, $latest->height_cm);
        $this->assertSame(25.8, $latest->bmi());
        $this->assertSame('overweight', $latest->bmiBand());
    }

    public function test_a_weight_outside_the_accepted_range_is_rejected(): void
    {
        $customer = User::factory()->customer()->create();

        $this->actingAs($customer)
            ->post(route('website.account.measurements.store'), $this->reading(['weight_kg' => 900]))
            ->assertSessionHasErrors('weight_kg');

        $this->assertSame(0, BodyMeasurement::query()->count());
    }

    public function test_a_reading_cannot_be_dated_in_the_future(): void
    {
        $customer = User::factory()->customer()->create();

        $this->actingAs($customer)
            ->post(route('website.account.measurements.store'), $this->reading([
                'measured_on' => now()->addDay()->toDateString(),
            ]))
            ->assertSessionHasErrors('measured_on');
    }

    public function test_a_customer_can_delete_their_own_reading(): void
    {
        $customer = User::factory()->customer()->create();
        $measurement = BodyMeasurement::factory()->for($customer)->create();

        $this->actingAs($customer)
            ->delete(route('website.account.measurements.destroy', $measurement))
            ->assertRedirect(route('website.account', ['tab' => 'measurements']));

        $this->assertSame(0, BodyMeasurement::query()->count());
    }

    public function test_a_customer_cannot_delete_someone_elses_reading(): void
    {
        $customer = User::factory()->customer()->create();
        $measurement = BodyMeasurement::factory()->create();

        $this->actingAs($customer)
            ->delete(route('website.account.measurements.destroy', $measurement))
            ->assertNotFound();

        $this->assertSame(1, BodyMeasurement::query()->count());
    }

    public function test_the_account_page_lists_the_history_with_the_weight_change(): void
    {
        $customer = User::factory()->customer()->create();

        BodyMeasurement::factory()->for($customer)->create([
            'measured_on' => now()->subMonth()->toDateString(),
            'weight_kg' => 86,
            'height_cm' => 176,
        ]);

        BodyMeasurement::factory()->for($customer)->create([
            'measured_on' => now()->toDateString(),
            'weight_kg' => 82.5,
            'height_cm' => 176,
            'waist_cm' => 94,
        ]);

        $this->actingAs($customer)
            ->get(route('website.account', ['tab' => 'measurements']))
            ->assertOk()
            ->assertSee(__('account.tabs.measurements'))
            ->assertSee(__('measurements.account.current_weight'))
            ->assertSee('82.5')
            ->assertSee('3.5')
            ->assertSee('94');
    }

    public function test_the_account_page_charts_the_weight_once(): void
    {
        $customer = User::factory()->customer()->create();

        foreach ([['-2 months', 88.0, 100.0], ['-1 month', 85.0, 97.0], ['now', 82.5, null]] as [$when, $weight, $waist]) {
            BodyMeasurement::factory()->for($customer)->create([
                'measured_on' => now()->modify($when)->toDateString(),
                'weight_kg' => $weight,
                'waist_cm' => $waist,
            ]);
        }

        $page = $this->actingAs($customer)
            ->get(route('website.account', ['tab' => 'measurements']))
            ->assertOk()
            ->assertSee(__('measurements.account.progress'))
            ->assertSee('data-chart="weight_kg"', false);

        // One chart, however many readings or fields were logged.
        $this->assertSame(1, substr_count($page->getContent(), 'data-chart='));
    }

    public function test_a_single_reading_draws_no_chart(): void
    {
        $customer = User::factory()->customer()->create();
        BodyMeasurement::factory()->for($customer)->create();

        $this->actingAs($customer)
            ->get(route('website.account', ['tab' => 'measurements']))
            ->assertOk()
            ->assertDontSee(__('measurements.account.progress'))
            ->assertDontSee('data-chart', false);
    }

    public function test_the_account_page_says_when_nothing_was_logged(): void
    {
        $customer = User::factory()->customer()->create();

        $this->actingAs($customer)
            ->get(route('website.account', ['tab' => 'measurements']))
            ->assertOk()
            ->assertSee(__('measurements.account.empty'));
    }
}
