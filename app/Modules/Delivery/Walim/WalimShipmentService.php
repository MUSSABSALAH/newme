<?php

declare(strict_types=1);

namespace App\Modules\Delivery\Walim;

use App\Models\User;
use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Audit\Services\AuditService;
use App\Modules\Delivery\DTOs\SubscriptionStop;
use App\Modules\Delivery\Enums\DeliveryStatus;
use App\Modules\Delivery\Enums\ShipmentStatus;
use App\Modules\Delivery\Models\Shipment;
use App\Modules\Delivery\Models\SubscriptionDelivery;
use App\Modules\Delivery\Services\DeliveryBoardService;
use App\Modules\Delivery\Services\DeliveryService;
use App\Modules\Notifications\Services\AdminNotifier;
use App\Modules\Orders\Enums\OrderStatus;
use App\Modules\Orders\Models\Order;
use App\Modules\Settings\Services\SettingsService;
use App\Modules\Subscriptions\Models\Subscription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

/**
 * Hands store orders and subscription days to Walim and follows them back.
 *
 * Sending is always a staff action and is idempotent: the order_id we send is
 * derived from our own record, and Walim is asked for live tasks under that id
 * before a new one is created, so a double click, a timeout or a retry never
 * puts two couriers on the road. Walim webhooks then move the order or day
 * along; a failure, or a cancellation made at Walim, only alerts staff and
 * never cancels a paid order on its own.
 */
final class WalimShipmentService
{
    private const BATCH_SIZE = 25;

    private const LOCK_SECONDS = 60;

    public function __construct(
        private readonly WalimClient $client,
        private readonly WalimTaskFactory $tasks,
        private readonly DeliveryService $deliveries,
        private readonly AuditService $audit,
        private readonly AdminNotifier $notifier,
        private readonly SettingsService $settings,
    ) {}

    public function storeEnabled(): bool
    {
        return $this->settings->get('shipping.store_provider') === 'walim' && $this->client->isConfigured();
    }

    public function subscriptionsEnabled(): bool
    {
        return $this->settings->get('shipping.subscription_provider') === 'walim' && $this->client->isConfigured();
    }

    public static function orderReference(Order $order): string
    {
        return $order->public_id;
    }

    public static function stopReference(Subscription $subscription, Carbon $date): string
    {
        return $subscription->public_id.'-'.$date->format('Ymd');
    }

    /**
     * @throws WalimException
     */
    public function sendOrder(Order $order, User $actor): Shipment
    {
        $this->ensure($this->storeEnabled());

        if ($order->isPickup()) {
            throw new WalimException((string) __('deliveries.walim.errors.pickup_order'));
        }

        if (! in_array($order->status, DeliveryBoardService::OPEN_ORDER_STATUSES, true)) {
            throw new WalimException((string) __('deliveries.walim.errors.order_not_open'));
        }

        $parcel = $this->tasks->orderParcel($order, self::orderReference($order));

        return $this->dispatch($order, $parcel, $actor);
    }

    /**
     * @throws WalimException
     */
    public function sendStop(SubscriptionStop $stop, User $actor): Shipment
    {
        $this->ensure($this->subscriptionsEnabled());

        if ($stop->isSettled()) {
            throw new WalimException((string) __('deliveries.walim.errors.stop_settled'));
        }

        $parcel = $this->tasks->stopParcel($stop, self::stopReference($stop->subscription, $stop->date));

        return $this->dispatch($this->dayRecord($stop), $parcel, $actor);
    }

    /**
     * Send every open stop of a day in batches, skipping those already live.
     *
     * @param  list<SubscriptionStop>  $stops
     * @return array{sent: int, skipped: int, failed: list<string>}
     *
     * @throws WalimException
     */
    public function sendStops(array $stops, User $actor): array
    {
        $this->ensure($this->subscriptionsEnabled());

        $result = ['sent' => 0, 'skipped' => 0, 'failed' => []];
        $lock = Cache::lock('walim:send:stops', self::LOCK_SECONDS);

        if (! $lock->get()) {
            throw new WalimException((string) __('deliveries.walim.errors.busy'));
        }

        try {
            /** @var array<string, array{parcel: WalimParcel, shipment: Shipment, stop: SubscriptionStop}> $pending */
            $pending = [];

            foreach ($stops as $stop) {
                $reference = self::stopReference($stop->subscription, $stop->date);
                $current = Shipment::query()->where('reference', $reference)->first();

                if ($stop->isSettled() || ($current !== null && $current->status->isLive())) {
                    $result['skipped']++;

                    continue;
                }

                try {
                    $parcel = $this->tasks->stopParcel($stop, $reference);
                } catch (WalimException $e) {
                    $result['failed'][] = $stop->customerName().': '.$e->getMessage();

                    continue;
                }

                $pending[$reference] = [
                    'parcel' => $parcel,
                    'shipment' => $this->prepare($current, $this->dayRecord($stop), $reference, $actor),
                    'stop' => $stop,
                ];
            }

            foreach (array_chunk($pending, self::BATCH_SIZE, true) as $chunk) {
                $this->sendChunk($chunk, $result);
            }
        } finally {
            $lock->release();
        }

        return $result;
    }

