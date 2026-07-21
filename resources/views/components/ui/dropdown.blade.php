@props(['align' => 'end', 'width' => '260px'])

<div class="dropdown" data-dropdown>
    <button type="button" class="dropdown__trigger" data-dropdown-toggle aria-haspopup="true" aria-expanded="false">
        {{ $trigger }}
    </button>

    <div
        class="dropdown__menu dropdown__menu--{{ $align }}"
        data-dropdown-menu
        style="width: {{ $width }};"
        hidden
    >
        {{ $slot }}
    </div>
</div>
