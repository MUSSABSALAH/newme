@php
    use App\Modules\Plans\Enums\MealType;
    use App\Support\Money\Money;

    $reference = '#'.$subscription->reference();
    $weekdayNames = array_values(__('website.subscribe.days'));

    $mealTypes = collect($subscription->meal_types ?? [])
        ->map(function (string $meal): ?MealType {
            return MealType::tryFrom($meal);
        })
        ->filter()
        ->values();

    $selectedDays = collect($subscription->selected_days ?? [])
        ->map(static fn ($day): int => (int) $day)
        ->filter(static fn (int $day): bool => $day >= 0 && $day <= 6)
        ->unique()
        ->sort()
        ->values();
@endphp

<x-layouts.admin :title="$reference" :heading="$reference" :subtitle="$subscription->plan_name">
    <x-slot:actions>
        <x-ui.button :href="route('admin.subscriptions.index')" variant="ghost">
            <x-ui.icon name="arrow-left" size="sm" /> {{ __('messages.actions.back') }}
        </x-ui.button>
    </x-slot:actions>

    <div class="record-hero">
        <div>
            <div class="record-hero__badges">
                <x-ui.badge :variant="$subscription->status->badge()">{{ $subscription->status->label() }}</x-ui.badge>
                <x-ui.badge :variant="$subscription->handling_status->badge()">
                    {{ $subscription->handling_status->label() }}
                </x-ui.badge>
            </div>
            <p class="record-hero__meta text-muted">
                {{ __('subscriptions.fields.created_at') }} · {{ $subscription->created_at?->translatedFormat('d M Y — H:i') }}
            </p>
        </div>

        <div class="record-hero__total">
            <span class="text-muted">{{ __('subscriptions.fields.total') }}</span>
            <strong>{{ $subscription->totalDisplay() }} <x-ui.sar /></strong>
        </div>
    </div>

    <div class="record-grid">
        <div class="stack">
            <x-ui.card :title="__('subscriptions.handling.title')">
                <div class="detail-list">
                    <div class="detail-row">
                        <span class="detail-row__label">{{ __('subscriptions.handling.column') }}</span>
                        <span class="detail-row__value">
                            <x-ui.badge :variant="$subscription->handling_status->badge()">
                                {{ $subscription->handling_status->label() }}
                            </x-ui.badge>
                        </span>
                    </div>

                    <div class="detail-row">
                        <span class="detail-row__label">{{ __('subscriptions.handling.last_action') }}</span>
                        <span class="detail-row__value {{ $subscription->handler ? '' : 'detail-row__value--muted' }}">
                            @if ($subscription->handler && $subscription->handled_at)
                                {{ __('subscriptions.handling.by_at', [
                                    'name' => $subscription->handler->name,
                                    'at' => $subscription->handled_at->translatedFormat('d M Y — H:i'),
                                ]) }}
                            @else
                                {{ __('subscriptions.handling.untouched') }}
                            @endif
                        </span>
                    </div>
                </div>

                @can('update', $subscription)
                    <form method="POST" action="{{ route('admin.subscriptions.handling', $subscription) }}" class="record-section__form">
                        @csrf
                        @method('PATCH')

                        <div class="row" style="gap: 12px; align-items: flex-end; flex-wrap: wrap;">
                            <x-form.field :label="__('subscriptions.handling.change')" name="handling_status" style="margin:0;flex:1;min-width:220px;">
                                <x-form.select name="handling_status">
                                    @foreach ($handlingStatuses as $option)
                                        <option value="{{ $option->value }}" @selected($subscription->handling_status === $option)>
                                            {{ $option->label() }}
                                        </option>
                                    @endforeach
                                </x-form.select>
                            </x-form.field>

                            <x-ui.button type="submit">
                                <x-ui.icon name="check" size="sm" /> {{ __('messages.actions.save') }}
                            </x-ui.button>
                        </div>
                    </form>
                @endcan
            </x-ui.card>

            <x-ui.card :title="__('subscriptions.show.customer')">
                <div class="detail-list">
                    <div class="detail-row">
                        <span class="detail-row__label">{{ __('subscriptions.fields.customer') }}</span>
                        <span class="detail-row__value">
                            @if ($subscription->user)
                                <a href="{{ route('admin.customers.show', $subscription->user) }}">{{ $subscription->user->name }}</a>
                            @else
                                —
                            @endif
                        </span>
                    </div>

                    @if ($subscription->user?->email)
                        <div class="detail-row">
                            <span class="detail-row__label">{{ __('customers.fields.email') }}</span>
                            <span class="detail-row__value" dir="ltr">{{ $subscription->user->email }}</span>
                        </div>
                    @endif

                    @if ($subscription->user?->phone)
                        <div class="detail-row">
                            <span class="detail-row__label">{{ __('customers.fields.phone') }}</span>
                            <span class="detail-row__value" dir="ltr">{{ $subscription->user->phone }}</span>
                        </div>
                    @endif
                </div>
            </x-ui.card>

            <x-ui.card :title="__('subscriptions.show.plan')">
                <div class="detail-list">
                    <div class="detail-row">
                        <span class="detail-row__label">{{ __('subscriptions.fields.plan') }}</span>
                        <span class="detail-row__value">{{ $subscription->plan_name }}</span>
                    </div>

                    <div class="detail-row">
                        <span class="detail-row__label">{{ __('subscriptions.fields.duration') }}</span>
                        <span class="detail-row__value">
                            {{ $subscription->duration_length }} {{ __('plans.units.'.$subscription->duration_unit) }}
                        </span>
                    </div>

                    <div class="detail-row">
                        <span class="detail-row__label">{{ __('subscriptions.fields.total_days') }}</span>
                        <span class="detail-row__value">{{ $subscription->total_days }}</span>
                    </div>

                    @if ($subscription->start_date)
                        <div class="detail-row">
                            <span class="detail-row__label">{{ __('subscriptions.fields.start_date') }}</span>
                            <span class="detail-row__value">{{ $subscription->start_date->translatedFormat('d M Y') }}</span>
                        </div>
                    @endif
                </div>
            </x-ui.card>

            <x-ui.card :title="__('subscriptions.show.health')">
                @if ($subscription->health_birth_date === null && $subscription->health_allergies === null && $subscription->health_medications === null)
                    <span class="text-muted">{{ __('subscriptions.show.no_health') }}</span>
                @else
                    <div class="detail-list">
                        @if ($subscription->health_birth_date !== null)
                            <div class="detail-row">
                                <span class="detail-row__label">{{ __('subscriptions.fields.health_birth_date') }}</span>
                                <span class="detail-row__value">
                                    {{ $subscription->health_birth_date->translatedFormat('d M Y') }}
                                    <span class="text-muted">({{ __('subscriptions.show.age_years', ['n' => $subscription->health_birth_date->age]) }})</span>
                                </span>
                            </div>
                        @endif

                        <div class="detail-row">
                            <span class="detail-row__label">{{ __('subscriptions.fields.health_allergies') }}</span>
                            <span class="detail-row__value">
                                {{ $subscription->health_allergies ?? __('subscriptions.show.none_reported') }}
                            </span>
                        </div>

                        <div class="detail-row">
                            <span class="detail-row__label">{{ __('subscriptions.fields.health_medications') }}</span>
                            <span class="detail-row__value">
                                {{ $subscription->health_medications ?? __('subscriptions.show.none_reported') }}
                            </span>
                        </div>
                    </div>
                @endif
            </x-ui.card>

            <x-ui.card :title="__('subscriptions.show.meals')">
                <div class="stack" style="gap: 16px;">
                    <div>
                        <div class="text-muted" style="margin-bottom: 8px; font-size: 0.88rem;">
                            {{ __('subscriptions.fields.meal_types') }}
                        </div>
                        @if ($mealTypes->isEmpty())
                            <span class="text-muted">{{ __('subscriptions.show.no_meals') }}</span>
                        @else
                            <div class="chip-row">
                                @foreach ($mealTypes as $type)
                                    <x-ui.badge variant="info">{{ $type->label() }}</x-ui.badge>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div>
                        <div class="text-muted" style="margin-bottom: 8px; font-size: 0.88rem;">
                            {{ __('subscriptions.fields.selected_days') }}
                        </div>
                        @if ($selectedDays->isEmpty())
                            <span class="text-muted">{{ __('subscriptions.show.no_days') }}</span>
                        @else
                            <div class="chip-row">
                                @foreach ($selectedDays as $day)
                                    <x-ui.badge variant="neutral">{{ $weekdayNames[$day] ?? $day }}</x-ui.badge>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </x-ui.card>
        </div>

        <div class="stack">
            <x-ui.card :title="__('subscriptions.show.pricing')">
                <div class="detail-list">
                    <div class="detail-row">
                        <span class="detail-row__label">{{ __('subscriptions.fields.subtotal') }}</span>
                        <span class="detail-row__value">{{ Money::fromMinor($subscription->subtotal_minor)->format() }} <x-ui.sar /></span>
                    </div>

                    @if ($subscription->discount_minor > 0)
                        <div class="detail-row">
                            <span class="detail-row__label">{{ __('subscriptions.fields.discount') }}</span>
                            <span class="detail-row__value">−{{ Money::fromMinor($subscription->discount_minor)->format() }} <x-ui.sar /></span>
                        </div>
                    @endif

                    @if ($subscription->hasCouponDiscount())
                        <div class="detail-row">
                            <span class="detail-row__label">
                                {{ __('subscriptions.fields.coupon') }}
                                @if ($subscription->coupon_code)
                                    <span dir="ltr">({{ $subscription->coupon_code }})</span>
                                @endif
                            </span>
                            <span class="detail-row__value">−{{ $subscription->couponDiscountDisplay() }} <x-ui.sar /></span>
                        </div>
                    @endif

                    @if ($subscription->delivery_fee_minor > 0)
                        <div class="detail-row">
                            <span class="detail-row__label">{{ __('subscriptions.fields.delivery_fee') }}</span>
                            <span class="detail-row__value">{{ Money::fromMinor($subscription->delivery_fee_minor)->format() }} <x-ui.sar /></span>
                        </div>
                    @endif

                    @if ($subscription->tax_minor > 0)
                        <div class="detail-row">
                            <span class="detail-row__label">{{ __('subscriptions.fields.tax') }}</span>
                            <span class="detail-row__value">{{ Money::fromMinor($subscription->tax_minor)->format() }} <x-ui.sar /></span>
                        </div>
                    @endif

                    <div class="detail-row">
                        <span class="detail-row__label">{{ __('subscriptions.fields.per_day') }}</span>
                        <span class="detail-row__value">{{ $subscription->perDayDisplay() }} <x-ui.sar /></span>
                    </div>

                    <div class="detail-row detail-row--total">
                        <span class="detail-row__label">{{ __('subscriptions.fields.total') }}</span>
                        <span class="detail-row__value">{{ $subscription->totalDisplay() }} <x-ui.sar /></span>
                    </div>
                </div>
            </x-ui.card>

            @include('admin.partials._delivery', [
                'payable' => $subscription,
                'title' => __('subscriptions.show.delivery'),
                'noAddress' => __('subscriptions.show.no_address'),
            ])

            @include('admin.partials._invoice', ['invoice' => $invoice])
        </div>
    </div>

    <x-ui.card :title="__('subscriptions.schedule.title')" class="meal-cal" style="margin-top: var(--space-5);">
        <x-slot:actions>
            @if ($subscription->hasMealSchedule())
                <x-ui.button :href="route('admin.subscriptions.meals-pdf', $subscription)" variant="ghost" class="btn--sm">
                    <x-ui.icon name="download" size="sm" /> {{ __('subscriptions.schedule.download_pdf') }}
                </x-ui.button>
            @endif
        </x-slot:actions>

        <p class="text-muted" style="margin: 0 0 16px; font-size: 0.9rem;">
            {{ __('subscriptions.schedule.subtitle') }}
        </p>

        @if ($subscription->isPaused())
            <div class="meal-cal__pause-banner" role="status">
                {{ __('subscriptions.schedule.paused_banner', [
                    'date' => $subscription->pause_started_on?->translatedFormat('d M Y') ?? '—',
                    'count' => $subscription->frozenDaysCount(),
                ]) }}
            </div>
        @endif

        @php $scheduleDays = $subscription->scheduleDaysWithPauseState(); @endphp

        @if ($scheduleDays !== [])
            <div class="meal-cal__grid">
                @foreach ($scheduleDays as $day)
                    <article class="meal-cal__day {{ $day['paused'] ? 'meal-cal__day--paused' : '' }}">
                        <header class="meal-cal__day-h">
                            <strong>{{ $day['weekday'] }}</strong>
                            <span>{{ $day['label'] }}</span>
                            @if ($day['paused'])
                                <em class="meal-cal__paused-badge">{{ __('subscriptions.schedule.paused_badge') }}</em>
                            @endif
                        </header>
                        <ul class="meal-cal__meals">
                            @foreach ($day['meals'] as $meal)
                                <li>
                                    <span class="meal-cal__meal-lbl">{{ $meal['label'] }}</span>
                                    <span class="meal-cal__meal-dish {{ $meal['is_chef'] ? 'meal-cal__meal-dish--chef' : '' }}">
                                        {{ $meal['dish'] }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </article>
                @endforeach
            </div>
        @else
            <p class="text-muted" style="margin: 0;">{{ __('subscriptions.schedule.empty') }}</p>
        @endif
    </x-ui.card>
</x-layouts.admin>
