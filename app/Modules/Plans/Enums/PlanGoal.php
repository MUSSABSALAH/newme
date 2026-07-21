<?php

declare(strict_types=1);

namespace App\Modules\Plans\Enums;

/**
 * Dietary goal a plan is built around (mirrors the public plans catalog).
 */
enum PlanGoal: string
{
    case WeightLoss = 'weight_loss';
    case MuscleBuilding = 'muscle_building';
    case Diabetic = 'diabetic';
    case Breastfeeding = 'breastfeeding';
    case Balanced = 'balanced';
    case DigestiveHealth = 'digestive_health';
    case Carnivore = 'carnivore';
    case LowCarb = 'low_carb';
    case Vegan = 'vegan';
    case Keto = 'keto';

    /**
     * @return list<string>
     */
    public static function values(): array
    {
        return array_map(static fn (self $goal): string => $goal->value, self::cases());
    }

    /**
     * Localized, human-readable label for this goal.
     */
    public function label(): string
    {
        return (string) __('plans.goals.'.$this->value);
    }

    /**
     * Short slug used by the public website wizard/menu (hash, links, icons).
     */
    public function websiteSlug(): string
    {
        return match ($this) {
            self::WeightLoss => 'loss',
            self::MuscleBuilding => 'muscle',
            self::Balanced => 'balance',
            self::Breastfeeding => 'feeding',
            self::DigestiveHealth => 'gut',
            self::LowCarb => 'lowcarb',
            self::Diabetic => 'diabetic',
            self::Keto => 'keto',
            self::Vegan => 'vegan',
            self::Carnivore => 'carnivore',
        };
    }

    /**
     * Approximate daily calorie target shown on the public menu page.
     */
    public function dailyCalorieTarget(): int
    {
        return match ($this) {
            self::MuscleBuilding => 2200,
            self::Carnivore => 1800,
            self::Breastfeeding => 1900,
            self::Balanced, self::Keto => 1600,
            self::DigestiveHealth, self::Vegan => 1550,
            self::Diabetic, self::LowCarb => 1500,
            self::WeightLoss => 1450,
        };
    }
}