    /**
     * Cancel the task at Walim. Staff decide this; Walim is told, not asked.
     *
     * @throws WalimException
     */
    public function cancel(Shipment $shipment): void
    {
        if (! $shipment->status->isCancellable()) {
            return;
        }

        $jobIds = array_map(
            static fn (array $job): int => (int) $job['job_id'],
            $this->liveJobs($shipment->reference),
        );

        if ($jobIds === []) {
            $jobIds = array_values(array_filter([$shipment->pickup_job_id, $shipment->delivery_job_id]));
        }

        if ($jobIds !== []) {
            try {
                $this->client->cancelTasks($jobIds);
            } catch (WalimException $e) {
                $shipment->forceFill(['last_error' => $e->getMessage()])->save();

                throw $e;
            }
        }

        $previous = $shipment->status;
        $shipment->forceFill([
            'status' => ShipmentStatus::Cancelled,
            'cancelled_at' => now(),
            'last_error' => null,
        ])->save();

        $this->audit->log(
            AuditAction::ShipmentCancelled,
            $shipment,
            ['status' => $previous->value],
            ['status' => ShipmentStatus::Cancelled->value, 'job_ids' => $jobIds],
        );
    }

    /**
     * Staff cancelled the order here; take the courier off it too. A Walim
     * failure must not undo the cancellation, so it becomes an alert instead.
     */
    public function cancelForOrder(Order $order): void
    {
        $shipment = Shipment::query()
            ->where('shippable_type', $order->getMorphClass())
            ->where('shippable_id', $order->getKey())
            ->first();

        if ($shipment === null || ! $shipment->status->isCancellable()) {
            return;
        }

        try {
            $this->cancel($shipment);
        } catch (WalimException $e) {
            Log::warning('Walim task could not be cancelled.', [
                'reference' => $shipment->reference,
                'error' => $e->getMessage(),
            ]);
            $this->alert($shipment, 'cancel_failed');
        }
    }

    /**
     * Apply one Walim status update. Unknown tasks are ignored so Walim does
     * not keep retrying a webhook we can never match.
     *
     * @param  array<string, mixed>  $payload
     */
    public function handleWebhook(array $payload): ?Shipment
    {
        $status = is_numeric($payload['job_status'] ?? null)
            ? WalimJobStatus::tryFrom((int) $payload['job_status'])
            : null;

        if ($status === null) {
            return null;
        }

        $shipment = $this->match($payload);

        if ($shipment === null) {
            Log::info('Walim webhook for an unknown task.', [
                'order_id' => $payload['order_id'] ?? null,
                'job_id' => $payload['job_id'] ?? null,
            ]);

            return null;
        }

        $isPickup = (string) ($payload['job_type'] ?? '1') === '0';
        $jobId = is_numeric($payload['job_id'] ?? null) ? (int) $payload['job_id'] : null;

        $shipment->forceFill(array_filter([
            $isPickup ? 'pickup_job_id' : 'delivery_job_id' => $jobId,
            'job_hash' => $isPickup ? null : $this->string($payload['job_hash'] ?? null),
            'fleet_name' => $this->string($payload['fleet_name'] ?? null),
        ], static fn (mixed $value): bool => $value !== null));

        if (! $isPickup) {
            $shipment->provider_status = $status->value;
        }

        $shipment->save();

        // Once cancelled here, later updates for the old task change nothing.
        if ($shipment->status === ShipmentStatus::Cancelled) {
            return $shipment;
        }

        $this->apply($shipment, $status, $isPickup);

        return $shipment;
    }

