<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Admin\Orders;

use App\Modules\Orders\Enums\OrderStatus;
use App\Modules\Orders\Models\Order;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

final class UpdateOrderStatusRequest extends FormRequest
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
            'status' => ['required', Rule::enum(OrderStatus::class)],
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator): void {
            /** @var Order|null $order */
            $order = $this->route('order');
            $status = OrderStatus::tryFrom((string) $this->input('status', ''));

            if (! $order instanceof Order || $status === null) {
                return;
            }

            if (! $order->status->canTransitionTo($status)) {
                $validator->errors()->add(
                    'status',
                    (string) __('orders.errors.invalid_transition', [
                        'from' => $order->status->label(),
                        'to' => $status->label(),
                    ]),
                );
            }
        });
    }

    public function status(): OrderStatus
    {
        return OrderStatus::from((string) $this->validated('status'));
    }
}
