<?php

declare(strict_types=1);

namespace App\Modules\Subscriptions\Services;

use App\Models\User;
use App\Modules\Addresses\Models\Address;
use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Audit\Services\AuditService;
use App\Modules\Identity\DTOs\HealthProfile;
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
use App\Modules\Subscriptions\Support\SubscriptionPauseRules;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

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
        ?string $startDate,
        HealthProfile $health,
        ?Address $address = null,
        ?PaymentMethod $method = null,
        array $mealSchedule = [],
    ): Subscription {
        return DB::transaction(function () use ($user, $plan, $quote, $startDate, $health, $address, $method, $mealSchedule): Subscription {
            $coupon = $quote->couponCode === null ? null : $this->coupons->find($quote->couponCode);

            $subscription = new Subscription;
            $subscription->user_id = $user->getKey();
            $subscription->address_id = $address?->getKey();
            $subscription->shipping_address = $address?->snapshot();
            $subscription->plan_id = $plan->getKey();
            $subscription->plan_name = $plan->label();
            $subscription->status = SubscriptionStatus::Pending;
            $subscription->mode = 'once';
            $subscription->meal_types = $quote->mealTypes;
            $subscription->duration_unit = $quote->durationUnit->value;
            $subscription->duration_length = $quote->durationLength;
            $subscription->total_days = $quote->totalDays;
            $subscription->selected_days = $quote->selectedDays;
            $subscription->start_date = $startDate === null ? null : Carbon::parse($startDate);
            $subscription->health_birth_date = $health->birthDate;
            $subscription->health_allergies = $health->allergies;
            $subscription->health_medications = $health->medications;
            $subscription->meal_schedule = MealSchedule::complete(
                $mealSchedule,
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

    /**
     * Freeze delivery days from the given date until the customer resumes.
     *
     * Days before the pause date stay scheduled; days on/after it are stored
     * in {@see Subscription::$paused_schedule} and re-dated on resume.
     */
    public function pause(Subscription $subscription, string $pauseFrom): Subscription
    {
        if ($subscription->status !== SubscriptionStatus::Active) {
            throw ValidationException::withMessages([
                'pause_from' => __('account.subscription.pause_not_active'),
            ]);
        }

        $subscription->loadMissing('plan');

        if (! $subscription->allowsPause()) {
            throw ValidationException::withMessages([
                'pause_from' => __('account.subscription.pause_not_allowed'),
            ]);
        }

        if ($subscription->frozenDaysCount() > 0) {
            throw ValidationException::withMessages([
                'pause_from' => __('account.subscription.pause_already'),
            ]);
        }

        $pauseFrom = Carbon::parse($pauseFrom)->toDateString();

        if (! SubscriptionPauseRules::isPausable($pauseFrom)) {
            throw ValidationException::withMessages([
                'pause_from' => __('account.subscription.pause_too_soon', [
                    'days' => SubscriptionPauseRules::leadDays(),
                ]),
            ]);
        }

        $schedule = MealSchedule::resolve(
            $subscription->meal_schedule,
            $subscription->start_date?->toDateString(),
            is_array($subscription->selected_days) ? $subscription->selected_days : [],
            (int) $subscription->total_days,
            is_array($subscription->meal_types) ? $subscription->meal_types : [],
        );

        $split = MealSchedule::splitFromDate($schedule, $pauseFrom);

        if ($split['frozen'] === []) {
            throw ValidationException::withMessages([
                'pause_from' => __('account.subscription.pause_no_days'),
            ]);
        }

        return DB::transaction(function () use ($subscription, $pauseFrom, $split): Subscription {
            $subscription->meal_schedule = $split['kept'];
            $subscription->paused_schedule = $split['frozen'];
            $subscription->pause_started_on = $pauseFrom;
            $subscription->paused_at = Carbon::now();
            $subscription->status = SubscriptionStatus::Paused;
            $subscription->save();

            $this->audit->log(AuditAction::SubscriptionPaused, $subscription, [
                'status' => SubscriptionStatus::Active->value,
            ], [
                'status' => SubscriptionStatus::Paused->value,
                'pause_started_on' => $pauseFrom,
                'frozen_days' => count($split['frozen']),
            ]);

            return $subscription->refresh();
        });
    }

    /**
     * Put frozen days back on the calendar from the earliest allowed resume date.
     */
    public function resume(Subscription $subscription, ?string $resumeFrom = null): Subscription
    {
        if ($subscription->status !== SubscriptionStatus::Paused) {
            throw ValidationException::withMessages([
                'resume' => __('account.subscription.resume_not_paused'),
            ]);
        }

        $frozen = MealSchedule::normalize($subscription->paused_schedule ?? []);

        if ($frozen === []) {
            throw ValidationException::withMessages([
                'resume' => __('account.subscription.resume_no_days'),
            ]);
        }

        $resumeFrom = $resumeFrom === null || trim($resumeFrom) === ''
            ? SubscriptionPauseRules::earliestResumableDateString()
            : Carbon::parse($resumeFrom)->toDateString();

        if (! SubscriptionPauseRules::isResumableFrom($resumeFrom)) {
            throw ValidationException::withMessages([
                'resume' => __('account.subscription.resume_too_soon', [
                    'days' => SubscriptionPauseRules::resumeLeadDays(),
                ]),
            ]);
        }

        $kept = MealSchedule::normalize($subscription->meal_schedule ?? []);
        $lastKept = $kept === [] ? null : $kept[array_key_last($kept)]['date'];

        if ($lastKept !== null && $resumeFrom <= $lastKept) {
            $resumeFrom = Carbon::parse($lastKept)->addDay()->toDateString();
        }

        $rescheduled = MealSchedule::rescheduleFrom(
            $frozen,
            $resumeFrom,
            is_array($subscription->selected_days) ? $subscription->selected_days : [],
        );

        return DB::transaction(function () use ($subscription, $kept, $rescheduled, $resumeFrom, $frozen): Subscription {
            $subscription->meal_schedule = array_values([...$kept, ...$rescheduled]);
            $subscription->paused_schedule = null;
            $subscription->pause_started_on = null;
            $subscription->paused_at = null;
            $subscription->status = SubscriptionStatus::Active;
            $subscription->save();

            $this->audit->log(AuditAction::SubscriptionResumed, $subscription, [
                'status' => SubscriptionStatus::Paused->value,
                'frozen_days' => count($frozen),
            ], [
                'status' => SubscriptionStatus::Active->value,
                'resume_from' => $resumeFrom,
                'new_end_date' => $subscription->endDate()?->toDateString(),
            ]);

            return $subscription->refresh();
        });
    }
}
