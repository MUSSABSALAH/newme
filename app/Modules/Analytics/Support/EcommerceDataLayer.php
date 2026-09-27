<?php

declare(strict_types=1);

namespace App\Modules\Analytics\Support;

use App\Modules\Checkout\Support\VatBreakdown;
use App\Modules\Orders\Models\Order;
use App\Modules\Plans\DTOs\PlanQuote;
use App\Modules\Plans\Models\Plan;
use App\Modules\Settings\Services\SettingsService;
use App\Modules\Store\Models\Product;
use App\Modules\Subscriptions\Models\Subscription;
use App\Support\Money\Rounding;
use Illuminate\Support\Collection;

/**
 * GA4 ecommerce payloads for the browser dataLayer.
 *
 * Pricing is never computed here: every figure is taken from the cart, the plan
 * quote or the placed order and then split the same way the tax invoice splits
 * it, so `value` is always the goods after discounts with VAT and delivery left
 * out. Nothing that identifies the customer enters a payload.
 */
final readonly class EcommerceDataLayer
{
    /** Item category telling a shop product apart from a meal subscription. */
    public const PRODUCT_CATEGORY = 'store_product';

    public const SUBSCRIPTION_CATEGORY = 'meal_subscription';

    /** Item ids stay distinct between the catalogue and the plan list. */
    public const PRODUCT_ID_PREFIX = 'product_';

    public const PLAN_ID_PREFIX = 'plan_';

    public const CURRENCY = 'SAR';

    /** Purchases already handed to the dataLayer in this session. */
    private const PURCHASE_SESSION_KEY = 'analytics.purchases_rendered';

    public function __construct(private SettingsService $settings) {}

    /**
     * @return array{currency: string, value: float, items: list<array<string, mixed>>}
     */
    public function viewItemForProduct(Product $product): array
    {
        $net = $this->netUnitMinor((int) $product->price);

        return [
            'currency' => self::CURRENCY,
            'value' => self::amount($net),
            'items' => [$this->storeItem((int) $product->id, $product->label(), $net, 1)],
        ];
    }

    /**
     * Item template the browser completes with the quantity actually added.
     *
     * @return array{currency: string, item: array<string, mixed>}
     */
    public function addToCartTemplate(Product $product): array
    {
        return [
            'currency' => self::CURRENCY,
            'item' => $this->storeItem(
                (int) $product->id,
                $product->label(),
                $this->netUnitMinor((int) $product->price),
            ),
        ];
    }

    /**
     * The same templates keyed by product id, for cart rows whose quantity the
     * customer can still raise.
     *
     * @param  Collection<int, array<string, mixed>>  $items
     * @return array{currency: string, items: array<string, array<string, mixed>>}
     */
    public function addToCartTemplatesForCart(Collection $items): array
    {
        $templates = [];

        foreach ($items as $item) {
            $templates[(string) $item['id']] = $this->storeItem(
                (int) $item['id'],
                (string) $item['name'],
                $this->netUnitMinor((int) $item['unit_price']),
            );
        }

        return [
            'currency' => self::CURRENCY,
            'items' => $templates,
        ];
    }

    /**
     * @param  Collection<int, array<string, mixed>>  $items
     * @return array<string, mixed>
     */
    public function beginCheckoutForCart(Collection $items, VatBreakdown $vat, ?string $couponCode): array
    {
        $weights = $items->map(static fn (array $item): int => (int) $item['line_total'])->values()->all();
        $exclusiveLines = $vat->allocateGoods($weights);

        $lines = [];
        $goods = 0;

        foreach ($items->values() as $index => $item) {
            $quantity = max(1, (int) $item['qty']);
            $line = (int) ($exclusiveLines[$index] ?? 0);
            $goods += $line;

            $lines[] = $this->storeItem(
                (int) $item['id'],
                (string) $item['name'],
                Rounding::divide($line, $quantity),
                $quantity,
            );
        }

        return $this->withCoupon([
            'currency' => self::CURRENCY,
            'value' => self::amount($goods),
            'items' => $lines,
        ], $couponCode);
    }

    /**
     * @return array<string, mixed>
     */
    public function beginCheckoutForPlan(Plan $plan, PlanQuote $quote): array
    {
        $goods = self::planGoodsMinor(
            $quote->total->toMinor(),
            $quote->tax->toMinor(),
            $quote->deliveryFee->toMinor(),
        );

        return $this->withCoupon([
            'currency' => self::CURRENCY,
            'value' => self::amount($goods),
            'items' => [$this->planItem($plan, $goods)],
        ], $quote->couponCode);
    }

    /**
     * Payload for a store order, or null while the payment is not confirmed.
     *
     * @return array<string, mixed>|null
     */
    public function purchaseForOrder(Order $order): ?array
    {
        if (! $order->payment_status->isSettled()) {
            return null;
        }

        $fee = max(0, (int) $order->delivery_fee_minor);
        $vat = VatBreakdown::fromPaidTotal((int) $order->total_minor, $fee, $this->settings);

        $items = $order->items->values();
        $weights = $items->map(static fn ($item): int => (int) $item->line_total_minor)->all();
        $exclusiveLines = $vat->allocateGoods($weights);

        $lines = [];

        foreach ($items as $index => $item) {
            $quantity = max(1, (int) $item->quantity);
            $line = (int) ($exclusiveLines[$index] ?? 0);

            $lines[] = $this->storeItem(
                $item->product_id === null ? 'item_'.$item->id : (int) $item->product_id,
                (string) $item->name,
                Rounding::divide($line, $quantity),
                $quantity,
            );
        }

        return $this->purchase(
            transactionId: (string) $order->public_id,
            currency: (string) $order->currency,
            goodsMinor: $vat->exclusiveGoodsMinor,
            taxMinor: $vat->taxMinor,
            shippingMinor: $vat->exclusiveFeeMinor,
            couponCode: $order->coupon_code,
            items: $lines,
        );
    }

    /**
     * Payload for a subscription, or null while the payment is not confirmed.
     *
     * @return array<string, mixed>|null
     */
    public function purchaseForSubscription(Subscription $subscription): ?array
    {
        if (! $subscription->payment_status->isSettled()) {
            return null;
        }

        $tax = (int) $subscription->tax_minor;
        $fee = (int) $subscription->delivery_fee_minor;
        $goods = self::planGoodsMinor((int) $subscription->total_minor, $tax, $fee);

        $plan = $subscription->plan;

        $item = $plan instanceof Plan
            ? $this->planItem($plan, $goods)
            : $this->item(
                self::planItemId(null, $subscription->plan_id),
                (string) $subscription->plan_name,
                self::SUBSCRIPTION_CATEGORY,
                $goods,
                1,
            );

        return $this->purchase(
            transactionId: (string) $subscription->public_id,
            currency: (string) $subscription->currency,
            goodsMinor: $goods,
            taxMinor: $tax,
            shippingMinor: $fee,
            couponCode: $subscription->coupon_code,
            items: [$item],
        );
    }

    /**
     * True the first time this transaction is handed to the dataLayer in the
     * current session, so a refresh does not repeat the event.
     *
     * The session is deliberate: a rendered page is no proof the hit reached
     * Google, so nothing is written to the database. GA4 still de-duplicates on
     * `transaction_id` if the session is gone and the customer comes back.
     */
    public static function claimPurchase(string $transactionId): bool
    {
        $rendered = array_values(array_filter(
            (array) session(self::PURCHASE_SESSION_KEY, []),
            static fn ($id): bool => is_string($id),
        ));

        if (in_array($transactionId, $rendered, true)) {
            return false;
        }

        $rendered[] = $transactionId;
        session([self::PURCHASE_SESSION_KEY => array_slice($rendered, -20)]);

        return true;
    }

    /**
     * @param  list<array<string, mixed>>  $items
     * @return array<string, mixed>
     */
    private function purchase(
        string $transactionId,
        string $currency,
        int $goodsMinor,
        int $taxMinor,
        int $shippingMinor,
        ?string $couponCode,
        array $items,
    ): array {
        return $this->withCoupon([
            'transaction_id' => $transactionId,
            'currency' => self::currency($currency),
            'value' => self::amount($goodsMinor),
            'tax' => self::amount($taxMinor),
            'shipping' => self::amount($shippingMinor),
            'items' => $items,
        ], $couponCode);
    }

    /**
     * @return array<string, mixed>
     */
    private function planItem(Plan $plan, int $goodsMinor): array
    {
        return $this->item(
            self::planItemId($plan->public_id, $plan->id),
            $plan->label(),
            self::SUBSCRIPTION_CATEGORY,
            $goodsMinor,
            1,
        );
    }

    /**
     * @return array<string, mixed>
     */
    private function storeItem(int|string $productId, string $name, int $priceMinor, ?int $quantity = null): array
    {
        return $this->item(
            self::productItemId($productId),
            $name,
            self::PRODUCT_CATEGORY,
            $priceMinor,
            $quantity,
        );
    }

    /**
     * @return array<string, mixed>
     */
    private function item(string $id, string $name, string $category, int $priceMinor, ?int $quantity): array
    {
        $item = [
            'item_id' => $id,
            'item_name' => $name,
            'item_category' => $category,
            'price' => self::amount($priceMinor),
        ];

        if ($quantity !== null) {
            $item['quantity'] = $quantity;
        }

        return $item;
    }

    /**
     * @param  array<string, mixed>  $payload
     * @return array<string, mixed>
     */
    private function withCoupon(array $payload, ?string $couponCode): array
    {
        if ($couponCode !== null && $couponCode !== '') {
            $payload['coupon'] = $couponCode;
        }

        return $payload;
    }

    /**
     * A shelf price with VAT taken out when prices are shown tax-inclusive, so
     * every event reports the same net figure the invoice does.
     */
    private function netUnitMinor(int $priceMinor): int
    {
        return VatBreakdown::forCharge(max(0, $priceMinor), 0, $this->settings)->exclusiveGoodsMinor;
    }

    /**
     * What is left of a subscription once VAT and delivery are removed, exactly
     * as the subscription invoice presents it.
     */
    private static function planGoodsMinor(int $totalMinor, int $taxMinor, int $deliveryMinor): int
    {
        return max(0, $totalMinor - $taxMinor - $deliveryMinor);
    }

    private static function productItemId(int|string $productId): string
    {
        return self::PRODUCT_ID_PREFIX.$productId;
    }

    private static function planItemId(?string $publicId, ?int $planId): string
    {
        if (is_string($publicId) && $publicId !== '') {
            return self::PLAN_ID_PREFIX.$publicId;
        }

        return self::PLAN_ID_PREFIX.($planId ?? 'unknown');
    }

    private static function currency(string $currency): string
    {
        $currency = strtoupper(trim($currency));

        return $currency === '' ? self::CURRENCY : $currency;
    }

    private static function amount(int $minor): float
    {
        return round($minor / 100, 2);
    }
}
