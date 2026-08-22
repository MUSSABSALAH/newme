<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Modules\Checkout\Services\CheckoutService;
use App\Modules\Orders\Models\Order;
use App\Modules\Payments\Contracts\HostedPaymentGateway;
use App\Modules\Payments\Contracts\PaymentGateway;
use App\Modules\Payments\Enums\PaymentStatus;
use App\Modules\Payments\Exceptions\InvalidPaymentCallbackException;
use App\Modules\Payments\Services\CompletePaymentService;
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
    ) {}

    public function __invoke(Request $request): RedirectResponse
    {
        if (! $this->gateway instanceof HostedPaymentGateway) {
            abort(404);
        }

        try {
            $callback = $this->gateway->parseReturn($request);
            $payment = $this->completions->apply($callback);
        } catch (InvalidPaymentCallbackException $e) {
            Log::warning('PayTabs return rejected.', ['error' => $e->getMessage()]);

            return $this->toAccount(__('payments.messages.return_invalid'));
        } catch (ModelNotFoundException $e) {
            Log::warning('PayTabs return for an unknown cart.');

            return $this->toAccount(__('payments.messages.return_unknown'));
        }

        $payable = $payment->payable;

        if (! $payable instanceof Order && ! $payable instanceof Subscription) {
            return $this->toAccount(__('payments.messages.return_unknown'));
        }

        $paid = $payment->status->isSettled();
        $pending = $payment->status === PaymentStatus::Pending;
        $message = $this->flash($paid, $pending);
        $flashKey = $paid || $pending ? 'success' : 'error';

        $user = Auth::user();

        if ($user === null || (int) $user->getKey() !== (int) $payment->user_id) {
            return redirect()
                ->route('website.login')
                ->with($flashKey, $message);
        }

        return redirect($this->checkout->confirmationRoute($payable))
            ->with($flashKey, $message);
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

    private function toAccount(string $message): RedirectResponse
    {
        $route = Auth::check() ? 'website.account' : 'website.login';

        return redirect()->route($route)->with('error', $message);
    }
}
