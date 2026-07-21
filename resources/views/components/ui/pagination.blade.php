@props(['paginator'])

@if ($paginator->hasPages())
    <nav class="pagination" role="navigation" aria-label="{{ __('messages.pagination.label') }}">
        <div class="pagination__info">
            {{ __('messages.pagination.showing', [
                'first' => $paginator->firstItem(),
                'last' => $paginator->lastItem(),
                'total' => $paginator->total(),
            ]) }}
        </div>

        <div class="pagination__controls">
            @if ($paginator->onFirstPage())
                <span class="btn btn--ghost btn--sm is-disabled" aria-disabled="true">
                    <x-ui.icon name="chevron-right" size="sm" /> {{ __('messages.pagination.previous') }}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="btn btn--ghost btn--sm" rel="prev">
                    <x-ui.icon name="chevron-right" size="sm" /> {{ __('messages.pagination.previous') }}
                </a>
            @endif

            <span class="pagination__page">
                {{ __('messages.pagination.page', ['current' => $paginator->currentPage(), 'last' => $paginator->lastPage()]) }}
            </span>

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="btn btn--ghost btn--sm" rel="next">
                    {{ __('messages.pagination.next') }} <x-ui.icon name="chevron-left" size="sm" />
                </a>
            @else
                <span class="btn btn--ghost btn--sm is-disabled" aria-disabled="true">
                    {{ __('messages.pagination.next') }} <x-ui.icon name="chevron-left" size="sm" />
                </span>
            @endif
        </div>
    </nav>
@endif
