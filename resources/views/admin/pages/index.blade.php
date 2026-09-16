<x-layouts.admin :title="__('cms.title')" :heading="__('cms.title')" :subtitle="__('cms.subtitle')">
    <div class="grid grid--3">
        @foreach ($pages as $slug => $meta)
            <x-ui.card>
                <h2 style="margin:0 0 8px;font-size:16px">{{ __($meta['label']) }}</h2>
                <p class="field__hint" style="margin-bottom:16px">{{ __('cms.edit_title', ['page' => __($meta['label'])]) }}</p>
                <div class="row" style="gap:8px">
                    <x-ui.button :href="route('admin.pages.edit', $slug)" variant="primary" class="btn--sm">
                        {{ __('messages.actions.edit') }}
                    </x-ui.button>
                    <x-ui.button :href="route($meta['preview'])" variant="ghost" class="btn--sm" target="_blank">
                        {{ __('cms.view_page') }}
                    </x-ui.button>
                </div>
            </x-ui.card>
        @endforeach
    </div>
</x-layouts.admin>
