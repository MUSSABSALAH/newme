<?php

declare(strict_types=1);

namespace Tests\Feature\Api;

use App\Support\Http\Responses\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Tests\TestCase;

final class RequestIdTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Route::middleware('api')->get(
            '/api/test/ping',
            fn (Request $request) => ApiResponse::success(['pong' => true], $request),
        );
    }

    public function test_it_generates_a_ulid_when_none_supplied(): void
    {
        $response = $this->getJson('/api/test/ping');

        $requestId = $response->json('meta.request_id');

        $this->assertIsString($requestId);
        $this->assertTrue(Str::isUlid($requestId));
        $this->assertSame($requestId, $response->headers->get('X-Request-Id'));
    }

    public function test_it_propagates_a_valid_incoming_ulid(): void
    {
        $ulid = (string) Str::ulid();

        $response = $this->getJson('/api/test/ping', ['X-Request-Id' => $ulid]);

        $response->assertJsonPath('meta.request_id', $ulid);
        $this->assertSame($ulid, $response->headers->get('X-Request-Id'));
    }

    public function test_it_replaces_a_malformed_request_id(): void
    {
        $response = $this->getJson('/api/test/ping', ['X-Request-Id' => 'not a valid ulid!!']);

        $returned = $response->json('meta.request_id');

        $this->assertNotSame('not a valid ulid!!', $returned);
        $this->assertTrue(Str::isUlid($returned));
    }

    public function test_it_replaces_an_oversized_request_id(): void
    {
        $oversized = str_repeat('A', 200);

        $response = $this->getJson('/api/test/ping', ['X-Request-Id' => $oversized]);

        $returned = $response->json('meta.request_id');

        $this->assertNotSame($oversized, $returned);
        $this->assertTrue(Str::isUlid($returned));
    }
}
