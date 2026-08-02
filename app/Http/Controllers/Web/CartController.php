<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Modules\Promotions\Exceptions\CouponRejectedException;
use App\Modules\Store\Models\Product;
use App\Modules\Store\Services\CartService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class CartController extends Controller
{
    public function __construct(private readonly CartService $cart) {}

    public function index(): View
    {
        return view('website.pages.cart', [
            'items' => $this->cart->items(),
            'subtotal' => $this->cart->subtotalDisplay(),
            'discount' => $this->cart->discountDisplay(),
            'total' => $this->cart->totalDisplay(),
            'couponCode' => $this->cart->appliedCoupon()?->code(),
            'count' => $this->cart->count(),
            'currency' => (string) __('website.store.currency'),
        ]);
    }

    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $data = $request->validate([
            'product_id' => ['required', 'integer', 'exists:products,id'],
            'quantity' => ['nullable', 'integer', 'min:1', 'max:20'],
        ]);

        $product = Product::query()
            ->where('id', $data['product_id'])
            ->where('is_active', true)
            ->firstOrFail();

        $this->cart->add($product->id, (int) ($data['quantity'] ?? 1));

        return $this->respond($request, __('website.cart.added'));
    }

    public function update(Request $request, Product $product): JsonResponse|RedirectResponse
    {
        $data = $request->validate([
            'quantity' => ['required', 'integer', 'min:0', 'max:20'],
        ]);

        $this->cart->set($product->id, (int) $data['quantity']);

        return $this->respond($request, __('website.cart.updated'));
    }

    public function destroy(Request $request, Product $product): JsonResponse|RedirectResponse
    {
        $this->cart->remove($product->id);

        return $this->respond($request, __('website.cart.removed'));
    }

    public function applyCoupon(Request $request): JsonResponse|RedirectResponse
    {
        $data = $request->validate([
            'code' => ['required', 'string', 'max:64'],
        ]);

        try {
            $this->cart->applyCoupon($data['code']);
        } catch (CouponRejectedException $e) {
            if ($request->wantsJson()) {
                return response()->json(
                    $this->cart->summary() + ['message' => $e->getMessage()],
                    422,
                );
            }

            return back()->withErrors(['code' => $e->getMessage()]);
        }

        return $this->respond($request, __('coupons.messages.applied'));
    }

    public function removeCoupon(Request $request): JsonResponse|RedirectResponse
    {
        $this->cart->removeCoupon();

        return $this->respond($request, __('coupons.messages.removed'));
    }

    private function respond(Request $request, string $message): JsonResponse|RedirectResponse
    {
        if ($request->wantsJson()) {
            return response()->json($this->cart->summary() + ['message' => $message]);
        }

        return back()->with('success', $message);
    }
}
