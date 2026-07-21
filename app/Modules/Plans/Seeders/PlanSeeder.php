<?php

declare(strict_types=1);

namespace App\Modules\Plans\Seeders;

use App\Modules\Plans\Enums\DurationUnit;
use App\Modules\Plans\Enums\MealType;
use App\Modules\Plans\Enums\PlanGoal;
use App\Modules\Plans\Enums\PlanVersionStatus;
use App\Modules\Plans\Models\Meal;
use App\Modules\Plans\Models\Plan;
use App\Modules\Plans\Models\PlanVersion;
use Illuminate\Database\Seeder;

/**
 * Seeds the 10 dietary programs from the public subscribe wizard
 * (`lang/{ar,en}/website.php` → `subscribe.plans`) with pricing aligned to
 * the website calculator (12 SAR / meal, weekly / monthly / quarterly).
 */
final class PlanSeeder extends Seeder
{
    /** Website BASE price per dish in minor units (12.00 SAR). */
    private const BasePerMealMinor = 1200;

    /** Assumed delivery days/week baked into the seeded base price. */
    private const DeliveryDaysPerWeek = 5;

    public function run(): void
    {
        if (Plan::query()->exists()) {
            return;
        }

        foreach ($this->plans() as $index => $plan) {
            $this->seedPlan(
                goal: $plan['goal'],
                name: $plan['name'],
                description: $plan['description'],
                imagePath: $plan['image'],
                sortOrder: $index,
            );
        }
    }

    /**
     * @return list<array{goal: PlanGoal, name: array<string, string>, description: array<string, string>, image: string}>
     */
    private function plans(): array
    {
        return [
            [
                'goal' => PlanGoal::MuscleBuilding,
                'name' => ['ar' => 'بناء العضلات', 'en' => 'Muscle building'],
                'description' => [
                    'ar' => 'تغذية عالية الأداء للقوة ونمو العضلات',
                    'en' => 'High-performance nutrition for strength and muscle growth',
                ],
                'image' => 'subscription/p101_700x400.jpg',
            ],
            [
                'goal' => PlanGoal::WeightLoss,
                'name' => ['ar' => 'خسارة الوزن', 'en' => 'Weight loss'],
                'description' => [
                    'ar' => 'سعرات مضبوطة لخسارة دهون آمنة وأسرع',
                    'en' => 'Calorie-controlled for safe, faster fat loss',
                ],
                'image' => 'subscription/p102_700x400.jpg',
            ],
            [
                'goal' => PlanGoal::Balanced,
                'name' => ['ar' => 'التوازن', 'en' => 'Balance'],
                'description' => [
                    'ar' => 'نمط حياة غذائي مرن وطويل الأمد',
                    'en' => 'A flexible, long-term eating lifestyle',
                ],
                'image' => 'subscription/p103_700x400.jpg',
            ],
            [
                'goal' => PlanGoal::Diabetic,
                'name' => ['ar' => 'السكري', 'en' => 'Diabetes'],
                'description' => [
                    'ar' => 'مصمم لضبط سكر الدم بدقة',
                    'en' => 'Designed for precise blood-sugar control',
                ],
                'image' => 'subscription/p104_700x400.jpg',
            ],
            [
                'goal' => PlanGoal::Breastfeeding,
                'name' => ['ar' => 'الرضاعة', 'en' => 'Breastfeeding'],
                'description' => [
                    'ar' => 'تغذية تدعم التعافي والطاقة وإدرار الحليب',
                    'en' => 'Nutrition that supports recovery, energy, and milk supply',
                ],
                'image' => 'subscription/p105_700x400.jpg',
            ],
            [
                'goal' => PlanGoal::DigestiveHealth,
                'name' => ['ar' => 'صحة الجهاز الهضمي', 'en' => 'Gut health'],
                'description' => [
                    'ar' => 'تغذية تركّز على راحة المعدة وتحسين الهضم',
                    'en' => 'Nutrition focused on comfort and better digestion',
                ],
                'image' => 'subscription/p106_700x400.jpg',
            ],
            [
                'goal' => PlanGoal::LowCarb,
                'name' => ['ar' => 'قليل الكربوهيدرات', 'en' => 'Low carb'],
                'description' => [
                    'ar' => 'كربوهيدرات مضبوطة مع توازن البروتين والدهون',
                    'en' => 'Controlled carbs with balanced protein and fats',
                ],
                'image' => 'subscription/p107_700x400.jpg',
            ],
            [
                'goal' => PlanGoal::Keto,
                'name' => ['ar' => 'كيتو', 'en' => 'Keto'],
                'description' => [
                    'ar' => 'قليل الكربوهيدرات عالي الدهون للحفاظ على الكيتوزية',
                    'en' => 'Low carb, high fat to stay in ketosis',
                ],
                'image' => 'subscription/p108_700x400.jpg',
            ],
            [
                'goal' => PlanGoal::Vegan,
                'name' => ['ar' => 'نباتي', 'en' => 'Vegan'],
                'description' => [
                    'ar' => 'تغذية نباتية 100% متوازنة ومستقرة السكر',
                    'en' => '100% plant-based, balanced and blood-sugar steady',
                ],
                'image' => 'subscription/p109_700x400.jpg',
            ],
            [
                'goal' => PlanGoal::Carnivore,
                'name' => ['ar' => 'كارنيفور', 'en' => 'Carnivore'],
                'description' => [
                    'ar' => 'بروتين حيواني صافٍ لأقصى تركيز وشبع',
                    'en' => 'Pure animal protein for focus and lasting satiety',
                ],
                'image' => 'subscription/p110_700x400.jpg',
            ],
        ];
    }

