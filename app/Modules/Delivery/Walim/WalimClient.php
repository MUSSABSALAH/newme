<?php

declare(strict_types=1);

namespace App\Modules\Delivery\Walim;

use App\Modules\Settings\Services\SettingsService;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

/**
 * Thin wrapper over the Walim v2 API.
 *
 * Every call is a POST carrying the api_key in the body; Walim answers with
 * {message, status, data} where status 200 is the only success.
 */
final class WalimClient
{
    public const BASE_URL = 'https://api.walim.sa/v2';

    private const OK = 200;

    /** Missing parameter and invalid key: problems with our request, never "no data". */
    private const REQUEST_ERRORS = [100, 101];

    public function __construct(private readonly SettingsService $settings) {}

    public function isConfigured(): bool
    {
        return $this->apiKey() !== null;
    }

    /**
     * @param  array<string, mixed>  $task
     * @return array<string, mixed>
     *
     * @throws WalimException
     */
    public function createTask(array $task): array
    {
        return $this->data($this->call('create_task', $task));
    }

    /**
     * @param  array<string, mixed>  $batch
     * @return array<string, mixed>
     *
     * @throws WalimException
     */
    public function createMultipleTasks(array $batch): array
    {
        return $this->data($this->call('create_multiple_tasks', $batch));
    }

    /**
     * Tasks already at Walim for these order ids. Walim answering without a
     * success status means it has none; only a transport or request error
     * throws, so a lookup failure never passes for "safe to create".
     *
     * @param  list<string>  $orderIds
     * @return list<array<string, mixed>>
     *
     * @throws WalimException
     */
    public function jobsByOrderId(array $orderIds): array
    {
        $response = $this->call('get_job_details_by_order_id', [
            'order_ids' => array_values($orderIds),
            'include_task_history' => 0,
        ], strict: false);

        if ((int) ($response['status'] ?? 0) !== self::OK) {
            return [];
        }

        $data = $response['data'] ?? [];

        return is_array($data) ? array_values(array_filter($data, 'is_array')) : [];
    }

    /**
     * @param  list<int>  $jobIds
     *
     * @throws WalimException
     */
    public function cancelTasks(array $jobIds): void
    {
        $this->call('cancel_task', [
            'job_id' => implode(',', $jobIds),
            'job_status' => (string) WalimJobStatus::Cancelled->value,
        ]);
    }

    /**
     * @throws WalimException
     */
    public function setSharedSecret(string $secret, ?string $apiKey = null): void
    {
        $this->call('set_Walim_shared_secret_key', ['Walim_shared_secret' => $secret], apiKey: $apiKey);
    }

    /**
     * @param  array<string, mixed>  $body
     * @return array<string, mixed>
     *
     * @throws WalimException
     */
    private function call(string $endpoint, array $body, bool $strict = true, ?string $apiKey = null): array
    {
        $key = $apiKey ?? $this->apiKey();

        if ($key === null) {
            throw new WalimException((string) __('deliveries.walim.errors.not_configured'));
        }

        try {
            $response = Http::acceptJson()
                ->asJson()
                ->timeout(15)
                ->connectTimeout(5)
                ->post(self::BASE_URL.'/'.$endpoint, ['api_key' => $key] + $body);
        } catch (ConnectionException) {
            throw new WalimException((string) __('deliveries.walim.errors.unreachable'));
        }

        $json = $response->json();

        if (! is_array($json)) {
            throw new WalimException((string) __('deliveries.walim.errors.unexpected', ['code' => $response->status()]));
        }

        $status = (int) ($json['status'] ?? 0);

        if ($status === self::OK || (! $strict && ! in_array($status, self::REQUEST_ERRORS, true) && $response->successful())) {
            return $json;
        }

        $message = is_string($json['message'] ?? null) && $json['message'] !== ''
            ? $json['message']
            : (string) __('deliveries.walim.errors.unexpected', ['code' => $status ?: $response->status()]);

        throw new WalimException((string) __('deliveries.walim.errors.rejected', ['message' => $message]));
    }

    /**
     * @param  array<string, mixed>  $response
     * @return array<string, mixed>
     */
    private function data(array $response): array
    {
        $data = $response['data'] ?? [];

        return is_array($data) ? $data : [];
    }

    private function apiKey(): ?string
    {
        $key = $this->settings->get('walim.api_key');

        return is_string($key) && trim($key) !== '' ? trim($key) : null;
    }
}
