<x-layouts.admin :title="__('categories.title')" :heading="__('categories.title')" :subtitle="__('categories.subtitle')">
    <x-slot:actions>
        @can('create', \App\Modules\Store\Models\Category::class)
            <x-ui.button :href="route('admin.categories.create')" variant="primary">
                <x-ui.icon name="plus" size="sm" /> {{ __('categories.add') }}
            </x-ui.button>
        @endcan
    </x-slot:actions>

    @if ($categories->isEmpty())
        <x-ui.card>
            <div class="dropdown__empty">{{ __('categories.no_categories') }}</div>
        </x-ui.card>
    @else
        <x-ui.table :headers="[__('categories.columns.name'), __('categories.columns.parent'), __('categories.columns.products'), __('categories.columns.status'), '']">
            @foreach ($categories as $category)
                <tr>
                    <td>
                        <strong>{{ $category->label() }}</strong>
                        <div class="field__hint" dir="ltr">{{ $category->slug }}</div>
                    </td>
                    <td>{{ $category->parent?->label() ?? '—' }}</td>
                    <td>{{ $category->products_count }}</td>
                    <td>
                        <x-ui.badge :variant="$category->is_active ? 'success' : 'neutral'">
                            {{ $category->is_active ? __('categories.status.active') : __('categories.status.inactive') }}
                        </x-ui.badge>
                    </td>
                    <td>
                        <div class="row" style="justify-content: flex-end; gap: 8px;">
                            @can('update', $category)
                                <x-ui.button :href="route('admin.categories.edit', $category)" variant="ghost" class="btn--sm">
                                    <x-ui.icon name="pencil" size="sm" /> {{ __('messages.actions.edit') }}
                                </x-ui.button>
                            @endcan

                            @can('delete', $category)
                                <form
                                    method="POST"
                                    action="{{ route('admin.categories.destroy', $category) }}"
                                    data-confirm
                                    data-confirm-type="danger"
                                    data-confirm-title="{{ __('messages.confirm.delete_title') }}"
                                    data-confirm-text="{{ __('categories.confirm_delete') }}"
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

        <x-ui.pagination :paginator="$categories" />
    @endif
</x-layouts.admin>
