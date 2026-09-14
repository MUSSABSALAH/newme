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
use Illuminate\Database\Query\Builder as QueryBuilder;
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
        // Today is a slice of this month, so one indexed pass over the month's
        // invoices answers all four figures.
        $tally = $this->tally(Invoice::query()->toBase()->where('issued_at', '>=', $startOfMonth), [
            'invoices_month' => ['COUNT(*)', []],
            'invoices_today' => [$this->countIf('issued_at >= ?'), [$startOfDay]],
            'sales_month' => ['COALESCE(SUM(total_minor), 0)', []],
            'sales_today' => [$this->sumIf('total_minor', 'issued_at >= ?'), [$startOfDay]],
        ]);

        return new FinancePanelData(
            salesTodayMinor: $tally['sales_today'],
            salesMonthMinor: $tally['sales_month'],
            invoicesToday: $tally['invoices_today'],
            invoicesMonth: $tally['invoices_month'],
            averageInvoiceMinor: $tally['invoices_month'] > 0
                ? intdiv($tally['sales_month'], $tally['invoices_month'])
                : 0,
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
        [$byStatus, $tally] = $this->statusCounts(
            Order::query()->toBase(),
            'status',
            OrderStatus::values(),
            [
                'today' => ['placed_at >= ?', [$startOfDay]],
                'month' => ['placed_at >= ?', [$startOfMonth]],
            ],
        );

        return new OrdersPanelData(
            today: $tally['today'],
            month: $tally['month'],
            // The breakdown already counted every status, pending included.
            pending: $byStatus[OrderStatus::Pending->value],
            byStatus: $byStatus,
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
        [$byStatus, $tally] = $this->statusCounts(
            Subscription::query()->toBase(),
            'status',
            SubscriptionStatus::values(),
            [
                'attention' => ['handling_status <> ?', [HandlingStatus::Handled->value]],
                'new_month' => ['created_at >= ?', [$startOfMonth]],
            ],
        );

        return new SubscriptionsPanelData(
            active: $byStatus[SubscriptionStatus::Active->value],
            paused: $byStatus[SubscriptionStatus::Paused->value],
            needingAttention: $tally['attention'],
            newMonth: $tally['new_month'],
            byStatus: $byStatus,
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

        [$byStatus, $tally] = $this->statusCounts(
            Consultation::query()->toBase(),
            'status',
            ConsultationStatus::values(),
            [
                'today' => ['date(scheduled_on) = ?', [$today->toDateString()]],
                'week' => [
                    'scheduled_on between ? and ?',
                    [$today, $now->copy()->addDays(7)->endOfDay()],
                ],
            ],
        );

        return new ConsultationsPanelData(
            pending: $byStatus[ConsultationStatus::Pending->value],
            today: $tally['today'],
            week: $tally['week'],
            byStatus: $byStatus,
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
        $tally = $this->tally(Product::query()->toBase(), [
            'products' => ['COUNT(*)', []],
            'active' => [$this->countIf('is_active = ?'), [true]],
            'hidden' => [$this->countIf('is_active = ?'), [false]],
            'featured' => [$this->countIf('is_featured = ?'), [true]],
        ]);

        return new CatalogPanelData(
            products: $tally['products'],
            activeProducts: $tally['active'],
            hiddenProducts: $tally['hidden'],
            featuredProducts: $tally['featured'],
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
        $tally = $this->tally(User::query()->customers()->toBase(), [
            'total' => ['COUNT(*)', []],
            'new_today' => [$this->countIf('created_at >= ?'), [$startOfDay]],
            'new_month' => [$this->countIf('created_at >= ?'), [$startOfMonth]],
        ]);

        return new CustomersPanelData(
            total: $tally['total'],
            newToday: $tally['new_today'],
            newMonth: $tally['new_month'],
            recent: User::query()
                ->customers()
                ->latest('id')
                ->limit(5)
                ->get(),
        );
    }

    private function content(): ContentPanelData
    {
        $published = [
            'total' => ['COUNT(*)', []],
            'live' => [$this->countIf('is_active = ?'), [true]],
        ];

        $articles = $this->tally(Article::query()->toBase(), $published);
        $recipes = $this->tally(Recipe::query()->toBase(), $published);

        return new ContentPanelData(
            articles: $articles['total'],
            publishedArticles: $articles['live'],
            recipes: $recipes['total'],
            publishedRecipes: $recipes['live'],
        );
    }

    /**
     * The status breakdown, plus any extra tallies folded into the same pass.
     *
     * A panel used to ask its table once per figure, so six numbers meant six
     * scans of the same rows. The breakdown has to walk every row anyway, so
     * the extra tallies ride along as conditional sums and cost nothing beyond
     * the arithmetic. Rows are still grouped and filtered exactly as before,
     * which is why the figures cannot move.
     *
     * @param  list<string>  $keys
     * @param  array<string, array{string, list<mixed>}>  $tallies  alias => [condition, bindings]
     * @return array{0: array<string, int>, 1: array<string, int>}
     */
    private function statusCounts(QueryBuilder $query, string $column, array $keys, array $tallies = []): array
    {
        $query->select($column, DB::raw('COUNT(*) as aggregate'));

        foreach ($tallies as $alias => [$condition, $bindings]) {
            $query->selectRaw($this->countIf($condition).' as '.$alias, $bindings);
        }

        $counts = array_fill_keys($keys, 0);
        $totals = array_fill_keys(array_keys($tallies), 0);

        foreach ($query->groupBy($column)->get() as $row) {
            $status = (string) $row->{$column};

            if (array_key_exists($status, $counts)) {
                $counts[$status] = (int) $row->aggregate;
            }

            // Tallies are never filtered by status, so every group counts
            // towards them — including any status the enum no longer lists.
            foreach (array_keys($totals) as $alias) {
                $totals[$alias] += (int) $row->{$alias};
            }
        }

        return [$counts, $totals];
    }

    /**
     * Several figures read from one pass over a table.
     *
     * @param  array<string, array{string, list<mixed>}>  $columns  alias => [expression, bindings]
     * @return array<string, int>
     */
    private function tally(QueryBuilder $query, array $columns): array
    {
        foreach ($columns as $alias => [$expression, $bindings]) {
            $query->selectRaw($expression.' as '.$alias, $bindings);
        }

        $row = $query->first();
        $result = [];

        foreach (array_keys($columns) as $alias) {
            $result[$alias] = (int) ($row->{$alias} ?? 0);
        }

        return $result;
    }

    private function countIf(string $condition): string
    {
        return 'SUM(CASE WHEN '.$condition.' THEN 1 ELSE 0 END)';
    }

    private function sumIf(string $column, string $condition): string
    {
        return 'COALESCE(SUM(CASE WHEN '.$condition.' THEN '.$column.' ELSE 0 END), 0)';
    }
}
