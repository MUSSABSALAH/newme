<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Account\SubscribeRequest;
use App\Http\Requests\Web\Checkout\AddressRequest;
use App\Http\Requests\Web\Checkout\PlaceOrderRequest;
use App\Models\User;
use App\Modules\Addresses\DTOs\AddressData;
use App\Modules\Addresses\Models\Address;
use App\Modules\Addresses\Services\AddressService;
use App\Modules\Checkout\DTOs\SubscriptionDraft;
use App\Modules\Checkout\Exceptions\NothingToCheckoutException;
use App\Modules\Checkout\Services\CheckoutDraftService;
use App\Modules\Checkout\Services\CheckoutService;
use App\Modules\Orders\Exceptions\EmptyCartException;
use App\Modules\Payments\DTOs\CardDetails;
use App\Modules\Payments\Enums\PaymentMethod;
use App\Modules\Payments\Exceptions\PaymentDeclinedException;
use App\Modules\Subscriptions\Models\Subscription;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

/**
 * The checkout the store cart and the subscribe wizard both end in.
 *
 * Signing in comes first (the auth middleware sees to that), then the address,
 * then payment, then PLACE ORDER. A wizard selection is parked in the session
 * before the sign-in redirect so a guest never loses it.
 */
final class CheckoutController extends Controller
{
    public function __construct(
        private readonly CheckoutService $checkout,
        private readonly CheckoutDraftService $drafts,
        private readonly AddressService $addresses,
    ) {}

    /**
     * Hand a subscribe-wizard selection over to checkout.
     *
     * Open to guests on purpose: the draft is stored, then the customer is sent
     * to sign in or register and returns to the checkout with it intact.
     */
    public function startSubscription(SubscribeRequest $request): JsonResponse
    {
        $this->drafts->putSubscription(SubscriptionDraft::fromArray($request->validated()));

        $user = $request->user();
        $signedIn = $user instanceof User && $user->isCustomer();

        return response()->json([
            'redirect' => $signedIn
                ? route('website.checkout')
                : route('website.login', ['next' => 'checkout']),
        ]);
    }

    /**
     * Abandon the parked subscription and go back to the wizard.
     */
    public function destroySubscription(): RedirectResponse
    {
        $this->drafts->forgetSubscription();

        return redirect()->route('website.subscribe');
    }

    public function show(): View|RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();

        try {
            $summary = $this->checkout->summary();
        } catch (NothingToCheckoutException $e) {
            return redirect()
                ->route('website.cart')
                ->with('error', $e->getMessage());
        }

        return view('website.pages.checkout', [
            'user' => $user,
            'summary' => $summary,
            'addresses' => $this->addresses->forUser($user),
            'selectedAddress' => $this->addresses->defaultFor($user),
            'methods' => $this->methods(),
        ]);
    }

    public function storeAddress(AddressRequest $request): RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();

        $this->addresses->create($user, AddressData::fromArray($request->validated()));

        return redirect()
            ->route('website.checkout')
            ->with('success', __('checkout.messages.address_saved'));
    }

    public function store(PlaceOrderRequest $request): RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();

        $address = Address::query()
            ->where('user_id', $user->getKey())
            ->where('public_id', $request->validated('address'))
            ->firstOrFail();

        $method = $request->paymentMethod();
        $card = $method->requiresCard() ? CardDetails::fromArray($request->card()) : null;

        try {
            $placed = $this->checkout->place(
                $user,
                $address,
                $method,
                $card,
                $request->validated('note'),
            );
        } catch (PaymentDeclinedException $e) {
            return back()
                ->withInput($request->except(['card_number', 'card_cvv']))
                ->with('error', $e->getMessage());
        } catch (EmptyCartException|NothingToCheckoutException $e) {
            return redirect()
                ->route('website.cart')
                ->with('error', $e->getMessage());
        }

        return redirect($this->checkout->confirmationRoute($placed))
            ->with('success', $placed instanceof Subscription
                ? __('subscriptions.messages.created')
                : __('orders.messages.placed'));
    }

    /**
     * The methods on offer, in the order configured.
     *
     * @return list<PaymentMethod>
     */
    private function methods(): array
    {
        $configured = config('payments.methods', []);

        $methods = array_map(
            static fn ($value): ?PaymentMethod => PaymentMethod::tryFrom((string) $value),
            is_array($configured) ? $configured : [],
        );

        $methods = array_values(array_filter(
            $methods,
            static fn (?PaymentMethod $method): bool => $method instanceof PaymentMethod,
        ));

        return $methods === [] ? PaymentMethod::cases() : $methods;
    }
}
