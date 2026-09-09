<?php

declare(strict_types=1);

namespace App\Modules\Orders\Services;

use App\Models\User;
use App\Modules\Addresses\Models\Address;
use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Audit\Services\AuditService;
use App\Modules\Orders\Enums\OrderStatus;
use App\Modules\Orders\Exceptions\EmptyCartException;
use App\Modules\Orders\Models\Order;
use App\Modules\Payments\Enums\PaymentMethod;
use App\Modules\Payments\Enums\PaymentStatus;
use App\Modules\Payments\Models\Payment;
use App\Modules\Promotions\Enums\CouponScope;
use App\Modules\Promotions\Services\CouponRedemptionService;
use App\Modules\Store\Services\CartService;
use App\Support\Money\Money;
use Illuminate\Support\Facades\DB;

/**
 * Turns the session cart into a persisted store order.
 *
 * Prices are taken from the live cart line items (which resolve from the
 * database), snapshotted onto the order so later product/price changes never
 * alter a placed order. Any coupon is re-validated here rather than trusted
 * from the session, and silently dropped if it no longer qualifies. The
 * delivery address is copied onto the order for the same reason.
 *
 * The order is written with its payment still pending; charging it and clearing
 * the cart belong to the checkout flow.
 */
final class OrderService
{
    public function __construct(
        private readonly AuditService $audit,
        private readonly CouponRedemptionService $coupons,
    ) {}

    /**
     * @throws EmptyCartException
     */
    public function placeFromCart(
        User $user,
        CartService $cart,
        Address $address,
        PaymentMethod $method,
        ?string $note = null,
    ): Order {
        $items = $cart->items();

        if ($items->isEmpty()) {
            throw new EmptyCartException;
        }

        return DB::transaction(function () use ($user, $cart, $items, $address, $method, $note): Order {
            $subtotal = $cart->subtotalMinor();
            $code = $cart->couponCode();

            $applied = $code === null ? null : $this->coupons->resolveQuietly(
                $code,
                CouponScope::Store,
                Money::fromMinor($subtotal),
                $user,
            );

            $discount = $applied?->discount->toMinor() ?? 0;

            $order = new Order;
            $order->user_id = $user->getKey();
            $order->address_id = $address->getKey();
            $order->shipping_address = $address->snapshot();
            $order->status = OrderStatus::Pending;
            $order->currency = 'SAR';
            $order->coupon_id = $applied?->coupon->getKey();
            $order->coupon_code = $applied?->code();
            $order->subtotal_minor = $subtotal;
            $order->discount_minor = $discount;
            $order->total_minor = max(0, $subtotal - $discount);
            $order->payment_method = $method;
            $order->payment_status = PaymentStatus::Pending;
            $order->note = $note;
            $order->placed_at = now();
            $order->save();

            foreach ($items as $item) {
                $order->items()->create([
                    'product_id' => $item['id'],
                    'name' => $item['name'],
                    'unit_price_minor' => $item['unit_price'],
                    'quantity' => $item['qty'],
                    'line_total_minor' => $item['line_total'],
                ]);
            }

            if ($applied !== null) {
                $this->coupons->redeem($applied->coupon, $user, $order, $applied->discount);
            }

            $this->audit->log(AuditAction::OrderPlaced, $order, [], [
                'subtotal_minor' => $subtotal,
                'discount_minor' => $discount,
                'total_minor' => $order->total_minor,
                'coupon_code' => $order->coupon_code,
                'payment_method' => $method->value,
                'items' => $items->count(),
            ]);

            return $order;
        });
    }

