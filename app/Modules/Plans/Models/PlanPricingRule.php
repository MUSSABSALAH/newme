<?php

declare(strict_types=1);

namespace App\Modules\Plans\Models;

use App\Modules\Plans\Enums\DurationUnit;
use App\Modules\Plans\Enums\MealType;
use App\Support\Money\Money;
use Database\Factories\PlanPricingRuleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * A single pricing entry: the package price for a (meal-types x duration)
 * combination, with an optional duration discount.
 *
 * @property int $id
 * @property int $plan_version_id
 * @property array<int, string> $meal_types
 * @property string $meal_types_key
 * @property DurationUnit $duration_unit
 * @property int $duration_length
 * @property int $price
 * @property string $discount_percent
 * @property bool $is_active
 * @property int $sort_order
 */
class PlanPricingRule extends Model
{
    /** @use HasFactory<PlanPricingRuleFactory> */
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'plan_version_id',
        'meal_types',
        'meal_types_key',
        'duration_unit',
        'duration_length',
        'price',
        'discount_percent',
        'is_active',
        'sort_order',
    ];

    protected static function newFactory(): PlanPricingRuleFactory
    {
        return PlanPricingRuleFactory::new();
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'meal_types' => 'array',
            'duration_unit' => DurationUnit::class,
            'duration_length' => 'integer',
            'price' => 'integer',
            'discount_percent' => 'decimal:2',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    /**
     * @return BelongsTo<PlanVersion, $this>
     */
    public function version(): BelongsTo
    {
        return $this->belongsTo(PlanVersion::class, 'plan_version_id');
    }

    /**
     * The meal types included in this pricing option, as enum cases.
     *
     * @return list<MealType>
     */
    public function mealTypes(): array
    {
        $types = [];

        foreach ($this->meal_types as $value) {
            $type = MealType::tryFrom((string) $value);
            if ($type instanceof MealType) {
                $types[] = $type;
            }
        }

        return $types;
    }

    public function priceMoney(): Money
    {
        return Money::fromMinor($this->price);
    }

    /**
     * Discount expressed in basis points (10000 = 100%).
     */
    public function discountBasisPoints(): int
    {
        return (int) round(((float) $this->discount_percent) * 100);
    }

    public function totalDays(): int
    {
        return $this->duration_unit->toDays($this->duration_length);
    }
}
