<?php

declare(strict_types=1);

namespace Tests\Feature\Api;

use App\Support\Enums\ApiErrorCode;
use App\Support\Exceptions\DomainException;
use App\Support\Http\Responses\ApiResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use RuntimeException;
use Tests\TestCase;

final class ApiEnvelopeTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Route::middleware('api')->group(function (): void {
            Route::get('/api/test/ping', fn (Request $request) => ApiResponse::success(['pong' => true], $request));

            Route::post('/api/test/validate', function (Request $request) {
                $request->validate(['name' => 'required']);

                return ApiResponse::success(['ok' => true], $request);
            });

            Route::get('/api/test/domain', function (): void {
                throw new DomainException(ApiErrorCode::CONFLICT, 409, 'Conflict happened.');
            });

            Route::get('/api/test/missing-model', function (): void {
                throw new ModelNotFoundException;
            });

            Route::get('/api/test/boom', function (): void {
                throw new RuntimeException('sensitive internal detail');
            });
        });
    }

    public function test_success_envelope_shape(): void
    {
        $response = $this->getJson('/api/test/ping');

        $response->assertOk()
            ->assertJsonStructure(['data' => ['pong'], 'meta' => ['request_id']])
            ->assertJsonPath('data.pong', true);

        $this->assertNotSame('', $response->json('meta.request_id'));
    }

    public function test_validation_error_envelope(): void
    {
        $response = $this->postJson('/api/test/validate', []);

        $response->assertStatus(422)
            ->assertJsonStructure(['error' => ['code', 'message', 'details', 'request_id']])
            ->assertJsonPath('error.code', ApiErrorCode::VALIDATION_FAILED->value);

        $this->assertArrayHasKey('name', (array) $response->json('error.details'));
    }

    public function test_domain_exception_mapping(): void
    {
        $response = $this->getJson('/api/test/domain');

        $response->assertStatus(409)
            ->assertJsonPath('error.code', ApiErrorCode::CONFLICT->value)
            ->assertJsonPath('error.message', 'Conflict happened.');
    }

    public function test_model_not_found_mapping(): void
    {
        $response = $this->getJson('/api/test/missing-model');

        $response->assertStatus(404)
            ->assertJsonPath('error.code', ApiErrorCode::NOT_FOUND->value);

        $this->assertNotSame('', $response->json('error.request_id'));
    }

    public function test_unmatched_route_maps_to_not_found(): void
    {
        $this->getJson('/api/v1/does-not-exist')
            ->assertStatus(404)
            ->assertJsonPath('error.code', ApiErrorCode::NOT_FOUND->value);
    }

    public function test_unexpected_exception_is_masked(): void
    {
        $response = $this->getJson('/api/test/boom');

        $response->assertStatus(500)
            ->assertJsonPath('error.code', ApiErrorCode::SERVER_ERROR->value);

        $this->assertStringNotContainsString('sensitive internal detail', $response->getContent() ?: '');
    }
}
