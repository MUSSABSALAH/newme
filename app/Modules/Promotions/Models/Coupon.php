<?php

declare(strict_types=1);

namespace App\Modules\Promotions\Models;

use App\Modules\Promotions\Enums\CouponScope;
use App\Modules\Promotions\Enums\CouponType;
use App\Support\Money\Money;
use Database\Factories\CouponFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

/**
 * @property int $id
 * @property string $public_id
 * @property string $code
 * @property array<string, string>|null $name
 * @property CouponType $type
 * @property CouponScope $scope
 * @property string|null $percent_off
 * @property int|null $amount_off_minor
 * @property int $min_subtotal_minor
 * @property int|null $max_discount_minor
 * @property int|null $max_redemptions
 * @property int|null $max_redemptions_per_user
 * @property int $redemptions_count
 * @property Carbon|null $starts_at
 * @property Carbon|null $expires_at
 * @property bool $is_active
 */
class Coupon extends Model
{
    /** @use HasFactory<CouponFactory> */
    use HasFactory, HasTranslations, SoftDeletes;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'public_id',
        'code',
        'name',
        'type',
        'scope',
        'percent_off',
        'amount_off_minor',
        'min_subtotal_minor',
        'max_discount_minor',
        'max_redemptions',
        'max_redemptions_per_user',
        'redemptions_count',
        'starts_at',
        'expires_at',
        'is_active',
    ];

    /**
     * @var list<string>
     */
    public array $translatable = ['name'];

    protected static function booted(): void
    {
        static::creating(function (Coupon $coupon): void {
            if (empty($coupon->public_id)) {
                $coupon->public_id = (string) Str::ulid();
            }
        });
    }

    protected static function newFactory(): CouponFactory
    {
        return CouponFactory::new();
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'type' => CouponType::class,
            'scope' => CouponScope::class,
            'percent_off' => 'decimal:2',
            'amount_off_minor' => 'integer',
            'min_subtotal_minor' => 'integer',
            'max_discount_minor' => 'integer',
            'max_redemptions' => 'integer',
            'max_redemptions_per_user' => 'integer',
            'redemptions_count' => 'integer',
            'starts_at' => 'datetime',
            'expires_at' => 'datetime',
            'is_active' => 'boolean',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'id';
    }

    /**
     * @return HasMany<CouponRedemption, $this>
     */
    public function redemptions(): HasMany
    {
        return $this->hasMany(CouponRedemption::class);
    }

    /**
     * Codes are compared case-insensitively; storage is always upper case.
     */
    public static function normalizeCode(string $code): string
    {
        return Str::upper(trim($code));
    }

    public function label(?string $locale = null): string
    {
        $locale ??= app()->getLocale();

        $value = $this->getTranslation('name', $locale, false);

        if (is_string($value) && $value !== '') {
            return $value;
        }

        foreach ($this->getTranslations('name') as $translated) {
            if (is_string($translated) && $translated !== '') {
                return $translated;
            }
        }

        return $this->code;
    }

    public function percentBasisPoints(): int
    {
        return (int) round(((float) $this->percent_off) * 100);
    }

    public function amountOff(): Money
    {
        return Money::fromMinor($this->amount_off_minor ?? 0);
    }

    public function minSubtotal(): Money
    {
        return Money::fromMinor($this->min_subtotal_minor);
    }

    public function maxDiscount(): ?Money
    {
        return $this->max_discount_minor === null
            ? null
            : Money::fromMinor($this->max_discount_minor);
    }

    public function isExhausted(): bool
    {
        return $this->max_redemptions !== null
            && $this->redemptions_count >= $this->max_redemptions;
    }

    public function valueDisplay(): string
    {
        return $this->type === CouponType::Percentage
            ? rtrim(rtrim((string) $this->percent_off, '0'), '.').'%'
            : $this->amountOff()->format();
    }
}
