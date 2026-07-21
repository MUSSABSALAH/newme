@props(['name', 'type' => 'text', 'value' => null])

<input
    type="{{ $type }}"
    name="{{ $name }}"
    id="{{ $name }}"
    value="{{ old($name, $value) }}"
    {{ $attributes->merge(['class' => 'input' . ($errors->has($name) ? ' is-invalid' : '')]) }}
>
