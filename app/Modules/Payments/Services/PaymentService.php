<?php

declare(strict_types=1);

namespace App\Modules\Payments\Services;

use App\Models\User;
use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Audit\Services\AuditService;
use App\Modules\Payments\Contracts\PaymentGateway;
use App\Modules\Payments\DTOs\CardDetails;
use App\Modules\Payments\DTOs\ChargeRequest;
use App\Modules\Payments\Enums\PaymentDecline;
use App\Modules\Payments\Enums\PaymentMethod;
use App\Modules\Payments\Enums\PaymentStatus;
use App\Modules\Payments\Exceptions\PaymentDeclinedException;
use App\Modules\Payments\Models\Payment;
use App\Support\Money\Money;
use Illuminate\Database\Eloquent\Model;

final class PaymentService
{
    public function __construct(
        private readonly PaymentGateway $gateway,
        private readonly AuditService $audit,
    ) {}

    /**
     * Charge a payable (an order or a subscription) and record the attempt.
     *
     * Deferred methods such as cash on delivery never reach the gateway; they
     * leave a pending payment behind so the amount owed is still tracked.
     *
     * @throws PaymentDeclinedException
     */
    public function charge(
        Model $payable,
        User $user,
        PaymentMethod $method,
        Money $amount,
        ?CardDetails $card = null,
    ): Payment {
        $payment = new Payment;
        $payment->user_id = $user->id;
        $payment->payable_type = $payable::class;
        $payment->payable_id = (int) $payable->getKey();
        $payment->method = $method;
        $payment->currency = $amount->currency->code;
        $payment->amount_minor = $amount->toMinor();
        $payment->gateway = $this->gateway->name();

        if ($card instanceof CardDetails) {
            $payment->card_brand = $card->brand();
            $payment->card_last4 = $card->last4();
        }

        if ($method->isDeferred()) {
            $payment->status = PaymentStatus::Pending;
            $payment->save();

            $this->audit->log(AuditAction::PaymentPending, $payment, [], $this->snapshot($payment));

            return $payment;
        }

        $result = $this->gateway->charge(new ChargeRequest(
            amount: $amount,
            method: $method,
            reference: $payment->public_id ?: (string) $payable->getKey(),
            description: $this->describe($payable),
            card: $card,
        ));

        $payment->gateway_reference = $result->gatewayReference;

        if (! $result->approved) {
            $payment->status = PaymentStatus::Failed;
            $payment->decline_reason = $result->decline;
            $payment->save();

            $this->audit->log(AuditAction::PaymentDeclined, $payment, [], $this->snapshot($payment));

            throw new PaymentDeclinedException($result->decline ?? PaymentDecline::GatewayError, $payment);
        }

        $payment->status = PaymentStatus::Paid;
        $payment->paid_at = now();
        $payment->save();

        $this->audit->log(AuditAction::PaymentCaptured, $payment, [], $this->snapshot($payment));

        return $payment;
    }

    /**
     * Mark a deferred payment as collected.
     *
     * Cash on delivery never reaches the gateway, so someone on the team
     * confirms it by hand once the courier hands the money over. Confirming an
     * already-settled payment is a no-op.
     */
    public function confirmManually(Payment $payment, User $actor): Payment
    {
        if ($payment->status->isSettled()) {
            return $payment;
        }

        $payment->status = PaymentStatus::Paid;
        $payment->paid_at = now();
        $payment->save();

        $this->audit->log(AuditAction::PaymentConfirmed, $payment, [], [
            ...$this->snapshot($payment),
            'confirmed_by' => $actor->getKey(),
        ]);

        return $payment;
    }

    private function describe(Model $payable): string
    {
        return class_basename($payable).' #'.$payable->getKey();
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
