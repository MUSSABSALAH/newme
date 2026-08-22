<x-layouts.admin :title="__('recipes.title')" :heading="__('recipes.title')" :subtitle="__('recipes.subtitle')">
    <x-slot:actions>
        @can('create', \App\Modules\Cms\Models\Recipe::class)
            <x-ui.button :href="route('admin.recipes.create')" variant="primary">
                <x-ui.icon name="plus" size="sm" /> {{ __('recipes.add') }}
            </x-ui.button>
        @endcan
    </x-slot:actions>

    @if ($recipes->isEmpty())
        <x-ui.card>
            <div class="dropdown__empty">{{ __('recipes.no_recipes') }}</div>
        </x-ui.card>
    @else
        <x-ui.table :headers="[__('recipes.columns.recipe'), __('recipes.columns.category'), __('recipes.columns.status'), '']">
            @foreach ($recipes as $recipe)
                <tr>
                    <td><strong>{{ $recipe->label() }}</strong></td>
                    <td>{{ $recipe->translated('category') }}</td>
                    <td>
                        <x-ui.badge :variant="$recipe->is_active ? 'success' : 'neutral'">
                            {{ $recipe->is_active ? __('recipes.status.active') : __('recipes.status.inactive') }}
                        </x-ui.badge>
                    </td>
                    <td>
                        <div class="row" style="justify-content: flex-end; gap: 8px;">
                            @can('update', $recipe)
                                <x-ui.button :href="route('admin.recipes.edit', $recipe)" variant="ghost" class="btn--sm">
                                    <x-ui.icon name="pencil" size="sm" /> {{ __('messages.actions.edit') }}
                                </x-ui.button>
                            @endcan

                            @can('delete', $recipe)
                                <form
                                    method="POST"
                                    action="{{ route('admin.recipes.destroy', $recipe) }}"
                                    data-confirm
                                    data-confirm-type="danger"
                                    data-confirm-title="{{ __('messages.confirm.delete_title') }}"
                                    data-confirm-text="{{ __('recipes.confirm_delete') }}"
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

        <x-ui.pagination :paginator="$recipes" />
    @endif
</x-layouts.admin>
