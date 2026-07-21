@props(['label' => null, 'name' => null, 'hint' => null])

<div {{ $attributes->merge(['class' => 'field']) }}>
    @if ($label)
        <label class="field__label" @if ($name) for="{{ $name }}" @endif>{{ $label }}</label>
    @endif

    {{ $slot }}

    @if ($hint)
        <span class="field__hint">{{ $hint }}</span>
    @endif

    @if ($name)
        @error($name)
            <span class="field__error">{{ $message }}</span>
        @enderror
    @endif
</div>
