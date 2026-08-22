<?php

declare(strict_types=1);

namespace App\Modules\Identity\DTOs;

use App\Support\Dto\Data;
use Illuminate\Support\Carbon;

/**
 * One reading a customer logged: the date, the weight, and whatever else they
 * had a tape measure for.
 */
final class BodyMeasurementData extends Data
{
    public const MAX_NOTE_LENGTH = 500;

    /** How far back a customer may backdate a reading. */
    public const MAX_HISTORY_YEARS = 10;

    /**
     * Accepted range per column, shared by the validator and the form inputs so
     * the browser and the server refuse the same numbers.
     *
     * @var array<string, array{float, float}>
     */
    public const RANGES = [
        'weight_kg' => [20.0, 400.0],
        'height_cm' => [80.0, 250.0],
        'waist_cm' => [30.0, 250.0],
        'hip_cm' => [30.0, 250.0],
        'chest_cm' => [30.0, 250.0],
        'arm_cm' => [10.0, 100.0],
        'neck_cm' => [15.0, 100.0],
        'body_fat_percent' => [1.0, 70.0],
    ];

    public function __construct(
        public readonly Carbon $measuredOn,
        public readonly float $weightKg,
        public readonly ?float $heightCm,
        public readonly ?float $waistCm,
        public readonly ?float $hipCm,
        public readonly ?float $chestCm,
        public readonly ?float $armCm,
        public readonly ?float $neckCm,
        public readonly ?float $bodyFatPercent,
        public readonly ?string $notes,
    ) {}

    /**
     * @param  array<string, mixed>  $attributes
     */
    public static function fromArray(array $attributes): static
    {
        return new self(
            measuredOn: self::date($attributes['measured_on'] ?? null),
            weightKg: (float) ($attributes['weight_kg'] ?? 0),
            heightCm: self::number($attributes['height_cm'] ?? null),
            waistCm: self::number($attributes['waist_cm'] ?? null),
            hipCm: self::number($attributes['hip_cm'] ?? null),
            chestCm: self::number($attributes['chest_cm'] ?? null),
            armCm: self::number($attributes['arm_cm'] ?? null),
            neckCm: self::number($attributes['neck_cm'] ?? null),
            bodyFatPercent: self::number($attributes['body_fat_percent'] ?? null),
            notes: self::note($attributes['notes'] ?? null),
        );
    }

    /**
     * The earliest date a reading may carry.
     */
    public static function earliestDate(): string
    {
        return Carbon::today()->subYears(self::MAX_HISTORY_YEARS)->toDateString();
    }

    /**
     * Shaped for the model, which owns these column names.
     *
     * @return array<string, mixed>
     */
    public function toColumns(): array
    {
        return [
            'measured_on' => $this->measuredOn,
            'weight_kg' => $this->weightKg,
            'height_cm' => $this->heightCm,
            'waist_cm' => $this->waistCm,
            'hip_cm' => $this->hipCm,
            'chest_cm' => $this->chestCm,
            'arm_cm' => $this->armCm,
            'neck_cm' => $this->neckCm,
            'body_fat_percent' => $this->bodyFatPercent,
            'notes' => $this->notes,
        ];
    }

    private static function date(mixed $value): Carbon
    {
        return is_string($value) && trim($value) !== ''
            ? Carbon::parse(trim($value))->startOfDay()
            : Carbon::today();
    }

    private static function number(mixed $value): ?float
    {
        if ($value === null || $value === '' || ! is_numeric($value)) {
            return null;
        }

        return (float) $value;
    }

    private static function note(mixed $value): ?string
    {
        if (! is_string($value)) {
            return null;
        }

        $note = trim($value);

        return $note === '' ? null : mb_substr($note, 0, self::MAX_NOTE_LENGTH);
    }
}
