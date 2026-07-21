<x-layouts.admin :title="__('meals.title')" :heading="__('meals.title')" :subtitle="__('meals.subtitle')">
    <x-slot:actions>
        @can('create', \App\Modules\Plans\Models\Meal::class)
            <x-ui.button :href="route('admin.meals.create')" variant="primary">
                <x-ui.icon name="plus" size="sm" /> {{ __('meals.add') }}
            </x-ui.button>
        @endcan
    </x-slot:actions>

    @if ($meals->isEmpty())
        <x-ui.card>
            <div class="dropdown__empty">{{ __('meals.no_meals') }}</div>
        </x-ui.card>
    @else
        <x-ui.table :headers="[__('meals.columns.meal'), __('meals.columns.type'), __('meals.columns.calories'), __('meals.columns.status'), '']">
            @foreach ($meals as $meal)
                <tr>
                    <td><strong>{{ $meal->label() }}</strong></td>
                    <td>{{ $meal->meal_type->label() }}</td>
                    <td>{{ $meal->calories !== null ? $meal->calories.' '.__('meals.units.kcal') : '—' }}</td>
                    <td>
                        <x-ui.badge :variant="$meal->is_active ? 'success' : 'neutral'">
                            {{ $meal->is_active ? __('meals.status.active') : __('meals.status.inactive') }}
                        </x-ui.badge>
                    </td>
                    <td>
                        <div class="row" style="justify-content: flex-end; gap: 8px;">
                            @can('update', $meal)
                                <x-ui.button :href="route('admin.meals.edit', $meal)" variant="ghost" class="btn--sm">
                                    <x-ui.icon name="pencil" size="sm" /> {{ __('messages.actions.edit') }}
                                </x-ui.button>
                            @endcan

                            @can('delete', $meal)
                                <form
                                    method="POST"
                                    action="{{ route('admin.meals.destroy', $meal) }}"
                                    data-confirm
                                    data-confirm-type="danger"
                                    data-confirm-title="{{ __('messages.confirm.delete_title') }}"
                                    data-confirm-text="{{ __('meals.confirm_delete') }}"
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

        <x-ui.pagination :paginator="$meals" />
    @endif
</x-layouts.admin>
