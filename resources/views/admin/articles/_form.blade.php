@php
    $t = fn (string $field, string $locale) => old("$field.$locale", $article?->getTranslation($field, $locale, false) ?: '');
@endphp

<form action="{{ $action }}" method="POST" enctype="multipart/form-data" data-validate novalidate class="stack">
    @csrf
    @if (($method ?? 'POST') === 'PUT')
        @method('PUT')
    @endif

    <x-ui.card :title="__('articles.sections.basics')">
        <div class="form-grid-2">
            <x-form.field :label="__('articles.fields.slug')" name="slug" :hint="__('articles.hints.slug')">
                <x-form.input name="slug" :value="old('slug', $article?->slug)" dir="ltr" />
            </x-form.field>

            <x-form.field :label="__('articles.fields.is_active')" name="is_active">
                <label class="switch-row">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $article?->is_active ?? true))>
                    <span class="switch-row__title">{{ __('articles.status.active') }}</span>
                </label>
            </x-form.field>

            <x-form.field :label="__('articles.fields.category_ar')" name="category.ar">
                <x-form.input name="category[ar]" :value="$t('category', 'ar')" required />
            </x-form.field>

            <x-form.field :label="__('articles.fields.category_en')" name="category.en">
                <x-form.input name="category[en]" :value="$t('category', 'en')" required dir="ltr" />
            </x-form.field>

            <x-form.field :label="__('articles.fields.title_ar')" name="title.ar">
                <x-form.input name="title[ar]" :value="$t('title', 'ar')" required />
            </x-form.field>

            <x-form.field :label="__('articles.fields.title_en')" name="title.en">
                <x-form.input name="title[en]" :value="$t('title', 'en')" required dir="ltr" />
            </x-form.field>

            <x-form.field :label="__('articles.fields.author_ar')" name="author.ar">
                <x-form.input name="author[ar]" :value="$t('author', 'ar')" />
            </x-form.field>

            <x-form.field :label="__('articles.fields.author_en')" name="author.en">
                <x-form.input name="author[en]" :value="$t('author', 'en')" dir="ltr" />
            </x-form.field>

            <x-form.field :label="__('articles.fields.read_time_ar')" name="read_time.ar">
                <x-form.input name="read_time[ar]" :value="$t('read_time', 'ar')" />
            </x-form.field>

            <x-form.field :label="__('articles.fields.read_time_en')" name="read_time.en">
                <x-form.input name="read_time[en]" :value="$t('read_time', 'en')" dir="ltr" />
            </x-form.field>

            <x-form.field :label="__('articles.fields.excerpt_ar')" name="excerpt.ar">
                <textarea name="excerpt[ar]" class="input" rows="3">{{ $t('excerpt', 'ar') }}</textarea>
            </x-form.field>

            <x-form.field :label="__('articles.fields.excerpt_en')" name="excerpt.en">
                <textarea name="excerpt[en]" class="input" rows="3" dir="ltr">{{ $t('excerpt', 'en') }}</textarea>
            </x-form.field>
        </div>
    </x-ui.card>

    <x-ui.card :title="__('articles.sections.content')">
        <div class="form-grid-2">
            <x-form.field :label="__('articles.fields.body_1_ar')" name="body_1.ar">
                <textarea name="body_1[ar]" class="input" rows="4">{{ $t('body_1', 'ar') }}</textarea>
            </x-form.field>
            <x-form.field :label="__('articles.fields.body_1_en')" name="body_1.en">
                <textarea name="body_1[en]" class="input" rows="4" dir="ltr">{{ $t('body_1', 'en') }}</textarea>
            </x-form.field>

            <x-form.field :label="__('articles.fields.body_2_ar')" name="body_2.ar">
                <textarea name="body_2[ar]" class="input" rows="4">{{ $t('body_2', 'ar') }}</textarea>
            </x-form.field>
            <x-form.field :label="__('articles.fields.body_2_en')" name="body_2.en">
                <textarea name="body_2[en]" class="input" rows="4" dir="ltr">{{ $t('body_2', 'en') }}</textarea>
            </x-form.field>

            <x-form.field :label="__('articles.fields.highlight_ar')" name="highlight.ar">
                <textarea name="highlight[ar]" class="input" rows="3">{{ $t('highlight', 'ar') }}</textarea>
            </x-form.field>
            <x-form.field :label="__('articles.fields.highlight_en')" name="highlight.en">
                <textarea name="highlight[en]" class="input" rows="3" dir="ltr">{{ $t('highlight', 'en') }}</textarea>
            </x-form.field>

            <x-form.field :label="__('articles.fields.body_3_ar')" name="body_3.ar">
                <textarea name="body_3[ar]" class="input" rows="4">{{ $t('body_3', 'ar') }}</textarea>
            </x-form.field>
            <x-form.field :label="__('articles.fields.body_3_en')" name="body_3.en">
                <textarea name="body_3[en]" class="input" rows="4" dir="ltr">{{ $t('body_3', 'en') }}</textarea>
            </x-form.field>
        </div>
    </x-ui.card>

    <x-ui.card :title="__('articles.sections.cta')">
        <div class="form-grid-2">
            <x-form.field :label="__('articles.fields.cta_label_ar')" name="cta_label.ar">
                <x-form.input name="cta_label[ar]" :value="$t('cta_label', 'ar')" />
            </x-form.field>
            <x-form.field :label="__('articles.fields.cta_label_en')" name="cta_label.en">
                <x-form.input name="cta_label[en]" :value="$t('cta_label', 'en')" dir="ltr" />
            </x-form.field>
            <x-form.field :label="__('articles.fields.cta_url')" name="cta_url" :hint="__('articles.hints.cta_url')">
                <x-form.input name="cta_url" :value="old('cta_url', $article?->cta_url)" dir="ltr" />
            </x-form.field>
        </div>
    </x-ui.card>

    <x-ui.card :title="__('articles.sections.media')">
        <div class="form-grid-2">
            <x-form.field :label="__('articles.fields.image')" name="image">
                <input type="file" name="image" accept="image/*" class="input">
                @if ($article?->imageUrl())
                    <img
                        src="{{ $article->imageUrl() }}"
                        alt=""
                        style="margin-top:10px;max-width:220px;border-radius:12px;display:block"
                    >
                @endif
            </x-form.field>

            <x-form.field :label="__('articles.fields.sort_order')" name="sort_order">
                <x-form.input name="sort_order" type="number" min="0" :value="old('sort_order', $article?->sort_order ?? 0)" />
            </x-form.field>
        </div>
    </x-ui.card>

    <div class="row" style="gap: 12px;">
        <x-ui.button type="submit" variant="primary">{{ __('messages.actions.save') }}</x-ui.button>
        <x-ui.button :href="route('admin.articles.index')" variant="ghost">{{ __('messages.actions.cancel') }}</x-ui.button>
    </div>
</form>
