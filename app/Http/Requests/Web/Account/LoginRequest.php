<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Account;

use App\Modules\Identity\Support\CustomerAuthChannels;
use Illuminate\Foundation\Http\FormRequest;

final class LoginRequest extends FormRequest
{
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
            $rules['email'] = ['nullable', 'email', 'required_without:phone'];
            $rules['phone'] = ['nullable', 'string', 'max:32', 'required_without:email'];

            return $rules;
        }

        if ($channels->email()) {
            $rules['email'] = ['required', 'email'];
        }

        if ($channels->sms()) {
            $rules['phone'] = ['required', 'string', 'max:32'];
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
            'password' => (string) __('account.fields.password'),
        ];
    }
}
