<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Account;

use App\Http\Requests\Concerns\MergesInternationalPhone;
use App\Modules\Identity\Support\CountryCallingCodes;
use App\Modules\Identity\Support\CustomerAuthChannels;
use Illuminate\Foundation\Http\FormRequest;

final class LoginRequest extends FormRequest
{
    use MergesInternationalPhone;

    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        $channels = app(CustomerAuthChannels::class);

        if (! $channels->otpEnabled()) {
            return [
                'email' => ['required', 'email'],
                'password' => ['required', 'string'],
                'remember' => ['sometimes', 'boolean'],
            ];
        }

        $rules = [
            'remember' => ['sometimes', 'boolean'],
        ];

        if ($channels->email() && $channels->sms()) {
            $rules['email'] = ['nullable', 'email', 'required_without:phone_national'];
            $rules['phone_dial'] = ['nullable', 'string', 'in:'.implode(',', CountryCallingCodes::dials()), 'required_with:phone_national'];
            $rules['phone_national'] = ['nullable', 'string', 'max:15', 'required_without:email'];
            $rules['phone'] = ['nullable', 'string', 'max:16', 'required_with:phone_national', 'regex:/^\+\d{8,15}$/'];

            return $rules;
        }

        if ($channels->email()) {
            $rules['email'] = ['required', 'email'];
        }

        if ($channels->sms()) {
            $rules['phone_dial'] = ['required', 'string', 'in:'.implode(',', CountryCallingCodes::dials())];
            $rules['phone_national'] = ['required', 'string', 'max:15'];
            $rules['phone'] = ['required', 'string', 'max:16', 'regex:/^\+\d{8,15}$/'];
        }

        return $rules;
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'email' => (string) __('account.fields.email'),
            'phone' => (string) __('account.fields.phone'),
            'phone_dial' => (string) __('account.fields.phone_dial'),
            'phone_national' => (string) __('account.fields.phone_national'),
            'password' => (string) __('account.fields.password'),
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->mergeInternationalPhone();
    }
}
