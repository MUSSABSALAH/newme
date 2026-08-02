<?php

declare(strict_types=1);

namespace App\Modules\Promotions\Services;

use App\Models\User;
use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Audit\Services\AuditService;
use App\Modules\Promotions\DTOs\AppliedCoupon;
use App\Modules\Promotions\Enums\CouponRejection;
use App\Modules\Promotions\Enums\CouponScope;
use App\Modules\Promotions\Enums\CouponType;
use App\Modules\Promotions\Exceptions\CouponRejectedException;
use App\Modules\Promotions\Models\Coupon;
use App\Modules\Promotions\Models\CouponRedemption;
use App\Support\Money\Money;
use Illuminate\Database\Eloquent\Model;

/**
 * The single source of truth for whether a coupon may be used and what it is
 * worth.
 *
 * Discounts are always derived here from the stored coupon and the basket
 * subtotal; a client-supplied amount is never trusted. This service knows
 * nothing about the cart or plan pricing, so both channels can call it.
 */
final class CouponRedemptionService
{
    public function __construct(private readonly AuditService $audit) {}

    /**
     * Validate a submitted code and compute its discount.
     *
     * @throws CouponRejectedException
     */
    public function apply(
        string $code,
        CouponScope $channel,
        Money $subtotal,
        ?User $user = null,
    ): AppliedCoupon {
        $coupon = $this->find($code);

        if (! $coupon instanceof Coupon) {
            throw new CouponRejectedException(CouponRejection::NotFound);
        }

        $this->assertUsable($coupon, $channel, $subtotal, $user);

        return new AppliedCoupon($coupon, $this->discountFor($coupon, $subtotal));
    }

    /**
     * Same as {@see apply()} but returns null instead of throwing.
     *
     * Used when rendering a basket: a code that has since become invalid (the
     * cart dropped below the minimum, the window closed) must not break the
     * page.
     */
    public function resolveQuietly(
        string $code,
        CouponScope $channel,
        Money $subtotal,
        ?User $user = null,
    ): ?AppliedCoupon {
        try {
            return $this->apply($code, $channel, $subtotal, $user);
        } catch (CouponRejectedException) {
            return null;
        }
    }

    /**
     * Record a use of the coupon against the order or subscription it discounted.
     *
     * Must be called inside the transaction that creates the redeemable: the
     * coupon row is locked and its global limit re-checked, otherwise two
     * concurrent checkouts could both slip past the last redemption.
     *
     * @throws CouponRejectedException
     */
    public function redeem(Coupon $coupon, User $user, Model $redeemable, Money $discount): CouponRedemption
    {
        /** @var Coupon $locked */
        $locked = Coupon::query()->lockForUpdate()->findOrFail($coupon->getKey());

        if ($locked->isExhausted()) {
            throw new CouponRejectedException(CouponRejection::Exhausted);
        }

        $redemption = new CouponRedemption;
        $redemption->coupon_id = $locked->getKey();
        $redemption->user_id = $user->getKey();
        $redemption->redeemable_type = $redeemable::class;
        $redemption->redeemable_id = (int) $redeemable->getKey();
        $redemption->discount_minor = $discount->toMinor();
        $redemption->save();

        $locked->increment('redemptions_count');

        $this->audit->log(AuditAction::CouponRedeemed, $locked, [], [
            'code' => $locked->code,
            'discount_minor' => $discount->toMinor(),
            'redeemable' => $redeemable::class,
        ]);

        return $redemption;
    }

    /**
     * How much a coupon takes off a subtotal.
     *
     * Percentage codes honour their optional cap, and every discount is clamped
     * to the subtotal so a total can never go negative.
     */
    public function discountFor(Coupon $coupon, Money $subtotal): Money
    {
        if ($subtotal->isNegative() || $subtotal->isZero()) {
            return Money::zero();
        }

        $discount = $coupon->type === CouponType::Percentage
            ? $subtotal->percentage($coupon->percentBasisPoints())
            : $coupon->amountOff();

        $cap = $coupon->maxDiscount();

        if ($cap instanceof Money && $discount->greaterThan($cap)) {
            $discount = $cap;
        }

        return $discount->greaterThan($subtotal) ? $subtotal : $discount;
    }

    public function find(string $code): ?Coupon
    {
        $normalized = Coupon::normalizeCode($code);

        if ($normalized === '') {
            return null;
        }

        return Coupon::query()->where('code', $normalized)->first();
    }

    /**
     * @throws CouponRejectedException
     */
    private function assertUsable(
        Coupon $coupon,
        CouponScope $channel,
        Money $subtotal,
        ?User $user,
    ): void {
        // An inactive code is reported as unknown so the response never
        // confirms which codes exist.
        if (! $coupon->is_active) {
            throw new CouponRejectedException(CouponRejection::NotFound);
        }

        if (! $coupon->scope->covers($channel)) {
            throw new CouponRejectedException(CouponRejection::ScopeMismatch);
        }

        if ($coupon->starts_at !== null && $coupon->starts_at->isFuture()) {
            throw new CouponRejectedException(CouponRejection::NotStarted);
        }

        if ($coupon->expires_at !== null && $coupon->expires_at->isPast()) {
            throw new CouponRejectedException(CouponRejection::Expired);
        }

        if ($coupon->isExhausted()) {
            throw new CouponRejectedException(CouponRejection::Exhausted);
        }

        $minimum = $coupon->minSubtotal();

        if ($subtotal->lessThan($minimum)) {
            throw new CouponRejectedException(CouponRejection::BelowMinimum, $minimum);
        }

        // Guests may preview a discount; the per-customer limit is enforced
        // once they sign in, which checkout requires anyway.
        if ($user instanceof User && $this->userLimitReached($coupon, $user)) {
            throw new CouponRejectedException(CouponRejection::AlreadyUsed);
        }
    }

    private function userLimitReached(Coupon $coupon, User $user): bool
    {
        if ($coupon->max_redemptions_per_user === null) {
            return false;
        }

        $used = $coupon->redemptions()
            ->where('user_id', $user->getKey())
            ->count();

        return $used >= $coupon->max_redemptions_per_user;
    }
}
