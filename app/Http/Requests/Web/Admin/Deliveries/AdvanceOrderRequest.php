<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Admin\Deliveries;

use App\Modules\Orders\Enums\OrderStatus;
use App\Modules\Orders\Models\Order;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

/**
 * Moves a store order along from the shipping board.
 *
 * Only the two fulfillment steps are accepted here: confirming, preparing and
 * cancelling an order belong to the order desk, not to the person carrying it.
 */
final class AdvanceOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'date' => ['nullable', 'date'],
            'status' => [
                'required',
                Rule::in([
                    OrderStatus::OutForDelivery->value,
                    OrderStatus::Delivered->value,
                ]),
            ],
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator): void {
            $order = $this->route('order');
            $status = OrderStatus::tryFrom((string) $this->input('status', ''));

            if (! $order instanceof Order || $status === null) {
                return;
            }

            if (! $order->status->canTransitionTo($status)) {
                $validator->errors()->add('status', (string) __('orders.errors.invalid_transition', [
                    'from' => $order->status->label(),
                    'to' => $status->label(),
                ]));
            }
        });
    }

    public function status(): OrderStatus
    {
        return OrderStatus::from((string) $this->validated('status'));
    }

    public function deliveryDate(): ?Carbon
    {
        $date = $this->validated('date');

        return is_string($date) && trim($date) !== ''
            ? Carbon::parse($date)->startOfDay()
            : null;
    }
}
