<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Account;

use App\Http\Requests\Concerns\MergesInternationalPhone;
use App\Modules\Identity\Support\CountryCallingCodes;
use App\Modules\Identity\Support\CustomerAuthChannels;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

final class RegisterRequest extends FormRequest
{
    use MergesInternationalPhone;

    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        $channels = app(CustomerAuthChannels::class);

        $rules = [
            'name' => ['required', 'string', 'max:255'],
        ];

        if ($channels->asksEmail()) {
            $rules['email'] = ['required', 'string', 'email', 'max:255', 'unique:users,email'];
        }

        if ($channels->asksPhoneOnRegister()) {
            $phone = ['required', 'string', 'max:16', 'regex:/^\+\d{8,15}$/'];

            if ($channels->sms()) {
                $phone[] = Rule::unique('users', 'phone');
            }

            $rules['phone_dial'] = ['required', 'string', 'in:'.implode(',', CountryCallingCodes::dials())];
            $rules['phone_national'] = ['required', 'string', 'max:15'];
            $rules['phone'] = $phone;
        }

        if ($channels->asksPassword()) {
            $rules['password'] = ['required', 'string', 'confirmed', Password::min(8)];
        }

        return $rules;
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => (string) __('account.fields.name'),
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
