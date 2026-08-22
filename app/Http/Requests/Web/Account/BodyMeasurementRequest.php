<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Account;

use App\Modules\Identity\DTOs\BodyMeasurementData;
use Illuminate\Foundation\Http\FormRequest;

final class BodyMeasurementRequest extends FormRequest
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
        $ranges = BodyMeasurementData::RANGES;

        $rules = [
            'measured_on' => [
                'required',
                'date',
                'after_or_equal:'.BodyMeasurementData::earliestDate(),
                'before_or_equal:today',
            ],
            'notes' => ['nullable', 'string', 'max:'.BodyMeasurementData::MAX_NOTE_LENGTH],
        ];

        foreach ($ranges as $field => [$min, $max]) {
            $rules[$field] = [
                $field === 'weight_kg' ? 'required' : 'nullable',
                'numeric',
                'between:'.$min.','.$max,
            ];
        }

        return $rules;
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        $attributes = [
            'measured_on' => (string) __('measurements.fields.measured_on'),
            'notes' => (string) __('measurements.fields.notes'),
        ];

        foreach (array_keys(BodyMeasurementData::RANGES) as $field) {
            $attributes[$field] = (string) __('measurements.fields.'.$field);
        }

        return $attributes;
    }

    protected function getRedirectUrl(): string
    {
        return route('website.account', ['tab' => 'measurements']);
    }
}
