<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Admin\Subscriptions;

use Illuminate\Foundation\Http\FormRequest;

final class ChangeSubscriptionStartRequest extends FormRequest
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
            'start_date' => ['required', 'date_format:Y-m-d'],
            'notify_customer' => ['sometimes', 'boolean'],
        ];
    }

    public function startDate(): string
    {
        return (string) $this->validated('start_date');
    }

    public function notifyCustomer(): bool
    {
        return $this->boolean('notify_customer');
    }
}
