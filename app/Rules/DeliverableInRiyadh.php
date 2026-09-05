<?php

declare(strict_types=1);

namespace App\Rules;

use App\Modules\Addresses\Support\RiyadhDelivery;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

final class DeliverableInRiyadh implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! RiyadhDelivery::isRiyadhCity(is_string($value) ? $value : null)) {
            $fail((string) __('addresses.errors.outside_riyadh'));
        }
    }
}
