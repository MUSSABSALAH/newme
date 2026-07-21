@props(['name', 'value' => null, 'rows' => 4])

<textarea
    name="{{ $name }}"
    id="{{ $name }}"
    rows="{{ $rows }}"
    {{ $attributes->merge(['class' => 'textarea' . ($errors->has($name) ? ' is-invalid' : '')]) }}
>{{ old($name, $value) }}</textarea>
