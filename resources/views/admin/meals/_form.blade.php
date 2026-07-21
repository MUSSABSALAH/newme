@php
    $mealName = fn (string $locale) => old("name.$locale", $meal?->getTranslation('name', $locale, false) ?: '');
@endphp

<form action="{{ $action }}" method="POST" enctype="multipart/form-data" data-validate novalidate class="stack">
    @csrf
    @if (($method ?? 'POST') === 'PUT')
        @method('PUT')
    @endif

    <x-ui.card :title="__('meals.sections.basics')">
        <div class="form-grid-2">
            <x-form.field :label="__('meals.fields.meal_type')" name="meal_type">
                <x-form.select name="meal_type" :selected="old('meal_type', $meal?->meal_type->value)">
                    @foreach ($types as $type)
                        <option value="{{ $type->value }}" @selected(old('meal_type', $meal?->meal_type->value) === $type->value)>
                            {{ $type->label() }}
                        </option>
                    @endforeach
                </x-form.select>
            </x-form.field>

            <x-form.field :label="__('meals.fields.is_active')" name="is_active">
                <label class="switch-row">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $meal?->is_active ?? true))>
                    <span class="switch-row__title">{{ __('meals.status.active') }}</span>
                </label>
            </x-form.field>

            <x-form.field :label="__('meals.fields.name_ar')" name="name.ar">
                <x-form.input name="name[ar]" :value="$mealName('ar')" required minlength="2" />
            </x-form.field>

            <x-form.field :label="__('meals.fields.name_en')" name="name.en">
                <x-form.input name="name[en]" :value="$mealName('en')" required minlength="2" dir="ltr" />
            </x-form.field>
        </div>
    </x-ui.card>

    <x-ui.card :title="__('meals.sections.nutrition')">
        <div class="form-grid-2">
            <x-form.field :label="__('meals.fields.calories')" name="calories">
                <x-form.input name="calories" type="number" min="0" :value="old('calories', $meal?->calories)" />
            </x-form.field>

            <x-form.field :label="__('meals.fields.protein_g')" name="protein_g">
                <x-form.input name="protein_g" type="number" min="0" :value="old('protein_g', $meal?->protein_g)" />
            </x-form.field>

            <x-form.field :label="__('meals.fields.carbs_g')" name="carbs_g">
                <x-form.input name="carbs_g" type="number" min="0" :value="old('carbs_g', $meal?->carbs_g)" />
            </x-form.field>

            <x-form.field :label="__('meals.fields.fat_g')" name="fat_g">
                <x-form.input name="fat_g" type="number" min="0" :value="old('fat_g', $meal?->fat_g)" />
            </x-form.field>
        </div>
    </x-ui.card>

    <x-ui.card :title="__('meals.sections.media')">
        <div class="form-grid-2">
            <x-form.field :label="__('meals.fields.image')" name="image">
                <input type="file" name="image" accept="image/*" class="input">
                @if ($meal?->image_path)
                    <img
                        src="{{ asset('storage/'.$meal->image_path) }}"
                        alt=""
                        style="margin-top:10px;max-width:220px;border-radius:12px;display:block"
                    >
                    <span class="field__hint">{{ $meal->image_path }}</span>
                @endif
            </x-form.field>

            <x-form.field :label="__('meals.fields.sort_order')" name="sort_order">
                <x-form.input name="sort_order" type="number" min="0" :value="old('sort_order', $meal?->sort_order ?? 0)" />
            </x-form.field>
        </div>
    </x-ui.card>

    <div class="row" style="gap: 12px;">
        <x-ui.button type="submit" variant="primary">{{ __('messages.actions.save') }}</x-ui.button>
        <x-ui.button :href="route('admin.meals.index')" variant="ghost">{{ __('messages.actions.cancel') }}</x-ui.button>
    </div>
</form>
