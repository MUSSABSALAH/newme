<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Account;

use App\Modules\Identity\DTOs\HealthProfile;
use App\Modules\Identity\Support\CustomerAuthChannels;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

final class UpdateProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        $userId = $this->user()?->getKey();
        $birth = HealthProfile::birthDateRange();
        $channels = app(CustomerAuthChannels::class);

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                $channels->requiresEmailOnProfile() ? 'required' : 'nullable',
                'string',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($userId),
            ],
            'phone' => [
                $channels->requiresPhoneOnProfile() ? 'required' : 'nullable',
                'string',
                'max:32',
                'regex:/^[0-9+()\-\s]{6,32}$/',
                Rule::unique('users', 'phone')->ignore($userId),
            ],
            // Health details the subscribe wizard reuses; all optional here.
            'birth_date' => ['nullable', 'date', 'after_or_equal:'.$birth['min'], 'before_or_equal:'.$birth['max']],
            'allergies' => ['nullable', 'string', 'max:'.HealthProfile::MAX_NOTE_LENGTH],
            'medications' => ['nullable', 'string', 'max:'.HealthProfile::MAX_NOTE_LENGTH],
        ];

        if ($channels->asksPassword()) {
            $rules['current_password'] = ['nullable', 'required_with:password', 'current_password'];
            $rules['password'] = ['nullable', 'string', 'confirmed', Password::min(8)];
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
            'birth_date' => (string) __('account.fields.birth_date'),
            'allergies' => (string) __('account.fields.allergies'),
            'medications' => (string) __('account.fields.medications'),
            'current_password' => (string) __('account.fields.current_password'),
            'password' => (string) __('account.fields.password'),
        ];
    }

    protected function prepareForValidation(): void
    {
        foreach (['email', 'phone'] as $field) {
            $value = $this->input($field);
            if (is_string($value) && trim($value) === '') {
                $this->merge([$field => null]);
            }
        }
    }

    protected function getRedirectUrl(): string
    {
        return route('website.account', ['tab' => 'profile']);
    }
}
