<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Orders\UpdateOrderStatusRequest;
use App\Models\User;
use App\Modules\Invoices\Services\InvoiceService;
use App\Modules\Orders\Enums\OrderStatus;
use App\Modules\Orders\Models\Order;
use App\Modules\Orders\Services\OrderService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class OrderController extends Controller
{
    public function __construct(
        private readonly InvoiceService $invoices,
        private readonly OrderService $orders,
    ) {}

    public function index(Request $request): View
    {
        $this->authorize('viewAny', Order::class);

        $status = OrderStatus::tryFrom((string) $request->query('status', ''));

        $orders = Order::query()
            ->with('user')
            ->withCount('items')
            ->when($status !== null, fn ($query) => $query->where('status', $status->value))
            ->latest('placed_at')
            ->latest('id')
            ->paginate(20)
            ->withQueryString();

        return view('admin.orders.index', [
            'orders' => $orders,
            'statuses' => OrderStatus::cases(),
            'activeStatus' => $status,
        ]);
    }

    public function show(Order $order): View
    {
        $this->authorize('view', $order);

        $order->load(['user', 'items', 'payments' => fn ($query) => $query->latest()]);

        return view('admin.orders.show', [
            'order' => $order,
            'invoice' => $this->invoices->find($order),
            'statusOptions' => [$order->status, ...$order->status->nextStatuses()],
        ]);
    }

    public function updateStatus(UpdateOrderStatusRequest $request, Order $order): RedirectResponse
    {
        $this->authorize('update', $order);

        /** @var User $actor */
        $actor = $request->user();

        $this->orders->updateStatus($order, $request->status(), $actor);

        return back()->with('success', __('orders.messages.status_updated'));
    }
}
