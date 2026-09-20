<?php

declare(strict_types=1);

namespace App\Modules\Identity\Support;

use App\Modules\Identity\Contracts\SmsSender;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use RuntimeException;

/**
 * Delivers OTP (and any other) SMS through Cequens SMS v1.
 *
 * POST https://apis.cequens.com/sms/v1/messages
 * Authorization: Bearer {JWT from username + API key}
 *
 * The sample `POST {baseUrl}/sms/messages` + Bearer API key hits an AWS
 * gateway that rejects the header (403 missing equal-sign). That is not
 * this account's send endpoint.
 */
final class CequensSmsSender implements SmsSender
{
    private const TOKEN_CACHE_KEY = 'sms.cequens.access_token';

    public function send(string $phone, string $message): void
    {
        $this->deliver($phone, $message);
    }

    /**
     * @return list<string> Cequens SMS ids for delivery tracking
     */
    public function deliver(string $phone, string $message): array
    {
        return $this->postMessage($phone, $message, retryOnUnauthorized: true);
    }

    /**
     * @return array<string, mixed>
     */
    public function messageDetails(string $messageId): array
    {
        $url = rtrim((string) config('sms.cequens.base_url'), '/').'/sms/v1/messages/'.rawurlencode($messageId);

        $response = Http::timeout((int) config('sms.cequens.timeout', 8))
            ->connectTimeout(2)
            ->acceptJson()
            ->withToken($this->accessToken())
            ->get($url);

        if (! $response->successful()) {
            $this->fail('Cequens SMS details HTTP '.$response->status().': '.$response->body());
        }

        $payload = $response->json();

        return is_array($payload) ? $payload : [];
    }

    /**
     * @return list<string>
     */
    private function postMessage(string $phone, string $message, bool $retryOnUnauthorized): array
    {
        $url = rtrim((string) config('sms.cequens.base_url'), '/').'/sms/v1/messages';
        $digits = $this->recipientMsisdn($phone);
        $sender = (string) config('sms.sender_id');

        if ($digits === '') {
            $this->fail('Cequens SMS skipped: no valid recipient digits in '.$phone);
        }

        // Cequens treats a JSON array as zero recipients. The live fix was a
        // single MSISDN string; keep the leading + the account already accepts.
        $recipient = '+'.$digits;

        $response = Http::timeout((int) config('sms.cequens.timeout', 8))
            ->connectTimeout(2)
            ->acceptJson()
            ->asJson()
            ->withToken($this->accessToken())
            ->post($url, [
                'senderName' => $sender,
                'messageType' => 'text',
                'messageText' => $message,
                'recipients' => $recipient,
                'shortURL' => false,
            ]);

        if ($response->status() === 401 && $retryOnUnauthorized && $this->usingSignIn()) {
            Cache::forget(self::TOKEN_CACHE_KEY);

            return $this->postMessage($phone, $message, retryOnUnauthorized: false);
        }

        return $this->assertAccepted($response);
    }

    private function accessToken(): string
    {
        $ready = $this->normalizeToken((string) config('sms.cequens.token'));

        if ($ready !== '') {
            return $ready;
        }

        if (! $this->usingSignIn()) {
            throw new RuntimeException('Cequens needs CEQUENS_USERNAME and CEQUENS_API_KEY to mint a Bearer JWT.');
        }

        $cached = Cache::get(self::TOKEN_CACHE_KEY);

        if (is_string($cached) && $cached !== '') {
            return $cached;
        }

        $fresh = $this->signIn();
        Cache::put(self::TOKEN_CACHE_KEY, $fresh, now()->addHours(6));

        return $fresh;
    }

    private function signIn(): string
    {
        $url = rtrim((string) config('sms.cequens.base_url'), '/').'/auth/v1/tokens/';

        $response = Http::timeout((int) config('sms.cequens.timeout', 8))
            ->connectTimeout(2)
            ->acceptJson()
            ->asJson()
            ->post($url, [
                'apiKey' => trim((string) config('sms.cequens.api_key')),
                'userName' => trim((string) config('sms.cequens.username')),
            ]);

        if (! $response->successful()) {
            $this->fail('Cequens sign-in HTTP '.$response->status().': '.$response->body());
        }

        $payload = $response->json();
        $code = is_array($payload) ? ($payload['replyCode'] ?? null) : null;
        $token = is_array($payload) ? data_get($payload, 'data.access_token') : null;

        if ($code !== 0 || ! is_string($token) || $token === '') {
            $message = is_array($payload) ? (string) ($payload['replyMessage'] ?? $response->body()) : $response->body();
            $this->fail('Cequens sign-in failed: '.$message);
        }

        return $this->normalizeToken($token);
    }

    /**
     * @return list<string>
     */
    private function assertAccepted(Response $response): array
    {
        if (! $response->successful()) {
            $this->fail('Cequens SMS HTTP '.$response->status().': '.$response->body());
        }

        $payload = $response->json();
        $code = is_array($payload) ? ($payload['replyCode'] ?? null) : null;

        if ($code !== 0) {
            $this->fail('Cequens SMS failed: '.(is_array($payload) ? (string) ($payload['replyMessage'] ?? 'rejected') : 'rejected'));
        }

        $invalid = is_array($payload) ? trim((string) data_get($payload, 'data.InvalidRecipients', '')) : '';

        if ($invalid !== '') {
            $this->fail('Cequens rejected recipients: '.$invalid);
        }

        $ids = [];

        foreach (is_array($payload) ? data_get($payload, 'data.SentSMSIDs', []) : [] as $row) {
            if (is_array($row) && isset($row['SMSId']) && is_string($row['SMSId']) && $row['SMSId'] !== '') {
                $ids[] = $row['SMSId'];
            }
        }

        if ($ids === []) {
            $this->fail('Cequens accepted the request but returned no SMS id: '.$response->body());
        }

        Log::info('sms.cequens_accepted', [
            'ids' => $ids,
            'sender' => (string) config('sms.sender_id'),
        ]);

        return $ids;
    }

    private function fail(string $detail): never
    {
        Log::stack(['single', 'stderr'])->error($detail);

        throw new RuntimeException($detail);
    }

    /**
     * Cequens wants E.164 digits with no plus: 9665xxxxxxxx, not +9665xxxxxxxx.
     */
    private function recipientMsisdn(string $phone): string
    {
        $digits = preg_replace('/\D+/', '', $phone) ?? '';

        if (str_starts_with($digits, '00')) {
            $digits = substr($digits, 2);
        }

        return $digits;
    }

    private function usingSignIn(): bool
    {
        return trim((string) config('sms.cequens.username')) !== ''
            && trim((string) config('sms.cequens.api_key')) !== '';
    }

    private function normalizeToken(string $token): string
    {
        $token = trim($token);

        if (str_starts_with(strtolower($token), 'bearer ')) {
            return trim(substr($token, 7));
        }

        return $token;
    }
}
