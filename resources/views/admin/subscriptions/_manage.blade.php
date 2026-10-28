@php
    $canPause = $subscription->status === \App\Modules\Subscriptions\Enums\SubscriptionStatus::Active
        && $subscription->frozenDaysCount() === 0;
    $format = static fn ($date): string => $date?->translatedFormat('d M Y') ?? '—';
    $maxPauses = \App\Modules\Subscriptions\Support\SubscriptionPauseRules::maxPauses();
@endphp

<x-ui.card :title="__('subscriptions.manage.title')">
    <div class="grid grid--2">
        <section class="edit-panel">
            <div class="edit-panel__head">
                <span class="edit-panel__icon"><x-ui.icon name="calendar-range" /></span>
                <div>
                    <h4 class="edit-panel__title">{{ __('subscriptions.manage.start.title') }}</h4>
                    <p class="edit-panel__subtitle">{{ __('subscriptions.manage.start.subtitle') }}</p>
                </div>
            </div>

            <div class="edit-panel__facts">
                <div class="edit-panel__fact">
                    <span>{{ __('subscriptions.manage.current_start') }}</span>
                    <strong>{{ $format($subscription->start_date) }}</strong>
                </div>
                <div class="edit-panel__fact">
                    <span>{{ __('subscriptions.manage.current_end') }}</span>
                    <strong>{{ $format($endDate) }}</strong>
                </div>
            </div>

            @if ($subscription->startIsMovable())
                <ul class="edit-panel__effects">
                    @foreach (__('subscriptions.manage.start.effects') as $effect)
                        <li>{{ $effect }}</li>
                    @endforeach
                </ul>

                <form
                    method="POST"
                    action="{{ route('admin.subscriptions.start', $subscription) }}"
                    class="edit-panel__form"
                    data-confirm
                    data-confirm-type="warning"
                    data-confirm-title="{{ __('subscriptions.manage.start.title') }}"
                    data-confirm-text="{{ __('subscriptions.manage.start.confirm') }}"
                    data-confirm-button="{{ __('subscriptions.manage.start.submit') }}"
                    data-confirm-cancel="{{ __('messages.confirm.cancel') }}"
                >
                    @csrf
                    @method('PATCH')

                    <x-form.field :label="__('subscriptions.manage.start.field')" name="start_date">
                        <x-form.input type="date" name="start_date" :min="$tomorrow" :value="$subscription->start_date?->toDateString()" required />
                    </x-form.field>

                    @include('admin.subscriptions._notify-customer', ['subscription' => $subscription])

                    <x-ui.button type="submit" variant="primary">
                        <x-ui.icon name="calendar-check" size="sm" /> {{ __('subscriptions.manage.start.submit') }}
                    </x-ui.button>
                </form>
            @else
                <p class="edit-panel__locked">
                    <x-ui.icon name="lock" size="sm" />
                    {{ $subscription->hasStarted() && ! $subscription->isClosed() && ! $subscription->isPaused()
                        ? __('subscriptions.manage.start.locked_started')
                        : __('subscriptions.manage.start.locked_status', ['status' => $subscription->status->label()]) }}
                </p>
            @endif
        </section>

        @if ($subscription->isPaused())
        <section class="edit-panel edit-panel--success">
            <div class="edit-panel__head">
                <span class="edit-panel__icon"><x-ui.icon name="circle-play" /></span>
                <div>
                    <h4 class="edit-panel__title">{{ __('subscriptions.manage.resume.title') }}</h4>
                    <p class="edit-panel__subtitle">{{ __('subscriptions.manage.resume.subtitle', ['date' => $format($subscription->pause_started_on)]) }}</p>
                </div>
            </div>

            <div class="edit-panel__facts">
                <div class="edit-panel__fact">
                    <span>{{ __('subscriptions.manage.status') }}</span>
                    <strong>{{ $subscription->status->label() }}</strong>
                </div>
                <div class="edit-panel__fact">
                    <span>{{ __('subscriptions.manage.resume.frozen_days') }}</span>
                    <strong>{{ $subscription->frozenDaysCount() }}</strong>
                </div>
            </div>

            <ul class="edit-panel__effects">
                @foreach (__('subscriptions.manage.resume.effects') as $effect)
                    <li>{{ $effect }}</li>
                @endforeach
            </ul>

            <form
                method="POST"
                action="{{ route('admin.subscriptions.resume', $subscription) }}"
                class="edit-panel__form"
                data-confirm
                data-confirm-type="warning"
                data-confirm-title="{{ __('subscriptions.manage.resume.title') }}"
                data-confirm-text="{{ __('subscriptions.manage.resume.confirm') }}"
                data-confirm-button="{{ __('subscriptions.manage.resume.submit') }}"
                data-confirm-cancel="{{ __('messages.confirm.cancel') }}"
            >
                @csrf

                <x-form.field :label="__('subscriptions.manage.resume.field')" name="resume_from">
                    <x-form.input type="date" name="resume_from" :min="$tomorrow" :value="$tomorrow" required />
                </x-form.field>

                @include('admin.subscriptions._notify-customer', ['subscription' => $subscription])

                <x-ui.button type="submit" variant="primary">
                    <x-ui.icon name="circle-play" size="sm" /> {{ __('subscriptions.manage.resume.submit') }}
                </x-ui.button>
            </form>
        </section>
        @else
        <section class="edit-panel edit-panel--danger">
            <div class="edit-panel__head">
                <span class="edit-panel__icon"><x-ui.icon name="circle-pause" /></span>
                <div>
                    <h4 class="edit-panel__title">{{ __('subscriptions.manage.pause.title') }}</h4>
                    <p class="edit-panel__subtitle">{{ __('subscriptions.manage.pause.subtitle') }}</p>
                </div>
            </div>

            <div class="edit-panel__facts">
                <div class="edit-panel__fact">
                    <span>{{ __('subscriptions.manage.status') }}</span>
                    <strong>{{ $subscription->status->label() }}</strong>
                </div>
                <div class="edit-panel__fact">
                    <span>{{ __('subscriptions.manage.pauses_used') }}</span>
                    <strong>
                        {{ $maxPauses > 0
                            ? __('subscriptions.manage.pauses_of', ['used' => (int) $subscription->pause_count, 'max' => $maxPauses])
                            : __('subscriptions.manage.pauses_unlimited', ['used' => (int) $subscription->pause_count]) }}
                    </strong>
                </div>
            </div>

            @if ($canPause)
                <ul class="edit-panel__effects">
                    @foreach (__('subscriptions.manage.pause.effects') as $effect)
                        <li>{{ $effect }}</li>
                    @endforeach
                    <li>{{ __('subscriptions.manage.pause.staff_not_counted') }}</li>
                </ul>

                <form
                    method="POST"
                    action="{{ route('admin.subscriptions.pause', $subscription) }}"
                    class="edit-panel__form"
                    data-confirm
                    data-confirm-type="danger"
                    data-confirm-title="{{ __('subscriptions.manage.pause.title') }}"
                    data-confirm-text="{{ __('subscriptions.manage.pause.confirm') }}"
                    data-confirm-button="{{ __('subscriptions.manage.pause.submit') }}"
                    data-confirm-cancel="{{ __('messages.confirm.cancel') }}"
                >
                    @csrf

                    <x-form.field :label="__('subscriptions.manage.pause.field')" name="pause_from">
                        <x-form.input type="date" name="pause_from" :min="$tomorrow" :value="$tomorrow" required />
                    </x-form.field>

                    @include('admin.subscriptions._notify-customer', ['subscription' => $subscription])

                    <x-ui.button type="submit" variant="danger">
                        <x-ui.icon name="circle-pause" size="sm" /> {{ __('subscriptions.manage.pause.submit') }}
                    </x-ui.button>
                </form>
            @else
                <p class="edit-panel__locked">
                    <x-ui.icon name="lock" size="sm" />
                    {{ __('subscriptions.manage.pause.unavailable') }}
                </p>
            @endif
        </section>
        @endif
    </div>
</x-ui.card>
