<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Admin\Subscriptions;

use Illuminate\Foundation\Http\FormRequest;

final class PauseSubscriptionByStaffRequest extends FormRequest
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
            'pause_from' => ['required', 'date_format:Y-m-d'],
            'notify_customer' => ['sometimes', 'boolean'],
        ];
    }

    public function pauseFrom(): string
    {
        return (string) $this->validated('pause_from');
    }

    public function notifyCustomer(): bool
    {
        return $this->boolean('notify_customer');
    }
}
