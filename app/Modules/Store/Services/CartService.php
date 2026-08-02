<?php

declare(strict_types=1);

namespace App\Modules\Store\Services;

use App\Models\User;
use App\Modules\Promotions\DTOs\AppliedCoupon;
use App\Modules\Promotions\Enums\CouponScope;
use App\Modules\Promotions\Exceptions\CouponRejectedException;
use App\Modules\Promotions\Services\CouponRedemptionService;
use App\Modules\Store\Models\Product;
use App\Support\Money\Money;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

/**
 * Session-backed shopping cart for the public store.
 *
 * The cart holds a simple map of product id => quantity in the session; product
 * details and prices are always resolved live from the database so the cart
 * never trusts stale prices. Only the coupon *code* is kept in the session —
 * the discount is recomputed on every read.
 */
final class CartService
{
    private const SESSION_KEY = 'store_cart';

    private const COUPON_KEY = 'store_coupon';

    private const MAX_QTY = 20;

    public function __construct(private readonly CouponRedemptionService $coupons) {}

    public function add(int $productId, int $quantity = 1): void
    {
        $quantity = max(1, $quantity);
        $cart = $this->raw();
        $cart[$productId] = min(self::MAX_QTY, ($cart[$productId] ?? 0) + $quantity);
        $this->save($cart);
    }

    public function set(int $productId, int $quantity): void
    {
        $cart = $this->raw();

        if ($quantity <= 0) {
            unset($cart[$productId]);
        } else {
            $cart[$productId] = min(self::MAX_QTY, $quantity);
        }

        $this->save($cart);
    }

    public function remove(int $productId): void
    {
        $cart = $this->raw();
        unset($cart[$productId]);
        $this->save($cart);
    }

    public function clear(): void
    {
        session()->forget(self::SESSION_KEY);
        $this->removeCoupon();
    }

    /**
     * Total number of units across all lines (used for the header badge).
     */
    public function count(): int
    {
        return array_sum($this->raw());
    }

    /**
     * Resolved line items (active products only). Prunes anything that has since
     * been removed or deactivated.
     *
     * @return Collection<int, array<string, mixed>>
     */
    public function items(): Collection
    {
        $cart = $this->raw();

        if ($cart === []) {
            return collect();
        }

        $products = Product::query()
            ->with('category.parent')
            ->whereIn('id', array_keys($cart))
            ->where('is_active', true)
            ->get()
            ->keyBy('id');

        $items = collect();
        $pruned = [];

        foreach ($cart as $id => $qty) {
            $product = $products->get($id);

            if (! $product instanceof Product) {
                continue;
            }

            $qty = (int) $qty;
            $lineMinor = $product->price * $qty;
            $pruned[$id] = $qty;

            $items->push([
                'id' => $product->id,
                'slug' => $product->slug,
                'name' => $product->label(),
                'image_url' => $product->imageUrl(),
                'url' => route('website.product.show', ['product' => $product->slug]),
                'unit_price' => $product->price,
                'unit_price_display' => Money::fromMinor($product->price)->format(),
                'qty' => $qty,
                'line_total' => $lineMinor,
                'line_total_display' => Money::fromMinor($lineMinor)->format(),
            ]);
        }

        // Persist the pruned cart if entries were dropped.
        if (count($pruned) !== count($cart)) {
            $this->save($pruned);
        }

        return $items;
    }

    public function subtotalMinor(): int
    {
        return (int) $this->items()->sum('line_total');
    }

    public function subtotalDisplay(): string
    {
        return Money::fromMinor($this->subtotalMinor())->format();
    }

    /**
     * Validate a code against the current basket and remember it.
     *
     * @throws CouponRejectedException
     */
    public function applyCoupon(string $code): AppliedCoupon
    {
        $applied = $this->coupons->apply(
            $code,
            CouponScope::Store,
            Money::fromMinor($this->subtotalMinor()),
            $this->currentCustomer(),
        );

        session([self::COUPON_KEY => $applied->code()]);

        return $applied;
    }

    public function removeCoupon(): void
    {
        session()->forget(self::COUPON_KEY);
    }

    public function couponCode(): ?string
    {
        $code = session(self::COUPON_KEY);

        return is_string($code) && $code !== '' ? $code : null;
    }

    /**
     * The coupon currently in effect, or null when there is none or the stored
     * code no longer qualifies (e.g. the basket dropped below its minimum).
     */
    public function appliedCoupon(): ?AppliedCoupon
    {
        $code = $this->couponCode();

        if ($code === null) {
            return null;
        }

        return $this->coupons->resolveQuietly(
            $code,
            CouponScope::Store,
            Money::fromMinor($this->subtotalMinor()),
            $this->currentCustomer(),
        );
    }

    public function discountMinor(): int
    {
        return $this->appliedCoupon()?->discount->toMinor() ?? 0;
    }

    public function discountDisplay(): string
    {
        return Money::fromMinor($this->discountMinor())->format();
    }

    public function totalMinor(): int
    {
        return max(0, $this->subtotalMinor() - $this->discountMinor());
    }

    public function totalDisplay(): string
    {
        return Money::fromMinor($this->totalMinor())->format();
    }

    /**
     * Compact summary for JSON responses (header badge + cart totals).
     *
     * @return array{count: int, subtotal: string, discount: string, total: string, coupon_code: string|null}
     */
    public function summary(): array
    {
        $applied = $this->appliedCoupon();
        $subtotal = $this->subtotalMinor();
        $discount = $applied?->discount->toMinor() ?? 0;

        return [
            'count' => $this->count(),
            'subtotal' => Money::fromMinor($subtotal)->format(),
            'discount' => Money::fromMinor($discount)->format(),
            'total' => Money::fromMinor(max(0, $subtotal - $discount))->format(),
            'coupon_code' => $applied?->code(),
        ];
    }

    /**
     * The signed-in customer, if any, so per-customer limits apply while
     * browsing. Staff sessions are ignored: they are not buyers.
     */
    private function currentCustomer(): ?User
    {
        $user = Auth::user();

        return $user instanceof User && $user->isCustomer() ? $user : null;
    }

    /**
     * @return array<int, int>
     */
    private function raw(): array
    {
        $cart = session(self::SESSION_KEY, []);

        return is_array($cart) ? $cart : [];
    }

    /**
     * @param  array<int, int>  $cart
     */
    private function save(array $cart): void
    {
        session([self::SESSION_KEY => $cart]);
    }
}
