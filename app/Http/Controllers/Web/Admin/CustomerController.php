<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Customers\UpdateCustomerRequest;
use App\Http\Requests\Web\Admin\Users\BulkDestroyUsersRequest;
use App\Http\Requests\Web\Checkout\AddressRequest;
use App\Models\User;
use App\Modules\Addresses\DTOs\AddressData;
use App\Modules\Addresses\Models\Address;
use App\Modules\Addresses\Services\AddressService;
use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Audit\Services\AuditService;
use App\Modules\Identity\Enums\PermissionName;
use App\Modules\Identity\Enums\RoleName;
use App\Modules\Identity\Services\UserService;
use App\Modules\Orders\Enums\OrderStatus;
use App\Modules\Subscriptions\Enums\SubscriptionStatus;
use App\Support\Search\SearchTerm;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

final class CustomerController extends Controller
{
    public function __construct(
        private readonly UserService $userService,
        private readonly AddressService $addresses,
        private readonly AuditService $audit,
    ) {}

    public function index(Request $request): View
    {
        $this->guard();

        $term = SearchTerm::fromRequest($request);

        $customers = User::query()
            ->customers()
            ->when(! $term->isEmpty(), fn ($query) => $query->search($term))
            ->withCount(['orders', 'subscriptions'])
            ->orderBy('name')
            ->paginate(30)
            ->withQueryString();

        return view('admin.customers.index', [
            'customers' => $customers,
            'search' => $term->value,
        ]);
    }

    public function show(User $customer): View
    {
        $this->guard();

        abort_unless($customer->isCustomer(), 404);

        $customer->load([
            'orders' => fn ($query) => $query->withCount('items')->latest(),
            'subscriptions' => fn ($query) => $query->with('plan')->latest(),
            'bodyMeasurements',
            'addresses' => fn ($query) => $query->orderByDesc('is_default')->orderByDesc('id'),
        ]);

        return view('admin.customers.show', [
            'customer' => $customer,
            'canEdit' => $this->isSuperAdmin(),
        ]);
    }

    public function update(UpdateCustomerRequest $request, User $customer): RedirectResponse
    {
        $this->guardEditor($customer);

        $profile = $request->profile();
        $before = [
            'name' => $customer->name,
            'birth_date' => $customer->birth_date?->toDateString(),
            'allergies' => $customer->allergies,
            'medications' => $customer->medications,
        ];

        $customer->fill($profile);

        if ($customer->isDirty()) {
            $changed = array_keys($customer->getDirty());
            $customer->save();

            $this->audit->log(
                AuditAction::CustomerUpdated,
                $customer,
                array_intersect_key($before, array_flip($changed)),
                array_intersect_key($profile, array_flip($changed)) + ['by_staff' => Auth::id()],
            );
        }

        return redirect()
            ->route('admin.customers.show', $customer)
            ->with('success', __('customers.messages.updated'));
    }

    public function updateAddress(AddressRequest $request, User $customer, Address $address): RedirectResponse
    {
        $this->guardEditor($customer);
        abort_unless($address->user_id === $customer->id, 404);

        $before = $address->snapshot();
        $this->addresses->update($address, AddressData::fromArray($request->validated()));
        $after = $address->refresh()->snapshot();

        $changed = array_keys(array_diff_assoc(
            array_map('strval', $after),
            array_map('strval', $before),
        ));

        if ($changed !== []) {
            $this->audit->log(
                AuditAction::CustomerAddressUpdated,
                $customer,
                ['address' => $address->public_id] + array_intersect_key($before, array_flip($changed)),
                array_intersect_key($after, array_flip($changed)) + ['by_staff' => Auth::id()],
            );
        }

        return redirect()
            ->route('admin.customers.show', $customer)
            ->with('success', __('customers.messages.address_updated'));
    }

    public function destroy(User $customer): RedirectResponse
    {
        $this->authorize('delete', $customer);
        abort_unless($customer->isCustomer(), 404);

        $reason = $this->userService->deletionBlocker($customer, (int) Auth::id());

        if ($reason !== null) {
            return back()->with('error', $this->userService->deletionErrorMessage($customer, $reason));
        }

        $this->userService->delete($customer, (int) Auth::id());

        return redirect()
            ->route('admin.customers.index')
            ->with('success', __('customers.messages.deleted'));
    }

    public function bulkDestroy(BulkDestroyUsersRequest $request): RedirectResponse
    {
        $this->authorize('deleteAnyCustomer', User::class);

        $customers = User::query()
            ->customers()
            ->whereIn('id', $request->userIds())
            ->withCount([
                'subscriptions as active_subscriptions_count' => static fn ($query) => $query
                    ->where('status', SubscriptionStatus::Active),
                'orders as incomplete_orders_count' => static fn ($query) => $query
                    ->whereNotIn('status', [
                        OrderStatus::Delivered->value,
                        OrderStatus::Cancelled->value,
                    ]),
            ])
            ->orderBy('id')
            ->get();

        foreach ($customers as $customer) {
            $this->authorize('delete', $customer);
        }

        $result = $this->userService->deleteMany($customers, (int) Auth::id());
        $redirect = redirect()->route('admin.customers.index');

        if ($result['deleted']->isNotEmpty()) {
            $redirect->with('success', __('customers.messages.bulk_deleted', [
                'count' => $result['deleted']->count(),
            ]));
        }

        if ($result['blocked']->isNotEmpty()) {
            $people = $result['blocked']
                ->map(function (array $item): string {
                    $name = $item['user']->name;
                    $reason = __('customers.blockers.'.$item['reason']);

                    return $name.' ('.(is_string($reason) ? $reason : $item['reason']).')';
                })
                ->filter()
                ->values()
                ->all();

            $redirect->with('warning', __('customers.messages.bulk_blocked', [
                'people' => implode(', ', $people),
            ]));
        }

        if ($result['deleted']->isEmpty() && $result['blocked']->isEmpty()) {
            $redirect->with('error', __('customers.messages.bulk_none'));
        }

        return $redirect;
    }

    private function isSuperAdmin(): bool
    {
        /** @var User|null $user */
        $user = Auth::user();

        return $user !== null && $user->hasRole(RoleName::SuperAdmin->value);
    }

    private function guardEditor(User $customer): void
    {
        abort_unless($this->isSuperAdmin(), 403);
        abort_unless($customer->isCustomer(), 404);
    }

    private function guard(): void
    {
        /** @var User|null $user */
        $user = Auth::user();

        abort_unless(
            $user !== null && $user->can(PermissionName::CustomersView->value),
            403,
        );
    }
}
