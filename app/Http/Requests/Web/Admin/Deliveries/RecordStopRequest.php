<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Admin\Deliveries;

use App\Modules\Delivery\Enums\DeliveryStatus;
use App\Modules\Delivery\Models\SubscriptionDelivery;
use App\Modules\Delivery\Support\ScheduledDay;
use App\Modules\Subscriptions\Models\Subscription;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

/**
 * Records the outcome of one subscription delivery day.
 *
 * Pending is not accepted: it is the state a day is in before anyone touches
 * it, not something the team reports.
 */
final class RecordStopRequest extends FormRequest
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
            'date' => ['required', 'date'],
            'status' => [
                'required',
                Rule::enum(DeliveryStatus::class),
                Rule::notIn([DeliveryStatus::Pending->value]),
            ],
            'reason' => ['nullable', 'string', 'max:500', 'required_if:status,'.DeliveryStatus::Failed->value],
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator): void {
            $subscription = $this->route('subscription');
            $status = DeliveryStatus::tryFrom((string) $this->input('status', ''));

            if (! $subscription instanceof Subscription || $status === null) {
                return;
            }

            $date = $this->deliveryDate();

            if (! ScheduledDay::exists($subscription, $date->toDateString())) {
                $validator->errors()->add('date', (string) __('deliveries.errors.not_scheduled'));

                return;
            }

            $record = SubscriptionDelivery::query()
                ->where('subscription_id', $subscription->getKey())
                ->whereDate('delivery_date', $date->toDateString())
                ->first();

            $previous = $record instanceof SubscriptionDelivery
                ? $record->status
                : DeliveryStatus::Pending;

            if (! $previous->canTransitionTo($status)) {
                $validator->errors()->add('status', (string) __('deliveries.errors.invalid_transition', [
                    'from' => $previous->label(),
                    'to' => $status->label(),
                ]));
            }
        });
    }

    public function deliveryDate(): Carbon
    {
        return Carbon::parse((string) $this->input('date'))->startOfDay();
    }

    public function status(): DeliveryStatus
    {
        return DeliveryStatus::from((string) $this->validated('status'));
    }

    public function reason(): ?string
    {
        $reason = $this->validated('reason');

        return is_string($reason) && trim($reason) !== '' ? trim($reason) : null;
    }
}
