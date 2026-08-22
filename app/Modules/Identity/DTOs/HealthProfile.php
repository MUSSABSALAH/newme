<?php

declare(strict_types=1);

namespace App\Modules\Identity\DTOs;

use App\Models\User;
use App\Support\Dto\Data;
use Illuminate\Support\Carbon;

/**
 * What a customer told us about themselves: date of birth, plus any allergies
 * and medications worth knowing about.
 *
 * The customer fills it in once during the subscribe wizard; it is kept on the
 * account so later subscriptions can offer it back, and snapshotted onto each
 * subscription so the kitchen sees what was declared at the time.
 */
final class HealthProfile extends Data
{
    public const MIN_AGE = 10;

    public const MAX_AGE = 100;

    public const MAX_NOTE_LENGTH = 500;

    public function __construct(
        public readonly ?Carbon $birthDate,
        public readonly ?string $allergies,
        public readonly ?string $medications,
    ) {}

    /**
     * @param  array<string, mixed>  $attributes
     */
    public static function fromArray(array $attributes): static
    {
        return new self(
            birthDate: self::readDate($attributes['birth_date'] ?? null),
            allergies: self::readNote($attributes['allergies'] ?? null),
            medications: self::readNote($attributes['medications'] ?? null),
        );
    }

    public static function fromUser(User $user): static
    {
        return new self(
            birthDate: $user->birth_date,
            allergies: self::readNote($user->allergies),
            medications: self::readNote($user->medications),
        );
    }

    public static function empty(): static
    {
        return new self(null, null, null);
    }

    /**
     * Earliest and latest date of birth the accepted age range allows; the
     * wizard input and the validator both read their bounds from here.
     *
     * @return array{min: string, max: string}
     */
    public static function birthDateRange(): array
    {
        $today = Carbon::today();

        return [
            'min' => $today->copy()->subYears(self::MAX_AGE)->toDateString(),
            'max' => $today->copy()->subYears(self::MIN_AGE)->toDateString(),
        ];
    }

    public function age(): ?int
    {
        return $this->birthDate?->age;
    }

    public function isEmpty(): bool
    {
        return $this->birthDate === null && $this->allergies === null && $this->medications === null;
    }

    /**
     * Snake case keys so the session round trip and the request payload agree.
     *
     * @return array<string, string|null>
     */
    public function toArray(): array
    {
        return [
            'birth_date' => $this->birthDate?->toDateString(),
            'allergies' => $this->allergies,
            'medications' => $this->medications,
        ];
    }

    /**
     * Dates outside the accepted window are dropped rather than trusted; the
     * validator has already refused them at the edge.
     */
    private static function readDate(mixed $value): ?Carbon
    {
        if (! is_string($value) || trim($value) === '') {
            return null;
        }

        $range = self::birthDateRange();
        $date = Carbon::parse(trim($value))->startOfDay();
        $day = $date->toDateString();

        return $day >= $range['min'] && $day <= $range['max'] ? $date : null;
    }

    private static function readNote(mixed $value): ?string
    {
        if (! is_string($value)) {
            return null;
        }

        $note = trim($value);

        return $note === '' ? null : mb_substr($note, 0, self::MAX_NOTE_LENGTH);
    }
}
