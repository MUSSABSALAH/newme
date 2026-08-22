@php
    /** @var \App\Modules\Dashboard\DTOs\ContentPanelData $content */
@endphp

<x-admin.dashboard.section :title="__('dashboard.panels.content')" icon="newspaper" />

<div class="grid grid--4">
    <x-ui.stat-card
        :label="__('dashboard.kpi.articles_total')"
        :value="$content->articles"
        accent="dark"
    >
        <x-slot:icon><x-ui.icon name="file-text" /></x-slot:icon>
    </x-ui.stat-card>

    <x-ui.stat-card
        :label="__('dashboard.kpi.articles_published')"
        :value="$content->publishedArticles"
        accent="primary"
    >
        <x-slot:icon><x-ui.icon name="check-circle" /></x-slot:icon>
    </x-ui.stat-card>

    <x-ui.stat-card
        :label="__('dashboard.kpi.recipes_total')"
        :value="$content->recipes"
        accent="dark"
    >
        <x-slot:icon><x-ui.icon name="chef-hat" /></x-slot:icon>
    </x-ui.stat-card>

    <x-ui.stat-card
        :label="__('dashboard.kpi.recipes_published')"
        :value="$content->publishedRecipes"
        accent="accent"
    >
        <x-slot:icon><x-ui.icon name="check-circle" /></x-slot:icon>
    </x-ui.stat-card>
</div>

<x-ui.card>
    <div class="row">
        <a href="{{ route('admin.articles.index') }}" class="link-btn">{{ __('dashboard.sections.view_all_articles') }}</a>
        <a href="{{ route('admin.recipes.index') }}" class="link-btn">{{ __('dashboard.sections.view_all_recipes') }}</a>
    </div>
</x-ui.card>
