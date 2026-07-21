<?php

declare(strict_types=1);

namespace Tests\Feature\Api;

use App\Support\Enums\ApiErrorCode;
use Illuminate\Support\Facades\DB;
use RuntimeException;
use Tests\TestCase;

final class HealthCheckTest extends TestCase
{
    public function test_health_endpoint_reports_success(): void
    {
        $response = $this->getJson('/api/v1/health');

        $response->assertOk()
            ->assertJsonPath('data.status', 'ok')
            ->assertJsonPath('data.database', 'ok')
            ->assertJsonStructure(['data' => ['status', 'database', 'message'], 'meta' => ['request_id']]);
    }

    public function test_health_endpoint_reports_database_failure(): void
    {
        DB::shouldReceive('connection')->andThrow(new RuntimeException('connection refused'));

        $response = $this->getJson('/api/v1/health');

        $response->assertStatus(503)
            ->assertJsonPath('error.code', ApiErrorCode::SERVER_ERROR->value)
            ->assertJsonPath('error.details.database', 'unavailable');

        $this->assertStringNotContainsString('connection refused', $response->getContent() ?: '');
    }
}
