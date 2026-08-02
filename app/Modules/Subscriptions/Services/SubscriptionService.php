<?php

declare(strict_types=1);

namespace App\Modules\Subscriptions\Services;

use App\Models\User;
use App\Modules\Addresses\Models\Address;
use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Audit\Services\AuditService;
use App\Modules\Payments\Enums\PaymentMethod;
use App\Modules\Payments\Enums\PaymentStatus;
use App\Modules\Payments\Models\Payment;
use App\Modules\Plans\DTOs\PlanQuote;
use App\Modules\Plans\Models\Plan;
use App\Modules\Promotions\Models\Coupon;
use App\Modules\Promotions\Services\CouponRedemptionService;
use App\Modules\Subscriptions\Enums\HandlingStatus;
use App\Modules\Subscriptions\Enums\SubscriptionStatus;
use App\Modules\Subscriptions\Models\Subscription;
use App\Modules\Subscriptions\Support\MealSchedule;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Persists a customer subscription request from a server-computed plan quote.
 *
 * The {@see PlanQuote} is the single source of truth for every monetary figure;
 * the client's selections are re-priced server-side before this runs, so no
 * price is ever trusted from the browser.
 */
final class SubscriptionService
{
    public function __construct(
        private readonly AuditService $audit,
        private readonly CouponRedemptionService $coupons,
    ) {}

    /**
     * @param  list<array{date: string, meals: array<string, string|null>}>  $mealSchedule
     */
    public function createFromQuote(
        User $user,
        Plan $plan,
        PlanQuote $quote,
        string $mode,
        ?string $startDate,
        ?Address $address = null,
        ?PaymentMethod $method = null,
        array $mealSchedule = [],
    ): Subscription {
        return DB::transaction(function () use ($user, $plan, $quote, $mode, $startDate, $address, $method, $mealSchedule): Subscription {
            $coupon = $quote->couponCode === null ? null : $this->coupons->find($quote->couponCode);

            $subscription = new Subscription;
            $subscription->user_id = $user->getKey();
            $subscription->address_id = $address?->getKey();
            $subscription->shipping_address = $address?->snapshot();
            $subscription->plan_id = $plan->getKey();
            $subscription->plan_name = $plan->label();
            $subscription->status = SubscriptionStatus::Pending;
            $subscription->mode = $mode === 'once' ? 'once' : 'flex';
            $subscription->meal_types = $quote->mealTypes;
            $subscription->duration_unit = $quote->durationUnit->value;
            $subscription->duration_length = $quote->durationLength;
            $subscription->total_days = $quote->totalDays;
            $subscription->selected_days = $quote->selectedDays;
            $subscription->start_date = $startDate === null ? null : Carbon::parse($startDate);
            $subscription->meal_schedule = $mealSchedule !== []
                ? $mealSchedule
                : MealSchedule::skeleton(
                    $subscription->start_date?->toDateString(),
                    $quote->selectedDays,
                    $quote->totalDays,
                    $quote->mealTypes,
                );
            $subscription->currency = 'SAR';
            $subscription->coupon_id = $coupon?->getKey();
            $subscription->coupon_code = $coupon instanceof Coupon ? $coupon->code : null;
            $subscription->subtotal_minor = $quote->subtotal->toMinor();
            $subscription->discount_minor = $quote->discount->toMinor();
            $subscription->coupon_discount_minor = $quote->couponDiscount->toMinor();
            $subscription->delivery_fee_minor = $quote->deliveryFee->toMinor();
            $subscription->tax_minor = $quote->tax->toMinor();
            $subscription->total_minor = $quote->total->toMinor();
            $subscription->per_day_minor = $quote->perDay->toMinor();
            $subscription->payment_method = $method;
            $subscription->payment_status = PaymentStatus::Pending;
            $subscription->save();

            if ($coupon instanceof Coupon && ! $quote->couponDiscount->isZero()) {
                $this->coupons->redeem($coupon, $user, $subscription, $quote->couponDiscount);
            }

            $this->audit->log(AuditAction::SubscriptionCreated, $subscription, [], [
                'plan' => $plan->label(),
                'coupon_code' => $subscription->coupon_code,
                'coupon_discount_minor' => $quote->couponDiscount->toMinor(),
                'total_minor' => $quote->total->toMinor(),
                'payment_method' => $method?->value,
            ]);

            return $subscription;
        });
    }

    /**
     * Move the staff-side handling state along, recording who did it.
     *
     * Re-selecting the current state is a no-op so the audit trail only holds
     * real transitions.
     */
    public function updateHandling(Subscription $subscription, HandlingStatus $status, User $actor): Subscription
    {
        $previous = $subscription->handling_status;

        if ($previous === $status) {
            return $subscription;
        }

        $subscription->handling_status = $status;
        $subscription->handled_by = $actor->getKey();
        $subscription->handled_at = Carbon::now();
        $subscription->save();

        $this->audit->log(
            AuditAction::SubscriptionHandlingUpdated,
            $subscription,
            ['handling_status' => $previous->value],
            ['handling_status' => $status->value],
        );

        return $subscription;
    }

    /**
     * Record the outcome of the charge on the subscription.
     */
    public function settle(Subscription $subscription, Payment $payment): Subscription
    {
        $subscription->payment_status = $payment->status;

        if ($payment->status->isSettled()) {
            $subscription->status = SubscriptionStatus::Active;
        }

        $subscription->save();

        return $subscription;
    }
}
