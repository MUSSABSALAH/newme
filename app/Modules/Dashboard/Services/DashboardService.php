<?php

declare(strict_types=1);

namespace App\Modules\Dashboard\Services;

use App\Models\User;
use App\Modules\Cms\Models\Article;
use App\Modules\Cms\Models\Recipe;
use App\Modules\Consultations\Enums\ConsultationStatus;
use App\Modules\Consultations\Models\Consultation;
use App\Modules\Dashboard\DTOs\CatalogPanelData;
use App\Modules\Dashboard\DTOs\ConsultationsPanelData;
use App\Modules\Dashboard\DTOs\ContentPanelData;
use App\Modules\Dashboard\DTOs\CustomersPanelData;
use App\Modules\Dashboard\DTOs\DashboardSnapshot;
use App\Modules\Dashboard\DTOs\DeliveriesPanelData;
use App\Modules\Dashboard\DTOs\FinancePanelData;
use App\Modules\Dashboard\DTOs\OrdersPanelData;
use App\Modules\Dashboard\DTOs\SubscriptionsPanelData;
use App\Modules\Dashboard\Enums\DashboardPanel;
use App\Modules\Delivery\Services\DeliveryBoardService;
use App\Modules\Invoices\Models\Invoice;
use App\Modules\Orders\Enums\OrderStatus;
use App\Modules\Orders\Models\Order;
use App\Modules\Store\Models\Category;
use App\Modules\Store\Models\Product;
use App\Modules\Subscriptions\Enums\HandlingStatus;
use App\Modules\Subscriptions\Enums\SubscriptionStatus;
use App\Modules\Subscriptions\Models\Subscription;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Assembles the figures shown on the admin home screen.
 *
 * The snapshot is built panel by panel and each panel is skipped entirely when
 * the viewer lacks the module permission behind it, so a member only pays for
 * (and only ever sees) the numbers they are allowed to work with.
 *
 * Every query is scoped to the current calendar day / month in the app
 * timezone so the numbers match what staff expect when they say "today".
 */
final class DashboardService
{
    public function __construct(private readonly DeliveryBoardService $board) {}

    public function snapshot(User $user, ?Carbon $now = null): DashboardSnapshot
    {
        $now ??= Carbon::now();
        $startOfDay = $now->copy()->startOfDay();
        $startOfMonth = $now->copy()->startOfMonth();

        $panels = DashboardPanel::visibleTo($user);
        $wants = static fn (DashboardPanel $panel): bool => in_array($panel, $panels, true);

        return new DashboardSnapshot(
            panels: $panels,
            deliveries: $wants(DashboardPanel::Deliveries) ? $this->deliveries($now) : null,
            finance: $wants(DashboardPanel::Finance) ? $this->finance($startOfDay, $startOfMonth) : null,
            orders: $wants(DashboardPanel::Orders) ? $this->orders($startOfDay, $startOfMonth) : null,
            subscriptions: $wants(DashboardPanel::Subscriptions) ? $this->subscriptions($startOfMonth) : null,
            consultations: $wants(DashboardPanel::Consultations) ? $this->consultations($now) : null,
            catalog: $wants(DashboardPanel::Catalog) ? $this->catalog() : null,
            customers: $wants(DashboardPanel::Customers) ? $this->customers($startOfDay, $startOfMonth) : null,
            content: $wants(DashboardPanel::Content) ? $this->content() : null,
        );
    }

    /**
     * The shipping day sheet, summarized. Built through the same service the
     * board itself uses, so the home screen can never disagree with it.
     */
    private function deliveries(Carbon $now): DeliveriesPanelData
    {
        $board = $this->board->forDate($now);

        return new DeliveriesPanelData(
            total: $board->total(),
            remaining: $board->remaining(),
            done: $board->done(),
            stops: count($board->stops),
            orders: $board->orders->count(),
        );
    }

    private function finance(Carbon $startOfDay, Carbon $startOfMonth): FinancePanelData
    {
        $invoicesMonth = Invoice::query()->where('issued_at', '>=', $startOfMonth)->count();
        $salesMonthMinor = $this->salesSince($startOfMonth);

        return new FinancePanelData(
            salesTodayMinor: $this->salesSince($startOfDay),
            salesMonthMinor: $salesMonthMinor,
            invoicesToday: Invoice::query()->where('issued_at', '>=', $startOfDay)->count(),
            invoicesMonth: $invoicesMonth,
            averageInvoiceMinor: $invoicesMonth > 0 ? intdiv($salesMonthMinor, $invoicesMonth) : 0,
            recentInvoices: Invoice::query()
                ->with('user')
                ->latest('issued_at')
                ->latest('id')
                ->limit(5)
                ->get(),
        );
    }

