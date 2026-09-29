<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\Delivery\Models\Shipment;
use App\Modules\Delivery\Models\SubscriptionDelivery;
use App\Modules\Delivery\Services\DeliveryBoardService;
use App\Modules\Delivery\Walim\WalimException;
use App\Modules\Delivery\Walim\WalimShipmentService;
use App\Modules\Delivery\Walim\WaybillPdfRenderer;
use App\Modules\Orders\Models\Order;
use App\Modules\Subscriptions\Models\Subscription;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;

/**
 * Staff actions that hand shipments to Walim, and their printed labels.
 */
final class WalimShipmentController extends Controller
{
    public function __construct(
        private readonly WalimShipmentService $walim,
        private readonly DeliveryBoardService $board,
    ) {}

    public function sendOrder(Request $request, Order $order): RedirectResponse
    {
        $this->authorize('record', SubscriptionDelivery::class);

        try {
            $this->walim->sendOrder($order, $this->actor($request));
        } catch (WalimException $e) {
            return $this->back($request, null, $e->getMessage());
        }

        return $this->back($request, __('deliveries.walim.messages.sent'));
    }

    public function sendStop(Request $request, Subscription $subscription): RedirectResponse
    {
        $this->authorize('record', SubscriptionDelivery::class);

        $stop = $this->board->stop($subscription, $this->date($request));

        if ($stop === null) {
            return $this->back($request, null, __('deliveries.errors.not_scheduled'));
        }

        try {
            $this->walim->sendStop($stop, $this->actor($request));
        } catch (WalimException $e) {
            return $this->back($request, null, $e->getMessage());
        }

        return $this->back($request, __('deliveries.walim.messages.sent'));
    }

    public function sendStops(Request $request): RedirectResponse
    {
        $this->authorize('record', SubscriptionDelivery::class);

        try {
            $result = $this->walim->sendStops($this->board->forDate($this->date($request))->stops, $this->actor($request));
        } catch (WalimException $e) {
            return $this->back($request, null, $e->getMessage());
        }

        $summary = (string) __('deliveries.walim.messages.batch', [
            'sent' => $result['sent'],
            'skipped' => $result['skipped'],
            'failed' => count($result['failed']),
        ]);

        return $result['failed'] === []
            ? $this->back($request, $summary)
            : $this->back($request, null, $summary.' '.implode(' | ', $result['failed']));
    }

    public function cancel(Request $request, Shipment $shipment): RedirectResponse
    {
        $this->authorize('record', SubscriptionDelivery::class);

        try {
            $this->walim->cancel($shipment);
        } catch (WalimException $e) {
            return $this->back($request, null, $e->getMessage());
        }

        return $this->back($request, __('deliveries.walim.messages.cancelled'));
    }

    public function waybill(Shipment $shipment, WaybillPdfRenderer $renderer): Response
    {
        $this->authorize('viewAny', SubscriptionDelivery::class);

        return $this->pdf($renderer->render([$shipment]), 'waybill-'.$shipment->reference.'.pdf');
    }

    public function waybills(Request $request, WaybillPdfRenderer $renderer): Response
    {
        $this->authorize('viewAny', SubscriptionDelivery::class);

        $date = $this->date($request);
        $board = $this->board->forDate($date);

        $shipments = array_filter(
            [...array_values($this->walim->forOrders($board->orders)), ...array_values($this->walim->forStops($board->stops))],
            static fn (Shipment $shipment): bool => $shipment->status->isLive(),
        );

        return $this->pdf($renderer->render($shipments), 'waybills-'.$date->toDateString().'.pdf');
    }

    private function pdf(string $bytes, string $filename): Response
    {
        return response($bytes, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$filename.'"',
        ]);
    }

    private function actor(Request $request): User
    {
        /** @var User $actor */
        $actor = $request->user();

        return $actor;
    }

    private function date(Request $request): Carbon
    {
        $value = $request->input('date');

        if (is_string($value) && trim($value) !== '') {
            try {
                return Carbon::parse(trim($value))->startOfDay();
            } catch (\Throwable) {
                // Fall through to today.
            }
        }

        return Carbon::today();
    }

    private function back(Request $request, ?string $success, ?string $error = null): RedirectResponse
    {
        $day = $this->date($request);
        $redirect = redirect()->route('admin.deliveries.index', $day->isToday() ? [] : ['date' => $day->toDateString()]);

        return $error !== null ? $redirect->with('error', $error) : $redirect->with('success', $success);
    }
}
