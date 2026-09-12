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
use RuntimeException;

/**
 * Seeds the four New Me 1400 kcal programs together with their own meal
 * catalogue and pricing matrix.
 *
 * Program content comes from `database/data/newme-programs-1400.json`, which is
 * generated from the nutrition team's workbook. Each program owns its meals:
 * the same dish name can appear in several programs with different macros, so
 * meals are never shared across plans.
 *
 * Prices are placeholders meant to be adjusted from the admin panel.
 */
final class PlanSeeder extends Seeder
{
    /** Placeholder price per meal in minor units (12.00 SAR). */
    private const BasePerMealMinor = 1200;

    /** Delivery days per week baked into the seeded package price. */
    private const DeliveryDaysPerWeek = 5;

    /**
     * Public display order: keto, low carb, general healthy, diabetes.
     *
     * @var array<string, int>
     */
    private const DisplayOrder = [
        'keto' => 1,
        'low_carb' => 2,
        'balanced' => 3,
        'diabetic' => 4,
    ];

    public function run(): void
    {
        if (Plan::query()->exists()) {
            $updated = self::syncExistingCopy();
            $this->command?->info("Updated copy on {$updated} existing plan(s).");

            return;
        }

        foreach ($this->programs() as $index => $program) {
            $this->seedProgram($program, $index);
        }
    }

    /**
     * Refresh names, descriptions, and sort order on existing plans
     * without touching meals, prices, or subscriptions.
     */
    public static function syncExistingCopy(): int
    {
        $updated = 0;

        foreach (Plan::query()->get() as $plan) {
            $copy = self::marketingCopy()[$plan->goal->value] ?? null;

            if ($copy === null) {
                continue;
            }

            $plan->setTranslations('name', $copy['name']);
            $plan->setTranslations('description', $copy['description']);
            $plan->sort_order = $copy['sort'];
            $plan->save();
            $updated++;
        }

        return $updated;
    }

    /**
     * Customer-facing plan names and descriptions (AR + EN).
     *
     * @return array<string, array{sort: int, name: array{ar: string, en: string}, description: array{ar: string, en: string}}>
     */
    public static function marketingCopy(): array
    {
        return [
            'keto' => [
                'sort' => 1,
                'name' => [
                    'ar' => 'الكيتو',
                    'en' => 'Keto',
                ],
                'description' => [
                    'ar' => "لمن يريد نتيجة سريعة وانضباطاً عالياً\nنشويات في أدنى حدودها، ودهون صحية تقود الطاقة — وجبات مبنية على دقيق «نيو مي» تُبقيك داخل نطاقك دون أن تفقد الخبز عن طاولتك.",
                    'en' => "For fast results and high discipline\nStarches at their lowest, healthy fats driving energy — meals built on New Me flour that keep you in range without giving up bread.",
                ],
            ],
            'low_carb' => [
                'sort' => 2,
                'name' => [
                    'ar' => 'منخفض النشويات',
                    'en' => 'Low-Starch',
                ],
                'description' => [
                    'ar' => "البداية الأسهل، والأقرب لأسلوب حياتك\nتقليلٌ لا حرمان — نشويات أقل وبروتين وألياف أعلى، بوجبات تشبه ما اعتدته لكن بتركيبة مختلفة.",
                    'en' => "The easier start, closest to how you already live\nReduction, not deprivation — fewer starches, more protein and fibre, in meals that look like what you know but are built differently.",
                ],
            ],
            'balanced' => [
                'sort' => 3,
                'name' => [
                    'ar' => 'النظام الصحي العام',
                    'en' => 'General Healthy',
                ],
                'description' => [
                    'ar' => "للحفاظ على التوازن لا لتغييره\nأكلٌ متوازن ومحسوب المقادير، بلا قيود قاسية — لمن يريد طعاماً نظيفاً وحياة مستمرة كما هي.",
                    'en' => "To hold your balance, not change it\nBalanced, measured eating without harsh restrictions — clean food, and life carrying on as it is.",
                ],
            ],
            'diabetic' => [
                'sort' => 4,
                'name' => [
                    'ar' => 'نظام مرضى السكري',
                    'en' => 'Diabetes',
                ],
                'description' => [
                    'ar' => "النظام الذي بدأنا منه\nمصمَّم على احتياج الحالة، بمتابعة أخصائي التغذية وضبطٍ دقيق للمقادير في كل وجبة.",
                    'en' => "The programme we started with\nBuilt around the condition, with nutritionist follow-up and precise portioning in every meal.",
                ],
            ],
        ];
    }

