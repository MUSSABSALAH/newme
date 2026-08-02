<?php

declare(strict_types=1);

namespace App\Modules\Orders\Models;

use App\Models\User;
use App\Modules\Addresses\DTOs\AddressSnapshot;
use App\Modules\Addresses\Models\Address;
use App\Modules\Orders\Enums\OrderStatus;
use App\Modules\Payments\Enums\PaymentMethod;
use App\Modules\Payments\Enums\PaymentStatus;
use App\Modules\Payments\Models\Payment;
use App\Support\Money\Money;
use Database\Factories\OrderFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/**
 * @property int $id
 * @property string $public_id
 * @property int $user_id
 * @property int|null $address_id
 * @property array<string, mixed>|null $shipping_address
 * @property OrderStatus $status
 * @property string $currency
 * @property int|null $coupon_id
 * @property string|null $coupon_code
 * @property int $subtotal_minor
 * @property int $discount_minor
 * @property int $total_minor
 * @property PaymentMethod|null $payment_method
 * @property PaymentStatus $payment_status
 * @property string|null $note
 * @property \Illuminate\Support\Carbon|null $placed_at
 */
class Order extends Model
{
    /** @use HasFactory<OrderFactory> */
    use HasFactory, SoftDeletes;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'public_id',
        'user_id',
        'address_id',
        'shipping_address',
        'status',
        'currency',
        'coupon_id',
        'coupon_code',
        'subtotal_minor',
        'discount_minor',
        'total_minor',
        'payment_method',
        'payment_status',
        'note',
        'placed_at',
    ];

    protected static function booted(): void
    {
        static::creating(function (Order $order): void {
            if (empty($order->public_id)) {
                $order->public_id = (string) Str::ulid();
            }
        });
    }

    protected static function newFactory(): OrderFactory
    {
        return OrderFactory::new();
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'status' => OrderStatus::class,
            'shipping_address' => 'array',
            'payment_method' => PaymentMethod::class,
            'payment_status' => PaymentStatus::class,
            'subtotal_minor' => 'integer',
            'discount_minor' => 'integer',
            'total_minor' => 'integer',
            'placed_at' => 'datetime',
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
     * @return BelongsTo<Address, $this>
     */
    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    /**
     * @return HasMany<OrderItem, $this>
     */
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
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

    public function subtotalDisplay(): string
    {
        return Money::fromMinor($this->subtotal_minor)->format();
    }

    public function discountDisplay(): string
    {
        return Money::fromMinor($this->discount_minor)->format();
    }

    public function hasDiscount(): bool
    {
        return $this->discount_minor > 0;
    }
}
