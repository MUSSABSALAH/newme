<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\Identity\Enums\PermissionName;
use App\Modules\Invoices\Services\InvoiceService;
use App\Modules\Orders\Models\Order;
use App\Modules\Orders\Services\OrderService;
use App\Modules\Payments\Models\Payment;
use App\Modules\Payments\Services\PaymentService;
use App\Modules\Subscriptions\Models\Subscription;
use App\Modules\Subscriptions\Services\SubscriptionService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class PaymentController extends Controller
{
    public function __construct(
        private readonly PaymentService $payments,
        private readonly OrderService $orders,
        private readonly SubscriptionService $subscriptions,
        private readonly InvoiceService $invoices,
    ) {}

    /**
     * Record that a cash-on-delivery payment was collected.
     *
     * Confirming here is what triggers the invoice, so this is the only place
     * outside checkout where a customer starts getting billed.
     */
    public function confirm(Request $request, Payment $payment): RedirectResponse
    {
        /** @var User $actor */
        $actor = $request->user();

        abort_unless($actor->can(PermissionName::PaymentsConfirm->value), 403);

        $payable = $payment->payable;

        abort_unless($payable instanceof Order || $payable instanceof Subscription, 404);

        if ($payment->status->isSettled()) {
            return back()->with('success', __('payments.messages.already_confirmed'));
        }

        $this->payments->confirmManually($payment, $actor);

        if ($payable instanceof Order) {
            $this->orders->settle($payable, $payment);
        } else {
            $this->subscriptions->settle($payable, $payment);
        }

        $this->invoices->issueFor($payable, $payment);

        return back()->with('success', __('payments.messages.confirmed'));
    }
}
