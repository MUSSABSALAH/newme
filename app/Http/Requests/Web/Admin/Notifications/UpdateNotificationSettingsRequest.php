<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Admin\Notifications;

use App\Modules\Notifications\Enums\NotificationEvent;
use Illuminate\Foundation\Http\FormRequest;

final class UpdateNotificationSettingsRequest extends FormRequest
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
            'staff_emails_enabled' => ['sometimes', 'boolean'],
            'daily_email_limit' => ['required', 'integer', 'min:0', 'max:100000'],
            'email_order_placed' => ['sometimes', 'boolean'],
            'email_subscription_started' => ['sometimes', 'boolean'],
            'email_subscription_paused' => ['sometimes', 'boolean'],
            'email_subscription_meals_changed' => ['sometimes', 'boolean'],
            'recipients' => ['sometimes', 'array'],
            'recipients.*' => ['array'],
            'recipients.*.*' => ['integer'],
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function settings(): array
    {
        $validated = $this->validated();

        return [
            'notifications.staff_emails_enabled' => $this->boolean('staff_emails_enabled'),
            'notifications.daily_email_limit' => (int) $validated['daily_email_limit'],
            'notifications.email_order_placed' => $this->boolean('email_order_placed'),
            'notifications.email_subscription_started' => $this->boolean('email_subscription_started'),
            'notifications.email_subscription_paused' => $this->boolean('email_subscription_paused'),
            'notifications.email_subscription_meals_changed' => $this->boolean('email_subscription_meals_changed'),
        ];
    }

    /**
     * Ticked staff per event value, posted under each event's email field.
     * Unknown events and staff who may not see
     * the event are dropped later by the mail gate.
     *
     * @return array<string, list<int>>
     */
    public function recipients(): array
    {
        $picked = $this->validated('recipients') ?? [];
        $map = [];

        foreach (NotificationEvent::staffEmailEvents() as $event) {
            $ids = $picked[(string) $event->emailField()] ?? [];

            $map[$event->value] = is_array($ids)
                ? array_values(array_map(static fn (mixed $id): int => (int) $id, $ids))
                : [];
        }

        return $map;
    }
}
