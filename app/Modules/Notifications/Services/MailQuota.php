<?php

declare(strict_types=1);

namespace App\Modules\Notifications\Services;

use App\Modules\Notifications\Models\MailQuotaDay;
use App\Modules\Settings\Services\SettingsService;
use App\Support\Time\DisplayTime;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

/**
 * Counts every outgoing email against the provider's daily cap.
 *
 * The cap is store time (Riyadh). 0 means no cap. Staff alert emails stop
 * when the remaining room hits zero; login codes and customer receipts still
 * go out so a busy day does not lock people out.
 */
final class MailQuota
{
    public function __construct(private readonly SettingsService $settings) {}

    public function limit(): int
    {
        return max(0, (int) ($this->settings->get('notifications.daily_email_limit') ?? 0));
    }

    public function unlimited(): bool
    {
        return $this->limit() === 0;
    }

    public function sent(): int
    {
        try {
            $row = MailQuotaDay::query()->find($this->day());
        } catch (QueryException) {
            return 0;
        }

        return $row instanceof MailQuotaDay ? (int) $row->sent : 0;
    }

    public function remaining(): ?int
    {
        if ($this->unlimited()) {
            return null;
        }

        return max(0, $this->limit() - $this->sent());
    }

    public function hasRoom(): bool
    {
        $remaining = $this->remaining();

        return $remaining === null || $remaining > 0;
    }

    public function record(): void
    {
        $day = $this->day();

        // The email has already left; a counter failure must not fail the job
        // and make the queue send it again.
        try {
            DB::transaction(function () use ($day): void {
                MailQuotaDay::query()->insertOrIgnore(['day' => $day, 'sent' => 0]);

                MailQuotaDay::query()->where('day', $day)->lockForUpdate()->increment('sent');
            });
        } catch (QueryException $e) {
            report($e);
        }
    }

    /**
     * @return array{sent: int, limit: int, remaining: int|null, unlimited: bool}
     */
    public function snapshot(): array
    {
        return [
            'sent' => $this->sent(),
            'limit' => $this->limit(),
            'remaining' => $this->remaining(),
            'unlimited' => $this->unlimited(),
        ];
    }

    private function day(): string
    {
        return DisplayTime::today()->toDateString();
    }
}
