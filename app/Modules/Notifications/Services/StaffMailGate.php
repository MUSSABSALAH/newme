<?php

declare(strict_types=1);

namespace App\Modules\Notifications\Services;

use App\Models\User;
use App\Modules\Identity\Enums\UserStatus;
use App\Modules\Notifications\Enums\NotificationEvent;
use App\Modules\Notifications\Models\StaffEmailRecipient;
use App\Modules\Settings\Services\SettingsService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Who may receive a staff-alert email, and whether this event is allowed to
 * spend a slot of today's mail quota.
 *
 * Separate from the topbar inbox, which is untouched. Email goes only to the
 * people the super admin ticked for that event, while the master switch is on
 * and the daily cap has room.
 */
final class StaffMailGate
{
    /**
     * @var array<string, list<int>>|null
     */
    private ?array $recipients = null;

    public function __construct(
        private readonly SettingsService $settings,
        private readonly MailQuota $quota,
    ) {}

    public function allows(NotificationEvent $event, User $staff): bool
    {
        $key = $event->emailSettingKey();

        if ($key === null || ! $this->settings->get('notifications.staff_emails_enabled') || ! $this->settings->get($key)) {
            return false;
        }

        if ($staff->status !== UserStatus::Active || ! is_string($staff->email) || $staff->email === '') {
            return false;
        }

        if (! in_array($staff->id, $this->recipients()[$event->value] ?? [], true)) {
            return false;
        }

        return $this->quota->hasRoom();
    }

    /**
     * Picked staff who may be emailed about this event right now.
     *
     * @return Collection<int, User>
     */
    public function recipientsFor(NotificationEvent $event): Collection
    {
        $ids = $this->recipients()[$event->value] ?? [];

        if ($ids === []) {
            return new Collection;
        }

        return User::query()
            ->staff()
            ->whereIn('id', $ids)
            ->get()
            ->filter(fn (User $staff): bool => $this->allows($event, $staff))
            ->values();
    }

    /**
     * Picked staff per event value.
     *
     * @return array<string, list<int>>
     */
    public function recipients(): array
    {
        if ($this->recipients !== null) {
            return $this->recipients;
        }

        $map = [];

        foreach (StaffEmailRecipient::query()->orderBy('user_id')->get(['user_id', 'event']) as $row) {
            $map[(string) $row->event][] = (int) $row->user_id;
        }

        return $this->recipients = $map;
    }

    /**
     * Active staff with an email address. Picking is independent of the
     * permissions that drive the topbar inbox.
     *
     * @return Collection<int, User>
     */
    public function eligibleStaff(): Collection
    {
        return User::query()
            ->staff()
            ->where('status', UserStatus::Active->value)
            ->whereNotNull('email')
            ->where('email', '!=', '')
            ->orderBy('name')
            ->get(['id', 'name', 'email']);
    }

    /**
     * @param  array<string, list<int>>  $picked  Event value => user ids.
     */
    public function syncRecipients(array $picked): void
    {
        $allowed = $this->eligibleStaff()
            ->pluck('id')
            ->map(static fn (mixed $id): int => (int) $id)
            ->all();
        $rows = [];
        $now = now();

        foreach (NotificationEvent::staffEmailEvents() as $event) {
            $event = $event->value;
            $ids = array_values(array_unique(array_intersect($picked[$event] ?? [], $allowed)));

            foreach ($ids as $id) {
                $rows[] = ['user_id' => $id, 'event' => $event, 'created_at' => $now, 'updated_at' => $now];
            }
        }

        DB::transaction(static function () use ($rows): void {
            StaffEmailRecipient::query()->delete();

            if ($rows !== []) {
                StaffEmailRecipient::query()->insert($rows);
            }
        });

        $this->recipients = null;
    }
}
