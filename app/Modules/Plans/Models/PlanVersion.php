<?php

declare(strict_types=1);

namespace App\Modules\Plans\Models;

use App\Models\User;
use App\Modules\Plans\Enums\PlanVersionStatus;
use Database\Factories\PlanVersionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $plan_id
 * @property int $version_number
 * @property PlanVersionStatus $status
 * @property Carbon|null $published_at
 * @property int|null $created_by
 */
class PlanVersion extends Model
{
    /** @use HasFactory<PlanVersionFactory> */
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'plan_id',
        'version_number',
        'status',
        'published_at',
        'created_by',
    ];

    protected static function newFactory(): PlanVersionFactory
    {
        return PlanVersionFactory::new();
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'version_number' => 'integer',
            'status' => PlanVersionStatus::class,
            'published_at' => 'datetime',
        ];
    }

    /**
     * @return BelongsTo<Plan, $this>
     */
    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * @return HasMany<PlanPricingRule, $this>
     */
    public function pricingRules(): HasMany
    {
        return $this->hasMany(PlanPricingRule::class)
            ->orderBy('meal_types_key')
            ->orderBy('sort_order');
    }

    public function isDraft(): bool
    {
        return $this->status === PlanVersionStatus::Draft;
    }

    public function isPublished(): bool
    {
        return $this->status === PlanVersionStatus::Published;
    }
}
