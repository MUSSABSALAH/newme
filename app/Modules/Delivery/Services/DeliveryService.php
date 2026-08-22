<?php

declare(strict_types=1);

namespace App\Modules\Delivery\Services;

use App\Models\User;
use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Audit\Services\AuditService;
use App\Modules\Delivery\Enums\DeliveryStatus;
use App\Modules\Delivery\Models\SubscriptionDelivery;
use App\Modules\Orders\Enums\OrderStatus;
use App\Modules\Orders\Models\Order;
use App\Modules\Orders\Services\OrderService;
use App\Modules\Subscriptions\Models\Subscription;
use Illuminate\Support\Carbon;

/**
 * Records what the shipping team did with a shipment.
 *
 * Subscription days get their own record here; store orders keep their status
 * as the single source of truth and are moved through the order service, so the
 * board never holds a second, drifting copy of an order's state.
 */
final class DeliveryService
{
    public function __construct(
        private readonly AuditService $audit,
        private readonly OrderService $orders,
    ) {}

    /**
     * @throws \InvalidArgumentException
     */
    public function markStop(
        Subscription $subscription,
        Carbon $date,
        DeliveryStatus $status,
        User $actor,
        ?string $reason = null,
    ): SubscriptionDelivery {
        $record = SubscriptionDelivery::query()->firstOrNew([
            'subscription_id' => $subscription->getKey(),
            'delivery_date' => $date->toDateString(),
        ]);

        $previous = $record->exists ? $record->status : DeliveryStatus::Pending;

        if (! $previous->canTransitionTo($status)) {
            throw new \InvalidArgumentException(
                "Cannot move delivery from {$previous->value} to {$status->value}."
            );
        }

        $record->status = $status;
        $record->handled_by = $actor->getKey();

        // Keep the first dispatch time: a re-attempt is still the same run.
        if ($status === DeliveryStatus::Dispatched && $record->dispatched_at === null) {
            $record->dispatched_at = now();
        }

        $record->delivered_at = $status === DeliveryStatus::Delivered ? now() : null;
        $record->failure_reason = $status === DeliveryStatus::Failed ? $reason : null;
        $record->save();

        $this->audit->log(
            AuditAction::DeliveryStatusUpdated,
            $record,
            ['status' => $previous->value],
            [
                'status' => $status->value,
                'delivery_date' => $record->delivery_date->toDateString(),
                'subscription_id' => $subscription->getKey(),
                'actor_id' => $actor->getKey(),
            ],
        );

        return $record;
    }

    /**
     * Move a store order along from the board.
     *
     * @throws \InvalidArgumentException
     */
    public function advanceOrder(Order $order, OrderStatus $status, User $actor): Order
    {
        return $this->orders->updateStatus($order, $status, $actor);
    }
}
