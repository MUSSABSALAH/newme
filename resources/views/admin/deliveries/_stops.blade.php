@php
    use App\Modules\Delivery\Enums\DeliveryStatus;

    /** @var \App\Modules\Delivery\DTOs\DeliveryBoard $board */
@endphp

<x-ui.card :title="__('deliveries.sections.subscriptions')">
    <x-slot:actions>
        <span class="text-muted">{{ trans_choice('deliveries.sections.stop_count', count($board->stops)) }}</span>
    </x-slot:actions>

    @if ($board->stops === [])
        <div class="dropdown__empty">{{ __('deliveries.sections.no_stops') }}</div>
    @else
        <div class="ship-list">
            @foreach ($board->stops as $stop)
                @php
                    $status = $stop->status();
                    $address = $stop->address();
                @endphp

                <article class="ship-item {{ $stop->isSettled() ? 'ship-item--done' : '' }}">
                    <header class="ship-item__head">
                        <div class="ship-item__who">
                            <strong>{{ $stop->customerName() }}</strong>
                            @can('view', $stop->subscription)
                                <a href="{{ route('admin.subscriptions.show', $stop->subscription) }}" class="link-btn" dir="ltr">
                                    #{{ $stop->subscription->reference() }}
                                </a>
                            @else
                                <span class="text-muted" dir="ltr">#{{ $stop->subscription->reference() }}</span>
                            @endcan
                        </div>

                        <x-ui.badge :variant="$status->badge()">{{ $status->label() }}</x-ui.badge>
                    </header>

                    <div class="ship-item__body">
                        <div class="ship-item__field">
                            <span class="ship-item__label">{{ __('deliveries.fields.address') }}</span>
                            @if ($address)
                                <span>{{ $address->oneLine() }}</span>
                                @if ($address->details)
                                    <span class="text-muted">{{ $address->details }}</span>
                                @endif
                            @else
                                <span class="text-muted">{{ __('deliveries.fields.no_address') }}</span>
                            @endif
                        </div>

                        <div class="ship-item__field">
                            <span class="ship-item__label">{{ __('deliveries.fields.phone') }}</span>
                            <span dir="ltr">{{ $stop->phone() ?? '—' }}</span>
                        </div>

                        <div class="ship-item__field">
                            <span class="ship-item__label">{{ __('deliveries.fields.meals') }}</span>
                            <span class="ship-item__meals">
                                @foreach ($stop->meals as $meal)
                                    <span class="ship-tag">{{ $meal['label'] }}: {{ $meal['dish'] }}</span>
                                @endforeach
                            </span>
                        </div>
                    </div>

                    @if ($stop->record?->failure_reason)
                        <p class="ship-item__note">
                            <x-ui.icon name="triangle-alert" size="sm" />
                            {{ $stop->record->failure_reason }}
                        </p>
                    @endif

                    @if ($canRecord && $status->nextStatuses() !== [])
                        <form method="POST" action="{{ route('admin.deliveries.stops.update', $stop->subscription) }}" class="ship-item__actions">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="date" value="{{ $stop->date->toDateString() }}">

                            @if ($status->canTransitionTo(DeliveryStatus::Dispatched))
                                <x-ui.button type="submit" name="status" value="{{ DeliveryStatus::Dispatched->value }}" variant="ghost" class="btn--sm">
                                    {{ __('deliveries.actions.dispatch') }}
                                </x-ui.button>
                            @endif

                            @if ($status->canTransitionTo(DeliveryStatus::Delivered))
                                <x-ui.button type="submit" name="status" value="{{ DeliveryStatus::Delivered->value }}" class="btn--sm">
                                    <x-ui.icon name="check" size="sm" /> {{ __('deliveries.actions.deliver') }}
                                </x-ui.button>
                            @endif

                            @if ($status->canTransitionTo(DeliveryStatus::Failed))
                                <details class="ship-fail">
                                    <summary>{{ __('deliveries.actions.fail') }}</summary>
                                    <div class="ship-fail__body">
                                        <input type="text" name="reason" class="input" maxlength="500"
                                               placeholder="{{ __('deliveries.fields.reason_placeholder') }}">
                                        <x-ui.button type="submit" name="status" value="{{ DeliveryStatus::Failed->value }}" variant="danger" class="btn--sm">
                                            {{ __('deliveries.actions.confirm_fail') }}
                                        </x-ui.button>
                                    </div>
                                </details>
                            @endif
                        </form>
                    @endif
                </article>
            @endforeach
        </div>
    @endif
</x-ui.card>