    /**
     * Shipments for the given orders, keyed by order id.
     *
     * @param  iterable<Order>  $orders
     * @return array<int, Shipment>
     */
    public function forOrders(iterable $orders): array
    {
        $ids = [];

        foreach ($orders as $order) {
            $ids[] = $order->getKey();
        }

        if ($ids === []) {
            return [];
        }

        return Shipment::query()
            ->where('shippable_type', (new Order)->getMorphClass())
            ->whereIn('shippable_id', $ids)
            ->get()
            ->keyBy('shippable_id')
            ->all();
    }

    /**
     * Shipments for the given stops, keyed by reference.
     *
     * @param  list<SubscriptionStop>  $stops
     * @return array<string, Shipment>
     */
    public function forStops(array $stops): array
    {
        $references = array_map(
            static fn (SubscriptionStop $stop): string => self::stopReference($stop->subscription, $stop->date),
            $stops,
        );

        if ($references === []) {
            return [];
        }

        return Shipment::query()
            ->whereIn('reference', $references)
            ->get()
            ->keyBy('reference')
            ->all();
    }

    /**
     * @throws WalimException
     */
    private function dispatch(Model $shippable, WalimParcel $parcel, User $actor): Shipment
    {
        $lock = Cache::lock('walim:send:'.$parcel->reference, self::LOCK_SECONDS);

        if (! $lock->get()) {
            throw new WalimException((string) __('deliveries.walim.errors.busy'));
        }

        try {
            $current = Shipment::query()->where('reference', $parcel->reference)->first();

            if ($current !== null && $current->status->isLive()) {
                throw new WalimException((string) __('deliveries.walim.errors.already_sent'));
            }

            $shipment = $this->prepare($current, $shippable, $parcel->reference, $actor);

            try {
                $existing = $this->liveJobs($parcel->reference);

                if ($existing !== []) {
                    $this->adopt($shipment, $existing);
                } else {
                    $data = $this->client->createTask($this->tasks->task($parcel));
                    $this->created(
                        $shipment,
                        is_numeric($data['job_id'] ?? null) ? (int) $data['job_id'] : null,
                        null,
                        $this->string($data['delivery_hash'] ?? null),
                        $this->string($data['delivery_tracing_link'] ?? $data['delivery_tracking_link'] ?? null),
                        $this->string($data['pickup_tracking_link'] ?? null),
                    );
                }
            } catch (WalimException $e) {
                $shipment->forceFill(['last_error' => $e->getMessage()])->save();

                throw $e;
            }

            $this->audit->log(
                AuditAction::ShipmentSent,
                $shipment,
                [],
                ['reference' => $shipment->reference, 'job_id' => $shipment->jobId(), 'actor_id' => $actor->getKey()],
            );

            return $shipment;
        } finally {
            $lock->release();
        }
    }

    /**
     * @param  array<string, array{parcel: WalimParcel, shipment: Shipment, stop: SubscriptionStop}>  $chunk
     * @param  array{sent: int, skipped: int, failed: list<string>}  $result
     */
    private function sendChunk(array $chunk, array &$result): void
    {
        try {
            $existing = [];

            foreach ($this->client->jobsByOrderId(array_keys($chunk)) as $job) {
                $reference = (string) ($job['order_id'] ?? '');

                if (isset($chunk[$reference]) && ! $this->gone($job)) {
                    $existing[$reference][] = $job;
                }
            }

            foreach ($existing as $reference => $jobs) {
                $this->adopt($chunk[$reference]['shipment'], $jobs);
                unset($chunk[$reference]);
                $result['sent']++;
            }

            if ($chunk === []) {
                return;
            }

            $data = $this->client->createMultipleTasks($this->tasks->batch(
                array_values(array_map(static fn (array $entry): WalimParcel => $entry['parcel'], $chunk)),
            ));
        } catch (WalimException $e) {
            foreach ($chunk as $entry) {
                $entry['shipment']->forceFill(['last_error' => $e->getMessage()])->save();
                $result['failed'][] = $entry['stop']->customerName().': '.$e->getMessage();
            }

            return;
        }

        $pickups = $this->byOrderId($data['pickups'] ?? []);
        $deliveries = $this->byOrderId($data['deliveries'] ?? []);

        foreach ($chunk as $reference => $entry) {
            $pickup = $pickups[$reference] ?? null;
            $delivery = $deliveries[$reference] ?? null;

            if ($delivery === null || ($delivery['status'] ?? true) === false) {
                $message = (string) __('deliveries.walim.errors.not_created');
                $entry['shipment']->forceFill(['last_error' => $message])->save();
                $result['failed'][] = $entry['stop']->customerName().': '.$message;

                continue;
            }

            $this->created(
                $entry['shipment'],
                is_numeric($pickup['job_id'] ?? null) ? (int) $pickup['job_id'] : null,
                is_numeric($delivery['job_id'] ?? null) ? (int) $delivery['job_id'] : null,
                $this->string($delivery['job_hash'] ?? null),
                $this->string($delivery['result_tracking_link'] ?? null),
                $this->string($pickup['result_tracking_link'] ?? null),
            );

            $this->audit->log(
                AuditAction::ShipmentSent,
                $entry['shipment'],
                [],
                ['reference' => $reference, 'job_id' => $entry['shipment']->jobId(), 'batch' => true],
            );

            $result['sent']++;
        }
    }

