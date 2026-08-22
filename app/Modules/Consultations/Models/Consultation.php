<?php

declare(strict_types=1);

namespace App\Modules\Consultations\Models;

use App\Modules\Consultations\Enums\ConsultationStatus;
use Database\Factories\ConsultationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * @property int $id
 * @property string $public_id
 * @property string $customer_name
 * @property string $customer_email
 * @property string|null $goal
 * @property Carbon $scheduled_on
 * @property string $starts_at
 * @property string $ends_at
 * @property ConsultationStatus $status
 * @property string|null $notes
 */
class Consultation extends Model
{
    /** @use HasFactory<ConsultationFactory> */
    use HasFactory, SoftDeletes;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'public_id',
        'customer_name',
        'customer_email',
        'goal',
        'scheduled_on',
        'starts_at',
        'ends_at',
        'status',
        'notes',
    ];

    protected static function booted(): void
    {
        static::creating(function (Consultation $consultation): void {
            if (empty($consultation->public_id)) {
                $consultation->public_id = (string) Str::ulid();
            }
        });
    }

    protected static function newFactory(): ConsultationFactory
    {
        return ConsultationFactory::new();
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'scheduled_on' => 'date',
            'status' => ConsultationStatus::class,
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'public_id';
    }

    public function reference(): string
    {
        return strtoupper(substr($this->public_id, -8));
    }

    public function startsAtDisplay(): string
    {
        return $this->normalizeTime($this->starts_at);
    }

    public function endsAtDisplay(): string
    {
        return $this->normalizeTime($this->ends_at);
    }

    public function slotLabel(): string
    {
        return $this->startsAtDisplay().' – '.$this->endsAtDisplay();
    }

    public function whenLabel(): string
    {
        return ($this->scheduled_on?->translatedFormat('d M Y') ?? '—').' · '.$this->slotLabel();
    }

    private function normalizeTime(mixed $value): string
    {
        if ($value instanceof Carbon) {
            return $value->format('H:i');
        }

        $raw = (string) $value;

        if (preg_match('/^(\d{2}):(\d{2})/', $raw, $m) === 1) {
            return $m[1].':'.$m[2];
        }

        return $raw;
    }
}
