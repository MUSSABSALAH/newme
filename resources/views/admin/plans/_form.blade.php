@php
    use App\Support\Money\Money;

    $rowMarkup = function ($index, $rule = null) use ($units, $mealTypes) {
        return view('admin.plans._pricing_row', [
            'index' => $index,
            'rule' => $rule,
            'units' => $units,
            'mealTypes' => $mealTypes,
        ])->render();
    };

    $planName = fn (string $locale) => old("name.$locale", $plan?->getTranslation('name', $locale, false) ?: '');
    $planDesc = fn (string $locale) => old("description.$locale", $plan?->getTranslation('description', $locale, false) ?: '');
    $planFeatures = function (string $locale) use ($plan) {
        $existing = $plan?->getTranslation('features', $locale, false);
        $existing = is_array($existing) ? implode("\n", $existing) : '';

        return old("features.$locale", $existing);
    };
    $deliveryFee = old('delivery_fee', $plan ? Money::fromMinor($plan->delivery_fee)->format() : '0.00');
@endphp

<form action="{{ $action }}" method="POST" enctype="multipart/form-data" data-validate novalidate class="stack">
    @csrf
    @if (($method ?? 'POST') === 'PUT')
        @method('PUT')
    @endif

    <x-ui.card :title="__('plans.sections.basics')">
        <p class="form-section-desc">{{ __('plans.sections.basics_desc') }}</p>
        <div class="form-grid-2">
            <x-form.field :label="__('plans.fields.goal')" name="goal">
                <x-form.select name="goal" :selected="old('goal', $plan?->goal->value)">
                    @foreach ($goals as $goal)
                        <option value="{{ $goal->value }}" @selected(old('goal', $plan?->goal->value) === $goal->value)>
                            {{ $goal->label() }}
                        </option>
                    @endforeach
                </x-form.select>
            </x-form.field>

            <x-form.field :label="__('plans.fields.is_active')" name="is_active">
                <label class="switch-row">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $plan?->is_active ?? true))>
                    <span>
                        <span class="switch-row__title">{{ __('plans.status.active') }}</span>
                        <span class="field__hint">{{ __('plans.fields.is_active_hint') }}</span>
                    </span>
                </label>
            </x-form.field>

            <x-form.field :label="__('plans.fields.name_ar')" name="name.ar">
                <x-form.input name="name[ar]" :value="$planName('ar')" required minlength="2" />
            </x-form.field>

            <x-form.field :label="__('plans.fields.name_en')" name="name.en">
                <x-form.input name="name[en]" :value="$planName('en')" required minlength="2" dir="ltr" />
            </x-form.field>
        </div>
    </x-ui.card>

    <x-ui.card :title="__('plans.sections.content')">
        <p class="form-section-desc">{{ __('plans.sections.content_desc') }}</p>
        <div class="form-grid-2">
            <x-form.field :label="__('plans.fields.description_ar')" name="description.ar" class="field--full">
                <x-form.textarea name="description[ar]" :value="$planDesc('ar')" rows="3" />
            </x-form.field>

            <x-form.field :label="__('plans.fields.description_en')" name="description.en" class="field--full">
                <x-form.textarea name="description[en]" :value="$planDesc('en')" rows="3" dir="ltr" />
            </x-form.field>

            <x-form.field :label="__('plans.fields.features_ar')" name="features.ar" :hint="__('plans.fields.features_hint')">
                <x-form.textarea name="features[ar]" :value="$planFeatures('ar')" rows="4" />
            </x-form.field>

            <x-form.field :label="__('plans.fields.features_en')" name="features.en" :hint="__('plans.fields.features_hint')">
                <x-form.textarea name="features[en]" :value="$planFeatures('en')" rows="4" dir="ltr" />
            </x-form.field>
        </div>
    </x-ui.card>

    <x-ui.card :title="__('plans.sections.delivery')">
        <p class="form-section-desc">{{ __('plans.sections.delivery_desc') }}</p>
        <div class="form-grid-2">
            <div class="field field--full">
                <label class="switch-row">
                    <input type="hidden" name="requires_day_selection" value="0">
                    <input type="checkbox" name="requires_day_selection" value="1" @checked(old('requires_day_selection', $plan?->requires_day_selection ?? true))>
                    <span>
                        <span class="switch-row__title">{{ __('plans.fields.requires_day_selection') }}</span>
                        <span class="field__hint">{{ __('plans.fields.requires_day_selection_hint') }}</span>
                    </span>
                </label>
            </div>

            <div class="field field--full">
                <label class="switch-row">
                    <input type="hidden" name="allows_pause" value="0">
                    <input type="checkbox" name="allows_pause" value="1" @checked(old('allows_pause', $plan?->allows_pause ?? true))>
                    <span>
                        <span class="switch-row__title">{{ __('plans.fields.allows_pause') }}</span>
                        <span class="field__hint">{{ __('plans.fields.allows_pause_hint') }}</span>
                    </span>
                </label>
            </div>

            <x-form.field :label="__('plans.fields.min_delivery_days_per_week')" name="min_delivery_days_per_week" :hint="__('plans.fields.min_delivery_days_hint')">
                <x-form.input name="min_delivery_days_per_week" type="number" min="1" max="7" :value="old('min_delivery_days_per_week', $plan?->min_delivery_days_per_week ?? 5)" required />
            </x-form.field>

            <x-form.field :label="__('plans.fields.delivery_fee')" name="delivery_fee" :hint="__('plans.fields.delivery_fee_hint')">
                <x-form.input name="delivery_fee" type="number" step="0.01" min="0" :value="$deliveryFee" required />
            </x-form.field>

            <x-form.field :label="__('plans.fields.sort_order')" name="sort_order">
                <x-form.input name="sort_order" type="number" min="0" :value="old('sort_order', $plan?->sort_order ?? 0)" />
            </x-form.field>

            <x-form.field :label="__('plans.fields.image')" name="image" :hint="__('plans.fields.image_hint')">
                <div class="image-uploader">
                    <img
                        alt=""
                        class="image-uploader__preview {{ $plan?->image_path ? 'is-visible' : '' }}"
                        data-image-preview
                        @if ($plan?->image_path) src="{{ asset('storage/' . $plan->image_path) }}" @endif
                    >
                    <input type="file" name="image" accept="image/*" class="input" data-image-input>
                </div>
            </x-form.field>
        </div>
    </x-ui.card>

    <x-ui.card :title="__('plans.pricing.title')">
        <p class="field__hint" style="margin-bottom: 16px;">{{ __('plans.pricing.subtitle') }}</p>

        <div class="table-wrap">
            <table class="table" data-pricing-table>
                <thead>
                    <tr>
                        <th>{{ __('plans.pricing.meal_types') }}</th>
                        <th>{{ __('plans.pricing.duration_length') }}</th>
                        <th>{{ __('plans.pricing.duration_unit') }}</th>
                        <th>{{ __('plans.pricing.price') }}</th>
                        <th>{{ __('plans.pricing.discount') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody data-pricing-body>
                    @foreach ($rules as $i => $rule)
                        {!! $rowMarkup($i, $rule) !!}
                    @endforeach
                    <tr data-pricing-empty @if ($rules->isNotEmpty()) hidden @endif>
                        <td colspan="6" class="pricing-empty__cell">{{ __('plans.pricing.empty_hint') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <template data-pricing-template>
            {!! $rowMarkup('__INDEX__', null) !!}
        </template>

        <div class="row" style="gap: 12px; margin-top: 16px;">
            <x-ui.button type="button" variant="ghost" data-pricing-add>
                <x-ui.icon name="plus" size="sm" /> {{ __('plans.pricing.add_row') }}
            </x-ui.button>
        </div>
    </x-ui.card>

    <x-ui.card :title="__('plans.meals.title')">
        <p class="field__hint" style="margin-bottom: 16px;">{{ __('plans.meals.subtitle') }}</p>

        @php $hasMeals = $mealsByType->flatten()->isNotEmpty(); @endphp

        @unless ($hasMeals)
            <div class="dropdown__empty">
                {{ __('plans.meals.empty') }}
                <a href="{{ route('admin.meals.create') }}">{{ __('meals.add') }}</a>
            </div>
        @else
            @foreach ($mealTypes as $type)
                @php $items = $mealsByType->get($type->value); @endphp
                @if ($items && $items->isNotEmpty())
                    <div class="meal-picker__group" data-meal-group>
                        <div class="meal-picker__group-head">
                            <div class="meal-picker__group-title">{{ $type->label() }}</div>
                            <div class="row" style="gap: 12px; align-items: center;">
                                <span class="meal-picker__count" data-meal-count>0/{{ $items->count() }}</span>
                                <label class="meal-picker__select-all">
                                    <input type="checkbox" data-meal-select-all>
                                    <span>{{ __('plans.meals.select_all') }}</span>
                                </label>
                            </div>
                        </div>
                        <div class="meal-picker__grid">
                            @foreach ($items as $meal)
                                <label class="meal-option">
                                    <input
                                        type="checkbox"
                                        name="meals[]"
                                        value="{{ $meal->id }}"
                                        @checked(in_array($meal->id, old('meals', $selectedMealIds)))
                                    >
                                    <span class="meal-option__body">
                                        <span class="meal-option__name">{{ $meal->label() }}</span>
                                        @if ($meal->calories !== null)
                                            <span class="meal-option__meta">{{ $meal->calories }} {{ __('meals.units.kcal') }}</span>
                                        @endif
                                    </span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        @endunless
    </x-ui.card>

    <div class="row" style="gap: 12px;">
        <x-ui.button type="submit" variant="primary">{{ __('messages.actions.save') }}</x-ui.button>
        <x-ui.button :href="route('admin.plans.index')" variant="ghost">{{ __('messages.actions.cancel') }}</x-ui.button>
    </div>
</form>

@if ($plan && ($draft ?? null))
    <x-ui.card :title="__('plans.pricing.publish_title')">
        <div class="row" style="gap: 16px; align-items: center; flex-wrap: wrap;">
            <div class="stack" style="gap: 4px;">
                <span class="field__label">{{ __('plans.pricing.publish_title') }}</span>
                <span class="field__hint">{{ __('plans.pricing.publish_hint') }}</span>
            </div>
            @if ($publishedVersion ?? null)
                <x-ui.badge variant="success">{{ __('plans.versions.label', ['number' => $publishedVersion->version_number]) }} — {{ __('plans.versions.statuses.published') }}</x-ui.badge>
            @else
                <x-ui.badge variant="info">{{ __('plans.versions.statuses.draft') }}</x-ui.badge>
            @endif
            <form
                method="POST"
                action="{{ route('admin.plans.versions.publish', $draft) }}"
                data-confirm
                data-confirm-type="primary"
                data-confirm-title="{{ __('plans.versions.publish') }}"
                data-confirm-text="{{ __('plans.versions.publish_confirm') }}"
                data-confirm-button="{{ __('plans.versions.publish') }}"
                data-confirm-cancel="{{ __('messages.confirm.cancel') }}"
                style="margin-inline-start: auto;"
            >
                @csrf
                <x-ui.button type="submit" variant="primary">
                    <x-ui.icon name="upload" size="sm" /> {{ __('plans.versions.publish') }}
                </x-ui.button>
            </form>
        </div>
    </x-ui.card>
@endif

@push('scripts')
    <script src="{{ asset('js/plans.js') }}" defer></script>
@endpush
