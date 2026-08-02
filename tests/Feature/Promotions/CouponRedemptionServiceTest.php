<?php

declare(strict_types=1);

namespace Tests\Feature\Promotions;

use App\Models\User;
use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Identity\Seeders\RolesAndPermissionsSeeder;
use App\Modules\Orders\Enums\OrderStatus;
use App\Modules\Orders\Models\Order;
use App\Modules\Promotions\Enums\CouponRejection;
use App\Modules\Promotions\Enums\CouponScope;
use App\Modules\Promotions\Exceptions\CouponRejectedException;
use App\Modules\Promotions\Models\Coupon;
use App\Modules\Promotions\Services\CouponRedemptionService;
use App\Support\Money\Money;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class CouponRedemptionServiceTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(RolesAndPermissionsSeeder::class);
    }

    private function service(): CouponRedemptionService
    {
        return app(CouponRedemptionService::class);
    }

    private function subtotal(int $minor = 10000): Money
    {
        return Money::fromMinor($minor);
    }

    /**
     * Asserts that applying the code fails for the given reason.
     */
    private function assertRejected(CouponRejection $reason, string $code, ?User $user = null): void
    {
        try {
            $this->service()->apply($code, CouponScope::Store, $this->subtotal(), $user);
            $this->fail("Expected {$reason->value} rejection for {$code}.");
        } catch (CouponRejectedException $e) {
            $this->assertSame($reason, $e->reason);
            $this->assertSame($reason->value, $e->details()['reason']);
        }
    }

    public function test_a_percentage_coupon_takes_a_share_of_the_subtotal(): void
    {
        Coupon::factory()->code('SAVE15')->percentage(15)->create();

        $applied = $this->service()->apply('save15', CouponScope::Store, $this->subtotal(10000));

        $this->assertSame('SAVE15', $applied->code());
        $this->assertSame(1500, $applied->discount->toMinor());
    }

    public function test_a_fixed_coupon_takes_a_flat_amount(): void
    {
        Coupon::factory()->code('FLAT30')->fixed(3000)->create();

        $applied = $this->service()->apply('FLAT30', CouponScope::Store, $this->subtotal(10000));

        $this->assertSame(3000, $applied->discount->toMinor());
    }

    public function test_a_percentage_coupon_is_capped_at_its_maximum_discount(): void
    {
        $coupon = Coupon::factory()->percentage(50)->create(['max_discount_minor' => 2000]);

        $this->assertSame(
            2000,
            $this->service()->discountFor($coupon, $this->subtotal(10000))->toMinor(),
        );
    }

    public function test_a_discount_is_clamped_to_the_subtotal(): void
    {
        $coupon = Coupon::factory()->fixed(50000)->create();

        $this->assertSame(
            10000,
            $this->service()->discountFor($coupon, $this->subtotal(10000))->toMinor(),
        );
    }

    public function test_an_empty_basket_yields_no_discount(): void
    {
        $coupon = Coupon::factory()->percentage(20)->create();

        $this->assertSame(0, $this->service()->discountFor($coupon, Money::zero())->toMinor());
    }

    public function test_an_unknown_code_is_rejected(): void
    {
        $this->assertRejected(CouponRejection::NotFound, 'MISSING');
    }

    public function test_a_blank_code_is_rejected(): void
    {
        $this->assertRejected(CouponRejection::NotFound, '   ');
    }

    public function test_an_inactive_coupon_is_reported_as_unknown(): void
    {
        Coupon::factory()->code('OFF')->inactive()->create();

        $this->assertRejected(CouponRejection::NotFound, 'OFF');
    }

    public function test_a_coupon_that_has_not_started_is_rejected(): void
    {
        Coupon::factory()->code('SOON')->upcoming()->create();

        $this->assertRejected(CouponRejection::NotStarted, 'SOON');
    }

    public function test_an_expired_coupon_is_rejected(): void
    {
        Coupon::factory()->code('OLD')->expired()->create();

        $this->assertRejected(CouponRejection::Expired, 'OLD');
    }

    public function test_a_coupon_at_its_global_limit_is_rejected(): void
    {
        Coupon::factory()->code('FULL')->create([
            'max_redemptions' => 5,
            'redemptions_count' => 5,
        ]);

        $this->assertRejected(CouponRejection::Exhausted, 'FULL');
    }

    public function test_a_coupon_below_its_minimum_basket_is_rejected_with_the_amount(): void
    {
        Coupon::factory()->code('BIG')->create(['min_subtotal_minor' => 20000]);

        try {
            $this->service()->apply('BIG', CouponScope::Store, $this->subtotal(10000));
            $this->fail('Expected a below-minimum rejection.');
        } catch (CouponRejectedException $e) {
            $this->assertSame(CouponRejection::BelowMinimum, $e->reason);
            $this->assertStringContainsString('200.00', $e->getMessage());
        }
    }

    public function test_a_coupon_outside_its_scope_is_rejected(): void
    {
        Coupon::factory()->code('SUBSONLY')->scope(CouponScope::Subscriptions)->create();

        $this->assertRejected(CouponRejection::ScopeMismatch, 'SUBSONLY');
    }

    public function test_an_all_scope_coupon_covers_both_channels(): void
    {
        Coupon::factory()->code('ANY')->scope(CouponScope::All)->percentage(10)->create();

        $this->assertSame(
            1000,
            $this->service()->apply('ANY', CouponScope::Store, $this->subtotal())->discount->toMinor(),
        );
        $this->assertSame(
            1000,
            $this->service()->apply('ANY', CouponScope::Subscriptions, $this->subtotal())->discount->toMinor(),
        );
    }

    public function test_a_customer_at_their_personal_limit_is_rejected(): void
    {
        $customer = User::factory()->customer()->create();
        $coupon = Coupon::factory()->code('ONCE')->create(['max_redemptions_per_user' => 1]);

        $this->service()->redeem($coupon, $customer, $this->order($customer), Money::fromMinor(500));

        $this->assertRejected(CouponRejection::AlreadyUsed, 'ONCE', $customer);
    }

    public function test_another_customer_can_still_use_a_per_customer_limited_coupon(): void
    {
        $first = User::factory()->customer()->create();
        $second = User::factory()->customer()->create();
        $coupon = Coupon::factory()->code('ONCE')->percentage(10)->create([
            'max_redemptions_per_user' => 1,
        ]);

        $this->service()->redeem($coupon, $first, $this->order($first), Money::fromMinor(500));

        $applied = $this->service()->apply('ONCE', CouponScope::Store, $this->subtotal(), $second);

        $this->assertSame(1000, $applied->discount->toMinor());
    }

    public function test_a_guest_can_preview_a_per_customer_limited_coupon(): void
    {
        Coupon::factory()->code('ONCE')->percentage(10)->create(['max_redemptions_per_user' => 1]);

        $applied = $this->service()->apply('ONCE', CouponScope::Store, $this->subtotal(), null);

        $this->assertSame(1000, $applied->discount->toMinor());
    }

    public function test_redeeming_records_the_ledger_entry_and_bumps_the_counter(): void
    {
        $customer = User::factory()->customer()->create();
        $coupon = Coupon::factory()->code('SAVE10')->percentage(10)->create();
        $order = $this->order($customer);

        $this->service()->redeem($coupon, $customer, $order, Money::fromMinor(1000));

        $this->assertDatabaseHas('coupon_redemptions', [
            'coupon_id' => $coupon->id,
            'user_id' => $customer->id,
            'redeemable_type' => Order::class,
            'redeemable_id' => $order->id,
            'discount_minor' => 1000,
        ]);

        $this->assertSame(1, $coupon->refresh()->redemptions_count);
        $this->assertDatabaseHas('audit_logs', ['action' => AuditAction::CouponRedeemed->value]);
    }

    public function test_redeeming_an_exhausted_coupon_is_refused(): void
    {
        $customer = User::factory()->customer()->create();
        $coupon = Coupon::factory()->create([
            'max_redemptions' => 1,
            'redemptions_count' => 1,
        ]);

        $this->expectException(CouponRejectedException::class);

        $this->service()->redeem($coupon, $customer, $this->order($customer), Money::fromMinor(500));
    }

    private function order(User $user): Order
    {
        $order = new Order;
        $order->user_id = $user->getKey();
        $order->status = OrderStatus::Pending;
        $order->currency = 'SAR';
        $order->subtotal_minor = 10000;
        $order->total_minor = 10000;
        $order->placed_at = now();
        $order->save();

        return $order;
    }
}
