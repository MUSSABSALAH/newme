<?php

declare(strict_types=1);

namespace App\Modules\Subscriptions\Models;

use App\Models\User;
use App\Modules\Addresses\DTOs\AddressSnapshot;
use App\Modules\Addresses\Models\Address;
use App\Modules\Payments\Enums\PaymentMethod;
use App\Modules\Payments\Enums\PaymentStatus;
use App\Modules\Payments\Models\Payment;
use App\Modules\Plans\Models\Plan;
use App\Modules\Subscriptions\Enums\HandlingStatus;
use App\Modules\Subscriptions\Enums\SubscriptionStatus;
use App\Modules\Subscriptions\Support\MealSchedule;
use App\Support\Money\Money;
use Database\Factories\SubscriptionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * @property int $id
 * @property string $public_id
 * @property int $user_id
 * @property int|null $address_id
 * @property array<string, mixed>|null $shipping_address
 * @property int|null $plan_id
 * @property string $plan_name
 * @property SubscriptionStatus $status
 * @property HandlingStatus $handling_status
 * @property int|null $handled_by
 * @property Carbon|null $handled_at
 * @property string $mode
 * @property array<int, string> $meal_types
 * @property string $duration_unit
 * @property int $duration_length
 * @property int $total_days
 * @property array<int, int>|null $selected_days
 * @property list<array{date: string, meals: array<string, string|null>}>|null $meal_schedule
 * @property list<array{date: string, meals: array<string, string|null>}>|null $paused_schedule
 * @property Carbon|null $start_date
 * @property Carbon|null $health_birth_date
 * @property string|null $health_allergies
 * @property string|null $health_medications
 * @property Carbon|null $pause_started_on
 * @property Carbon|null $paused_at
 * @property string $currency
 * @property int|null $coupon_id
 * @property string|null $coupon_code
 * @property int $subtotal_minor
 * @property int $discount_minor
 * @property int $coupon_discount_minor
 * @property int $delivery_fee_minor
 * @property int $tax_minor
 * @property int $total_minor
 * @property int $per_day_minor
 * @property PaymentMethod|null $payment_method
 * @property PaymentStatus $payment_status
 */
