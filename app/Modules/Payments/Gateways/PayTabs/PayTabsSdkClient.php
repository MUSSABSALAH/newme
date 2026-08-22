<?php

declare(strict_types=1);

namespace App\Modules\Payments\Gateways\PayTabs;

use App\Modules\Payments\Contracts\PayTabsClient;
use App\Modules\Payments\DTOs\ChargeRequest;
use App\Modules\Payments\DTOs\ChargeResult;
use App\Modules\Payments\DTOs\PayerDetails;
use App\Modules\Payments\DTOs\PaymentCallback;
use App\Modules\Payments\Enums\PaymentDecline;
use App\Modules\Payments\Enums\PaymentMethod;
use App\Modules\Payments\Exceptions\InvalidPaymentCallbackException;
use Illuminate\Support\Facades\Log;
use Paytabs\Laravel\Exceptions\InvalidPayloadException;
use Paytabs\Laravel\Facades\Paytabs;
use Paytabs\Sdk\Enums\Language;
use Paytabs\Sdk\Enums\TranClass;
use Paytabs\Sdk\Enums\TranType;
use Paytabs\Sdk\Exceptions\HttpRequestException;
use Paytabs\Sdk\Exceptions\InvalidConfigurationException;
use Paytabs\Sdk\Exceptions\InvalidSignatureException;
use Paytabs\Sdk\PaymentMethod\AbstractMethod;
use Paytabs\Sdk\PaymentMethod\PaymentMethodsFactory;
use Paytabs\Sdk\Request\Payload\Parts\CustomerDetails;
use Paytabs\Sdk\Request\Payload\PayloadsFactory;
use Paytabs\Sdk\Request\RequestsFactory;
use Paytabs\Sdk\Response\Payload\Payloads\Payment\Completed;
use Throwable;

/**
 * Talks to PayTabs through the official Laravel SDK.
 */
final class PayTabsSdkClient implements PayTabsClient
{
    public function createHostedPage(ChargeRequest $request): ChargeResult
    {
        $payer = $request->payer;
        $returnUrl = $request->returnUrl;

        if (! $payer instanceof PayerDetails || ! is_string($returnUrl) || $returnUrl === '') {
            return ChargeResult::declined('', PaymentDecline::GatewayError);
        }

        $payload = PayloadsFactory::createHostedPage();
        $payload
            ->buildTransaction(TranType::Sale, TranClass::Ecom)
            ->buildCart(
                $request->reference,
                $request->amount->currency->code,
                (float) $request->amount->format(),
                $request->description,
            )
            ->buildCustomerDetails(
                CustomerDetails::init($payer->name, $payer->phone, $payer->email)
                    ->setAddress(
                        $payer->country,
                        $payer->state,
                        $payer->city,
                        $payer->street,
                        $payer->zip,
                    ),
            )
            ->buildHideShipping(true)
            ->buildURLs($returnUrl, $request->callbackUrl, true)
            ->buildPaypageConfig($request->language === 'ar' ? Language::Arabic : Language::English)
            ->buildPaymentMethod($this->paymentMethod($request->method));

        try {
            $response = Paytabs::submitRequest(RequestsFactory::createPaymentRequest($payload));
        } catch (InvalidConfigurationException|HttpRequestException $e) {
            Log::error('PayTabs hosted page request failed.', ['error' => $e->getMessage()]);

            return ChargeResult::declined('', PaymentDecline::GatewayError);
        } catch (Throwable $e) {
            Log::error('PayTabs hosted page request failed.', ['error' => $e->getMessage()]);

            return ChargeResult::declined('', PaymentDecline::GatewayError);
        }

        if ($response->isFailure()) {
            $failure = $response->getFailure();
            Log::warning('PayTabs rejected the hosted page request.', [
                'code' => $failure->code,
                'message' => $failure->message,
            ]);

            return ChargeResult::declined('', PaymentDecline::GatewayError);
        }

        if ($response->isRedirect()) {
            $redirect = $response->getRedirect();

            return ChargeResult::redirect($redirect->redirect_url, $redirect->tran_ref);
        }

        $mapped = $response->getPayloadMapped();

        if ($mapped instanceof Completed && $mapped->isPaymentSuccessful()) {
            return ChargeResult::approved($mapped->tran_ref);
        }

        return ChargeResult::declined(
            $mapped instanceof Completed ? $mapped->tran_ref : '',
            PaymentDecline::GatewayError,
        );
    }

    public function parseBrowserReturn(): PaymentCallback
    {
        try {
            return PaymentCallback::fromBrowser(
                Paytabs::getResultProcessor()->handleRedirect(),
            );
        } catch (InvalidSignatureException|InvalidPayloadException $e) {
            throw new InvalidPaymentCallbackException($e->getMessage(), 0, $e);
        }
    }

    private function paymentMethod(PaymentMethod $method): AbstractMethod
    {
        return match ($method) {
            PaymentMethod::Mada => PaymentMethodsFactory::createMadaMethod(),
            PaymentMethod::ApplePay => PaymentMethodsFactory::createApplePayMethod(),
            default => PaymentMethodsFactory::createCardMethod(),
        };
    }
}
