@php
    $t = fn (string $field, string $locale) => old("$field.$locale", $recipe?->getTranslation($field, $locale, false) ?: '');
    $listText = function (string $field, string $locale) use ($recipe): string {
        $old = old("$field.$locale");
        if (is_string($old)) {
            return $old;
        }
        $items = $recipe?->getTranslation($field, $locale, false);
        if (! is_array($items)) {
            return '';
        }

        return implode("\n", $items);
    };
@endphp

<form action="{{ $action }}" method="POST" enctype="multipart/form-data" data-validate novalidate class="stack">
    @csrf
    @if (($method ?? 'POST') === 'PUT')
        @method('PUT')
    @endif

    <x-ui.card :title="__('recipes.sections.basics')">
        <div class="form-grid-2">
            <x-form.field :label="__('recipes.fields.slug')" name="slug" :hint="__('recipes.hints.slug')">
                <x-form.input name="slug" :value="old('slug', $recipe?->slug)" dir="ltr" />
            </x-form.field>

            <x-form.field :label="__('recipes.fields.is_active')" name="is_active">
                <label class="switch-row">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $recipe?->is_active ?? true))>
                    <span class="switch-row__title">{{ __('recipes.status.active') }}</span>
                </label>
            </x-form.field>

            <x-form.field :label="__('recipes.fields.category_ar')" name="category.ar">
                <x-form.input name="category[ar]" :value="$t('category', 'ar')" required />
            </x-form.field>

            <x-form.field :label="__('recipes.fields.category_en')" name="category.en">
                <x-form.input name="category[en]" :value="$t('category', 'en')" required dir="ltr" />
            </x-form.field>

            <x-form.field :label="__('recipes.fields.title_ar')" name="title.ar">
                <x-form.input name="title[ar]" :value="$t('title', 'ar')" required />
            </x-form.field>

            <x-form.field :label="__('recipes.fields.title_en')" name="title.en">
                <x-form.input name="title[en]" :value="$t('title', 'en')" required dir="ltr" />
            </x-form.field>

            <x-form.field :label="__('recipes.fields.meta_title_ar')" name="meta_title.ar">
                <x-form.input name="meta_title[ar]" :value="$t('meta_title', 'ar')" />
            </x-form.field>

            <x-form.field :label="__('recipes.fields.meta_title_en')" name="meta_title.en">
                <x-form.input name="meta_title[en]" :value="$t('meta_title', 'en')" dir="ltr" />
            </x-form.field>

            <x-form.field :label="__('recipes.fields.excerpt_ar')" name="excerpt.ar">
                <textarea name="excerpt[ar]" class="input" rows="3">{{ $t('excerpt', 'ar') }}</textarea>
            </x-form.field>

            <x-form.field :label="__('recipes.fields.excerpt_en')" name="excerpt.en">
                <textarea name="excerpt[en]" class="input" rows="3" dir="ltr">{{ $t('excerpt', 'en') }}</textarea>
            </x-form.field>
        </div>
    </x-ui.card>

    <x-ui.card :title="__('recipes.sections.meta')">
        <div class="form-grid-2">
            <x-form.field :label="__('recipes.fields.time_label_ar')" name="time_label.ar">
                <x-form.input name="time_label[ar]" :value="$t('time_label', 'ar')" />
            </x-form.field>
            <x-form.field :label="__('recipes.fields.time_label_en')" name="time_label.en">
                <x-form.input name="time_label[en]" :value="$t('time_label', 'en')" dir="ltr" />
            </x-form.field>

            <x-form.field :label="__('recipes.fields.kcal_label_ar')" name="kcal_label.ar">
                <x-form.input name="kcal_label[ar]" :value="$t('kcal_label', 'ar')" />
            </x-form.field>
            <x-form.field :label="__('recipes.fields.kcal_label_en')" name="kcal_label.en">
                <x-form.input name="kcal_label[en]" :value="$t('kcal_label', 'en')" dir="ltr" />
            </x-form.field>

            <x-form.field :label="__('recipes.fields.protein_label_ar')" name="protein_label.ar">
                <x-form.input name="protein_label[ar]" :value="$t('protein_label', 'ar')" />
            </x-form.field>
            <x-form.field :label="__('recipes.fields.protein_label_en')" name="protein_label.en">
                <x-form.input name="protein_label[en]" :value="$t('protein_label', 'en')" dir="ltr" />
            </x-form.field>

            <x-form.field :label="__('recipes.fields.servings_label_ar')" name="servings_label.ar">
                <x-form.input name="servings_label[ar]" :value="$t('servings_label', 'ar')" />
            </x-form.field>
            <x-form.field :label="__('recipes.fields.servings_label_en')" name="servings_label.en">
                <x-form.input name="servings_label[en]" :value="$t('servings_label', 'en')" dir="ltr" />
            </x-form.field>
        </div>
    </x-ui.card>

    <x-ui.card :title="__('recipes.sections.lists')">
        <div class="form-grid-2">
            <x-form.field :label="__('recipes.fields.ingredients_ar')" name="ingredients.ar" :hint="__('recipes.hints.lists')">
                <textarea name="ingredients[ar]" class="input" rows="6">{{ $listText('ingredients', 'ar') }}</textarea>
            </x-form.field>
            <x-form.field :label="__('recipes.fields.ingredients_en')" name="ingredients.en" :hint="__('recipes.hints.lists')">
                <textarea name="ingredients[en]" class="input" rows="6" dir="ltr">{{ $listText('ingredients', 'en') }}</textarea>
            </x-form.field>

            <x-form.field :label="__('recipes.fields.steps_ar')" name="steps.ar" :hint="__('recipes.hints.lists')">
                <textarea name="steps[ar]" class="input" rows="6">{{ $listText('steps', 'ar') }}</textarea>
            </x-form.field>
            <x-form.field :label="__('recipes.fields.steps_en')" name="steps.en" :hint="__('recipes.hints.lists')">
                <textarea name="steps[en]" class="input" rows="6" dir="ltr">{{ $listText('steps', 'en') }}</textarea>
            </x-form.field>
        </div>
    </x-ui.card>

    <x-ui.card :title="__('recipes.sections.cta')">
        <div class="form-grid-2">
            <x-form.field :label="__('recipes.fields.cta_label_ar')" name="cta_label.ar">
                <x-form.input name="cta_label[ar]" :value="$t('cta_label', 'ar')" />
            </x-form.field>
            <x-form.field :label="__('recipes.fields.cta_label_en')" name="cta_label.en">
                <x-form.input name="cta_label[en]" :value="$t('cta_label', 'en')" dir="ltr" />
            </x-form.field>
            <x-form.field :label="__('recipes.fields.cta_url')" name="cta_url" :hint="__('recipes.hints.cta_url')">
                <x-form.input name="cta_url" :value="old('cta_url', $recipe?->cta_url)" dir="ltr" />
            </x-form.field>
        </div>
    </x-ui.card>

    <x-ui.card :title="__('recipes.sections.media')">
        <div class="form-grid-2">
            <x-form.field :label="__('recipes.fields.image')" name="image">
                <input type="file" name="image" accept="image/*" class="input">
                @if ($recipe?->imageUrl())
                    <img
                        src="{{ $recipe->imageUrl() }}"
                        alt=""
                        style="margin-top:10px;max-width:220px;border-radius:12px;display:block"
                    >
                @endif
            </x-form.field>

            <x-form.field :label="__('recipes.fields.sort_order')" name="sort_order">
                <x-form.input name="sort_order" type="number" min="0" :value="old('sort_order', $recipe?->sort_order ?? 0)" />
            </x-form.field>
        </div>
    </x-ui.card>

    <div class="row" style="gap: 12px;">
        <x-ui.button type="submit" variant="primary">{{ __('messages.actions.save') }}</x-ui.button>
        <x-ui.button :href="route('admin.recipes.index')" variant="ghost">{{ __('messages.actions.cancel') }}</x-ui.button>
    </div>
</form>
