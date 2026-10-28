@props(['value' => '', 'placeholder' => null])

{{-- Sits inside a GET filter form, so the other filters ride along with the search. --}}
<div class="row" style="gap: 8px; align-items: flex-end; flex: 1 1 320px; min-width: 260px;">
    <x-form.field :label="__('messages.search.label')" name="q" style="margin:0; flex:1;">
        <x-form.input
            type="search"
            name="q"
            :value="$value"
            :placeholder="$placeholder ?? __('messages.search.placeholder')"
            maxlength="100"
            autocomplete="off"
        />
    </x-form.field>

    <x-ui.button type="submit" variant="ghost">
        <x-ui.icon name="search" size="sm" /> {{ __('messages.actions.search') }}
    </x-ui.button>

    @if ($value !== '')
        <x-ui.button :href="request()->fullUrlWithQuery(['q' => null, 'page' => null])" variant="ghost">
            <x-ui.icon name="x" size="sm" /> {{ __('messages.search.clear') }}
        </x-ui.button>
    @endif
</div>
