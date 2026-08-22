@php
    /** @var \App\Modules\Delivery\DTOs\DeliveryBoard $board */
    /** @var \Illuminate\Support\Carbon $date */
@endphp

<x-layouts.admin :title="__('deliveries.title')" :heading="__('deliveries.title')" :subtitle="__('deliveries.subtitle')">
    <x-ui.card>
        <div class="ship-datebar">
            <div class="ship-datebar__day">
                <strong>{{ $date->translatedFormat('l') }}</strong>
                <span class="text-muted">{{ $date->translatedFormat('d M Y') }}</span>
                @if ($date->isToday())
                    <x-ui.badge variant="success">{{ __('deliveries.board.today') }}</x-ui.badge>
                @endif
            </div>

            <div class="ship-datebar__nav">
                <x-ui.button :href="route('admin.deliveries.index', ['date' => $date->copy()->subDay()->toDateString()])" variant="ghost" class="btn--sm">
                    {{ __('deliveries.board.previous_day') }}
                </x-ui.button>

                @unless ($date->isToday())
                    <x-ui.button :href="route('admin.deliveries.index')" variant="ghost" class="btn--sm">
                        {{ __('deliveries.board.today') }}
                    </x-ui.button>
                @endunless

                <x-ui.button :href="route('admin.deliveries.index', ['date' => $date->copy()->addDay()->toDateString()])" variant="ghost" class="btn--sm">
                    {{ __('deliveries.board.next_day') }}
                </x-ui.button>

                <form method="GET" action="{{ route('admin.deliveries.index') }}" class="ship-datebar__pick">
                    <x-form.input type="date" name="date" :value="$date->toDateString()" onchange="this.form.submit()" />
                    <x-ui.button type="submit" variant="ghost" class="btn--sm">{{ __('deliveries.board.go') }}</x-ui.button>
                </form>
            </div>
        </div>
    </x-ui.card>

    <div class="grid grid--3">
        <x-ui.stat-card :label="__('deliveries.kpi.total')" :value="$board->total()" accent="dark">
            <x-slot:icon><x-ui.icon name="truck" /></x-slot:icon>
        </x-ui.stat-card>

        <x-ui.stat-card :label="__('deliveries.kpi.remaining')" :value="$board->remaining()" accent="accent">
            <x-slot:icon><x-ui.icon name="clock" /></x-slot:icon>
        </x-ui.stat-card>

        <x-ui.stat-card :label="__('deliveries.kpi.done')" :value="$board->done()" accent="primary">
            <x-slot:icon><x-ui.icon name="check" /></x-slot:icon>
        </x-ui.stat-card>
    </div>

    @if ($board->isEmpty())
        <x-ui.card>
            <div class="dash-empty">
                <x-ui.icon name="truck" size="lg" />
                <p class="dash-empty__title">{{ __('deliveries.board.empty_title') }}</p>
                <p class="text-muted">{{ __('deliveries.board.empty_body') }}</p>
            </div>
        </x-ui.card>
    @else
        @include('admin.deliveries._stops')
        @include('admin.deliveries._orders')
    @endif
</x-layouts.admin>
