<?php

declare(strict_types=1);

namespace App\Modules\Addresses\Models;

use App\Models\User;
use App\Modules\Addresses\Support\RiyadhDelivery;
use Database\Factories\AddressFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/**
 * A customer delivery address.
 *
 * Orders and subscriptions keep their own snapshot of the address used, so
 * editing or deleting an address never rewrites delivery history.
 *
 * @property int $id
 * @property string $public_id
 * @property int $user_id
 * @property string $label
 * @property string $recipient_name
 * @property string $phone
 * @property string $city
 * @property string $district
 * @property string $street
 * @property string|null $national_address
 * @property string|null $details
 * @property bool $is_default
 */
class Address extends Model
{
    /** @use HasFactory<AddressFactory> */
    use HasFactory, SoftDeletes;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'public_id',
        'user_id',
        'label',
        'recipient_name',
        'phone',
        'city',
        'district',
        'street',
        'national_address',
        'details',
        'is_default',
    ];

    protected static function booted(): void
    {
        static::creating(function (Address $address): void {
            if (empty($address->public_id)) {
                $address->public_id = (string) Str::ulid();
            }
        });
    }

    protected static function newFactory(): AddressFactory
    {
        return AddressFactory::new();
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_default' => 'boolean',
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
     * One line suitable for a summary row.
     */
    public function summary(): string
    {
        return implode(' · ', array_filter([
            $this->city,
            $this->district,
            $this->street,
        ]));
    }

    public function isDeliverable(): bool
    {
        return RiyadhDelivery::isRiyadhCity($this->city);
    }

    /**
     * The frozen copy stored on an order or subscription.
     *
     * @return array<string, string|null>
     */
    public function snapshot(): array
    {
        return [
            'label' => $this->label,
            'recipient_name' => $this->recipient_name,
            'phone' => $this->phone,
            'city' => $this->city,
            'district' => $this->district,
            'street' => $this->street,
            'national_address' => $this->national_address,
            'details' => $this->details,
        ];
    }
}
