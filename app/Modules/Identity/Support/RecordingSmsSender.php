<?php

declare(strict_types=1);

namespace App\Modules\Identity\Support;

use App\Modules\Identity\Contracts\SmsSender;

/**
 * Captures outbound SMS in memory so tests can read the OTP without a gateway.
 */
final class RecordingSmsSender implements SmsSender
{
    /**
     * @var list<array{phone: string, message: string}>
     */
    public array $messages = [];

    public function send(string $phone, string $message): void
    {
        $this->messages[] = [
            'phone' => $phone,
            'message' => $message,
        ];
    }

    public function lastMessage(): ?string
    {
        $last = $this->messages === [] ? null : $this->messages[array_key_last($this->messages)];

        return $last['message'] ?? null;
    }

    public function lastCode(): ?string
    {
        $message = $this->lastMessage();

        if ($message === null || ! preg_match('/\b(\d{6})\b/', $message, $matches)) {
            return null;
        }

        return $matches[1];
    }
}
