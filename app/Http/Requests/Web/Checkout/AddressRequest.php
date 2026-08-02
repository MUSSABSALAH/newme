<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Checkout;

use Illuminate\Foundation\Http\FormRequest;

final class AddressRequest extends FormRequest
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
            'label' => ['required', 'string', 'max:60'],
            'recipient_name' => ['required', 'string', 'max:120'],
            'phone' => ['required', 'string', 'max:32'],
            'city' => ['required', 'string', 'max:80'],
            'district' => ['required', 'string', 'max:120'],
            'street' => ['required', 'string', 'max:180'],
            'national_address' => ['required', 'string', 'max:32'],
            'details' => ['nullable', 'string', 'max:180'],
            'is_default' => ['nullable', 'boolean'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'label' => (string) __('addresses.fields.label'),
            'recipient_name' => (string) __('addresses.fields.recipient_name'),
            'phone' => (string) __('addresses.fields.phone'),
            'city' => (string) __('addresses.fields.city'),
            'district' => (string) __('addresses.fields.district'),
            'street' => (string) __('addresses.fields.street'),
            'national_address' => (string) __('addresses.fields.national_address'),
            'details' => (string) __('addresses.fields.details'),
        ];
    }
}
