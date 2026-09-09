<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Modules\Checkout\Enums\CheckoutSource;
use App\Modules\Checkout\Services\CheckoutDraftService;
use App\Modules\Checkout\Services\CheckoutService;
use App\Modules\Orders\Models\Order;
use App\Modules\Payments\Contracts\HostedPaymentGateway;
use App\Modules\Payments\Contracts\PaymentGateway;
use App\Modules\Payments\Enums\PaymentStatus;
use App\Modules\Payments\Exceptions\InvalidPaymentCallbackException;
use App\Modules\Payments\Models\Payment;
use App\Modules\Payments\Services\CompletePaymentService;
use App\Modules\Store\Services\CartService;
use App\Modules\Subscriptions\Models\Subscription;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

/**
 * Browser return from PayTabs after the customer finishes (or abandons) the hosted page.
 *
 * The IPN is the source of truth; this path is for sending the shopper somewhere useful.
 */
final class PayTabsReturnController extends Controller
{
    public function __construct(
        private readonly PaymentGateway $gateway,
        private readonly CompletePaymentService $completions,
        private readonly CheckoutService $checkout,
        private readonly CartService $cart,
        private readonly CheckoutDraftService $drafts,
    ) {}

    public function __invoke(Request $request): RedirectResponse
    {
        if (! $this->gateway instanceof HostedPaymentGateway) {
            abort(404);
        }

        // PayTabs may redirect the browser via GET with payment data in query
        // parameters. The SDK reads from the POST bag exclusively, so when the
        // POST body is empty we copy query parameters across.
        if ($request->isMethod('GET') && $request->query->count() > 0 && $request->request->count() === 0) {
            $request->request->add($request->query->all());
        }

        try {
            $callback = $this->gateway->parseReturn($request);
            $payment = $this->completions->apply($callback);
        } catch (InvalidPaymentCallbackException $e) {
            Log::warning('PayTabs return rejected.', ['error' => $e->getMessage()]);

            return $this->toCart(__('payments.messages.return_invalid'));
        } catch (ModelNotFoundException $e) {
            Log::warning('PayTabs return for an unknown cart.');

            return $this->toCart(__('payments.messages.return_unknown'));
        }

        $paid = $payment->status->isSettled();
        $pending = $payment->status === PaymentStatus::Pending;

        if (! $paid && ! $pending) {
            return $this->failedReturn($payment);
        }

        $payable = $payment->payable;

        if ($paid && $payable instanceof Order) {
            $this->cart->clear();
        }

        if ($paid && $payable instanceof Subscription) {
            $this->drafts->forgetSubscription();
        }

        $message = $this->flash($paid, $pending);
        $flashKey = $paid || $pending ? 'success' : 'error';

        if (! $payable instanceof Order && ! $payable instanceof Subscription) {
            return $this->toCart($message, $flashKey);
        }

        $user = Auth::user();

        if ($user === null || (int) $user->getKey() !== (int) $payment->user_id) {
            return redirect()
                ->route('website.login')
                ->with($flashKey, $message);
        }

        return redirect($this->checkout->confirmationRoute($payable))
            ->with($flashKey, $message);
    }

    private function failedReturn(Payment $payment): RedirectResponse
    {
        $intent = $payment->checkout_intent;
        $source = is_array($intent) ? ($intent['source'] ?? '') : '';
        $message = (string) __('payments.messages.return_failed');

        if ($source === CheckoutSource::Subscription->value) {
            $route = Auth::check() ? 'website.checkout' : 'website.login';

            return redirect()->route($route)->with('error', $message);
        }

        return $this->toCart($message);
    }

    private function flash(bool $paid, bool $pending): string
    {
        if ($paid) {
            return (string) __('payments.messages.paid');
        }

        if ($pending) {
            return (string) __('payments.messages.awaiting');
        }

        return (string) __('payments.messages.return_failed');
    }

    private function toCart(string $message, string $flashKey = 'error'): RedirectResponse
    {
        $route = Auth::check() ? 'website.cart' : 'website.login';

        return redirect()->route($route)->with($flashKey, $message);
    }
}
