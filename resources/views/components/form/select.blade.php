@props(['name', 'options' => [], 'selected' => null])

<select
    name="{{ $name }}"
    id="{{ $name }}"
    {{ $attributes->merge(['class' => 'select' . ($errors->has($name) ? ' is-invalid' : '')]) }}
>
    {{ $slot }}
    @foreach ($options as $optionValue => $optionLabel)
        <option value="{{ $optionValue }}" @selected(old($name, $selected) == $optionValue)>{{ $optionLabel }}</option>
    @endforeach
</select>
