<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Account\UpdateMealScheduleRequest;
use App\Http\Requests\Web\Account\UpdateProfileRequest;
use App\Models\User;
use App\Modules\Addresses\Services\AddressService;
use App\Modules\Invoices\Models\Invoice;
use App\Modules\Invoices\Services\InvoiceService;
use App\Modules\Orders\Models\Order;
use App\Modules\Plans\Enums\MealType;
use App\Modules\Plans\Models\Meal;
use App\Modules\Subscriptions\Models\Subscription;
use App\Modules\Subscriptions\Services\MealScheduleService;
use App\Modules\Subscriptions\Support\MealCalendarPresenter;
use App\Modules\Subscriptions\Support\MealChangeRules;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

final class AccountController extends Controller
{
    public function __construct(
        private readonly AddressService $addresses,
        private readonly InvoiceService $invoices,
        private readonly MealScheduleService $mealSchedules,
    ) {}

    public function index(Request $request): View
    {
        /** @var User $user */
        $user = Auth::user();

        $orders = $user->orders()
            ->withCount('items')
            ->latest()
            ->get();

        $subscriptions = $user->subscriptions()
            ->latest()
            ->get();

        $orderInvoices = Invoice::query()
            ->where('invoiceable_type', Order::class)
            ->whereIn('invoiceable_id', $orders->modelKeys())
            ->get()
            ->keyBy('invoiceable_id');

        $subscriptionInvoices = Invoice::query()
            ->where('invoiceable_type', Subscription::class)
            ->whereIn('invoiceable_id', $subscriptions->modelKeys())
            ->get()
            ->keyBy('invoiceable_id');

        $tab = (string) $request->query('tab', 'profile');
        if (! in_array($tab, ['profile', 'addresses', 'subscriptions', 'orders'], true)) {
            $tab = 'profile';
        }

        return view('website.account.dashboard', [
            'user' => $user,
            'orders' => $orders,
            'subscriptions' => $subscriptions,
            'addresses' => $this->addresses->forUser($user),
            'orderInvoices' => $orderInvoices,
            'subscriptionInvoices' => $subscriptionInvoices,
            'activeTab' => $tab,
        ]);
    }

    public function updateProfile(UpdateProfileRequest $request): RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();
        $data = $request->validated();

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];

        if (! empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }

        $user->save();

        return redirect()
            ->route('website.account', ['tab' => 'profile'])
            ->with('success', __('account.messages.profile_updated'));
    }

    public function order(Order $order): View
    {
        abort_unless($order->user_id === Auth::id(), 404);

        $order->load('items');

        return view('website.account.order', [
            'order' => $order,
            'invoice' => $this->invoices->find($order),
        ]);
    }

    public function subscription(Subscription $subscription): View
    {
        abort_unless($subscription->user_id === Auth::id(), 404);

        $subscription->load('plan.meals');

        return view('website.account.subscription', [
            'subscription' => $subscription,
            'invoice' => $this->invoices->find($subscription),
            'scheduleDays' => $scheduleDays = $this->scheduleForEdit($subscription),
            'calendarMonths' => MealCalendarPresenter::months($scheduleDays),
            'dishOptions' => $this->dishOptions($subscription),
            'leadDays' => MealChangeRules::leadDays(),
            'hasEditableDays' => collect($scheduleDays)->contains(fn (array $day): bool => $day['editable']),
        ]);
    }

    public function updateMeals(UpdateMealScheduleRequest $request, Subscription $subscription): RedirectResponse
    {
        abort_unless($subscription->user_id === Auth::id(), 404);

        $this->mealSchedules->update($subscription, $request->schedule());

        return redirect()
            ->route('website.account.subscription', $subscription)
            ->with('success', __('account.messages.meals_updated'));
    }

    /**
     * @return list<array{date: string, weekday: string, label: string, editable: bool, meals: list<array{type: string, label: string, dish: string, dish_raw: string|null, is_chef: bool}>}>
     */
    private function scheduleForEdit(Subscription $subscription): array
    {
        $days = [];

        foreach ($subscription->mealScheduleDays() as $day) {
            $raw = [];

            foreach ($subscription->meal_schedule ?? [] as $row) {
                if (($row['date'] ?? null) === $day['date'] && is_array($row['meals'] ?? null)) {
                    $raw = $row['meals'];
                    break;
                }
            }

            // Skeleton days have null dishes that present() labels as chef's pick.
            if ($raw === []) {
                foreach ($day['meals'] as $meal) {
                    $raw[$meal['type']] = $meal['is_chef'] ? null : $meal['dish'];
                }
            }

            $meals = [];

            foreach ($day['meals'] as $meal) {
                $meals[] = [
                    ...$meal,
                    'dish_raw' => array_key_exists($meal['type'], $raw)
                        ? (is_string($raw[$meal['type']]) ? $raw[$meal['type']] : null)
                        : ($meal['is_chef'] ? null : $meal['dish']),
                ];
            }

            $days[] = [
                'date' => $day['date'],
                'weekday' => $day['weekday'],
                'label' => $day['label'],
                'editable' => MealChangeRules::isEditable($day['date']),
                'meals' => $meals,
            ];
        }

        return $days;
    }

    /**
     * @return array<string, list<string>>
     */
    private function dishOptions(Subscription $subscription): array
    {
        $options = [];

        foreach ($subscription->meal_types ?? [] as $type) {
            $options[$type] = [];
        }

        $meals = $subscription->plan?->meals ?? collect();

        /** @var Meal $meal */
        foreach ($meals as $meal) {
            if (! $meal->is_active) {
                continue;
            }

            $type = $meal->meal_type instanceof MealType
                ? $meal->meal_type->value
                : (string) $meal->meal_type;

            if (! array_key_exists($type, $options)) {
                continue;
            }

            $options[$type][] = $meal->label();
        }

        foreach ($options as $type => $names) {
            $options[$type] = array_values(array_unique($names));
        }

        return $options;
    }
}
