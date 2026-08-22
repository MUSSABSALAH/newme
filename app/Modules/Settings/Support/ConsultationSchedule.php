<?php

declare(strict_types=1);

namespace App\Modules\Settings\Support;

use App\Modules\Settings\Services\SettingsService;
use Carbon\Carbon;
use Carbon\CarbonInterface;

/**
 * Consultation booking calendar knobs from operations settings.
 */
final class ConsultationSchedule
{
    /** @var list<string> */
    public const WEEKDAY_KEYS = ['sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat'];

    public const DAYS_AHEAD = 30;

    public function __construct(private readonly SettingsService $settings) {}

    /**
     * @return list<string>
     */
    public function workingDays(): array
    {
        $days = $this->settings->get('operations.consultation_working_days');

        if (! is_array($days) || $days === []) {
            return ['sun', 'mon', 'tue', 'wed', 'thu'];
        }

        return array_values(array_filter(
            $days,
            static fn ($day): bool => is_string($day) && in_array($day, self::WEEKDAY_KEYS, true),
        ));
    }

    public function hoursStart(): string
    {
        $value = $this->settings->get('operations.consultation_hours_start');

        return is_string($value) && preg_match('/^\d{2}:\d{2}$/', $value) === 1
            ? $value
            : '10:00';
    }

    public function hoursEnd(): string
    {
        $value = $this->settings->get('operations.consultation_hours_end');

        return is_string($value) && preg_match('/^\d{2}:\d{2}$/', $value) === 1
            ? $value
            : '20:00';
    }

    public function durationMinutes(): int
    {
        $value = $this->settings->get('operations.consultation_duration_minutes');

        $minutes = is_int($value) ? $value : (int) $value;

        return $minutes >= 5 ? $minutes : 60;
    }

    /**
     * Generated bookable slots from start/end/duration.
     * Each slot starts at `start` and ends at `start + duration` (must finish by hours_end).
     *
     * @return list<array{start: string, end: string}>
     */
    public function slots(): array
    {
        $duration = $this->durationMinutes();
        $cursor = Carbon::createFromFormat('H:i', $this->hoursStart());
        $windowEnd = Carbon::createFromFormat('H:i', $this->hoursEnd());

        if ($cursor === false || $windowEnd === false || ! $windowEnd->gt($cursor)) {
            return [];
        }

        $slots = [];
        $guard = 0;

        while ($guard < 200) {
            $slotEnd = $cursor->copy()->addMinutes($duration);

            if ($slotEnd->gt($windowEnd)) {
                break;
            }

            $slots[] = [
                'start' => $cursor->format('H:i'),
                'end' => $slotEnd->format('H:i'),
            ];

            $cursor->addMinutes($duration);
            $guard++;
        }

        return $slots;
    }

    /**
     * @return list<string>
     */
    public function timeSlots(): array
    {
        return array_map(
            static fn (array $slot): string => $slot['start'],
            $this->slots(),
        );
    }

    public function isWorkingDay(CarbonInterface $date): bool
    {
        $key = self::WEEKDAY_KEYS[(int) $date->dayOfWeek] ?? null;

        return $key !== null && in_array($key, $this->workingDays(), true);
    }

    /**
     * Payload for the public consult booking UI.
     *
     * @return array{
     *     working_days: list<string>,
     *     hours_start: string,
     *     hours_end: string,
     *     duration_minutes: int,
     *     days_ahead: int,
     *     slots: list<array{start: string, end: string}>,
     *     time_slots: list<string>
     * }
     */
    public function forFrontend(): array
    {
        $slots = $this->slots();

        return [
            'working_days' => $this->workingDays(),
            'hours_start' => $this->hoursStart(),
            'hours_end' => $this->hoursEnd(),
            'duration_minutes' => $this->durationMinutes(),
            'days_ahead' => self::DAYS_AHEAD,
            'slots' => $slots,
            'time_slots' => array_map(static fn (array $slot): string => $slot['start'], $slots),
        ];
    }
}