class Subscription extends Model
{
    /** @use HasFactory<SubscriptionFactory> */
    use HasFactory, SoftDeletes;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'public_id',
        'user_id',
        'address_id',
        'shipping_address',
        'plan_id',
        'plan_name',
        'status',
        'handling_status',
        'handled_by',
        'handled_at',
        'mode',
        'meal_types',
        'duration_unit',
        'duration_length',
        'total_days',
        'selected_days',
        'meal_schedule',
        'paused_schedule',
        'start_date',
        'health_birth_date',
        'health_allergies',
        'health_medications',
        'pause_started_on',
        'paused_at',
        'currency',
        'coupon_id',
        'coupon_code',
        'subtotal_minor',
        'discount_minor',
        'coupon_discount_minor',
        'delivery_fee_minor',
        'tax_minor',
        'total_minor',
        'per_day_minor',
        'payment_method',
        'payment_status',
    ];

    protected static function booted(): void
    {
        static::creating(function (Subscription $subscription): void {
            if (empty($subscription->public_id)) {
                $subscription->public_id = (string) Str::ulid();
            }
        });
    }

    protected static function newFactory(): SubscriptionFactory
    {
        return SubscriptionFactory::new();
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'status' => SubscriptionStatus::class,
            'handling_status' => HandlingStatus::class,
            'handled_at' => 'datetime',
            'shipping_address' => 'array',
            'payment_method' => PaymentMethod::class,
            'payment_status' => PaymentStatus::class,
            'meal_types' => 'array',
            'selected_days' => 'array',
            'meal_schedule' => 'array',
            'paused_schedule' => 'array',
            'start_date' => 'date',
            'health_birth_date' => 'date',
            'pause_started_on' => 'date',
            'paused_at' => 'datetime',
            'duration_length' => 'integer',
            'total_days' => 'integer',
            'subtotal_minor' => 'integer',
            'discount_minor' => 'integer',
            'coupon_discount_minor' => 'integer',
            'delivery_fee_minor' => 'integer',
            'tax_minor' => 'integer',
            'total_minor' => 'integer',
            'per_day_minor' => 'integer',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'public_id';
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The staff member who last moved the handling state along.
     *
     * @return BelongsTo<User, $this>
     */
    public function handler(): BelongsTo
    {
        return $this->belongsTo(User::class, 'handled_by');
    }

    /**
     * @return BelongsTo<Plan, $this>
     */
    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }

    /**
     * @return BelongsTo<Address, $this>
     */
    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    /**
     * @return MorphMany<Payment, $this>
     */
    public function payments(): MorphMany
    {
        return $this->morphMany(Payment::class, 'payable');
    }

    /**
     * Short human-facing code, e.g. "A1B2C3".
     */
    public function reference(): string
    {
        return strtoupper(substr($this->public_id, -6));
    }

    public function deliveryAddress(): ?AddressSnapshot
    {
        return AddressSnapshot::fromArray($this->shipping_address);
    }

    public function totalDisplay(): string
    {
        return Money::fromMinor($this->total_minor)->format();
    }

    public function perDayDisplay(): string
    {
        return Money::fromMinor($this->per_day_minor)->format();
    }

    public function couponDiscountDisplay(): string
    {
        return Money::fromMinor($this->coupon_discount_minor)->format();
    }

    public function hasCouponDiscount(): bool
    {
        return $this->coupon_discount_minor > 0;
    }

    /**
     * Whether the request still needs someone from the team to act on it.
     */
    public function needsHandling(): bool
    {
        return $this->handling_status->needsAttention();
    }

    public function hasMealSchedule(): bool
    {
        return $this->scheduleDaysWithPauseState() !== [];
    }

    public function isPaused(): bool
    {
        return $this->status === SubscriptionStatus::Paused;
    }

    /**
     * Whether this subscription's plan permits temporary pause.
     *
     * Subscriptions without a linked plan keep the historical default (allowed).
     */
    public function allowsPause(): bool
    {
        $plan = $this->plan;

        if ($plan === null) {
            return true;
        }

        return (bool) $plan->allows_pause;
    }

    /**
     * Number of delivery days currently frozen by a pause.
     */
    public function frozenDaysCount(): int
    {
        return count(MealSchedule::normalize($this->paused_schedule ?? []));
    }

    /**
     * Active + frozen days for admin/customer display (paused days flagged).
     *
     * When paused, never fall back to a full skeleton — that would reintroduce
     * the frozen days as "active" and show duplicates.
     *
     * @return list<array{date: string, weekday: string, label: string, paused: bool, meals: list<array{type: string, label: string, dish: string, is_chef: bool}>}>
     */
    public function scheduleDaysWithPauseState(): array
    {
        $activeSchedule = MealSchedule::normalize($this->meal_schedule ?? []);

        if ($activeSchedule === [] && ! $this->isPaused()) {
            $activeSchedule = MealSchedule::resolve(
                null,
                $this->start_date?->toDateString(),
                is_array($this->selected_days) ? $this->selected_days : [],
                (int) $this->total_days,
                is_array($this->meal_types) ? $this->meal_types : [],
            );
        }

        $byDate = [];

        foreach (MealSchedule::present($activeSchedule) as $day) {
            $byDate[$day['date']] = [
                ...$day,
                'paused' => false,
            ];
        }

        if ($this->isPaused()) {
            foreach (MealSchedule::present(MealSchedule::normalize($this->paused_schedule ?? [])) as $day) {
                $byDate[$day['date']] = [
                    ...$day,
                    'paused' => true,
                ];
            }
        }

        ksort($byDate);

        return array_values($byDate);
    }

    /**
     * Last scheduled delivery date (active days only).
     */
    public function endDate(): ?Carbon
    {
        $days = MealSchedule::resolve(
            $this->meal_schedule,
            $this->start_date?->toDateString(),
            is_array($this->selected_days) ? $this->selected_days : [],
            (int) $this->total_days,
            is_array($this->meal_types) ? $this->meal_types : [],
        );

        if ($days === []) {
            return null;
        }

        return Carbon::parse($days[array_key_last($days)]['date'])->startOfDay();
    }

    /**
     * Calendar-ready dish picks for the admin view and PDF.
     *
     * Falls back to a skeleton from start date / weekdays / meal types when the
     * wizard did not persist per-day dish names.
     *
     * @return list<array{date: string, weekday: string, label: string, meals: list<array{type: string, label: string, dish: string, is_chef: bool}>}>
     */
    public function mealScheduleDays(): array
    {
        return MealSchedule::present(MealSchedule::resolve(
            $this->meal_schedule,
            $this->start_date?->toDateString(),
            is_array($this->selected_days) ? $this->selected_days : [],
            (int) $this->total_days,
            is_array($this->meal_types) ? $this->meal_types : [],
        ));
    }
}
