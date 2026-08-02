<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Admin\Coupons;

use App\Modules\Promotions\Enums\CouponScope;
use App\Modules\Promotions\Enums\CouponType;
use App\Modules\Promotions\Models\Coupon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

abstract class CouponRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Codes are stored upper case, so uniqueness must be checked that way too.
     */
    protected function prepareForValidation(): void
    {
        if (is_string($this->input('code'))) {
            $this->merge(['code' => Coupon::normalizeCode($this->input('code'))]);
        }
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'code' => [
                'required', 'string', 'max:64', 'alpha_dash',
                Rule::unique('coupons', 'code')->ignore($this->route('coupon')),
            ],
            'name' => ['nullable', 'array'],
            'name.ar' => ['nullable', 'string', 'max:255'],
            'name.en' => ['nullable', 'string', 'max:255'],
            'type' => ['required', Rule::in(CouponType::values())],
            'scope' => ['required', Rule::in(CouponScope::values())],

            // Each amount is required only for the type that uses it.
            'percent_off' => [
                'nullable', 'numeric', 'min:0.01', 'max:100',
                Rule::requiredIf(fn (): bool => $this->input('type') === CouponType::Percentage->value),
            ],
            'amount_off' => [
                'nullable', 'numeric', 'min:0.01', 'max:1000000',
                Rule::requiredIf(fn (): bool => $this->input('type') === CouponType::Fixed->value),
            ],
            'max_discount' => ['nullable', 'numeric', 'min:0', 'max:1000000'],

            'min_subtotal' => ['nullable', 'numeric', 'min:0', 'max:1000000'],
            'max_redemptions' => ['nullable', 'integer', 'min:1', 'max:1000000'],
            'max_redemptions_per_user' => ['nullable', 'integer', 'min:1', 'max:1000'],
            'starts_at' => ['nullable', 'date'],
            'expires_at' => ['nullable', 'date', 'after:starts_at'],
            'is_active' => ['boolean'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'code' => (string) __('coupons.fields.code'),
            'name.ar' => (string) __('coupons.fields.name_ar'),
            'name.en' => (string) __('coupons.fields.name_en'),
            'type' => (string) __('coupons.fields.type'),
            'scope' => (string) __('coupons.fields.scope'),
            'percent_off' => (string) __('coupons.fields.percent_off'),
            'amount_off' => (string) __('coupons.fields.amount_off'),
            'max_discount' => (string) __('coupons.fields.max_discount'),
            'min_subtotal' => (string) __('coupons.fields.min_subtotal'),
            'max_redemptions' => (string) __('coupons.fields.max_redemptions'),
            'max_redemptions_per_user' => (string) __('coupons.fields.max_redemptions_per_user'),
            'starts_at' => (string) __('coupons.fields.starts_at'),
            'expires_at' => (string) __('coupons.fields.expires_at'),
        ];
    }
}
