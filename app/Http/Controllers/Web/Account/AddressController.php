<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Checkout\AddressRequest;
use App\Models\User;
use App\Modules\Addresses\DTOs\AddressData;
use App\Modules\Addresses\Models\Address;
use App\Modules\Addresses\Services\AddressService;
use App\Modules\Addresses\Services\MapGeocoder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

final class AddressController extends Controller
{
    public function __construct(
        private readonly AddressService $addresses,
        private readonly MapGeocoder $geocoder,
    ) {}

    public function lookup(Request $request): JsonResponse
    {
        $data = $request->validate([
            'lat' => ['required', 'numeric', 'between:-90,90'],
            'lng' => ['required', 'numeric', 'between:-180,180'],
        ]);

        return response()->json($this->geocoder->lookup((float) $data['lat'], (float) $data['lng']));
    }

    public function store(AddressRequest $request): RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();

        $this->addresses->create($user, AddressData::fromArray($request->validated()));

        return redirect()
            ->route('website.account', ['tab' => 'addresses'])
            ->with('success', __('account.messages.address_saved'));
    }

    public function update(AddressRequest $request, Address $address): RedirectResponse
    {
        $this->owned($address);

        $this->addresses->update($address, AddressData::fromArray($request->validated()));

        return redirect()
            ->route('website.account', ['tab' => 'addresses'])
            ->with('success', __('account.messages.address_saved'));
    }

    public function destroy(Address $address): RedirectResponse
    {
        $this->owned($address);

        $this->addresses->delete($address);

        return redirect()
            ->route('website.account', ['tab' => 'addresses'])
            ->with('success', __('account.messages.address_deleted'));
    }

    public function makeDefault(Address $address): RedirectResponse
    {
        $this->owned($address);

        $this->addresses->makeDefault($address);

        return redirect()
            ->route('website.account', ['tab' => 'addresses'])
            ->with('success', __('account.messages.address_default'));
    }

    private function owned(Address $address): void
    {
        abort_unless($address->user_id === Auth::id(), 404);
    }
}
