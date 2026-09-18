@php
    use App\Support\Money\Money;

    $prodName = fn (string $locale) => old("name.$locale", $product?->getTranslation('name', $locale, false) ?: '');
    $prodDesc = fn (string $locale) => old("description.$locale", $product?->getTranslation('description', $locale, false) ?: '');
    $prodPrice = old('price', $product ? Money::fromMinor($product->price)->format() : '0.00');
    $catLabel = fn ($c) => ($c->parent ? $c->parent->label().' — ' : '').$c->label();

    $servingRaw = old('serving_size', $product?->serving_size);
    $servingChoice = old('serving_size_choice');
    if ($servingChoice === null) {
        if (! is_string($servingRaw) || $servingRaw === '') {
            $servingChoice = '';
        } else {
            $servingChoice = \App\Modules\Store\Enums\ServingSize::tryFrom($servingRaw)?->value
                ?? \App\Modules\Store\Enums\ServingSize::CUSTOM_CHOICE;
        }
    }
    $servingCustom = old(
        'serving_size_custom',
        $servingChoice === \App\Modules\Store\Enums\ServingSize::CUSTOM_CHOICE ? (string) $servingRaw : '',
    );
@endphp

<form action="{{ $action }}" method="POST" enctype="multipart/form-data" data-validate novalidate class="stack">
    @csrf
    @if (($method ?? 'POST') === 'PUT')
        @method('PUT')
    @endif

    <x-ui.card :title="__('products.sections.basics')">
        <div class="form-grid-2">
            <x-form.field :label="__('products.fields.category')" name="category_id">
                <x-form.select name="category_id" :selected="old('category_id', $product?->category_id)">
                    <option value="">{{ __('products.select_category') }}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected((string) old('category_id', $product?->category_id) === (string) $category->id)>
                            {{ $catLabel($category) }}
                        </option>
                    @endforeach
                </x-form.select>
            </x-form.field>

            <x-form.field :label="__('products.fields.slug')" name="slug">
                <x-form.input name="slug" :value="old('slug', $product?->slug)" required dir="ltr" placeholder="bread_multiseed" />
            </x-form.field>

            <x-form.field :label="__('products.fields.name_ar')" name="name.ar">
                <x-form.input name="name[ar]" :value="$prodName('ar')" required minlength="2" />
            </x-form.field>

            <x-form.field :label="__('products.fields.name_en')" name="name.en">
                <x-form.input name="name[en]" :value="$prodName('en')" required minlength="2" dir="ltr" />
            </x-form.field>

            <x-form.field :label="__('products.fields.description_ar')" name="description.ar">
                <x-form.textarea name="description[ar]" rows="2" :value="$prodDesc('ar')" />
            </x-form.field>

            <x-form.field :label="__('products.fields.description_en')" name="description.en">
                <x-form.textarea name="description[en]" rows="2" dir="ltr" :value="$prodDesc('en')" />
            </x-form.field>
        </div>
    </x-ui.card>

    <x-ui.card :title="__('products.sections.pricing')">
        <div class="form-grid-2">
            <x-form.field :label="__('products.fields.price')" name="price" :hint="__('products.fields.price_hint')">
                <x-form.input name="price" type="number" step="0.01" min="0" :value="$prodPrice" required />
            </x-form.field>

            <x-form.field :label="__('products.fields.flag')" name="flag">
                <x-form.select name="flag" :selected="old('flag', $product?->flag?->value)">
                    <option value="">{{ __('products.flag_none') }}</option>
                    @foreach ($flags as $flag)
                        <option value="{{ $flag->value }}" @selected(old('flag', $product?->flag?->value) === $flag->value)>
                            {{ $flag->label() }}
                        </option>
                    @endforeach
                </x-form.select>
            </x-form.field>

            <x-form.field :label="__('products.fields.external_url')" name="external_url">
                <x-form.input name="external_url" type="url" :value="old('external_url', $product?->external_url)" dir="ltr" placeholder="https://…" />
            </x-form.field>
        </div>
    </x-ui.card>

    <x-ui.card :title="__('products.sections.nutrition')">
        <div class="form-grid-2">
            <x-form.field :label="__('products.fields.calories')" name="calories">
                <x-form.input name="calories" type="number" min="0" :value="old('calories', $product?->calories)" />
            </x-form.field>

            <x-form.field :label="__('products.fields.serving_size')" name="serving_size_choice">
                <x-form.select name="serving_size_choice" :selected="$servingChoice">
                    <option value="">{{ __('products.serving_none') }}</option>
                    @foreach ($servings as $serving)
                        <option value="{{ $serving->value }}" @selected($servingChoice === $serving->value)>
                            {{ $serving->label() }}
                        </option>
                    @endforeach
                    <option value="{{ \App\Modules\Store\Enums\ServingSize::CUSTOM_CHOICE }}" @selected($servingChoice === \App\Modules\Store\Enums\ServingSize::CUSTOM_CHOICE)>
                        {{ __('products.serving_other') }}
                    </option>
                </x-form.select>
            </x-form.field>

            <div id="serving-size-custom-wrap" class="field--full" @if ($servingChoice !== \App\Modules\Store\Enums\ServingSize::CUSTOM_CHOICE) hidden @endif>
                <x-form.field :label="__('products.fields.serving_size_custom')" name="serving_size_custom" :hint="__('products.fields.serving_size_custom_hint')">
                    <x-form.input name="serving_size_custom" :value="$servingCustom" maxlength="80" />
                </x-form.field>
            </div>

            <x-form.field :label="__('products.fields.protein_g')" name="protein_g">
                <x-form.input name="protein_g" type="number" step="0.1" min="0" :value="old('protein_g', $product?->protein_g)" />
            </x-form.field>

            <x-form.field :label="__('products.fields.carbs_g')" name="carbs_g">
                <x-form.input name="carbs_g" type="number" step="0.1" min="0" :value="old('carbs_g', $product?->carbs_g)" />
            </x-form.field>

            <x-form.field :label="__('products.fields.fat_g')" name="fat_g">
                <x-form.input name="fat_g" type="number" step="0.1" min="0" :value="old('fat_g', $product?->fat_g)" />
            </x-form.field>

            <x-form.field :label="__('products.fields.nutrition_note')" name="nutrition_note">
                <x-form.select name="nutrition_note" :selected="old('nutrition_note', $product?->nutrition_note?->value)">
                    <option value="">{{ __('products.note_none') }}</option>
                    @foreach ($notes as $note)
                        <option value="{{ $note->value }}" @selected(old('nutrition_note', $product?->nutrition_note?->value) === $note->value)>
                            {{ $note->label() }}
                        </option>
                    @endforeach
                </x-form.select>
            </x-form.field>
        </div>
    </x-ui.card>

    <x-ui.card :title="__('products.sections.media')">
        <div class="form-grid-2">
            <x-form.field :label="__('products.fields.image')" name="image">
                <input type="file" name="image" accept="image/*" class="input">
                @if ($product?->imageUrl())
                    <img
                        src="{{ $product->imageUrl() }}"
                        alt=""
                        style="margin-top:10px;max-width:220px;border-radius:12px;display:block"
                    >
                    <span class="field__hint">{{ $product->image_path }}</span>
                @endif
            </x-form.field>

            <div class="stack">
                <x-form.field :label="__('products.fields.sort_order')" name="sort_order">
                    <x-form.input name="sort_order" type="number" min="0" :value="old('sort_order', $product?->sort_order ?? 0)" />
                </x-form.field>

                <x-form.field :label="__('products.fields.is_featured')" name="is_featured">
                    <label class="switch-row">
                        <input type="hidden" name="is_featured" value="0">
                        <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $product?->is_featured ?? false))>
                        <span class="switch-row__title">{{ __('products.status.featured') }}</span>
                    </label>
                </x-form.field>

                <x-form.field :label="__('products.fields.is_active')" name="is_active">
                    <label class="switch-row">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $product?->is_active ?? true))>
                        <span class="switch-row__title">{{ __('products.status.active') }}</span>
                    </label>
                </x-form.field>
            </div>
        </div>
    </x-ui.card>

    <div class="row" style="gap: 12px;">
        <x-ui.button type="submit" variant="primary">{{ __('messages.actions.save') }}</x-ui.button>
        <x-ui.button :href="route('admin.products.index')" variant="ghost">{{ __('messages.actions.cancel') }}</x-ui.button>
    </div>
</form>
<script>
(function () {
    var select = document.getElementById('serving_size_choice');
    var wrap = document.getElementById('serving-size-custom-wrap');
    var input = document.getElementById('serving_size_custom');
    if (!select || !wrap) return;

    function sync(focus) {
        var other = select.value === @json(\App\Modules\Store\Enums\ServingSize::CUSTOM_CHOICE);
        wrap.hidden = !other;
        if (input) {
            input.disabled = !other;
            if (other && focus) input.focus();
        }
    }

    select.addEventListener('change', function () { sync(true); });
    sync(false);
})();
</script>
