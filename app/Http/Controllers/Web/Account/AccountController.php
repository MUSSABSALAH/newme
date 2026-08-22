<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Account\PauseSubscriptionRequest;
use App\Http\Requests\Web\Account\ResumeSubscriptionRequest;
use App\Http\Requests\Web\Account\UpdateMealScheduleRequest;
use App\Http\Requests\Web\Account\UpdateProfileRequest;
use App\Models\User;
use App\Modules\Addresses\Services\AddressService;
use App\Modules\Consultations\Models\Consultation;
use App\Modules\Identity\DTOs\BodyMeasurementData;
use App\Modules\Identity\DTOs\HealthProfile;
use App\Modules\Identity\Services\BodyMeasurementService;
use App\Modules\Identity\Support\CustomerAuthChannels;
use App\Modules\Invoices\Models\Invoice;
use App\Modules\Invoices\Services\InvoiceService;
use App\Modules\Orders\Models\Order;
use App\Modules\Plans\Enums\MealType;
use App\Modules\Plans\Models\Meal;
use App\Modules\Subscriptions\Models\Subscription;
use App\Modules\Subscriptions\Services\MealScheduleService;
use App\Modules\Subscriptions\Services\SubscriptionService;
use App\Modules\Subscriptions\Support\MealCalendarPresenter;
use App\Modules\Subscriptions\Support\MealChangeRules;
use App\Modules\Subscriptions\Support\SubscriptionPauseRules;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

final class AccountController extends Controller
{
    public function __construct(
        private readonly AddressService $addresses,
        private readonly BodyMeasurementService $measurements,
        private readonly InvoiceService $invoices,
        private readonly MealScheduleService $mealSchedules,
        private readonly SubscriptionService $subscriptions,
        private readonly CustomerAuthChannels $channels,
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
            ->with('plan')
            ->latest()
            ->get();

        $consultations = Consultation::query()
            ->whereRaw('LOWER(customer_email) = ?', [strtolower((string) $user->email)])
            ->orderByDesc('scheduled_on')
            ->orderByDesc('starts_at')
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
        if (! in_array($tab, ['profile', 'measurements', 'addresses', 'subscriptions', 'orders', 'consultations'], true)) {
            $tab = 'profile';
        }

        return view('website.account.dashboard', [
            'user' => $user,
            'orders' => $orders,
            'subscriptions' => $subscriptions,
            'consultations' => $consultations,
            'addresses' => $this->addresses->forUser($user),
            'measurements' => $this->measurements->historyFor($user),
            'measurementRanges' => BodyMeasurementData::RANGES,
            'earliestMeasurementDate' => BodyMeasurementData::earliestDate(),
            'orderInvoices' => $orderInvoices,
            'subscriptionInvoices' => $subscriptionInvoices,
            'activeTab' => $tab,
            'pauseLeadDays' => SubscriptionPauseRules::leadDays(),
            'resumeLeadDays' => SubscriptionPauseRules::resumeLeadDays(),
            'earliestPauseDate' => SubscriptionPauseRules::earliestPausableDateString(),
            'birthDateRange' => HealthProfile::birthDateRange(),
            'channels' => $this->channels,
        ]);
    }

    public function updateProfile(UpdateProfileRequest $request): RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();
        $data = $request->validated();

        $user->name = $data['name'];
        $user->email = isset($data['email']) && is_string($data['email']) ? $data['email'] : null;
        $user->phone = isset($data['phone']) && is_string($data['phone']) ? $data['phone'] : null;

        // Editing here is deliberate, so clearing a field really does clear it.
        $health = HealthProfile::fromArray($data);
        $user->birth_date = $health->birthDate;
        $user->allergies = $health->allergies;
        $user->medications = $health->medications;

        if ($this->channels->asksPassword() && ! empty($data['password'])) {
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
            'pauseLeadDays' => SubscriptionPauseRules::leadDays(),
            'resumeLeadDays' => SubscriptionPauseRules::resumeLeadDays(),
            'earliestPauseDate' => SubscriptionPauseRules::earliestPausableDateString(),
            'hasEditableDays' => ! $subscription->isPaused()
                && collect($scheduleDays)->contains(fn (array $day): bool => $day['editable'] && ! $day['paused']),
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

    public function pause(PauseSubscriptionRequest $request, Subscription $subscription): RedirectResponse
    {
        abort_unless($subscription->user_id === Auth::id(), 404);

        $this->subscriptions->pause($subscription, $request->pauseFrom());

        return redirect()
            ->route('website.account', ['tab' => 'subscriptions'])
            ->with('success', __('account.messages.subscription_paused'));
    }

    public function resume(ResumeSubscriptionRequest $request, Subscription $subscription): RedirectResponse
    {
        abort_unless($subscription->user_id === Auth::id(), 404);

        $this->subscriptions->resume($subscription);

        return redirect()
            ->route('website.account', ['tab' => 'subscriptions'])
            ->with('success', __('account.messages.subscription_resumed'));
    }

    /**
     * @return list<array{date: string, weekday: string, label: string, editable: bool, paused: bool, meals: list<array{type: string, label: string, dish: string, dish_raw: string|null, is_chef: bool}>}>
     */
    private function scheduleForEdit(Subscription $subscription): array
    {
        $days = [];

        foreach ($subscription->scheduleDaysWithPauseState() as $day) {
            $days[] = $this->presentDayForEdit($subscription, $day, paused: (bool) $day['paused']);
        }

        return $days;
    }

    /**
     * @param  array{date: string, weekday: string, label: string, meals: list<array{type: string, label: string, dish: string, is_chef: bool}>}  $day
     * @return array{date: string, weekday: string, label: string, editable: bool, paused: bool, meals: list<array{type: string, label: string, dish: string, dish_raw: string|null, is_chef: bool}>}
     */
    private function presentDayForEdit(Subscription $subscription, array $day, bool $paused): array
    {
        $source = $paused
            ? ($subscription->paused_schedule ?? [])
            : ($subscription->meal_schedule ?? []);

        $raw = [];

        foreach ($source as $row) {
            if (($row['date'] ?? null) === $day['date'] && is_array($row['meals'] ?? null)) {
                $raw = $row['meals'];
                break;
            }
        }

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

        return [
            'date' => $day['date'],
            'weekday' => $day['weekday'],
            'label' => $day['label'],
            'editable' => ! $paused && ! $subscription->isPaused() && MealChangeRules::isEditable($day['date']),
            'paused' => $paused,
            'meals' => $meals,
        ];
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
