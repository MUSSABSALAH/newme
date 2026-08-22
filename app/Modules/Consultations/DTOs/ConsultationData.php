<?php

declare(strict_types=1);

namespace App\Modules\Consultations\DTOs;

use App\Support\Dto\Data;

final class ConsultationData extends Data
{
    public function __construct(
        public readonly string $customerName,
        public readonly string $customerEmail,
        public readonly ?string $goal,
        public readonly string $scheduledOn,
        public readonly string $startsAt,
        public readonly string $endsAt,
    ) {}

    /**
     * @param  array<string, mixed>  $attributes
     */
    public static function fromArray(array $attributes): static
    {
        $goal = $attributes['goal'] ?? null;

        return new self(
            customerName: trim((string) ($attributes['customer_name'] ?? $attributes['name'] ?? '')),
            customerEmail: strtolower(trim((string) ($attributes['customer_email'] ?? $attributes['email'] ?? ''))),
            goal: is_string($goal) && trim($goal) !== '' ? trim($goal) : null,
            scheduledOn: (string) ($attributes['scheduled_on'] ?? $attributes['date'] ?? ''),
            startsAt: self::normalizeTime((string) ($attributes['starts_at'] ?? '')),
            endsAt: self::normalizeTime((string) ($attributes['ends_at'] ?? '')),
        );
    }

    private static function normalizeTime(string $value): string
    {
        $value = trim($value);

        if (preg_match('/^(\d{1,2}):(\d{2})(?::\d{2})?$/', $value, $m) === 1) {
            return sprintf('%02d:%02d', (int) $m[1], (int) $m[2]);
        }

        return $value;
    }
}
