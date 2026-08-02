<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\Identity\Enums\PermissionName;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

final class CustomerController extends Controller
{
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
        ]);

        return view('admin.customers.show', [
            'customer' => $customer,
        ]);
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
