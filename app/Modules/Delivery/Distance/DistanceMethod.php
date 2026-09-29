<?php

declare(strict_types=1);

namespace App\Modules\Delivery\Distance;

enum DistanceMethod: string
{
    case Haversine = 'haversine';
    case Google = 'google';

    public function label(): string
    {
        return (string) __('settings.options.shipping.distance_method.'.$this->value);
    }
}
