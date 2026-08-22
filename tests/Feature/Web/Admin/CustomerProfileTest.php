<?php

declare(strict_types=1);

namespace Tests\Feature\Web\Admin;

use App\Models\User;
use App\Modules\Identity\Enums\RoleName;
use App\Modules\Identity\Models\BodyMeasurement;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class CustomerProfileTest extends TestCase
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

    public function test_a_user_without_permission_cannot_open_a_customer(): void
    {
        $staff = User::factory()->create();
        $staff->assignRole(RoleName::Driver->value);

        $this->actingAs($staff)
            ->get(route('admin.customers.show', User::factory()->customer()->create()))
            ->assertForbidden();
    }

    public function test_the_profile_shows_the_health_details(): void
    {
        $customer = User::factory()->customer()->create([
            'birth_date' => now()->subYears(38)->subMonth()->toDateString(),
            'allergies' => 'Shellfish',
            'medications' => 'Insulin',
        ]);

        $this->actingAs($this->admin())
            ->get(route('admin.customers.show', $customer))
            ->assertOk()
            ->assertSee(__('customers.show.health'))
            ->assertSee(__('customers.show.age_years', ['n' => 38]))
            ->assertSee('Shellfish')
            ->assertSee('Insulin');
    }

    public function test_the_profile_shows_the_measurement_history(): void
    {
        $customer = User::factory()->customer()->create();

        BodyMeasurement::factory()->for($customer)->create([
            'measured_on' => now()->subMonth()->toDateString(),
            'weight_kg' => 86,
            'height_cm' => 176,
            'waist_cm' => 99,
            'body_fat_percent' => 27,
        ]);

        BodyMeasurement::factory()->for($customer)->create([
            'measured_on' => now()->toDateString(),
            'weight_kg' => 82.5,
            'height_cm' => 176,
            'waist_cm' => 94,
            'body_fat_percent' => 24,
        ]);

        $this->actingAs($this->admin())
            ->get(route('admin.customers.show', $customer))
            ->assertOk()
            ->assertSee(__('measurements.admin.title'))
            ->assertSee('82.5')
            ->assertSee('3.5')
            ->assertSee('94')
            ->assertSee(__('measurements.bmi.overweight'))
            ->assertSee('data-chart="weight_kg"', false);
    }

    public function test_the_profile_draws_a_single_chart(): void
    {
        $customer = User::factory()->customer()->create();

        foreach (['-2 months', '-1 month', 'now'] as $when) {
            BodyMeasurement::factory()->for($customer)->create([
                'measured_on' => now()->modify($when)->toDateString(),
            ]);
        }

        $page = $this->actingAs($this->admin())
            ->get(route('admin.customers.show', $customer))
            ->assertOk();

        $this->assertSame(1, substr_count($page->getContent(), 'data-chart='));
    }

    public function test_the_profile_draws_no_chart_for_a_lone_reading(): void
    {
        $customer = User::factory()->customer()->create();
        BodyMeasurement::factory()->for($customer)->create();

        $this->actingAs($this->admin())
            ->get(route('admin.customers.show', $customer))
            ->assertOk()
            ->assertSee(__('measurements.admin.title'))
            ->assertDontSee('data-chart', false);
    }

    public function test_the_profile_says_when_no_measurements_were_logged(): void
    {
        $customer = User::factory()->customer()->create();

        $this->actingAs($this->admin())
            ->get(route('admin.customers.show', $customer))
            ->assertOk()
            ->assertSee(__('measurements.admin.empty'))
            ->assertSee(__('customers.show.no_health'));
    }
}
