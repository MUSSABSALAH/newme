<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Deliveries\AdvanceOrderRequest;
use App\Http\Requests\Web\Admin\Deliveries\RecordStopRequest;
use App\Models\User;
use App\Modules\Delivery\Models\SubscriptionDelivery;
use App\Modules\Delivery\Services\DeliveryBoardService;
use App\Modules\Delivery\Services\DeliveryService;
use App\Modules\Orders\Models\Order;
use App\Modules\Subscriptions\Models\Subscription;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

/**
 * The shipping day sheet: what has to be handed over, and what happened to it.
 */
final class DeliveryController extends Controller
{
    public function __construct(
        private readonly DeliveryBoardService $board,
        private readonly DeliveryService $deliveries,
    ) {}

    public function index(Request $request): View
    {
        $this->authorize('viewAny', SubscriptionDelivery::class);

        $date = $this->date($request->query('date'));

        return view('admin.deliveries.index', [
            'board' => $this->board->forDate($date),
            'date' => $date,
            'canRecord' => $request->user()?->can('record', SubscriptionDelivery::class) ?? false,
        ]);
    }

    public function updateStop(RecordStopRequest $request, Subscription $subscription): RedirectResponse
    {
        $this->authorize('record', SubscriptionDelivery::class);

        /** @var User $actor */
        $actor = $request->user();
        $date = $request->deliveryDate();

        $this->deliveries->markStop($subscription, $date, $request->status(), $actor, $request->reason());

        return $this->backToBoard($date, __('deliveries.messages.stop_updated'));
    }

    public function updateOrder(AdvanceOrderRequest $request, Order $order): RedirectResponse
    {
        $this->authorize('record', SubscriptionDelivery::class);

        /** @var User $actor */
        $actor = $request->user();

        $this->deliveries->advanceOrder($order, $request->status(), $actor);

        return $this->backToBoard($request->deliveryDate(), __('deliveries.messages.order_updated'));
    }

    private function backToBoard(?Carbon $date, string $message): RedirectResponse
    {
        $day = $date ?? Carbon::today();

        return redirect()
            ->route('admin.deliveries.index', $day->isToday() ? [] : ['date' => $day->toDateString()])
            ->with('success', $message);
    }

    /**
     * A malformed date in the query string falls back to today rather than
     * greeting the officer with an error page.
     */
    private function date(mixed $value): Carbon
    {
        if (is_string($value) && trim($value) !== '') {
            try {
                return Carbon::parse(trim($value))->startOfDay();
            } catch (\Throwable) {
                // Fall through to today.
            }
        }

        return Carbon::today();
    }
}
