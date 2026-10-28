<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Admin\Customers;

use App\Modules\Identity\DTOs\HealthProfile;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Staff edits to a customer's profile. Email and phone are sign-in (OTP)
 * identifiers, so they are deliberately not accepted here.
 */
final class UpdateCustomerRequest extends FormRequest
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
        $birth = HealthProfile::birthDateRange();

        return [
            'name' => ['required', 'string', 'max:255'],
            'birth_date' => ['nullable', 'date', 'after_or_equal:'.$birth['min'], 'before_or_equal:'.$birth['max']],
            'allergies' => ['nullable', 'string', 'max:'.HealthProfile::MAX_NOTE_LENGTH],
            'medications' => ['nullable', 'string', 'max:'.HealthProfile::MAX_NOTE_LENGTH],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => (string) __('customers.fields.name'),
            'birth_date' => (string) __('customers.fields.birth_date'),
            'allergies' => (string) __('customers.fields.allergies'),
            'medications' => (string) __('customers.fields.medications'),
        ];
    }

    /**
     * @return array{name: string, birth_date: string|null, allergies: string|null, medications: string|null}
     */
    public function profile(): array
    {
        $text = static function (mixed $value): ?string {
            $value = is_string($value) ? trim($value) : '';

            return $value === '' ? null : $value;
        };

        return [
            'name' => trim((string) $this->validated('name')),
            'birth_date' => $text($this->validated('birth_date')),
            'allergies' => $text($this->validated('allergies')),
            'medications' => $text($this->validated('medications')),
        ];
    }
}