    /**
     * @param  array<string, string>  $name
     * @param  array<string, string>  $description
     */
    private function seedPlan(PlanGoal $goal, array $name, array $description, string $imagePath, int $sortOrder): void
    {
        $plan = new Plan;
        $plan->goal = $goal;
        $plan->setTranslations('name', $name);
        $plan->setTranslations('description', $description);
        $plan->setTranslations('features', [
            'ar' => [
                'وجبات طازجة يوميًا',
                'توصيل مجاني',
                'إشراف أخصائي تغذية',
                'تخطَّ أو أعد الجدولة في أي وقت',
                'إلغاء في أي وقت — بدون رسوم',
            ],
            'en' => [
                'Fresh daily meals',
                'Free delivery',
                'Nutritionist supervised',
                'Skip or reschedule anytime',
                'Cancel anytime — no fees',
            ],
        ]);
        $plan->image_path = $imagePath;
        $plan->requires_day_selection = true;
        $plan->min_delivery_days_per_week = self::DeliveryDaysPerWeek;
        $plan->delivery_fee = 0;
        $plan->is_active = true;
        $plan->sort_order = $sortOrder;
        $plan->save();

        /** @var PlanVersion $version */
        $version = $plan->versions()->create([
            'version_number' => 1,
            'status' => PlanVersionStatus::Published->value,
            'published_at' => now(),
        ]);

        // Common meal-type combos (website requires ≥2 meals including lunch or dinner).
        $combinations = [
            [MealType::Breakfast->value, MealType::Lunch->value],
            [MealType::Lunch->value, MealType::Dinner->value],
            [MealType::Breakfast->value, MealType::Lunch->value, MealType::Dinner->value],
            [MealType::Lunch->value, MealType::Dinner->value, MealType::Snack->value],
            [
                MealType::Breakfast->value,
                MealType::Lunch->value,
                MealType::Dinner->value,
                MealType::Snack->value,
            ],
        ];

        // Matches subscribe wizard: weekly / monthly (15%) / quarterly (31%).
        $durations = [
            ['unit' => DurationUnit::Week, 'length' => 1, 'discount' => '0.00'],
            ['unit' => DurationUnit::Week, 'length' => 4, 'discount' => '15.00'],
            ['unit' => DurationUnit::Week, 'length' => 12, 'discount' => '31.00'],
        ];

        $sort = 0;

        foreach ($combinations as $combo) {
            foreach ($durations as $duration) {
                $mealCount = count($combo) * self::DeliveryDaysPerWeek * $duration['length'];

                $version->pricingRules()->create([
                    'meal_types' => $combo,
                    'meal_types_key' => MealType::key($combo),
                    'duration_unit' => $duration['unit']->value,
                    'duration_length' => $duration['length'],
                    'price' => $mealCount * self::BasePerMealMinor,
                    'discount_percent' => $duration['discount'],
                    'is_active' => true,
                    'sort_order' => $sort++,
                ]);
            }
        }

        // Website menu is shared across programs.
        $plan->meals()->sync(Meal::query()->where('is_active', true)->pluck('id')->all());
    }
}
