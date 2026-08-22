<x-layouts.admin :title="__('articles.title')" :heading="__('articles.title')" :subtitle="__('articles.subtitle')">
    <x-slot:actions>
        @can('create', \App\Modules\Cms\Models\Article::class)
            <x-ui.button :href="route('admin.articles.create')" variant="primary">
                <x-ui.icon name="plus" size="sm" /> {{ __('articles.add') }}
            </x-ui.button>
        @endcan
    </x-slot:actions>

    @if ($articles->isEmpty())
        <x-ui.card>
            <div class="dropdown__empty">{{ __('articles.no_articles') }}</div>
        </x-ui.card>
    @else
        <x-ui.table :headers="[__('articles.columns.article'), __('articles.columns.category'), __('articles.columns.status'), '']">
            @foreach ($articles as $article)
                <tr>
                    <td><strong>{{ $article->label() }}</strong></td>
                    <td>{{ $article->translated('category') }}</td>
                    <td>
                        <x-ui.badge :variant="$article->is_active ? 'success' : 'neutral'">
                            {{ $article->is_active ? __('articles.status.active') : __('articles.status.inactive') }}
                        </x-ui.badge>
                    </td>
                    <td>
                        <div class="row" style="justify-content: flex-end; gap: 8px;">
                            @can('update', $article)
                                <x-ui.button :href="route('admin.articles.edit', $article)" variant="ghost" class="btn--sm">
                                    <x-ui.icon name="pencil" size="sm" /> {{ __('messages.actions.edit') }}
                                </x-ui.button>
                            @endcan

                            @can('delete', $article)
                                <form
                                    method="POST"
                                    action="{{ route('admin.articles.destroy', $article) }}"
                                    data-confirm
                                    data-confirm-type="danger"
                                    data-confirm-title="{{ __('messages.confirm.delete_title') }}"
                                    data-confirm-text="{{ __('articles.confirm_delete') }}"
                                    data-confirm-button="{{ __('messages.confirm.delete_confirm') }}"
                                    data-confirm-cancel="{{ __('messages.confirm.cancel') }}"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <x-ui.button type="submit" variant="danger" class="btn--sm" title="{{ __('messages.actions.delete') }}">
                                        <x-ui.icon name="trash-2" size="sm" />
                                    </x-ui.button>
                                </form>
                            @endcan
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-ui.table>

        <x-ui.pagination :paginator="$articles" />
    @endif
</x-layouts.admin>
