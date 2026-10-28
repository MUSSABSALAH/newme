<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Subscriptions\ChangeSubscriptionStartRequest;
use App\Http\Requests\Web\Admin\Subscriptions\PauseSubscriptionByStaffRequest;
use App\Http\Requests\Web\Admin\Subscriptions\ResumeSubscriptionByStaffRequest;
use App\Http\Requests\Web\Admin\Subscriptions\UpdateHandlingRequest;
use App\Models\User;
use App\Modules\Invoices\Services\InvoiceService;
use App\Modules\Notifications\Services\CustomerNotifier;
use App\Modules\Subscriptions\Enums\HandlingStatus;
use App\Modules\Subscriptions\Enums\SubscriptionStatus;
use App\Modules\Subscriptions\Models\Subscription;
use App\Modules\Subscriptions\Notifications\SubscriptionChangedByStaffNotification;
use App\Modules\Subscriptions\Services\MealSchedulePdfRenderer;
use App\Modules\Subscriptions\Services\SubscriptionExpiry;
use App\Modules\Subscriptions\Services\SubscriptionListPdfRenderer;
use App\Modules\Subscriptions\Services\SubscriptionService;
use App\Support\Search\SearchTerm;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

final class SubscriptionController extends Controller
{
    public function __construct(
        private readonly SubscriptionService $subscriptions,
        private readonly InvoiceService $invoices,
        private readonly MealSchedulePdfRenderer $mealSchedulePdf,
        private readonly SubscriptionExpiry $expiry,
        private readonly CustomerNotifier $customers,
    ) {}

    public function index(Request $request): View
    {
        $this->authorize('viewAny', Subscription::class);

        $this->expiry->sweepIfDue();

        [$status, $handling, $term] = $this->filters($request);

        $subscriptions = $this->filtered($status, $handling, $term)
            ->paginate(20)
            ->withQueryString();

        return view('admin.subscriptions.index', [
            'subscriptions' => $subscriptions,
            'statuses' => SubscriptionStatus::cases(),
            'activeStatus' => $status,
            'handlingStatuses' => HandlingStatus::cases(),
            'activeHandling' => $handling,
            'search' => $term->value,
            'pendingCount' => Subscription::query()
                ->where('handling_status', '!=', HandlingStatus::Handled->value)
                ->count(),
        ]);
    }

    /**
     * The list as it is filtered on screen, every page of it, as a PDF.
     */
    public function listPdf(Request $request, SubscriptionListPdfRenderer $renderer): Response
    {
        $this->authorize('viewAny', Subscription::class);

        $this->expiry->sweepIfDue();

        [$status, $handling, $term] = $this->filters($request);

        $subscriptions = $this->filtered($status, $handling, $term)
            ->limit(SubscriptionListPdfRenderer::MAX_ROWS)
            ->get();

        $filters = array_values(array_filter([
            $status?->label(),
            $handling?->label(),
            $term->isEmpty() ? null : '“'.$term->value.'”',
        ]));

        return response($renderer->render($subscriptions, $filters), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="subscriptions-'.now()->toDateString().'.pdf"',
        ]);
    }

    public function show(Subscription $subscription): View
    {
        $this->authorize('view', $subscription);

        $this->expiry->expireIfEnded($subscription);

        $subscription->load(['user', 'handler', 'payments' => fn ($query) => $query->latest()]);

        return view('admin.subscriptions.show', [
            'subscription' => $subscription,
            'handlingStatuses' => HandlingStatus::cases(),
            'invoice' => $this->invoices->find($subscription),
        ]);
    }

    public function updateHandling(UpdateHandlingRequest $request, Subscription $subscription): RedirectResponse
    {
        $this->authorize('update', $subscription);

        /** @var User $actor */
        $actor = $request->user();

        $this->subscriptions->updateHandling($subscription, $request->status(), $actor);

        return back()->with('success', __('subscriptions.messages.handling_updated'));
    }

    public function changeStart(ChangeSubscriptionStartRequest $request, Subscription $subscription): RedirectResponse
    {
        $this->authorize('update', $subscription);

        /** @var User $actor */
        $actor = $request->user();

        $subscription = $this->subscriptions->changeStartDate($subscription, $request->startDate(), $actor);

        if ($request->notifyCustomer()) {
            $this->customers->subscriptionChangedByStaff($subscription, SubscriptionChangedByStaffNotification::START_CHANGED);
        }

        return back()->with('success', __('subscriptions.manage.messages.start_changed', [
            'start' => $subscription->start_date?->translatedFormat('d M Y') ?? '—',
            'end' => $subscription->endDate()?->translatedFormat('d M Y') ?? '—',
        ]));
    }

    public function pause(PauseSubscriptionByStaffRequest $request, Subscription $subscription): RedirectResponse
    {
        $this->authorize('update', $subscription);

        /** @var User $actor */
        $actor = $request->user();

        $this->expiry->expireIfEnded($subscription);
        $subscription = $this->subscriptions->pause($subscription, $request->pauseFrom(), $actor);

        if ($request->notifyCustomer()) {
            $this->customers->subscriptionChangedByStaff($subscription, SubscriptionChangedByStaffNotification::PAUSED);
        }

        return back()->with('success', __('subscriptions.manage.messages.paused', [
            'date' => $subscription->pause_started_on?->translatedFormat('d M Y') ?? '—',
        ]));
    }

    public function resume(ResumeSubscriptionByStaffRequest $request, Subscription $subscription): RedirectResponse
    {
        $this->authorize('update', $subscription);

        /** @var User $actor */
        $actor = $request->user();

        $subscription = $this->subscriptions->resume($subscription, $request->resumeFrom(), $actor);

        if ($request->notifyCustomer()) {
            $this->customers->subscriptionChangedByStaff($subscription, SubscriptionChangedByStaffNotification::RESUMED);
        }

        return back()->with('success', __('subscriptions.manage.messages.resumed', [
            'end' => $subscription->endDate()?->translatedFormat('d M Y') ?? '—',
        ]));
    }

    public function mealsPdf(Subscription $subscription): Response
    {
        $this->authorize('view', $subscription);

        $filename = 'meals-'.$subscription->reference().'.pdf';

        return response($this->mealSchedulePdf->render($subscription), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="'.$filename.'"',
        ]);
    }

    /**
     * @return array{0: SubscriptionStatus|null, 1: HandlingStatus|null, 2: SearchTerm}
     */
    private function filters(Request $request): array
    {
        return [
            SubscriptionStatus::tryFrom((string) $request->query('status', '')),
            HandlingStatus::tryFrom((string) $request->query('handling', '')),
            SearchTerm::fromRequest($request),
        ];
    }

    /**
     * @return Builder<Subscription>
     */
    private function filtered(?SubscriptionStatus $status, ?HandlingStatus $handling, SearchTerm $term): Builder
    {
        return Subscription::query()
            ->with(['user', 'handler', 'plan'])
            ->when($status !== null, fn ($query) => $query->where('status', $status->value))
            ->when($handling !== null, fn ($query) => $query->where('handling_status', $handling->value))
            ->when(! $term->isEmpty(), fn ($query) => $query->search($term))
            ->latest('id');
    }
}
