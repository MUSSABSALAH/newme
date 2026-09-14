<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Checkout;

use App\Modules\Addresses\Models\Address;
use App\Modules\Checkout\Enums\FulfillmentMethod;
use App\Modules\Payments\Contracts\PaymentGateway;
use App\Modules\Payments\Enums\PaymentMethod;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * The final PLACE ORDER submission: which address, which payment method and,
 * for card methods, the card itself.
 *
 * Card details are validated for shape only. Whether the card is accepted is
 * the gateway's answer, so an expired date is not rejected here — it comes back
 * as a decline, exactly as a real provider would report it.
 */
final class PlaceOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $number = $this->input('card_number');

        if (is_string($number)) {
            $this->merge(['card_number' => preg_replace('/\D/', '', $number)]);
        }
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $cardMethods = array_values(array_map(
            static fn (PaymentMethod $method): string => $method->value,
            array_filter(PaymentMethod::cases(), static fn (PaymentMethod $method): bool => $method->requiresCard()),
        ));

        return [
            'fulfillment' => ['nullable', Rule::in(FulfillmentMethod::values())],
            'address' => ['required_unless:fulfillment,'.FulfillmentMethod::Pickup->value, 'nullable', 'string', 'max:40'],
            'payment_method' => ['required', Rule::in(PaymentMethod::values())],
            'card_number' => [$this->cardRule($cardMethods), 'nullable', 'digits_between:12,19'],
            'card_holder' => [$this->cardRule($cardMethods), 'nullable', 'string', 'max:120'],
            'card_expiry_month' => [$this->cardRule($cardMethods), 'nullable', 'integer', 'between:1,12'],
            'card_expiry_year' => [$this->cardRule($cardMethods), 'nullable', 'integer', 'between:2000,2100'],
            'card_cvv' => [$this->cardRule($cardMethods), 'nullable', 'digits_between:3,4'],
            'note' => ['nullable', 'string', 'max:1000'],
            'terms' => ['accepted'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'fulfillment' => (string) __('checkout.fields.fulfillment'),
            'address' => (string) __('checkout.fields.address'),
            'payment_method' => (string) __('checkout.fields.payment_method'),
            'card_number' => (string) __('checkout.fields.card_number'),
            'card_holder' => (string) __('checkout.fields.card_holder'),
            'card_expiry_month' => (string) __('checkout.fields.card_expiry_month'),
            'card_expiry_year' => (string) __('checkout.fields.card_expiry_year'),
            'card_cvv' => (string) __('checkout.fields.card_cvv'),
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'terms.accepted' => (string) __('checkout.errors.terms'),
        ];
    }

    /**
     * @return list<callable>
     */
    public function after(): array
    {
        return [
            function (Validator $validator): void {
                if ($this->fulfillmentInput() === FulfillmentMethod::Pickup) {
                    return;
                }

                $publicId = $this->input('address');
                if (! is_string($publicId) || $publicId === '') {
                    return;
                }

                $address = Address::query()
                    ->where('user_id', $this->user()?->getKey())
                    ->where('public_id', $publicId)
                    ->first();

                if ($address instanceof Address && ! $address->isDeliverable()) {
                    $validator->errors()->add('address', (string) __('addresses.errors.outside_riyadh'));
                }
            },
        ];
    }

    public function fulfillment(): FulfillmentMethod
    {
        return $this->fulfillmentInput() ?? FulfillmentMethod::Delivery;
    }

    public function paymentMethod(): PaymentMethod
    {
        return PaymentMethod::from((string) $this->validated('payment_method'));
    }

    private function fulfillmentInput(): ?FulfillmentMethod
    {
        return FulfillmentMethod::tryFrom((string) $this->input('fulfillment'));
    }

    /**
     * @return array<string, mixed>
     */
    public function card(): array
    {
        return [
            'number' => (string) $this->validated('card_number'),
            'holder' => (string) $this->validated('card_holder'),
            'expiry_month' => (int) $this->validated('card_expiry_month'),
            'expiry_year' => (int) $this->validated('card_expiry_year'),
            'cvv' => (string) $this->validated('card_cvv'),
        ];
    }

    /**
     * @param  list<string>  $cardMethods
     */
    private function cardRule(array $cardMethods): string
    {
        if (app(PaymentGateway::class)->usesHostedCheckout()) {
            return 'nullable';
        }

        return 'required_if:payment_method,'.implode(',', $cardMethods);
    }
}