    private function orders(Carbon $startOfDay, Carbon $startOfMonth): OrdersPanelData
    {
        return new OrdersPanelData(
            today: Order::query()->where('placed_at', '>=', $startOfDay)->count(),
            month: Order::query()->where('placed_at', '>=', $startOfMonth)->count(),
            pending: Order::query()->where('status', OrderStatus::Pending->value)->count(),
            byStatus: $this->statusCounts(Order::query()->toBase(), 'status', OrderStatus::values()),
            recent: Order::query()
                ->with('user')
                ->latest('placed_at')
                ->latest('id')
                ->limit(5)
                ->get(),
        );
    }

    private function subscriptions(Carbon $startOfMonth): SubscriptionsPanelData
    {
        return new SubscriptionsPanelData(
            active: Subscription::query()->where('status', SubscriptionStatus::Active->value)->count(),
            paused: Subscription::query()->where('status', SubscriptionStatus::Paused->value)->count(),
            needingAttention: Subscription::query()
                ->where('handling_status', '!=', HandlingStatus::Handled->value)
                ->count(),
            newMonth: Subscription::query()->where('created_at', '>=', $startOfMonth)->count(),
            byStatus: $this->statusCounts(Subscription::query()->toBase(), 'status', SubscriptionStatus::values()),
            recent: Subscription::query()
                ->with(['user', 'handler'])
                ->latest('id')
                ->limit(5)
                ->get(),
        );
    }

    private function consultations(Carbon $now): ConsultationsPanelData
    {
        $today = $now->copy()->startOfDay();

        return new ConsultationsPanelData(
            pending: Consultation::query()->where('status', ConsultationStatus::Pending->value)->count(),
            today: Consultation::query()->whereDate('scheduled_on', $today)->count(),
            week: Consultation::query()
                ->whereBetween('scheduled_on', [$today, $now->copy()->addDays(7)->endOfDay()])
                ->count(),
            byStatus: $this->statusCounts(
                Consultation::query()->toBase()->whereNull('deleted_at'),
                'status',
                ConsultationStatus::values(),
            ),
            upcoming: Consultation::query()
                ->whereIn('status', ConsultationStatus::occupyingValues())
                ->where('scheduled_on', '>=', $today)
                ->orderBy('scheduled_on')
                ->orderBy('starts_at')
                ->limit(5)
                ->get(),
        );
    }

    private function catalog(): CatalogPanelData
    {
        return new CatalogPanelData(
            products: Product::query()->count(),
            activeProducts: Product::query()->where('is_active', true)->count(),
            hiddenProducts: Product::query()->where('is_active', false)->count(),
            featuredProducts: Product::query()->where('is_featured', true)->count(),
            categories: Category::query()
                ->withCount('products')
                ->orderBy('sort_order')
                ->orderBy('id')
                ->limit(6)
                ->get(),
        );
    }

    private function customers(Carbon $startOfDay, Carbon $startOfMonth): CustomersPanelData
    {
        return new CustomersPanelData(
            total: User::query()->customers()->count(),
            newToday: User::query()->customers()->where('created_at', '>=', $startOfDay)->count(),
            newMonth: User::query()->customers()->where('created_at', '>=', $startOfMonth)->count(),
            recent: User::query()
                ->customers()
                ->latest('id')
                ->limit(5)
                ->get(),
        );
    }

    private function content(): ContentPanelData
    {
        return new ContentPanelData(
            articles: Article::query()->count(),
            publishedArticles: Article::query()->where('is_active', true)->count(),
            recipes: Recipe::query()->count(),
            publishedRecipes: Recipe::query()->where('is_active', true)->count(),
        );
    }

    private function salesSince(Carbon $since): int
    {
        return (int) Invoice::query()
            ->where('issued_at', '>=', $since)
            ->sum('total_minor');
    }

    /**
     * @param  list<string>  $keys
     * @return array<string, int>
     */
    private function statusCounts(\Illuminate\Database\Query\Builder $query, string $column, array $keys): array
    {
        $counts = $query
            ->select($column, DB::raw('COUNT(*) as aggregate'))
            ->groupBy($column)
            ->pluck('aggregate', $column)
            ->all();

        $result = [];

        foreach ($keys as $key) {
            $result[$key] = (int) ($counts[$key] ?? 0);
        }

        return $result;
    }
}