    /**
     * @return list<array<string, mixed>>
     */
    private function programs(): array
    {
        $path = database_path('data/newme-programs-1400.json');

        if (! is_file($path)) {
            throw new RuntimeException("Program data file is missing: {$path}");
        }

        $decoded = json_decode((string) file_get_contents($path), true, 512, JSON_THROW_ON_ERROR);

        return $decoded['programs'] ?? [];
    }

    /**
     * @param  array<string, mixed>  $program
     */
    private function seedProgram(array $program, int $sortOrder): void
    {
        $goal = PlanGoal::from($program['goal']);

        $plan = new Plan;
        $copy = self::marketingCopy()[$goal->value] ?? null;

        $plan->goal = $goal;
        $plan->setTranslations('name', is_array($copy) ? $copy['name'] : $program['name']);
        $plan->setTranslations('description', is_array($copy) ? $copy['description'] : $program['description']);
        $plan->setTranslations('features', $this->features($program['macros']));
        $plan->requires_day_selection = true;
        $plan->min_delivery_days_per_week = self::DeliveryDaysPerWeek;
        $plan->delivery_fee = 0;
        $plan->is_active = true;
        $plan->is_most_chosen = $goal === PlanGoal::Keto;
        $plan->sort_order = is_array($copy)
            ? $copy['sort']
            : (self::DisplayOrder[$goal->value] ?? ($sortOrder + 1));
        $plan->save();

        $this->seedPricing($plan);
        $plan->meals()->sync($this->seedMeals($program['meals']));
    }

    /**
     * Macro envelope from the workbook summary, shown as the plan feature list.
     *
     * @param  array<string, mixed>  $macros
     * @return array<string, list<string>>
     */
    private function features(array $macros): array
    {
        return [
            'ar' => [
                $macros['calories'].' كالوري في اليوم',
                'بروتين '.$macros['protein'].' غ',
                'كربوهيدرات '.$macros['carbs'].' غ',
                'دهون '.$macros['fat'].' غ',
                'ألياف '.$macros['fiber'].' غ',
                'قيم معايَرة بإشراف خبير التغذية',
            ],
            'en' => [
                $macros['calories'].' kcal per day',
                'Protein '.$macros['protein'].' g',
                'Carbs '.$macros['carbs'].' g',
                'Fat '.$macros['fat'].' g',
                'Fibre '.$macros['fiber'].' g',
                'Reviewed by our nutrition expert',
            ],
        ];
    }

    /**
     * Creates the published version and its price table: every selectable
     * meal-type combination across the three subscription durations.
     */
    private function seedPricing(Plan $plan): void
    {
        /** @var PlanVersion $version */
        $version = $plan->versions()->create([
            'version_number' => 1,
            'status' => PlanVersionStatus::Published->value,
            'published_at' => now(),
        ]);

        // The wizard requires at least two meals, one of them lunch or dinner.
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
    }

    /**
     * @param  list<array<string, mixed>>  $meals
     * @return list<int> ids of the meals created for this program
     */
    private function seedMeals(array $meals): array
    {
        $ids = [];

        foreach ($meals as $meal) {
            $model = new Meal;
            $model->meal_type = MealType::from($meal['type']);
            $model->setTranslations('name', $meal['name']);
            $model->calories = $meal['calories'];
            $model->protein_g = $meal['protein_g'];
            $model->carbs_g = $meal['carbs_g'];
            $model->fat_g = $meal['fat_g'];
            $model->is_active = true;
            $model->sort_order = $meal['sort_order'];
            $model->save();

            $ids[] = $model->id;
        }

        return $ids;
    }
}
