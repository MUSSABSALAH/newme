<?php

declare(strict_types=1);

namespace App\Modules\Payments\Models;

use App\Models\User;
use App\Modules\Payments\Enums\PaymentDecline;
use App\Modules\Payments\Enums\PaymentMethod;
use App\Modules\Payments\Enums\PaymentStatus;
use App\Support\Money\Money;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Str;

/**
 * One charge attempt against an order or a subscription.
 *
 * @property int $id
 * @property string $public_id
 * @property int $user_id
 * @property string $payable_type
 * @property int $payable_id
 * @property PaymentMethod $method
 * @property PaymentStatus $status
 * @property string $currency
 * @property int $amount_minor
 * @property string $gateway
 * @property string|null $gateway_reference
 * @property string|null $card_brand
 * @property string|null $card_last4
 * @property PaymentDecline|null $decline_reason
 * @property \Illuminate\Support\Carbon|null $paid_at
 */
class Payment extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'public_id',
        'user_id',
        'payable_type',
        'payable_id',
        'method',
        'status',
        'currency',
        'amount_minor',
        'gateway',
        'gateway_reference',
        'card_brand',
        'card_last4',
        'decline_reason',
        'paid_at',
    ];

    protected static function booted(): void
    {
        static::creating(function (Payment $payment): void {
            if (empty($payment->public_id)) {
                $payment->public_id = (string) Str::ulid();
            }
        });
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'method' => PaymentMethod::class,
            'status' => PaymentStatus::class,
            'decline_reason' => PaymentDecline::class,
            'amount_minor' => 'integer',
            'paid_at' => 'datetime',
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
     * @return MorphTo<Model, $this>
     */
    public function payable(): MorphTo
    {
        return $this->morphTo();
    }

    public function amountDisplay(): string
    {
        return Money::fromMinor($this->amount_minor)->format();
    }

    /**
     * A masked card label such as "visa •••• 4242".
     */
    public function cardLabel(): ?string
    {
        if ($this->card_last4 === null) {
            return null;
        }

        return trim(($this->card_brand ?? '').' •••• '.$this->card_last4);
    }
}
