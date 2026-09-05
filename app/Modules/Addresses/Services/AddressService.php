<?php

declare(strict_types=1);

namespace App\Modules\Addresses\Services;

use App\Models\User;
use App\Modules\Addresses\DTOs\AddressData;
use App\Modules\Addresses\Models\Address;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

final class AddressService
{
    /**
     * @return Collection<int, Address>
     */
    public function forUser(User $user): Collection
    {
        return Address::query()
            ->where('user_id', $user->id)
            ->orderByDesc('is_default')
            ->orderByDesc('id')
            ->get();
    }

    public function create(User $user, AddressData $data): Address
    {
        return DB::transaction(function () use ($user, $data): Address {
            $first = ! Address::query()->where('user_id', $user->id)->exists();

            $address = new Address;
            $address->user_id = $user->id;
            $this->fill($address, $data);
            $address->is_default = $data->isDefault || $first;
            $address->save();

            if ($address->is_default) {
                $this->clearOtherDefaults($user, $address);
            }

            return $address;
        });
    }

    public function update(Address $address, AddressData $data): Address
    {
        return DB::transaction(function () use ($address, $data): Address {
            $this->fill($address, $data);
            $address->is_default = $data->isDefault || $address->is_default;
            $address->save();

            if ($address->is_default) {
                $this->clearOtherDefaults($address->user, $address);
            }

            return $address;
        });
    }

    public function makeDefault(Address $address): void
    {
        DB::transaction(function () use ($address): void {
            $address->is_default = true;
            $address->save();

            $this->clearOtherDefaults($address->user, $address);
        });
    }

    public function delete(Address $address): void
    {
        DB::transaction(function () use ($address): void {
            $wasDefault = $address->is_default;
            $user = $address->user;

            $address->delete();

            if (! $wasDefault) {
                return;
            }

            $next = Address::query()
                ->where('user_id', $user->id)
                ->orderByDesc('id')
                ->first();

            if ($next instanceof Address) {
                $next->is_default = true;
                $next->save();
            }
        });
    }

    /**
     * The address a checkout should preselect.
     */
    public function defaultFor(User $user): ?Address
    {
        return Address::query()
            ->where('user_id', $user->id)
            ->orderByDesc('is_default')
            ->orderByDesc('id')
            ->first();
    }

    public function defaultDeliverableFor(User $user): ?Address
    {
        $addresses = $this->forUser($user);
        $preferred = $addresses->firstWhere('is_default', true) ?? $addresses->first();

        if ($preferred instanceof Address && $preferred->isDeliverable()) {
            return $preferred;
        }

        return $addresses->first(fn (Address $address): bool => $address->isDeliverable());
    }

    private function fill(Address $address, AddressData $data): void
    {
        $address->label = $data->label;
        $address->recipient_name = $data->recipientName;
        $address->phone = $data->phone;
        $address->city = $data->city;
        $address->district = $data->district;
        $address->street = $data->street;
        $address->national_address = $data->nationalAddress;
        $address->details = $data->details;
    }

    private function clearOtherDefaults(User $user, Address $keep): void
    {
        Address::query()
            ->where('user_id', $user->id)
            ->whereKeyNot($keep->getKey())
            ->update(['is_default' => false]);
    }
}
