<?php

declare(strict_types=1);

namespace App\Modules\Identity\Models;

use App\Models\User;
use Database\Factories\BodyMeasurementFactory;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * One dated reading of a customer's body: weight, height and tape measurements.
 *
 * Readings are never overwritten by later ones — the history is the point, so a
 * nutritionist can see where the customer started and how the numbers moved.
 *
 * @property int $id
 * @property string $public_id
 * @property int $user_id
 * @property Carbon $measured_on
 * @property float $weight_kg
 * @property float|null $height_cm
 * @property float|null $waist_cm
 * @property float|null $hip_cm
 * @property float|null $chest_cm
 * @property float|null $arm_cm
 * @property float|null $neck_cm
 * @property float|null $body_fat_percent
 * @property string|null $notes
 */
class BodyMeasurement extends Model
{
    /** @use HasFactory<BodyMeasurementFactory> */
    use HasFactory;

    /** Tape measurements shown as a group, in the order they are presented. */
    public const TAPE_FIELDS = ['waist_cm', 'hip_cm', 'chest_cm', 'arm_cm', 'neck_cm'];

    /**
     * @var list<string>
     */
    protected $fillable = [
        'public_id',
        'user_id',
        'measured_on',
        'weight_kg',
        'height_cm',
        'waist_cm',
        'hip_cm',
        'chest_cm',
        'arm_cm',
        'neck_cm',
        'body_fat_percent',
        'notes',
    ];

    protected static function booted(): void
    {
        static::creating(function (BodyMeasurement $measurement): void {
            if (empty($measurement->public_id)) {
                $measurement->public_id = (string) Str::ulid();
            }
        });
    }

    protected static function newFactory(): BodyMeasurementFactory
    {
        return BodyMeasurementFactory::new();
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'measured_on' => 'date',
            'weight_kg' => 'float',
            'height_cm' => 'float',
            'waist_cm' => 'float',
            'hip_cm' => 'float',
            'chest_cm' => 'float',
            'arm_cm' => 'float',
            'neck_cm' => 'float',
            'body_fat_percent' => 'float',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'public_id';
    }

    /**
     * Keep the column date-only. Laravel would otherwise store midnight with it,
     * which breaks plain date lookups and the one-reading-per-day index.
     */
    public function setMeasuredOnAttribute(DateTimeInterface|string $value): void
    {
        $this->attributes['measured_on'] = Carbon::parse($value)->toDateString();
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function bmi(): ?float
    {
        if ($this->height_cm === null || $this->height_cm <= 0) {
            return null;
        }

        $metres = $this->height_cm / 100;

        return round($this->weight_kg / ($metres ** 2), 1);
    }

    /**
     * The World Health Organization band the BMI falls in, as a translation key.
     */
    public function bmiBand(): ?string
    {
        $bmi = $this->bmi();

        return match (true) {
            $bmi === null => null,
            $bmi < 18.5 => 'underweight',
            $bmi < 25.0 => 'normal',
            $bmi < 30.0 => 'overweight',
            default => 'obese',
        };
    }

    /**
     * Does this reading carry anything beyond the weight?
     */
    public function hasTapeReadings(): bool
    {
        foreach (self::TAPE_FIELDS as $field) {
            if ($this->{$field} !== null) {
                return true;
            }
        }

        return false;
    }

    /**
     * Trailing zeros read as false precision on a bathroom scale, so 70.0 shows
     * as "70" while 70.5 keeps its half kilo.
     */
    public static function display(?float $value): ?string
    {
        if ($value === null) {
            return null;
        }

        return rtrim(rtrim(number_format($value, 2, '.', ''), '0'), '.');
    }
}
