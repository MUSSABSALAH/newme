<?php

declare(strict_types=1);

namespace App\Http\Requests\Concerns;

use App\Modules\Identity\Support\CountryCallingCodes;
use App\Modules\Identity\Support\InternationalPhone;

trait MergesInternationalPhone
{
    protected function mergeInternationalPhone(): void
    {
        $national = trim((string) $this->input('phone_national', ''));
        $dial = trim((string) $this->input('phone_dial', CountryCallingCodes::DEFAULT_DIAL));

        if ($national === '') {
            $existing = $this->input('phone');
            if (is_string($existing) && trim($existing) === '') {
                $this->merge(['phone' => null]);
            }

            return;
        }

        $this->merge([
            'phone' => InternationalPhone::fromParts($dial, $national),
        ]);
    }
}
