<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Users\BulkDestroyUsersRequest;
use App\Models\User;
use App\Modules\Identity\Enums\PermissionName;
use App\Modules\Identity\Services\UserService;
use App\Modules\Orders\Enums\OrderStatus;
use App\Modules\Subscriptions\Enums\SubscriptionStatus;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

final class CustomerController extends Controller
{
    public function __construct(private readonly UserService $userService) {}

    public function index(): View
    {
        $this->guard();

        $customers = User::query()
            ->customers()
            ->withCount(['orders', 'subscriptions'])
            ->orderBy('name')
            ->paginate(30);

        return view('admin.customers.index', [
            'customers' => $customers,
        ]);
    }

    public function show(User $customer): View
    {
        $this->guard();

        abort_unless($customer->isCustomer(), 404);

        $customer->load([
            'orders' => fn ($query) => $query->withCount('items')->latest(),
            'subscriptions' => fn ($query) => $query->latest(),
            'bodyMeasurements',
        ]);

        return view('admin.customers.show', [
            'customer' => $customer,
        ]);
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
