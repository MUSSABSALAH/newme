<?php

declare(strict_types=1);

namespace App\Modules\Payments\Services;

use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Audit\Services\AuditService;
use App\Modules\Invoices\Services\InvoiceService;
use App\Modules\Notifications\Services\AdminNotifier;
use App\Modules\Notifications\Services\CustomerNotifier;
use App\Modules\Orders\Models\Order;
use App\Modules\Orders\Services\OrderService;
use App\Modules\Payments\DTOs\PaymentCallback;
use App\Modules\Payments\Enums\PaymentDecline;
use App\Modules\Payments\Enums\PaymentStatus;
use App\Modules\Payments\Models\Payment;
use App\Modules\Subscriptions\Models\Subscription;
use App\Modules\Subscriptions\Services\SubscriptionService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Turns a hosted-gateway callback into a settled (or failed) payment.
 *
 * Safe to call twice: an already-paid row is left alone, so the browser return
 * and the IPN can race without double-invoicing.
 */
final class CompletePaymentService
{
    public function __construct(
        private readonly OrderService $orders,
        private readonly SubscriptionService $subscriptions,
        private readonly InvoiceService $invoices,
        private readonly AuditService $audit,
        private readonly AdminNotifier $notifier,
        private readonly CustomerNotifier $customerNotifier,
    ) {}

    public function apply(PaymentCallback $callback): Payment
    {
        $payment = Payment::query()
            ->where('public_id', $callback->cartId)
            ->first();

        if (! $payment instanceof Payment) {
            throw (new ModelNotFoundException)->setModel(Payment::class, [$callback->cartId]);
        }

        return $this->complete($payment, $callback);
    }

    public function applyIfFound(PaymentCallback $callback): ?Payment
    {
        $payment = Payment::query()
            ->where('public_id', $callback->cartId)
            ->first();

        if (! $payment instanceof Payment) {
            Log::warning('Payment callback for an unknown cart.', [
                'cart_id' => $callback->cartId,
                'tran_ref' => $callback->tranRef,
            ]);

            return null;
        }

        return $this->complete($payment, $callback);
    }

    private function complete(Payment $payment, PaymentCallback $callback): Payment
    {
        $becamePaid = false;

        $payment = DB::transaction(function () use ($payment, $callback, &$becamePaid): Payment {
            /** @var Payment $payment */
            $payment = Payment::query()->whereKey($payment->getKey())->lockForUpdate()->firstOrFail();

            if ($payment->status->isSettled()) {
                return $payment;
            }

            if ($callback->tranRef !== '') {
                $payment->gateway_reference = $callback->tranRef;
            }

            if ($callback->cardLast4 !== null) {
                $payment->card_last4 = $callback->cardLast4;
            }

            if ($callback->cardBrand !== null) {
                $payment->card_brand = $callback->cardBrand;
            }

            if ($callback->pending) {
                $payment->save();

                return $payment;
            }

            if ($callback->successful) {
                $payment->status = PaymentStatus::Paid;
                $payment->paid_at = now();
                $payment->decline_reason = null;
                $payment->save();
                $becamePaid = true;

                $this->audit->log(AuditAction::PaymentCaptured, $payment, [], $this->snapshot($payment));
            } else {
                $payment->status = PaymentStatus::Failed;
                $payment->decline_reason = $callback->decline ?? PaymentDecline::CardDeclined;
                $payment->save();

                $this->audit->log(AuditAction::PaymentDeclined, $payment, [], $this->snapshot($payment));
            }

            $this->settlePayable($payment);

            return $payment;
        });

        if ($becamePaid) {
            $this->invoiceAndNotify($payment);
        }

        return $payment;
    }

    private function settlePayable(Payment $payment): void
    {
        $payable = $payment->payable;

        if ($payable instanceof Order) {
            $this->orders->settle($payable, $payment);

            return;
        }

        if ($payable instanceof Subscription) {
            $this->subscriptions->settle($payable, $payment);
        }
    }

    private function invoiceAndNotify(Payment $payment): void
    {
        $payment->refresh();
        $payable = $payment->payable;

        if (! $payable instanceof Order && ! $payable instanceof Subscription) {
            return;
        }

        if ($payable instanceof Subscription) {
            $this->notifier->subscriptionStarted($payable);
            $this->customerNotifier->subscriptionStarted($payable);
        } else {
            $this->notifier->orderPlaced($payable);
            $this->customerNotifier->orderPlaced($payable);
        }

        $this->invoices->issueFor($payable, $payment);
    }

    /**
     * @return array<string, mixed>
     */
    private function snapshot(Payment $payment): array
    {
        return [
            'payable_type' => $payment->payable_type,
            'payable_id' => $payment->payable_id,
            'method' => $payment->method->value,
            'status' => $payment->status->value,
            'amount_minor' => $payment->amount_minor,
            'gateway' => $payment->gateway,
            'gateway_reference' => $payment->gateway_reference,
            'decline_reason' => $payment->decline_reason?->value,
        ];
    }
}