    /**
     * Persist an order from a hosted-checkout snapshot after the money is in.
     *
     * Totals come from the snapshot so they match what PayTabs charged, even if
     * catalogue prices moved in the meantime.
     *
     * @param  array<string, mixed>  $intent
     */
    public function placeFromSnapshot(
        User $user,
        Address $address,
        PaymentMethod $method,
        array $intent,
        ?string $note = null,
    ): Order {
        $items = is_array($intent['items'] ?? null) ? $intent['items'] : [];

        if ($items === []) {
            throw new EmptyCartException;
        }

        $note = is_string($intent['note'] ?? null) ? $intent['note'] : $note;
        $subtotal = (int) ($intent['subtotal_minor'] ?? 0);
        $discount = (int) ($intent['discount_minor'] ?? 0);
        $total = max(0, (int) ($intent['total_minor'] ?? max(0, $subtotal - $discount)));
        $code = $intent['coupon_code'] ?? null;
        $code = is_string($code) && $code !== '' ? $code : null;

        return DB::transaction(function () use ($user, $address, $method, $note, $items, $subtotal, $discount, $total, $code): Order {
            $applied = $code === null ? null : $this->coupons->resolveQuietly(
                $code,
                CouponScope::Store,
                Money::fromMinor($subtotal),
                $user,
            );

            $order = new Order;
            $order->user_id = $user->getKey();
            $order->address_id = $address->getKey();
            $order->shipping_address = $address->snapshot();
            $order->status = OrderStatus::Pending;
            $order->currency = 'SAR';
            $order->coupon_id = $applied?->coupon->getKey();
            $order->coupon_code = $applied?->code() ?? $code;
            $order->subtotal_minor = $subtotal;
            $order->discount_minor = $discount;
            $order->total_minor = $total;
            $order->payment_method = $method;
            $order->payment_status = PaymentStatus::Pending;
            $order->note = $note;
            $order->placed_at = now();
            $order->save();

            foreach ($items as $item) {
                if (! is_array($item)) {
                    continue;
                }

                $order->items()->create([
                    'product_id' => (int) ($item['product_id'] ?? 0) ?: null,
                    'name' => (string) ($item['name'] ?? ''),
                    'unit_price_minor' => (int) ($item['unit_price_minor'] ?? 0),
                    'quantity' => (int) ($item['quantity'] ?? 1),
                    'line_total_minor' => (int) ($item['line_total_minor'] ?? 0),
                ]);
            }

            if ($applied !== null) {
                try {
                    $this->coupons->redeem($applied->coupon, $user, $order, $applied->discount);
                } catch (\App\Modules\Promotions\Exceptions\CouponRejectedException) {
                    // The customer already paid; do not block the order if the
                    // coupon ran out between checkout and the gateway return.
                }
            }

            $this->audit->log(AuditAction::OrderPlaced, $order, [], [
                'subtotal_minor' => $subtotal,
                'discount_minor' => $discount,
                'total_minor' => $order->total_minor,
                'coupon_code' => $order->coupon_code,
                'payment_method' => $method->value,
                'items' => count($items),
            ]);

            return $order;
        });
    }

    /**
     * Record the outcome of the charge on the order.
     *
     * A settled payment confirms a still-pending order; a deferred method
     * (cash on delivery) leaves it pending until the courier collects.
     * Orders already further along the fulfillment path are not moved back.
     */
    public function settle(Order $order, Payment $payment): Order
    {
        $order->payment_status = $payment->status;

        if ($payment->status->isSettled() && $order->status === OrderStatus::Pending) {
            $order->status = OrderStatus::Confirmed;
        }

        $order->save();

        return $order;
    }

    /**
     * Move the order along the in-house delivery path.
     *
     * @throws \InvalidArgumentException
     */
    public function updateStatus(Order $order, OrderStatus $status, User $actor): Order
    {
        $previous = $order->status;

        if ($previous === $status) {
            return $order;
        }

        if (! $previous->canTransitionTo($status)) {
            throw new \InvalidArgumentException(
                "Cannot move order from {$previous->value} to {$status->value}."
            );
        }

        $order->status = $status;

        // Stamped here so the shipping board can report a past day by what it
        // handed over, not only by what is still open.
        if ($status === OrderStatus::Delivered) {
            $order->delivered_at = now();
        }

        $order->save();

        $this->audit->log(
            AuditAction::OrderStatusUpdated,
            $order,
            ['status' => $previous->value],
            [
                'status' => $status->value,
                'actor_id' => $actor->getKey(),
            ],
        );

        return $order;
    }
}
