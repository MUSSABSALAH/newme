<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Modules\Plans\Enums\MealType;
use App\Modules\Plans\Models\Meal;
use App\Modules\Plans\Models\Plan;
use App\Modules\Plans\Models\PlanVersion;
use App\Modules\Plans\Services\PlanPricingService;
use App\Modules\Settings\Services\SettingsService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;

class WebsiteController extends Controller
{
    /** Plan-card icon per website slug (matches the wizard's inline SVG defs). */
    private const PLAN_ICONS = [
        'muscle' => 'i-dumbbell',
        'loss' => 'i-flame',
        'balance' => 'i-target',
        'diabetic' => 'i-drop',
        'feeding' => 'i-heart',
        'gut' => 'i-bowl',
        'lowcarb' => 'i-wheat',
        'keto' => 'i-bolt',
        'vegan' => 'i-leaf',
        'carnivore' => 'i-flame',
    ];

    public function __construct(
        private readonly PlanPricingService $pricing,
        private readonly SettingsService $settings,
    ) {}

    public function home(): View
    {
        return view('website.pages.home');
    }

    public function main(): View
    {
        return view('website.pages.main');
    }

    public function store(): View
    {
        return view('website.pages.store');
    }

    public function subscribe(): View
    {
        $plans = $this->websitePlans();

        return view('website.pages.subscribe', [
            'plans' => $plans->all(),
            'planNames' => $plans->pluck('name', 'key')->all(),
            'planSlugs' => $plans->pluck('key')->all(),
            'defaultPlan' => $plans->firstWhere('key', 'balance') ?? $plans->first(),
            'plansData' => $this->websitePlansData(),
            'finance' => $this->financeConfig(),
        ]);
    }

    public function menu(): View
    {
        $plans = $this->websitePlans();

        return view('website.pages.menu', [
            'menuPlans' => $plans->map(fn (array $p): array => [$p['key'], $p['name'], $p['kcal']])->values()->all(),
            'menuDishes' => $this->websiteMeals(),
        ]);
    }

    public function blog(): View
    {
        return view('website.pages.blog');
    }

    public function product(): View
    {
        return view('website.pages.product');
    }

    public function consult(): View
    {
        return view('website.pages.consult');
    }

    public function terms(): View
    {
        return view('website.pages.terms');
    }

    /**
     * Active, published plans shaped for the public website (wizard + menu).
     *
     * @return Collection<int, array{key: string, name: string, desc: string, image_url: string|null, icon: string, pop: bool, f: string, kcal: int, public_id: string}>
     */
    private function websitePlans(): Collection
    {
        return $this->activePublishedPlans()
            ->map(function (Plan $plan): array {
                $slug = $plan->goal->websiteSlug();

                return [
                    'key' => $slug,
                    'name' => $plan->label(),
                    'desc' => (string) $plan->getTranslation('description', app()->getLocale(), false),
                    'image_url' => $plan->image_path !== null ? asset('storage/'.$plan->image_path) : null,
                    'icon' => self::PLAN_ICONS[$slug] ?? 'i-target',
                    'pop' => $slug === 'balance',
                    'f' => '1',
                    'kcal' => $plan->goal->dailyCalorieTarget(),
                    'public_id' => $plan->public_id,
                ];
            })
            ->values();
    }

    /**
     * Per-plan wizard data keyed by website slug: durations (from the published
     * pricing matrix, grouped by meal-type combination) and the selectable meal
     * catalog grouped by meal type. All money is in integer minor units.
     *
     * @return array<string, array<string, mixed>>
     */
    private function websitePlansData(): array
    {
        $data = [];

        foreach ($this->activePublishedPlans() as $plan) {
            $slug = $plan->goal->websiteSlug();
            $version = $plan->publishedVersion();

            $data[$slug] = [
                'name' => $plan->label(),
                'requires_days' => $plan->requires_day_selection,
                'min_days' => $plan->min_delivery_days_per_week,
                'delivery_fee' => $plan->delivery_fee,
                'pricing' => $version instanceof PlanVersion ? $this->pricingMatrix($version) : [],
                'meals' => $this->planMeals($plan),
            ];
        }

        return $data;
    }

    /**
     * Duration options per meal-type combination for a published version.
     *
     * @return array<string, list<array{unit: string, length: int, total_days: int, price: int, discount: string, label: string}>>
     */
    private function pricingMatrix(PlanVersion $version): array
    {
        $matrix = [];

        foreach ($this->pricing->matrix($version) as $key => $rules) {
            $options = [];

            foreach ($rules as $rule) {
                $options[] = [
                    'unit' => $rule->duration_unit->value,
                    'length' => $rule->duration_length,
                    'total_days' => $rule->totalDays(),
                    'price' => $rule->price,
                    'discount' => (string) $rule->discount_percent,
                    'label' => $rule->duration_length.' '.__('plans.units.'.$rule->duration_unit->value),
                ];
            }

            $matrix[$key] = $options;
        }

        return $matrix;
    }

    /**
     * A plan's selectable meals grouped by meal type.
     *
     * @return array<string, list<array{name: string, image_url: string|null, calories: int, protein: int, carbs: int, fat: int}>>
     */
    private function planMeals(Plan $plan): array
    {
        $grouped = [];

        foreach (MealType::cases() as $type) {
            $grouped[$type->value] = [];
        }

        $meals = $plan->meals()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        foreach ($meals as $meal) {
            $grouped[$meal->meal_type->value][] = [
                'name' => $meal->label(),
                'image_url' => $meal->image_path !== null ? asset('storage/'.$meal->image_path) : null,
                'calories' => (int) $meal->calories,
                'protein' => (int) $meal->protein_g,
                'carbs' => (int) $meal->carbs_g,
                'fat' => (int) $meal->fat_g,
            ];
        }

        return $grouped;
    }

    /**
     * Finance settings the client needs to mirror server-side pricing.
     *
     * @return array{tax_rate: float, include_tax: bool, currency: string}
     */
    private function financeConfig(): array
    {
        $taxRate = $this->settings->get('finance.tax_rate');

        return [
            'tax_rate' => is_numeric($taxRate) ? (float) $taxRate : 0.0,
            'include_tax' => (bool) $this->settings->get('finance.prices_include_tax'),
            'currency' => (string) __('website.subscribe.js.currency'),
        ];
    }

    /**
     * @return Collection<int, Plan>
     */
    private function activePublishedPlans(): Collection
    {
        return Plan::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->filter(fn (Plan $plan): bool => $plan->publishedVersion() !== null)
            ->values();
    }

    /**
     * Active meals grouped by type, shaped for the public menu grid.
     *
     * Each dish tuple is [name, description, calories, protein, carbs, fat, image_url]
     * to match the menu page's rendering contract.
     *
     * @return array<string, list<array{0: string, 1: string, 2: int, 3: int, 4: int, 5: int, 6: string|null}>>
     */
    private function websiteMeals(): array
    {
        $grouped = [];

        foreach (MealType::cases() as $type) {
            $grouped[$type->value] = [];
        }

        $meals = Meal::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        foreach ($meals as $meal) {
            $grouped[$meal->meal_type->value][] = [
                $meal->label(),
                '',
                (int) $meal->calories,
                (int) $meal->protein_g,
                (int) $meal->carbs_g,
                (int) $meal->fat_g,
                $meal->image_path !== null ? asset('storage/'.$meal->image_path) : null,
            ];
        }

        return $grouped;
    }
}
