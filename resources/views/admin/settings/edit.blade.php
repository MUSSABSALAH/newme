@php
    use App\Modules\Settings\Enums\SettingType;
@endphp

<x-layouts.admin :title="__('settings.title')" :heading="__('settings.title')" :subtitle="__('settings.subtitle')">
    <form action="{{ route('admin.settings.update') }}" method="POST" data-validate novalidate class="stack">
        @csrf
        @method('PUT')

        @foreach ($groups as $group => $definitions)
            @continue(empty($definitions))

            <x-ui.card :title="__('settings.groups.' . $group)">
                <div class="form-grid-2">
                    @foreach ($definitions as $definition)
                        @php
                            $field = 'settings.' . $definition->fieldName();
                            $name = 'settings[' . $definition->fieldName() . ']';
                            $current = $values[$definition->key] ?? null;
                            $isWide = in_array($definition->type, [SettingType::Text, SettingType::MultiSelect], true);
                        @endphp

                        @if ($definition->type === SettingType::Boolean)
                            <div class="field field--full">
                                <label class="switch-row">
                                    <input type="hidden" name="{{ $name }}" value="0">
                                    <input
                                        type="checkbox"
                                        name="{{ $name }}"
                                        value="1"
                                        @checked((bool) old($field, $current))
                                    >
                                    <span>
                                        <span class="switch-row__title">{{ __($definition->labelKey()) }}</span>
                                        @if (Lang::has($definition->hintKey()))
                                            <span class="field__hint">{{ __($definition->hintKey()) }}</span>
                                        @endif
                                    </span>
                                </label>
                            </div>
                        @elseif ($definition->type === SettingType::MultiSelect)
                            @php
                                $selected = old($field, $current);
                                $selected = is_array($selected) ? $selected : [];
                            @endphp
                            <x-form.field
                                :label="__($definition->labelKey())"
                                :name="$field"
                                :hint="Lang::has($definition->hintKey()) ? __($definition->hintKey()) : null"
                                class="field--full"
                            >
                                <div class="check-grid">
                                    @foreach ($definition->options as $option)
                                        <label class="check-grid__item">
                                            <input
                                                type="checkbox"
                                                name="{{ $name }}[]"
                                                value="{{ $option }}"
                                                @checked(in_array($option, $selected, true))
                                            >
                                            <span>
                                                {{ Lang::has('settings.options.' . $definition->key . '.' . $option)
                                                    ? __('settings.options.' . $definition->key . '.' . $option)
                                                    : $option }}
                                            </span>
                                        </label>
                                    @endforeach
                                </div>
                            </x-form.field>
                        @else
                            <x-form.field
                                :label="__($definition->labelKey())"
                                :name="$field"
                                :hint="Lang::has($definition->hintKey()) ? __($definition->hintKey()) : null"
                                :class="$isWide ? 'field--full' : ''"
                            >
                                @if ($definition->type === SettingType::Select)
                                    <x-form.select :name="$name" :selected="old($field, $current)">
                                        @foreach ($definition->options as $option)
                                            <option value="{{ $option }}" @selected((string) old($field, $current) === (string) $option)>
                                                {{ Lang::has('settings.options.' . $definition->key . '.' . $option)
                                                    ? __('settings.options.' . $definition->key . '.' . $option)
                                                    : $option }}
                                            </option>
                                        @endforeach
                                    </x-form.select>
                                @elseif ($definition->type === SettingType::Text)
                                    <x-form.textarea :name="$name" :value="old($field, $current)" rows="3" />
                                @else
                                    <x-form.input
                                        :name="$name"
                                        :type="$definition->type === SettingType::Integer || $definition->type === SettingType::Decimal
                                            ? 'number'
                                            : ($definition->type === SettingType::Time ? 'time' : 'text')"
                                        :step="$definition->type === SettingType::Decimal ? '0.01' : ($definition->type === SettingType::Time ? '60' : null)"
                                        :value="old($field, $current)"
                                    />
                                @endif
                            </x-form.field>
                        @endif
                    @endforeach
                </div>
            </x-ui.card>
        @endforeach

        <div class="row" style="gap: 12px;">
            <x-ui.button type="submit" variant="primary">{{ __('messages.actions.save') }}</x-ui.button>
        </div>
    </form>
</x-layouts.admin>
