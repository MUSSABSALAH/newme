<?php

declare(strict_types=1);

namespace Tests\Feature\Api;

use Tests\TestCase;

final class LocalizationTest extends TestCase
{
    public function test_english_localization(): void
    {
        $this->getJson('/api/v1/health', ['Accept-Language' => 'en'])
            ->assertOk()
            ->assertJsonPath('data.message', 'Service is operational.');
    }

    public function test_arabic_localization(): void
    {
        $this->getJson('/api/v1/health', ['Accept-Language' => 'ar'])
            ->assertOk()
            ->assertJsonPath('data.message', 'الخدمة تعمل بشكل سليم.');
    }
}
