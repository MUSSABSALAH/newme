<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\Cms\Models\Article;
use App\Modules\Cms\Models\Recipe;
use App\Modules\Consultations\Enums\ConsultationStatus;
use App\Modules\Consultations\Models\Consultation;
use App\Modules\Identity\DTOs\HealthProfile;
use App\Modules\Plans\Enums\MealType;
use App\Modules\Plans\Models\Meal;
use App\Modules\Plans\Models\Plan;
use App\Modules\Plans\Models\PlanVersion;
use App\Modules\Plans\Services\PlanPricingService;
use App\Modules\Settings\Services\SettingsService;
use App\Modules\Settings\Support\ConsultationSchedule;
use App\Modules\Store\Models\Category;
use App\Modules\Store\Models\Product;
use App\Modules\Subscriptions\Support\SubscriptionStartRules;
use App\Support\Money\Money;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

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
        private readonly ConsultationSchedule $consultationSchedule,
    ) {}

    public function home(): View
    {
        return view('website.pages.home');
    }

    public function main(): View
    {
        return view('website.pages.main', [
            'shopProducts' => $this->websiteShopPreview(),
            'homeArticles' => Article::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->orderBy('id')
                ->limit(3)
                ->get(),
            'homeRecipes' => Recipe::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->orderBy('id')
                ->limit(3)
                ->get(),
        ]);
    }

    public function store(): View
    {
        return view('website.pages.store', $this->websiteStore());
    }

    public function subscribe(): View
    {
        $plans = $this->websitePlans();

        return view('website.pages.subscribe', [
            'plans' => $plans->all(),
            'planNames' => $plans->pluck('name', 'key')->all(),
            'planSlugs' => $plans->pluck('key')->all(),
            'planIds' => $plans->pluck('public_id', 'key')->all(),
            'defaultPlan' => $plans->firstWhere('key', 'balance') ?? $plans->first(),
            'plansData' => $this->websitePlansData(),
            'finance' => $this->financeConfig(),
            'operations' => $this->operationsConfig(),
            'birthDateRange' => HealthProfile::birthDateRange(),
            'ageLimits' => ['min' => HealthProfile::MIN_AGE, 'max' => HealthProfile::MAX_AGE],
            'healthProfile' => $this->savedHealthProfile()->toArray(),
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
        return view('website.pages.blog', [
            'articles' => Article::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->orderBy('id')
                ->get(),
            'recipes' => Recipe::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->orderBy('id')
                ->get(),
        ]);
    }

    public function product(): View
    {
        return view('website.pages.product');
    }

    public function productShow(Product $product): View
    {
        abort_unless($product->is_active, 404);

        $product->loadMissing('category.parent');

        $topCategories = Category::query()
            ->where('is_active', true)
            ->whereNull('parent_id')
            ->with(['children' => fn ($query) => $query->select('id', 'parent_id')])
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->map(function (Category $category): array {
                $scopeIds = $category->children->pluck('id')->push($category->id)->all();

                $thumb = Product::query()
                    ->where('is_active', true)
                    ->whereIn('category_id', $scopeIds)
                    ->whereNotNull('image_path')
                    ->orderBy('sort_order')
                    ->orderBy('id')
                    ->first();

                return [
                    'slug' => $category->slug,
                    'label' => $category->label(),
                    'image_url' => $category->imageUrl() ?? $thumb?->imageUrl(),
                ];
            })
            ->all();

        return view('website.pages.product-detail', [
            'product' => $this->websiteProductDetail($product),
            'categories' => $topCategories,
        ]);
    }

    public function consult(): View
    {
        $user = Auth::user();
        abort_unless($user instanceof User, 401);

        $schedule = $this->consultationSchedule->forFrontend();
        $schedule['booked'] = $this->bookedConsultationStarts(
            (int) ($schedule['days_ahead'] ?? ConsultationSchedule::DAYS_AHEAD),
        );

        return view('website.pages.consult', [
            'consultationSchedule' => $schedule,
            'customer' => $user,
        ]);
    }

    /**
     * Occupied slot starts keyed by Y-m-d for the public booking UI.
     *
     * @return array<string, list<string>>
     */
    private function bookedConsultationStarts(int $daysAhead): array
    {
        $from = now()->startOfDay()->addDay();
        $to = now()->startOfDay()->addDays(max(1, $daysAhead));

        $rows = Consultation::query()
            ->whereIn('status', ConsultationStatus::occupyingValues())
            ->whereBetween('scheduled_on', [$from->toDateString(), $to->toDateString()])
            ->get(['scheduled_on', 'starts_at']);

        $booked = [];

        foreach ($rows as $row) {
            $date = $row->scheduled_on?->toDateString();

            if ($date === null) {
                continue;
            }

            $booked[$date] ??= [];
            $booked[$date][] = $row->startsAtDisplay();
        }

        return $booked;
    }

    public function terms(): View
    {
        return view('website.pages.terms');
    }

    /**
     * Health details the signed-in customer already shared, so the wizard can
     * offer them back instead of asking again.
     */
    private function savedHealthProfile(): HealthProfile
    {
        $user = Auth::user();

        return $user instanceof User ? HealthProfile::fromUser($user) : HealthProfile::empty();
    }

    /**
     * Active, published plans shaped for the public website (wizard + menu).
     *
     * @return Collection<int, array<string, mixed>>
     */
    private function websitePlans(): Collection
    {
        return $this->activePublishedPlans()
            ->map($this->websitePlan(...))
            ->values();
    }

    /**
     * A single plan shaped for the public website.
     *
     * @return array<string, mixed>
     */
    private function websitePlan(Plan $plan): array
    {
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
     * Operations knobs the subscribe wizard must honour.
     *
     * @return array{min_start_days: int, min_start_date: string}
     */
    private function operationsConfig(): array
    {
        return [
            'min_start_days' => SubscriptionStartRules::minStartDays(),
            'min_start_date' => SubscriptionStartRules::earliestDateString(),
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
     * Featured (or latest) products for the home-page shop preview strip.
     *
     * @return list<array<string, mixed>>
     */
    private function websiteShopPreview(int $limit = 5): array
    {
        $flagIcons = [
            'bestseller' => '#i-flame',
            'sale' => '#i-leaf',
            'occasions' => '#i-hat',
        ];

        $query = Product::query()
            ->where('is_active', true)
            ->with('category.parent')
            ->orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->limit($limit);

        return $query->get()->map(function (Product $product) use ($flagIcons): array {
            $protein = $this->trimDecimal($product->protein_g);
            $kcal = (int) $product->calories;
            $flag = $product->flag?->value;
            $category = $product->category;
            $parent = $category->parent;
            $catSlug = $parent !== null ? $parent->slug : $category->slug;

            $description = (string) $product->getTranslation('description', app()->getLocale(), false);
            if ($description === '') {
                $description = $category->label();
            }

            return [
                'name' => $product->label(),
                'sub' => $description,
                'image_url' => $product->imageUrl(),
                'url' => route('website.product.show', ['product' => $product->slug]),
                'flag' => $product->flag?->label(),
                'flag_icon' => $flagIcons[$flag] ?? null,
                'flag_style' => $flag === 'sale' ? 'color:var(--green)' : '',
                'cat' => $catSlug,
                'cat_label' => $parent !== null ? $parent->label() : $category->label(),
                'protein' => $protein !== ''
                    ? __('website.main.shop.protein', ['value' => $protein])
                    : null,
                'kcal' => $kcal > 0
                    ? __('website.main.shop.kcal', ['value' => $kcal])
                    : null,
                'price' => $this->trimDecimal(Money::fromMinor($product->price)->format()),
            ];
        })->all();
    }

    /**
     * Store catalog shaped for the public store page: category tabs, the bakery
     * subcategory row, and every active product with its display fields.
     *
     * @return array{tabs: list<array<string, mixed>>, subs: list<array<string, string>>, products: list<array<string, mixed>>, total: int}
     */
    private function websiteStore(): array
    {
        $topCategories = Category::query()
            ->where('is_active', true)
            ->whereNull('parent_id')
            ->with(['children' => fn ($query) => $query
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->orderBy('id'),
            ])
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $products = Product::query()
            ->where('is_active', true)
            ->with('category.parent')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->map(fn (Product $product): array => $this->websiteStoreProduct($product))
            ->values()
            ->all();

        $counts = [];
        foreach ($products as $product) {
            $counts[$product['cat']] = ($counts[$product['cat']] ?? 0) + 1;
        }

        $total = count($products);

        $tabs = [[
            'slug' => 'all',
            'label' => (string) __('website.store.tabs.all'),
            'count' => $total,
            'has_subs' => false,
        ]];

        foreach ($topCategories as $category) {
            $tabs[] = [
                'slug' => $category->slug,
                'label' => $category->label(),
                'count' => $counts[$category->slug] ?? 0,
                'has_subs' => $category->children->isNotEmpty(),
            ];
        }

        $subs = [[
            'slug' => 'all',
            'label' => (string) __('website.store.subs.all'),
        ]];

        $withSubs = $topCategories->first(fn (Category $category): bool => $category->children->isNotEmpty());

        if ($withSubs instanceof Category) {
            foreach ($withSubs->children as $child) {
                $subs[] = [
                    'slug' => $child->slug,
                    'label' => $child->label(),
                ];
            }
        }

        return compact('tabs', 'subs', 'products', 'total');
    }

    /**
     * Shape a single product for the store grid (filter attributes + display).
     *
     * @return array<string, mixed>
     */
    private function websiteStoreProduct(Product $product): array
    {
        $category = $product->category;
        $parent = $category->parent;

        // A child category keeps its parent as the top-level tab and itself as
        // the sub-tab; a top-level category has no sub.
        $topSlug = $parent !== null ? $parent->slug : $category->slug;
        $subSlug = $parent !== null ? $category->slug : '';

        $catLabel = $parent !== null
            ? $parent->label().' — '.$category->label()
            : $category->label();

        return [
            'id' => $product->slug,
            'cat' => $topSlug,
            'sub' => $subSlug,
            'href' => route('website.product.show', ['product' => $product->slug]),
            'image_url' => $product->imageUrl(),
            'name' => $product->label(),
            'cat_label' => $catLabel,
            'kcal' => (int) $product->calories,
            'serving' => $product->serving_size?->label() ?? '',
            'protein' => $this->trimDecimal($product->protein_g),
            'fat' => $this->trimDecimal($product->fat_g),
            'carbs' => $this->trimDecimal($product->carbs_g),
            'note' => $product->nutrition_note?->value,
            'price' => $this->trimDecimal(Money::fromMinor($product->price)->format()),
            'flag' => $product->flag?->value,
            'feat' => $product->is_featured,
        ];
    }

    /**
     * A single product shaped for the product-detail page.
     *
     * @return array<string, mixed>
     */
    private function websiteProductDetail(Product $product): array
    {
        $category = $product->category;
        $parent = $category->parent;

        return [
            'id' => $product->id,
            'name' => $product->label(),
            'description' => (string) $product->getTranslation('description', app()->getLocale(), false),
            'image_url' => $product->imageUrl(),
            'price' => Money::fromMinor($product->price)->format(),
            'kcal' => (int) $product->calories,
            'serving' => $product->serving_size?->label() ?? '',
            'protein' => $this->trimDecimal($product->protein_g),
            'fat' => $this->trimDecimal($product->fat_g),
            'carbs' => $this->trimDecimal($product->carbs_g),
            'note' => $product->nutrition_note?->value,
            'flag' => $product->flag?->value,
            'cat_slug' => $parent !== null ? $parent->slug : $category->slug,
            'cat_label' => $parent !== null
                ? $parent->label().' — '.$category->label()
                : $category->label(),
        ];
    }

    /**
     * Drop trailing zeros from a decimal string ("12.10" => "12.1", "4.00" => "4").
     */
    private function trimDecimal(?string $value): string
    {
        if ($value === null || $value === '') {
            return '';
        }

        if (str_contains($value, '.')) {
            $value = rtrim(rtrim($value, '0'), '.');
        }

        return $value;
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
