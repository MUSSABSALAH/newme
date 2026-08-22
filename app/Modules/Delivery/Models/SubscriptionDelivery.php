<?php

declare(strict_types=1);

namespace App\Modules\Delivery\Models;

use App\Models\User;
use App\Modules\Delivery\Enums\DeliveryStatus;
use App\Modules\Subscriptions\Models\Subscription;
use Database\Factories\SubscriptionDeliveryFactory;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * What happened to one subscription delivery day.
 *
 * The schedule itself lives on the subscription; this record only exists once
 * someone from the shipping team has acted on a day, which keeps the table as
 * small as the work actually done.
 *
 * @property int $id
 * @property string $public_id
 * @property int $subscription_id
 * @property Carbon $delivery_date
 * @property DeliveryStatus $status
 * @property Carbon|null $dispatched_at
 * @property Carbon|null $delivered_at
 * @property string|null $failure_reason
 * @property int|null $handled_by
 */
class SubscriptionDelivery extends Model
{
    /** @use HasFactory<SubscriptionDeliveryFactory> */
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'public_id',
        'subscription_id',
        'delivery_date',
        'status',
        'dispatched_at',
        'delivered_at',
        'failure_reason',
        'handled_by',
    ];

    protected static function booted(): void
    {
        static::creating(function (SubscriptionDelivery $delivery): void {
            if (empty($delivery->public_id)) {
                $delivery->public_id = (string) Str::ulid();
            }
        });
    }

    protected static function newFactory(): SubscriptionDeliveryFactory
    {
        return SubscriptionDeliveryFactory::new();
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'delivery_date' => 'date',
            'status' => DeliveryStatus::class,
            'dispatched_at' => 'datetime',
            'delivered_at' => 'datetime',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'public_id';
    }

    /**
     * Keep the column date-only: a stored midnight would break plain date
     * lookups and the one-record-per-day index.
     */
    public function setDeliveryDateAttribute(DateTimeInterface|string $value): void
    {
        $this->attributes['delivery_date'] = Carbon::parse($value)->toDateString();
    }

    /**
     * @return BelongsTo<Subscription, $this>
     */
    public function subscription(): BelongsTo
    {
        return $this->belongsTo(Subscription::class);
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function handler(): BelongsTo
    {
        return $this->belongsTo(User::class, 'handled_by');
    }
}
