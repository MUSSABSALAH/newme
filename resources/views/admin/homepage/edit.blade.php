<x-layouts.admin :title="__('homepage.title')" :heading="__('homepage.title')" :subtitle="__('homepage.subtitle')">
    <form action="{{ route('admin.homepage.update') }}" method="POST" data-validate novalidate class="stack">
        @csrf
        @method('PUT')

        <x-ui.card :title="__('homepage.sections.announce')">
            <p class="field__hint" style="margin-bottom:16px">{{ __('homepage.hints.announce') }}</p>

            @foreach (['announce_shipping', 'announce_partners', 'announce_consult'] as $index => $key)
            <div class="stack" style="{{ $index > 0 ? 'margin-top:22px;padding-top:22px;border-top:1px solid var(--line, #E8E4DC);' : '' }}">
                <p class="field__hint" style="margin:0 0 12px;font-weight:800;color:var(--ink, #122B4A)">
                    {{ __('homepage.slides.n', ['n' => $index + 1]) }} — {{ __('homepage.slides.'.$key) }}
                </p>
                <div class="form-grid-2">
                    <x-form.field
                        :label="__('homepage.fields.'.$key.'_ar')"
                        :name="$key.'.ar'"
                        :hint="__('homepage.hints.highlight')"
                        class="field--full"
                    >
                        <textarea name="{{ $key }}[ar]" class="input" rows="3" required>{{ old($key.'.ar', $values[$key]['ar'] ?? '') }}</textarea>
                    </x-form.field>

                    <x-form.field
                        :label="__('homepage.fields.'.$key.'_en')"
                        :name="$key.'.en'"
                        :hint="__('homepage.hints.highlight')"
                        class="field--full"
                    >
                        <textarea name="{{ $key }}[en]" class="input" rows="3" required dir="ltr">{{ old($key.'.en', $values[$key]['en'] ?? '') }}</textarea>
                    </x-form.field>
                </div>
            </div>
            @endforeach
        </x-ui.card>

        <div class="row" style="gap: 12px;">
            <x-ui.button type="submit" variant="primary">{{ __('messages.actions.save') }}</x-ui.button>
        </div>
    </form>
</x-layouts.admin>
