<?php

declare(strict_types=1);

namespace Tests\Feature\Web\Admin;

use App\Models\User;
use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Identity\Enums\RoleName;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use App\Modules\Promotions\Enums\CouponScope;
use App\Modules\Promotions\Enums\CouponType;
use App\Modules\Promotions\Models\Coupon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Tests\TestCase;

final class CouponManagementTest extends TestCase
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

    /**
     * @param  array<string, mixed>  $overrides
     * @return array<string, mixed>
     */
    private function payload(array $overrides = []): array
    {
        return array_merge([
            'code' => 'WELCOME10',
            'name' => ['ar' => 'ترحيب', 'en' => 'Welcome'],
            'type' => CouponType::Percentage->value,
            'scope' => CouponScope::All->value,
            'percent_off' => '10',
            'min_subtotal' => '0',
            'is_active' => '1',
        ], $overrides);
    }

    public function test_user_without_permission_cannot_view_coupons(): void
    {
        $user = User::factory()->create();
        $user->assignRole(RoleName::Driver->value);

        $this->actingAs($user)
            ->get(route('admin.coupons.index'))
            ->assertForbidden();
    }

    public function test_admin_can_view_the_coupons_index(): void
    {
        Coupon::factory()->code('SUMMER')->create();

        $this->actingAs($this->admin())
            ->get(route('admin.coupons.index'))
            ->assertOk()
            ->assertSee(__('coupons.title'))
            ->assertSee('SUMMER');
    }

    public function test_admin_can_open_the_create_and_edit_forms(): void
    {
        $coupon = Coupon::factory()->code('SUMMER')->fixed(2500)->create();

        $this->actingAs($this->admin())
            ->get(route('admin.coupons.create'))
            ->assertOk()
            ->assertSee(__('coupons.create_title'));

        $this->actingAs($this->admin())
            ->get(route('admin.coupons.edit', $coupon))
            ->assertOk()
            ->assertSee('SUMMER')
            ->assertSee('25.00');
    }

    public function test_the_index_can_be_filtered_by_scope(): void
    {
        Coupon::factory()->code('STOREONLY')->scope(CouponScope::Store)->create();
        Coupon::factory()->code('SUBSONLY')->scope(CouponScope::Subscriptions)->create();

        $this->actingAs($this->admin())
            ->get(route('admin.coupons.index', ['scope' => CouponScope::Store->value]))
            ->assertOk()
            ->assertSee('STOREONLY')
            ->assertDontSee('SUBSONLY');
    }

    public function test_admin_can_create_a_percentage_coupon(): void
    {
        $this->actingAs($this->admin())
            ->post(route('admin.coupons.store'), $this->payload(['max_discount' => '30.00']))
            ->assertRedirect(route('admin.coupons.index'));

        $coupon = Coupon::query()->firstOrFail();

        $this->assertSame('WELCOME10', $coupon->code);
        $this->assertSame(CouponType::Percentage, $coupon->type);
        $this->assertSame(1000, $coupon->percentBasisPoints());
        $this->assertSame(3000, $coupon->max_discount_minor);
        $this->assertNull($coupon->amount_off_minor);
        $this->assertDatabaseHas('audit_logs', ['action' => AuditAction::CouponCreated->value]);
    }

    public function test_codes_are_stored_upper_case(): void
    {
        $this->actingAs($this->admin())
            ->post(route('admin.coupons.store'), $this->payload(['code' => 'spring-sale']));

        $this->assertDatabaseHas('coupons', ['code' => 'SPRING-SALE']);
    }

    public function test_fixed_coupon_stores_minor_units_and_clears_percentage(): void
    {
        $this->actingAs($this->admin())
            ->post(route('admin.coupons.store'), $this->payload([
                'type' => CouponType::Fixed->value,
                'percent_off' => '',
                'amount_off' => '25.50',
            ]))
            ->assertRedirect(route('admin.coupons.index'));

        $coupon = Coupon::query()->firstOrFail();

        $this->assertSame(2550, $coupon->amount_off_minor);
        $this->assertNull($coupon->percent_off);
    }

    public function test_percentage_coupon_requires_a_percentage(): void
    {
        $this->actingAs($this->admin())
            ->from(route('admin.coupons.create'))
            ->post(route('admin.coupons.store'), $this->payload(['percent_off' => '']))
            ->assertSessionHasErrors('percent_off');
    }

    public function test_fixed_coupon_requires_an_amount(): void
    {
        $this->actingAs($this->admin())
            ->from(route('admin.coupons.create'))
            ->post(route('admin.coupons.store'), $this->payload([
                'type' => CouponType::Fixed->value,
                'percent_off' => '',
            ]))
            ->assertSessionHasErrors('amount_off');
    }

    public function test_expiry_must_follow_the_start_date(): void
    {
        $this->actingAs($this->admin())
            ->from(route('admin.coupons.create'))
            ->post(route('admin.coupons.store'), $this->payload([
                'starts_at' => '2026-08-01T00:00',
                'expires_at' => '2026-07-01T00:00',
            ]))
            ->assertSessionHasErrors('expires_at');
    }

    public function test_the_validity_window_is_read_in_the_business_timezone(): void
    {
        $this->actingAs($this->admin())
            ->post(route('admin.coupons.store'), $this->payload([
                'starts_at' => '2026-07-28T11:57',
                'expires_at' => '2026-07-28T15:30',
            ]))
            ->assertRedirect(route('admin.coupons.index'));

        $coupon = Coupon::query()->where('code', 'WELCOME10')->sole();

        // Asia/Riyadh (+03:00) wall time must land in the database as UTC.
        $this->assertSame('2026-07-28 08:57:00', $coupon->getRawOriginal('starts_at'));
        $this->assertSame('2026-07-28 12:30:00', $coupon->getRawOriginal('expires_at'));
    }

    public function test_the_edit_form_shows_the_window_in_the_business_timezone(): void
    {
        $coupon = Coupon::factory()->code('SUMMER')->create([
            'starts_at' => '2026-07-28 08:57:00',
            'expires_at' => '2026-07-28 12:30:00',
        ]);

        $this->actingAs($this->admin())
            ->get(route('admin.coupons.edit', $coupon))
            ->assertOk()
            ->assertSee('2026-07-28T11:57')
            ->assertSee('2026-07-28T15:30');
    }

    public function test_a_coupon_is_usable_inside_a_window_typed_in_local_time(): void
    {
        $this->travelTo(Carbon::parse('2026-07-28 14:16:00', 'Asia/Riyadh'));

        $this->actingAs($this->admin())
            ->post(route('admin.coupons.store'), $this->payload([
                'starts_at' => '2026-07-28T11:57',
                'expires_at' => '2026-07-28T15:30',
            ]));

        $coupon = Coupon::query()->where('code', 'WELCOME10')->sole();

        $this->assertFalse($coupon->starts_at?->isFuture());
        $this->assertFalse($coupon->expires_at?->isPast());
    }

    public function test_codes_must_be_unique_regardless_of_case(): void
    {
        Coupon::factory()->code('WELCOME10')->create();

        $this->actingAs($this->admin())
            ->from(route('admin.coupons.create'))
            ->post(route('admin.coupons.store'), $this->payload(['code' => 'welcome10']))
            ->assertSessionHasErrors('code');
    }

    public function test_admin_can_update_a_coupon(): void
    {
        $coupon = Coupon::factory()->code('WELCOME10')->create();

        $this->actingAs($this->admin())
            ->put(route('admin.coupons.update', $coupon), $this->payload([
                'percent_off' => '25',
                'scope' => CouponScope::Store->value,
            ]))
            ->assertRedirect(route('admin.coupons.index'));

        $coupon->refresh();

        $this->assertSame(2500, $coupon->percentBasisPoints());
        $this->assertSame(CouponScope::Store, $coupon->scope);
        $this->assertDatabaseHas('audit_logs', ['action' => AuditAction::CouponUpdated->value]);
    }

    public function test_admin_can_archive_a_coupon(): void
    {
        $coupon = Coupon::factory()->create();

        $this->actingAs($this->admin())
            ->delete(route('admin.coupons.destroy', $coupon))
            ->assertRedirect(route('admin.coupons.index'));

        $this->assertSoftDeleted('coupons', ['id' => $coupon->id]);
        $this->assertDatabaseHas('audit_logs', ['action' => AuditAction::CouponArchived->value]);
    }
}
