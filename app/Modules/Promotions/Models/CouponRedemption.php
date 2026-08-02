<?php

declare(strict_types=1);

namespace App\Modules\Promotions\Models;

use App\Models\User;
use App\Support\Money\Money;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * A single use of a coupon, tied to the order or subscription it discounted.
 *
 * @property int $id
 * @property int $coupon_id
 * @property int $user_id
 * @property string $redeemable_type
 * @property int $redeemable_id
 * @property int $discount_minor
 */
class CouponRedemption extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'coupon_id',
        'user_id',
        'redeemable_type',
        'redeemable_id',
        'discount_minor',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'discount_minor' => 'integer',
        ];
    }

    /**
     * @return BelongsTo<Coupon, $this>
     */
    public function coupon(): BelongsTo
    {
        return $this->belongsTo(Coupon::class);
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
    public function redeemable(): MorphTo
    {
        return $this->morphTo();
    }

    public function discountDisplay(): string
    {
        return Money::fromMinor($this->discount_minor)->format();
    }
}
