<?php

declare(strict_types=1);

namespace Tests\Unit\Addresses;

use App\Modules\Addresses\Support\RiyadhDelivery;
use PHPUnit\Framework\TestCase;

final class RiyadhDeliveryTest extends TestCase
{
    public function test_it_accepts_riyadh_city_names(): void
    {
        $this->assertTrue(RiyadhDelivery::isRiyadhCity('Riyadh'));
        $this->assertTrue(RiyadhDelivery::isRiyadhCity('الرياض'));
        $this->assertTrue(RiyadhDelivery::isRiyadhCity('مدينة الرياض'));
        $this->assertTrue(RiyadhDelivery::isRiyadhCity('Ar Riyadh'));
    }

    public function test_it_rejects_other_cities(): void
    {
        $this->assertFalse(RiyadhDelivery::isRiyadhCity('Jeddah'));
        $this->assertFalse(RiyadhDelivery::isRiyadhCity('جدة'));
        $this->assertFalse(RiyadhDelivery::isRiyadhCity('Al Kharj'));
        $this->assertFalse(RiyadhDelivery::isRiyadhCity('Diriyah'));
        $this->assertFalse(RiyadhDelivery::isRiyadhCity('Riyadh Region'));
    }

    public function test_it_keeps_pins_inside_riyadh_city(): void
    {
        $this->assertTrue(RiyadhDelivery::inCityBounds(24.7136, 46.6753));
        $this->assertTrue(RiyadhDelivery::inCityBounds(24.830, 46.640));
        $this->assertFalse(RiyadhDelivery::inCityBounds(21.5433, 39.1728));
        $this->assertFalse(RiyadhDelivery::inCityBounds(24.1483, 47.3050));
    }

    public function test_it_treats_known_other_cities_as_undeliverable(): void
    {
        $this->assertTrue(RiyadhDelivery::isOtherCity('Jeddah'));
        $this->assertTrue(RiyadhDelivery::isOtherCity('الخرج'));
        $this->assertFalse(RiyadhDelivery::isOtherCity('بلدية الشمال'));
        $this->assertFalse(RiyadhDelivery::isOtherCity('الياسمين'));
    }
}
