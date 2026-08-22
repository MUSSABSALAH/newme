<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Account;

use App\Modules\Subscriptions\Support\SubscriptionPauseRules;
use Illuminate\Foundation\Http\FormRequest;

final class PauseSubscriptionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function getRedirectUrl(): string
    {
        return route('website.account', ['tab' => 'subscriptions']);
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'pause_from' => [
                'required',
                'date',
                'after_or_equal:'.SubscriptionPauseRules::earliestPausableDateString(),
            ],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'pause_from.required' => (string) __('account.subscription.pause_date_required'),
            'pause_from.after_or_equal' => (string) __('account.subscription.pause_too_soon', [
                'days' => SubscriptionPauseRules::leadDays(),
            ]),
        ];
    }

    public function pauseFrom(): string
    {
        return (string) $this->validated('pause_from');
    }
}
