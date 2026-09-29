<?php

declare(strict_types=1);

namespace App\Modules\Delivery\Models;

use App\Models\User;
use App\Modules\Delivery\Enums\ShipmentStatus;
use App\Modules\Orders\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * A store order or subscription day handed to an outside courier.
 *
 * The order or delivery day stays the source of truth for fulfillment; this
 * row only remembers what the courier was asked to do and what it said back.
 *
 * @property int $id
 * @property string $public_id
 * @property string $shippable_type
 * @property int $shippable_id
 * @property string $provider
 * @property string $reference
 * @property ShipmentStatus $status
 * @property int|null $pickup_job_id
 * @property int|null $delivery_job_id
 * @property string|null $job_hash
 * @property string|null $tracking_link
 * @property string|null $pickup_tracking_link
 * @property int|null $provider_status
 * @property string|null $fleet_name
 * @property string|null $last_error
 * @property int $attempts
 * @property int|null $sent_by
 * @property Carbon|null $sent_at
 * @property Carbon|null $cancelled_at
 * @property Carbon|null $completed_at
 * @property-read Order|SubscriptionDelivery|null $shippable
 */
class Shipment extends Model
{
    public const PROVIDER_WALIM = 'walim';

    /**
     * @var list<string>
     */
    protected $fillable = [
        'public_id',
        'shippable_type',
        'shippable_id',
        'provider',
        'reference',
        'status',
        'pickup_job_id',
        'delivery_job_id',
        'job_hash',
        'tracking_link',
        'pickup_tracking_link',
        'provider_status',
        'fleet_name',
        'last_error',
        'attempts',
        'sent_by',
        'sent_at',
        'cancelled_at',
        'completed_at',
    ];

    /**
     * @var array<string, mixed>
     */
    protected $attributes = [
        'provider' => self::PROVIDER_WALIM,
        'status' => 'pending',
        'attempts' => 0,
    ];

    protected static function booted(): void
    {
        static::creating(function (Shipment $shipment): void {
            if (empty($shipment->public_id)) {
                $shipment->public_id = (string) Str::ulid();
            }
        });
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'status' => ShipmentStatus::class,
            'pickup_job_id' => 'integer',
            'delivery_job_id' => 'integer',
            'provider_status' => 'integer',
            'attempts' => 'integer',
            'sent_at' => 'datetime',
            'cancelled_at' => 'datetime',
            'completed_at' => 'datetime',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'public_id';
    }

    /**
     * @return MorphTo<Model, $this>
     */
    public function shippable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sent_by');
    }

    /**
     * The job id staff quote to the courier: the delivery leg when known.
     */
    public function jobId(): ?int
    {
        return $this->delivery_job_id ?? $this->pickup_job_id;
    }
}
