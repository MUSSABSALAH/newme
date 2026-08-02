<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Subscriptions\UpdateHandlingRequest;
use App\Models\User;
use App\Modules\Invoices\Services\InvoiceService;
use App\Modules\Subscriptions\Enums\HandlingStatus;
use App\Modules\Subscriptions\Enums\SubscriptionStatus;
use App\Modules\Subscriptions\Models\Subscription;
use App\Modules\Subscriptions\Services\MealSchedulePdfRenderer;
use App\Modules\Subscriptions\Services\SubscriptionService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

final class SubscriptionController extends Controller
{
    public function __construct(
        private readonly SubscriptionService $subscriptions,
        private readonly InvoiceService $invoices,
        private readonly MealSchedulePdfRenderer $mealSchedulePdf,
    ) {}

    public function index(Request $request): View
    {
        $this->authorize('viewAny', Subscription::class);

        $status = SubscriptionStatus::tryFrom((string) $request->query('status', ''));
        $handling = HandlingStatus::tryFrom((string) $request->query('handling', ''));

        $subscriptions = Subscription::query()
            ->with(['user', 'handler'])
            ->when($status !== null, fn ($query) => $query->where('status', $status->value))
            ->when($handling !== null, fn ($query) => $query->where('handling_status', $handling->value))
            ->latest('id')
            ->paginate(20)
            ->withQueryString();

        return view('admin.subscriptions.index', [
            'subscriptions' => $subscriptions,
            'statuses' => SubscriptionStatus::cases(),
            'activeStatus' => $status,
            'handlingStatuses' => HandlingStatus::cases(),
            'activeHandling' => $handling,
            'pendingCount' => Subscription::query()
                ->where('handling_status', '!=', HandlingStatus::Handled->value)
                ->count(),
        ]);
    }

    public function show(Subscription $subscription): View
    {
        $this->authorize('view', $subscription);

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

    public function mealsPdf(Subscription $subscription): Response
    {
        $this->authorize('view', $subscription);

        $filename = 'meals-'.$subscription->reference().'.pdf';

        return response($this->mealSchedulePdf->render($subscription), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="'.$filename.'"',
        ]);
    }
}
