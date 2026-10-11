@php
    /** @var \Illuminate\Support\Carbon $date */
    /** @var array{subscriptions: int, portions: int, sections: list<array<string, mixed>>} $prep */
    $dishCount = array_sum(array_map(static fn (array $section): int => count($section['dishes']), $prep['sections']));
    $today = \App\Support\Time\DisplayTime::today();
    $isToday = $date->isSameDay($today);
@endphp

<x-layouts.admin :title="__('kitchen.title')" :heading="__('kitchen.title')" :subtitle="__('kitchen.subtitle')">
    <x-ui.card>
        <div class="ship-datebar">
            <div class="ship-datebar__day">
                <strong>{{ $date->translatedFormat('l') }}</strong>
                <span class="text-muted">{{ $date->translatedFormat('d M Y') }}</span>
                @if ($isToday)
                    <x-ui.badge variant="success">{{ __('kitchen.board.today') }}</x-ui.badge>
                @elseif ($date->isSameDay($today->copy()->addDay()))
                    <x-ui.badge variant="info">{{ __('kitchen.board.tomorrow') }}</x-ui.badge>
                @endif
            </div>

            <div class="ship-datebar__nav">
                <x-ui.button :href="route('admin.kitchen.index', ['date' => $date->copy()->subDay()->toDateString()])" variant="ghost" class="btn--sm">
                    {{ __('kitchen.board.previous_day') }}
                </x-ui.button>

                @unless ($isToday)
                    <x-ui.button :href="route('admin.kitchen.index', ['date' => $today->toDateString()])" variant="ghost" class="btn--sm">
                        {{ __('kitchen.board.today') }}
                    </x-ui.button>
                @endunless

                <x-ui.button :href="route('admin.kitchen.index', ['date' => $date->copy()->addDay()->toDateString()])" variant="ghost" class="btn--sm">
                    {{ __('kitchen.board.next_day') }}
                </x-ui.button>

                <form method="GET" action="{{ route('admin.kitchen.index') }}" class="ship-datebar__pick">
                    <x-form.input type="date" name="date" :value="$date->toDateString()" onchange="this.form.submit()" />
                    <x-ui.button type="submit" variant="ghost" class="btn--sm">{{ __('kitchen.board.go') }}</x-ui.button>
                </form>

                @if ($prep['sections'] !== [])
                    <x-ui.button :href="route('admin.kitchen.pdf', ['date' => $date->toDateString()])" variant="primary" class="btn--sm">
                        <x-ui.icon name="file-down" size="sm" /> {{ __('kitchen.board.pdf') }}
                    </x-ui.button>
                @endif
            </div>
        </div>
    </x-ui.card>

    <div class="grid grid--3">
        <x-ui.stat-card :label="__('kitchen.kpi.subscriptions')" :value="$prep['subscriptions']" accent="dark">
            <x-slot:icon><x-ui.icon name="repeat" /></x-slot:icon>
        </x-ui.stat-card>

        <x-ui.stat-card :label="__('kitchen.kpi.portions')" :value="$prep['portions']" accent="accent">
            <x-slot:icon><x-ui.icon name="utensils" /></x-slot:icon>
        </x-ui.stat-card>

        <x-ui.stat-card :label="__('kitchen.kpi.dishes')" :value="$dishCount" accent="primary">
            <x-slot:icon><x-ui.icon name="chef-hat" /></x-slot:icon>
        </x-ui.stat-card>
    </div>

    @if ($prep['sections'] === [])
        <x-ui.card>
            <div class="dash-empty">
                <x-ui.icon name="chef-hat" size="lg" />
                <p class="dash-empty__title">{{ __('kitchen.board.empty_title') }}</p>
                <p class="text-muted">{{ __('kitchen.board.empty_body') }}</p>
            </div>
        </x-ui.card>
    @else
        @foreach ($prep['sections'] as $section)
            <x-ui.card :title="$section['label']">
                <x-slot:actions>
                    <x-ui.badge variant="neutral">{{ __('kitchen.section.portions', ['count' => $section['portions']]) }}</x-ui.badge>
                </x-slot:actions>

                <div class="prep-list">
                    @foreach ($section['dishes'] as $dish)
                        <details class="prep-dish">
                            <summary class="prep-dish__head" title="{{ __('kitchen.show_customers') }}">
                                <span class="prep-dish__count">{{ $dish['count'] }}</span>
                                <span class="prep-dish__name {{ $dish['is_chef'] ? 'text-muted' : '' }}">{{ $dish['dish'] }}</span>
                                @php $allergic = count(array_filter(array_column($dish['customers'], 'allergies'))); @endphp
                                @if ($allergic > 0)
                                    <x-ui.badge variant="warning">
                                        <x-ui.icon name="triangle-alert" size="sm" /> {{ __('kitchen.fields.allergies') }}: {{ $allergic }}
                                    </x-ui.badge>
                                @endif
                                <x-ui.icon name="chevron-down" size="sm" class="prep-dish__chevron" />
                            </summary>

                            <div class="table-wrap">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="width: 1%;">#</th>
                                            <th>{{ __('kitchen.fields.customer') }}</th>
                                            <th>{{ __('kitchen.fields.phone') }}</th>
                                            <th>{{ __('kitchen.fields.subscription') }}</th>
                                            <th>{{ __('kitchen.fields.plan') }}</th>
                                            <th>{{ __('kitchen.fields.allergies') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dish['customers'] as $customer)
                                            <tr>
                                                <td class="text-muted">{{ $loop->iteration }}</td>
                                                <td><strong>{{ $customer['name'] }}</strong></td>
                                                <td dir="ltr" style="text-align: start;">{{ $customer['phone'] ?? '—' }}</td>
                                                <td>
                                                    <a href="{{ route('admin.subscriptions.show', $customer['public_id']) }}">#{{ $customer['reference'] }}</a>
                                                </td>
                                                <td>{{ $customer['plan'] }}</td>
                                                <td>
                                                    @if ($customer['allergies'])
                                                        <x-ui.badge variant="warning">{{ $customer['allergies'] }}</x-ui.badge>
                                                    @else
                                                        <span class="text-muted">—</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </details>
                    @endforeach
                </div>
            </x-ui.card>
        @endforeach
    @endif
</x-layouts.admin>
