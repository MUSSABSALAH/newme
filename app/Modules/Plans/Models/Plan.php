<?php

declare(strict_types=1);

namespace App\Modules\Plans\Models;

use App\Modules\Plans\Enums\PlanGoal;
use App\Modules\Plans\Enums\PlanVersionStatus;
use Database\Factories\PlanFactory;
use Illuminate\Database\Eloquent\Collection;
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
 * @property int|null $calories_from
 * @property int|null $calories_to
 * @property bool $requires_day_selection
 * @property bool $allows_pause
 * @property int $min_delivery_days_per_week
 * @property int $delivery_fee
 * @property bool $is_active
 * @property bool $is_most_chosen
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
        'calories_from',
        'calories_to',
        'requires_day_selection',
        'allows_pause',
        'min_delivery_days_per_week',
        'delivery_fee',
        'is_active',
        'is_most_chosen',
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
            'is_most_chosen' => 'boolean',
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
     * The meals actually shown to customers, in display order. Named so a list
     * of plans can eager-load them; the plain meals() relation is unfiltered and
     * eager-loading that would have returned inactive dishes too.
     *
     * @return BelongsToMany<Meal, $this>
     */
    public function activeMeals(): BelongsToMany
    {
        return $this->meals()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id');
    }

    /**
     * @return Collection<int, Meal>
     */
    public function resolveActiveMeals(): Collection
    {
        return $this->relationLoaded('activeMeals')
            ? $this->getRelation('activeMeals')
            : $this->activeMeals()->get();
    }

    /**
     * Published versions, highest version_number first, so a list of plans can
     * eager-load them in one query instead of one query per plan.
     *
     * Deliberately a HasMany rather than a one-of-many subquery: taking the
     * first row of this ordered set is the same operation publishedVersion()
     * has always performed, which keeps the resolved version provably identical.
     *
     * @return HasMany<PlanVersion, $this>
     */
    public function publishedVersions(): HasMany
    {
        return $this->versions()
            ->where('status', PlanVersionStatus::Published->value)
            ->orderByDesc('version_number');
    }

    /**
     * The single published (customer-facing) version, if any.
     *
     * Reads the eager-loaded relation when the caller loaded it and falls back
     * to its own query otherwise, so every existing call site keeps working.
     */
    public function publishedVersion(): ?PlanVersion
    {
        if ($this->relationLoaded('publishedVersions')) {
            return $this->getRelation('publishedVersions')->first();
        }

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
     * Daily calorie figure shown on public plan cards (range or a single value).
     */
    public function calorieLabel(): string
    {
        $from = $this->calories_from !== null ? (int) $this->calories_from : 0;
        $to = $this->calories_to !== null ? (int) $this->calories_to : 0;

        if ($from > 0 && $to > 0 && $from !== $to) {
            $low = min($from, $to);
            $high = max($from, $to);

            return $low.' - '.$high;
        }

        if ($to > 0) {
            return (string) $to;
        }

        if ($from > 0) {
            return (string) $from;
        }

        return (string) $this->goal->dailyCalorieTarget();
    }

    /**
     * Numeric calorie used for bars and fallbacks (the upper bound when a range).
     */
    public function calorieValue(): int
    {
        $to = $this->calories_to !== null ? (int) $this->calories_to : 0;
        if ($to > 0) {
            return $to;
        }

        $from = $this->calories_from !== null ? (int) $this->calories_from : 0;
        if ($from > 0) {
            return $from;
        }

        return $this->goal->dailyCalorieTarget();
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
