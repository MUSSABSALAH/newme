@php
    use App\Support\Money\Money;
@endphp

<x-layouts.admin :title="$plan->label()" :heading="$plan->label()" :subtitle="__('plans.details')">
    <x-slot:actions>
        <x-ui.button :href="route('admin.plans.index')" variant="ghost">
            <x-ui.icon name="arrow-left" size="sm" /> {{ __('plans.title') }}
        </x-ui.button>
        @can('update', $plan)
            <x-ui.button :href="route('admin.plans.edit', $plan)" variant="primary">
                <x-ui.icon name="pencil" size="sm" /> {{ __('messages.actions.edit') }}
            </x-ui.button>
        @endcan
    </x-slot:actions>

    <x-ui.card :title="__('plans.details')">
        <div class="form-grid-2">
            <div class="field">
                <span class="field__label">{{ __('plans.fields.goal') }}</span>
                <strong>{{ $plan->goal->label() }}</strong>
            </div>
            <div class="field">
                <span class="field__label">{{ __('plans.columns.status') }}</span>
                <x-ui.badge :variant="$plan->is_active ? 'success' : 'neutral'">
                    {{ $plan->is_active ? __('plans.status.active') : __('plans.status.inactive') }}
                </x-ui.badge>
            </div>
            <div class="field">
                <span class="field__label">{{ __('plans.fields.delivery_fee') }}</span>
                <strong>{{ Money::fromMinor($plan->delivery_fee)->format() }}</strong>
            </div>
            <div class="field">
                <span class="field__label">{{ __('plans.fields.min_delivery_days_per_week') }}</span>
                <strong>{{ $plan->requires_day_selection ? $plan->min_delivery_days_per_week : '—' }}</strong>
            </div>
        </div>
    </x-ui.card>

    <x-ui.card :title="__('plans.pricing.title')">
        <x-slot:actions>
            @if ($publishedVersion)
                <x-ui.badge variant="success">{{ __('plans.versions.label', ['number' => $publishedVersion->version_number]) }}</x-ui.badge>
            @elseif ($draft)
                <x-ui.badge variant="info">{{ __('plans.versions.statuses.draft') }}</x-ui.badge>
            @endif
        </x-slot:actions>

        @if ($rules->isEmpty())
            <div class="dropdown__empty">{{ __('plans.pricing.no_rules') }}</div>
        @else
            <x-ui.table :headers="[__('plans.pricing.meal_types'), __('plans.pricing.duration_length'), __('plans.pricing.price'), __('plans.pricing.discount')]">
                @foreach ($rules as $rule)
                    <tr>
                        <td>{{ collect($rule->mealTypes())->map(fn ($t) => $t->label())->implode('، ') }}</td>
                        <td>{{ $rule->duration_length }} {{ $rule->duration_unit->label() }}</td>
                        <td>{{ Money::fromMinor($rule->price)->format() }}</td>
                        <td>{{ rtrim(rtrim((string) $rule->discount_percent, '0'), '.') ?: '0' }}%</td>
                    </tr>
                @endforeach
            </x-ui.table>
        @endif
    </x-ui.card>

    <x-ui.card :title="__('plans.meals.title')">
        @php $hasMeals = $mealsByType->flatten()->isNotEmpty(); @endphp

        @unless ($hasMeals)
            <div class="dropdown__empty">{{ __('plans.meals.none_selected') }}</div>
        @else
            @foreach ($mealTypes as $type)
                @php $items = $mealsByType->get($type->value); @endphp
                @if ($items && $items->isNotEmpty())
                    <div class="meal-picker__group">
                        <div class="meal-picker__group-title">{{ $type->label() }}</div>
                        <div class="meal-picker__grid">
                            @foreach ($items as $meal)
                                <div class="meal-option">
                                    <span class="meal-option__body">
                                        <span class="meal-option__name">{{ $meal->label() }}</span>
                                        @if ($meal->calories !== null)
                                            <span class="meal-option__meta">{{ $meal->calories }} {{ __('meals.units.kcal') }}</span>
                                        @endif
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        @endunless
    </x-ui.card>

    <x-ui.card :title="__('plans.versions.title')">
        @if ($versions->isEmpty())
            <div class="dropdown__empty">{{ __('plans.versions.none') }}</div>
        @else
            <x-ui.table :headers="[__('plans.versions.title'), __('plans.columns.status'), __('plans.versions.published_at')]">
                @foreach ($versions as $version)
                    <tr>
                        <td><strong>{{ __('plans.versions.label', ['number' => $version->version_number]) }}</strong></td>
                        <td>
                            <x-ui.badge :variant="$version->status->badgeVariant()">{{ $version->status->label() }}</x-ui.badge>
                        </td>
                        <td>
                            @if ($version->published_at)
                                <span class="text-muted">{{ $version->published_at->toDateTimeString() }}</span>
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </x-ui.table>
        @endif
    </x-ui.card>
</x-layouts.admin>
