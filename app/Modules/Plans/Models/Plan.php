<?php

declare(strict_types=1);

namespace App\Modules\Plans\Models;

use App\Modules\Plans\Enums\PlanGoal;
use App\Modules\Plans\Enums\PlanVersionStatus;
use Database\Factories\PlanFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

/**
 * @property int $id
 * @property string $public_id
 * @property PlanGoal $goal
 * @property array<string, string> $name
 * @property array<string, string>|null $description
 * @property array<string, list<string>>|null $features
 * @property string|null $image_path
 * @property bool $requires_day_selection
 * @property bool $allows_pause
 * @property int $min_delivery_days_per_week
 * @property int $delivery_fee
 * @property bool $is_active
 * @property int $sort_order
 */
class Plan extends Model
{
    /** @use HasFactory<PlanFactory> */
    use HasFactory, HasTranslations, SoftDeletes;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'public_id',
        'goal',
        'name',
        'description',
        'features',
        'image_path',
        'requires_day_selection',
        'allows_pause',
        'min_delivery_days_per_week',
        'delivery_fee',
        'is_active',
        'sort_order',
    ];

    /**
     * @var list<string>
     */
    public array $translatable = ['name', 'description', 'features'];

    protected static function booted(): void
    {
        static::creating(function (Plan $plan): void {
            if (empty($plan->public_id)) {
                $plan->public_id = (string) Str::ulid();
            }
        });
    }

    protected static function newFactory(): PlanFactory
    {
        return PlanFactory::new();
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'goal' => PlanGoal::class,
            'requires_day_selection' => 'boolean',
            'allows_pause' => 'boolean',
            'min_delivery_days_per_week' => 'integer',
            'delivery_fee' => 'integer',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'id';
    }

    /**
     * @return HasMany<PlanVersion, $this>
     */
    public function versions(): HasMany
    {
        return $this->hasMany(PlanVersion::class);
    }

    /**
     * Meals from the catalog made available to customers of this plan.
     *
     * @return BelongsToMany<Meal, $this>
     */
    public function meals(): BelongsToMany
    {
        return $this->belongsToMany(Meal::class);
    }

    /**
     * The single published (customer-facing) version, if any.
     */
    public function publishedVersion(): ?PlanVersion
    {
        return $this->versions()
            ->where('status', PlanVersionStatus::Published->value)
            ->latest('version_number')
            ->first();
    }

    /**
     * The version currently open for editing, if any.
     */
    public function draftVersion(): ?PlanVersion
    {
        return $this->versions()
            ->where('status', PlanVersionStatus::Draft->value)
            ->latest('version_number')
            ->first();
    }

    /**
     * Localized display name, falling back across locales then the goal label.
     */
    public function label(?string $locale = null): string
    {
        $locale ??= app()->getLocale();

        $value = $this->getTranslation('name', $locale, false);

        if (is_string($value) && $value !== '') {
            return $value;
        }

        $fallback = $this->getTranslations('name');
        foreach ($fallback as $translated) {
            if (is_string($translated) && $translated !== '') {
                return $translated;
            }
        }

        return $this->goal->label();
    }
}
