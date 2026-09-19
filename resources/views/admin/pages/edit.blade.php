@php
    $pageLabel = __($meta['label']);
    $fieldLabel = static function (array $field): string {
        $key = $field['key'];
        $direct = __('cms.fields.'.$key);
        if ($direct !== 'cms.fields.'.$key) {
            return $direct;
        }
        if (preg_match('/^(.+)_(\d+)_([a-z0-9]+)$/', $key, $m) === 1) {
            $pattern = __('cms.repeat.'.$m[1].'_'.$m[3], ['n' => $m[2]]);
            if ($pattern !== 'cms.repeat.'.$m[1].'_'.$m[3]) {
                return $pattern;
            }
        }

        return str_replace('_', ' ', $key);
    };
@endphp

<x-layouts.admin
    :title="__('cms.edit_title', ['page' => $pageLabel])"
    :heading="__('cms.edit_title', ['page' => $pageLabel])"
    :subtitle="__('cms.subtitle')"
>
    <x-slot:actions>
        <x-ui.button :href="route('admin.pages.index')" variant="ghost">{{ __('messages.actions.back') }}</x-ui.button>
        <x-ui.button :href="route($meta['preview'])" variant="ghost" target="_blank">{{ __('cms.view_page') }}</x-ui.button>
    </x-slot:actions>

    <form action="{{ route('admin.pages.update', $page) }}" method="POST" enctype="multipart/form-data" data-validate novalidate class="stack">
        @csrf
        @method('PUT')

        @foreach ($sections as $section => $fields)
            <x-ui.card :title="__('cms.sections.'.$section)">
                @if ($section === 'announce')
                    <p class="field__hint" style="margin-bottom:16px">{{ __('cms.hints.announce') }}</p>
                @endif

                @foreach ($fields as $index => $field)
                    @php
                        $key = $field['key'];
                        $type = $field['type'];
                        $label = $fieldLabel($field);
                        $value = $values[$key] ?? ['ar' => '', 'en' => '', 'image_url' => null];
                        $wrapStyle = $index > 0 ? 'margin-top:22px;padding-top:22px;border-top:1px solid var(--line, #E8E4DC);' : '';
                    @endphp

                    @if ($type === 'image')
                        <div class="stack" style="{{ $wrapStyle }}">
                            <x-form.field :label="$label" :name="$key" :hint="__('cms.hints.image')">
                                @if (! empty($value['image_url']))
                                    <img
                                        src="{{ $value['image_url'] }}"
                                        alt=""
                                        style="margin-bottom:10px;max-width:280px;max-height:160px;object-fit:cover;border-radius:12px;display:block"
                                    >
                                    <p class="field__hint" style="margin-bottom:8px">{{ __('cms.current_image') }}</p>
                                @endif
                                <input type="file" name="{{ $key }}" accept="image/*" class="input">
                            </x-form.field>
                        </div>
                    @else
                        @php
                            $rows = $type === 'rich' ? 22 : (($type === 'textarea' || $type === 'html' || $type === 'list') ? 3 : 2);
                            $hint = match ($type) {
                                'html' => __('cms.hints.html'),
                                'rich' => __('cms.hints.rich'),
                                'list' => __('cms.hints.list'),
                                default => null,
                            };
                        @endphp
                        <div class="stack" style="{{ $wrapStyle }}">
                            <p class="field__hint" style="margin:0 0 12px;font-weight:800;color:var(--ink, #122B4A)">{{ $label }}</p>
                            <div class="form-grid-2">
                                <x-form.field :label="$label.' — '.__('cms.locale_ar')" :name="$key.'.ar'" :hint="$hint" class="field--full">
                                    <textarea name="{{ $key }}[ar]" class="input" rows="{{ $rows }}" required @if (in_array($type, ['html', 'rich'], true)) data-cms-highlight @endif>{{ old($key.'.ar', $value['ar'] ?? '') }}</textarea>
                                    @if (in_array($type, ['html', 'rich'], true))
                                        <p class="cms-preview" data-cms-preview hidden>
                                            <span class="cms-preview__label">{{ __('cms.preview') }}</span>
                                            <span class="cms-preview__out"></span>
                                        </p>
                                    @endif
                                </x-form.field>
                                <x-form.field :label="$label.' — '.__('cms.locale_en')" :name="$key.'.en'" :hint="$hint" class="field--full">
                                    <textarea name="{{ $key }}[en]" class="input" rows="{{ $rows }}" required dir="ltr" @if (in_array($type, ['html', 'rich'], true)) data-cms-highlight @endif>{{ old($key.'.en', $value['en'] ?? '') }}</textarea>
                                    @if (in_array($type, ['html', 'rich'], true))
                                        <p class="cms-preview" data-cms-preview hidden>
                                            <span class="cms-preview__label">{{ __('cms.preview') }}</span>
                                            <span class="cms-preview__out"></span>
                                        </p>
                                    @endif
                                </x-form.field>
                            </div>
                        </div>
                    @endif
                @endforeach
            </x-ui.card>
        @endforeach

        <div class="row" style="gap: 12px;">
            <x-ui.button type="submit" variant="primary">{{ __('messages.actions.save') }}</x-ui.button>
            <x-ui.button :href="route('admin.pages.index')" variant="ghost">{{ __('messages.actions.cancel') }}</x-ui.button>
        </div>
    </form>

    @push('styles')
    <style>
    .cms-preview{margin:8px 0 0;padding:10px 12px;border-radius:12px;background:#F7F5F1;border:1px solid #E8E4DC;font-size:14px;font-weight:700;color:#122B4A;line-height:1.7}
    .cms-preview[hidden]{display:none!important}
    .cms-preview__label{display:block;font-size:11px;font-weight:800;color:#7C8799;margin-bottom:4px}
    .cms-preview__out em{font-style:normal;color:#DD6516;font-weight:900}
    </style>
    @endpush

    @push('scripts')
    <script>
    (function () {
      function previewHtml(raw) {
        var escaped = String(raw || '')
          .replace(/&/g, '&amp;')
          .replace(/</g, '&lt;')
          .replace(/>/g, '&gt;');
        return escaped
          .replace(/\n/g, '<br>')
          .replace(/\*([^*\n]+)\*/g, '<em>$1</em>');
      }

      function sync(textarea) {
        var wrap = textarea.closest('.field') || textarea.parentElement;
        var box = wrap ? wrap.querySelector('[data-cms-preview]') : null;
        if (!box) return;
        var out = box.querySelector('.cms-preview__out');
        var html = previewHtml(textarea.value);
        var hasMark = textarea.value.indexOf('*') !== -1 || textarea.value.indexOf('\n') !== -1;
        if (out) out.innerHTML = html;
        box.hidden = !textarea.value.trim() || !hasMark;
      }

      document.querySelectorAll('textarea[data-cms-highlight]').forEach(function (textarea) {
        textarea.addEventListener('input', function () { sync(textarea); });
        sync(textarea);
      });
    })();
    </script>
    @endpush
</x-layouts.admin>
