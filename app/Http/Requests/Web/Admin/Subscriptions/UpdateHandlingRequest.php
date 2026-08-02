<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Admin\Subscriptions;

use App\Modules\Subscriptions\Enums\HandlingStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class UpdateHandlingRequest extends FormRequest
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
            'handling_status' => ['required', Rule::enum(HandlingStatus::class)],
        ];
    }

    public function status(): HandlingStatus
    {
        return HandlingStatus::from((string) $this->validated('handling_status'));
    }
}
