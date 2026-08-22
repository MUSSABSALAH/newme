<?php

declare(strict_types=1);

namespace App\Modules\Identity\Models;

use App\Models\User;
use App\Modules\Identity\Enums\OtpPurpose;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * A one-time sign-in or registration code for a store customer.
 *
 * @property int $id
 * @property string $public_id
 * @property int $user_id
 * @property OtpPurpose $purpose
 * @property string $code_hash
 * @property int $attempts
 * @property bool $remember
 * @property Carbon $sent_at
 * @property Carbon $expires_at
 * @property Carbon|null $consumed_at
 */
class CustomerOtp extends Model
{
    public const MAX_ATTEMPTS = 5;

    public const TTL_MINUTES = 10;

    public const RESEND_SECONDS = 60;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'public_id',
        'user_id',
        'purpose',
        'code_hash',
        'attempts',
        'remember',
        'sent_at',
        'expires_at',
        'consumed_at',
    ];

    protected static function booted(): void
    {
        static::creating(function (CustomerOtp $otp): void {
            if (empty($otp->public_id)) {
                $otp->public_id = (string) Str::ulid();
            }
        });
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'purpose' => OtpPurpose::class,
            'attempts' => 'integer',
            'remember' => 'boolean',
            'sent_at' => 'datetime',
            'expires_at' => 'datetime',
            'consumed_at' => 'datetime',
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

    public function isExpired(): bool
    {
        return $this->expires_at->isPast();
    }

    public function isConsumed(): bool
    {
        return $this->consumed_at !== null;
    }

    public function isLocked(): bool
    {
        return $this->attempts >= self::MAX_ATTEMPTS;
    }

    public function canResend(): bool
    {
        return $this->sent_at->copy()->addSeconds(self::RESEND_SECONDS)->isPast();
    }
}