    private function prepare(?Shipment $current, Model $shippable, string $reference, User $actor): Shipment
    {
        $shipment = $current ?? new Shipment(['reference' => $reference]);

        $shipment->forceFill([
            'shippable_type' => $shippable->getMorphClass(),
            'shippable_id' => $shippable->getKey(),
            'provider' => Shipment::PROVIDER_WALIM,
            'status' => ShipmentStatus::Pending,
            'attempts' => $shipment->attempts + 1,
            'sent_by' => $actor->getKey(),
        ])->save();

        return $shipment;
    }

    private function created(
        Shipment $shipment,
        ?int $pickupJobId,
        ?int $deliveryJobId,
        ?string $hash,
        ?string $tracking,
        ?string $pickupTracking,
    ): void {
        $shipment->forceFill([
            'status' => ShipmentStatus::Sent,
            'pickup_job_id' => $pickupJobId,
            'delivery_job_id' => $deliveryJobId,
            'job_hash' => $hash,
            'tracking_link' => $tracking,
            'pickup_tracking_link' => $pickupTracking,
            'provider_status' => null,
            'fleet_name' => null,
            'last_error' => null,
            'sent_at' => now(),
            'cancelled_at' => null,
            'completed_at' => null,
        ])->save();
    }

    /**
     * Take over tasks Walim already holds for this reference instead of
     * creating a second pair.
     *
     * @param  list<array<string, mixed>>  $jobs
     */
    private function adopt(Shipment $shipment, array $jobs): void
    {
        $pickup = null;
        $delivery = null;

        foreach ($jobs as $job) {
            if ((string) ($job['job_type'] ?? '') === '0') {
                $pickup ??= $job;
            } else {
                $delivery ??= $job;
            }
        }

        $this->created(
            $shipment,
            is_numeric($pickup['job_id'] ?? null) ? (int) $pickup['job_id'] : null,
            is_numeric($delivery['job_id'] ?? null) ? (int) $delivery['job_id'] : null,
            $this->string($delivery['job_hash'] ?? null),
            $this->string($delivery['tracking_link'] ?? null),
            $this->string($pickup['tracking_link'] ?? null),
        );

        if (is_numeric($delivery['job_status'] ?? null)) {
            $shipment->forceFill(['provider_status' => (int) $delivery['job_status']])->save();
        }
    }

    private function apply(Shipment $shipment, WalimJobStatus $status, bool $isPickup): void
    {
        if ($status->isGone()) {
            $shipment->forceFill(['status' => ShipmentStatus::Cancelled, 'cancelled_at' => now()])->save();
            $this->alert($shipment, 'cancelled');

            return;
        }

        $onTheWay = $isPickup
            ? $status === WalimJobStatus::Successful
            : in_array($status, [WalimJobStatus::Started, WalimJobStatus::Arrived], true);

        if ($onTheWay) {
            if ($shipment->status !== ShipmentStatus::Delivered) {
                $shipment->forceFill(['status' => ShipmentStatus::OnTheWay])->save();
            }
            $this->move($shipment, OrderStatus::OutForDelivery, DeliveryStatus::Dispatched);

            return;
        }

        if ($status === WalimJobStatus::Successful) {
            $shipment->forceFill(['status' => ShipmentStatus::Delivered, 'completed_at' => now()])->save();
            $this->move($shipment, OrderStatus::Delivered, DeliveryStatus::Delivered);

            return;
        }

        if ($status === WalimJobStatus::Failed) {
            $shipment->forceFill(['status' => ShipmentStatus::Failed])->save();

            if (! $isPickup) {
                $this->move($shipment, null, DeliveryStatus::Failed);
            }

            $this->alert($shipment, $isPickup ? 'pickup_failed' : 'failed');
        }
    }

