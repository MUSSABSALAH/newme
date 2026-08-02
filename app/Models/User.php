<?php

declare(strict_types=1);

namespace App\Models;

use App\Modules\Addresses\Models\Address;
use App\Modules\Identity\Enums\UserStatus;
use App\Modules\Identity\Enums\UserType;
use App\Modules\Identity\Models\UserInvitation;
use App\Modules\Orders\Models\Order;
use App\Modules\Subscriptions\Models\Subscription;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property UserStatus $status
 * @property UserType $type
 * @property string|null $phone
 */
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasApiTokens, HasFactory, HasRoles, Notifiable;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'status',
        'type',
    ];

    /**
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'status' => UserStatus::class,
            'type' => UserType::class,
        ];
    }

    /**
     * Internal staff accounts (admin panel).
     *
     * @param  Builder<User>  $query
     */
    public function scopeStaff(Builder $query): void
    {
        $query->where('type', UserType::Staff->value);
    }

    /**
     * Public store customer accounts.
     *
     * @param  Builder<User>  $query
     */
    public function scopeCustomers(Builder $query): void
    {
        $query->where('type', UserType::Customer->value);
    }

    public function isActive(): bool
    {
        return $this->status === UserStatus::Active;
    }

    public function isInvited(): bool
    {
        return $this->status === UserStatus::Invited;
    }

    public function isStaff(): bool
    {
        return $this->type === UserType::Staff;
    }

    public function isCustomer(): bool
    {
        return $this->type === UserType::Customer;
    }

    /**
     * @return HasMany<UserInvitation, $this>
     */
    public function invitations(): HasMany
    {
        return $this->hasMany(UserInvitation::class);
    }

    /**
     * @return HasMany<Address, $this>
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    /**
     * @return HasMany<Order, $this>
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * @return HasMany<Subscription, $this>
     */
    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    public function pendingInvitation(): ?UserInvitation
    {
        return $this->invitations
            ->whereNull('accepted_at')
            ->sortByDesc('created_at')
            ->first();
    }
}
