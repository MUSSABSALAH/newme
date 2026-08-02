@php
    $catName = fn (string $locale) => old("name.$locale", $category?->getTranslation('name', $locale, false) ?: '');
    $catDesc = fn (string $locale) => old("description.$locale", $category?->getTranslation('description', $locale, false) ?: '');
@endphp

<form action="{{ $action }}" method="POST" enctype="multipart/form-data" data-validate novalidate class="stack">
    @csrf
    @if (($method ?? 'POST') === 'PUT')
        @method('PUT')
    @endif

    <x-ui.card :title="__('categories.sections.basics')">
        <div class="form-grid-2">
            <x-form.field :label="__('categories.fields.parent')" name="parent_id">
                <x-form.select name="parent_id" :selected="old('parent_id', $category?->parent_id)">
                    <option value="">{{ __('categories.parent_none') }}</option>
                    @foreach ($parents as $parent)
                        <option value="{{ $parent->id }}" @selected((string) old('parent_id', $category?->parent_id) === (string) $parent->id)>
                            {{ $parent->label() }}
                        </option>
                    @endforeach
                </x-form.select>
            </x-form.field>

            <x-form.field :label="__('categories.fields.slug')" name="slug">
                <x-form.input name="slug" :value="old('slug', $category?->slug)" required dir="ltr" placeholder="bakery" />
            </x-form.field>

            <x-form.field :label="__('categories.fields.name_ar')" name="name.ar">
                <x-form.input name="name[ar]" :value="$catName('ar')" required minlength="2" />
            </x-form.field>

            <x-form.field :label="__('categories.fields.name_en')" name="name.en">
                <x-form.input name="name[en]" :value="$catName('en')" required minlength="2" dir="ltr" />
            </x-form.field>

            <x-form.field :label="__('categories.fields.description_ar')" name="description.ar">
                <x-form.textarea name="description[ar]" rows="2" :value="$catDesc('ar')" />
            </x-form.field>

            <x-form.field :label="__('categories.fields.description_en')" name="description.en">
                <x-form.textarea name="description[en]" rows="2" dir="ltr" :value="$catDesc('en')" />
            </x-form.field>
        </div>
    </x-ui.card>

    <x-ui.card :title="__('categories.sections.media')">
        <div class="form-grid-2">
            <x-form.field :label="__('categories.fields.image')" name="image">
                <input type="file" name="image" accept="image/*" class="input">
                @if ($category?->image_path)
                    <img
                        src="{{ asset('storage/'.$category->image_path) }}"
                        alt=""
                        style="margin-top:10px;max-width:220px;border-radius:12px;display:block"
                    >
                    <span class="field__hint">{{ $category->image_path }}</span>
                @endif
            </x-form.field>

            <div class="stack">
                <x-form.field :label="__('categories.fields.sort_order')" name="sort_order">
                    <x-form.input name="sort_order" type="number" min="0" :value="old('sort_order', $category?->sort_order ?? 0)" />
                </x-form.field>

                <x-form.field :label="__('categories.fields.is_active')" name="is_active">
                    <label class="switch-row">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $category?->is_active ?? true))>
                        <span class="switch-row__title">{{ __('categories.status.active') }}</span>
                    </label>
                </x-form.field>
            </div>
        </div>
    </x-ui.card>

    <div class="row" style="gap: 12px;">
        <x-ui.button type="submit" variant="primary">{{ __('messages.actions.save') }}</x-ui.button>
        <x-ui.button :href="route('admin.categories.index')" variant="ghost">{{ __('messages.actions.cancel') }}</x-ui.button>
    </div>
</form>