    /**
     * Move the order or day the shipment belongs to, when that is a legal
     * step; a late or out-of-order webhook is recorded but moves nothing.
     */
    private function move(Shipment $shipment, ?OrderStatus $orderStatus, DeliveryStatus $dayStatus): void
    {
        $shippable = $shipment->shippable;

        if ($shippable instanceof Order) {
            if ($orderStatus !== null && $shippable->status->canTransitionTo($orderStatus)) {
                $this->deliveries->advanceOrder($shippable, $orderStatus, null);
            }

            return;
        }

        if ($shippable instanceof SubscriptionDelivery) {
            if (! $shippable->status->canTransitionTo($dayStatus) || ! $shippable->subscription instanceof Subscription) {
                return;
            }

            $reason = $dayStatus === DeliveryStatus::Failed
                ? (string) __('deliveries.walim.failed_reason', ['fleet' => $shipment->fleet_name ?? '—'], 'ar')
                : null;

            $this->deliveries->markStop($shippable->subscription, $shippable->delivery_date, $dayStatus, null, $reason);
        }
    }

    private function alert(Shipment $shipment, string $problem): void
    {
        $shippable = $shipment->shippable;

        [$reference, $customer, $date] = match (true) {
            $shippable instanceof Order => [
                $shippable->reference(),
                $shippable->user?->name ?? $shippable->deliveryAddress()?->recipientName,
                null,
            ],
            $shippable instanceof SubscriptionDelivery => [
                $shippable->subscription?->reference() ?? $shipment->reference,
                $shippable->subscription?->user?->name,
                $shippable->delivery_date->toDateString(),
            ],
            default => [$shipment->reference, null, null],
        };

        $this->notifier->shipmentAlert([
            'reference' => (string) $reference,
            'customer' => $customer,
            'problem' => $problem,
            'date' => $date,
        ]);
    }

    /**
     * @param  array<string, mixed>  $payload
     */
    private function match(array $payload): ?Shipment
    {
        $reference = trim((string) ($payload['order_id'] ?? ''));

        if ($reference !== '') {
            $shipment = Shipment::query()->where('reference', $reference)->first();

            if ($shipment !== null) {
                return $shipment;
            }
        }

        if (! is_numeric($payload['job_id'] ?? null)) {
            return null;
        }

        $jobId = (int) $payload['job_id'];

        return Shipment::query()
            ->where('pickup_job_id', $jobId)
            ->orWhere('delivery_job_id', $jobId)
            ->first();
    }

    /**
     * @return list<array<string, mixed>>
     *
     * @throws WalimException
     */
    private function liveJobs(string $reference): array
    {
        return array_values(array_filter(
            $this->client->jobsByOrderId([$reference]),
            fn (array $job): bool => is_numeric($job['job_id'] ?? null)
                && ! $this->gone($job)
                && (! isset($job['order_id']) || (string) $job['order_id'] === $reference),
        ));
    }

    /**
     * @param  array<string, mixed>  $job
     */
    private function gone(array $job): bool
    {
        return is_numeric($job['job_status'] ?? null)
            && (WalimJobStatus::tryFrom((int) $job['job_status'])?->isGone() ?? false);
    }

    /**
     * @param  mixed  $entries
     * @return array<string, array<string, mixed>>
     */
    private function byOrderId(mixed $entries): array
    {
        $keyed = [];

        foreach (is_array($entries) ? $entries : [] as $entry) {
            if (is_array($entry) && isset($entry['order_id'])) {
                $keyed[(string) $entry['order_id']] = $entry;
            }
        }

        return $keyed;
    }

    private function dayRecord(SubscriptionStop $stop): SubscriptionDelivery
    {
        return $stop->record ?? SubscriptionDelivery::query()->firstOrCreate(
            [
                'subscription_id' => $stop->subscription->getKey(),
                'delivery_date' => $stop->date->toDateString(),
            ],
            ['status' => DeliveryStatus::Pending],
        );
    }

    /**
     * @throws WalimException
     */
    private function ensure(bool $enabled): void
    {
        if (! $enabled) {
            throw new WalimException((string) __('deliveries.walim.errors.not_enabled'));
        }
    }

    private function string(mixed $value): ?string
    {
        return is_scalar($value) && trim((string) $value) !== '' ? trim((string) $value) : null;
    }
}
