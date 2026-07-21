<x-layouts.admin :title="__('plans.title')" :heading="__('plans.title')" :subtitle="__('plans.subtitle')">
    <x-slot:actions>
        @can('create', \App\Modules\Plans\Models\Plan::class)
            <x-ui.button :href="route('admin.plans.create')" variant="primary">
                <x-ui.icon name="plus" size="sm" /> {{ __('plans.add') }}
            </x-ui.button>
        @endcan
    </x-slot:actions>

    @if ($plans->isEmpty())
        <x-ui.card>
            <div class="dropdown__empty">{{ __('plans.no_plans') }}</div>
        </x-ui.card>
    @else
        <x-ui.table :headers="[__('plans.columns.plan'), __('plans.columns.goal'), __('plans.columns.status'), __('plans.columns.version'), '']">
            @foreach ($plans as $plan)
                @php $published = $plan->publishedVersion(); @endphp
                <tr>
                    <td><strong>{{ $plan->label() }}</strong></td>
                    <td>{{ $plan->goal->label() }}</td>
                    <td>
                        <x-ui.badge :variant="$plan->is_active ? 'success' : 'neutral'">
                            {{ $plan->is_active ? __('plans.status.active') : __('plans.status.inactive') }}
                        </x-ui.badge>
                    </td>
                    <td>
                        @if ($published)
                            <span class="text-muted">{{ __('plans.versions.label', ['number' => $published->version_number]) }}</span>
                        @else
                            <span class="text-muted">—</span>
                        @endif
                    </td>
                    <td>
                        <div class="row" style="justify-content: flex-end; gap: 8px;">
                            @can('view', $plan)
                                <x-ui.button :href="route('admin.plans.show', $plan)" variant="ghost" class="btn--sm">
                                    <x-ui.icon name="eye" size="sm" /> {{ __('plans.details') }}
                                </x-ui.button>
                            @endcan

                            @can('update', $plan)
                                <x-ui.button :href="route('admin.plans.edit', $plan)" variant="ghost" class="btn--sm">
                                    <x-ui.icon name="pencil" size="sm" /> {{ __('messages.actions.edit') }}
                                </x-ui.button>
                            @endcan

                            @can('delete', $plan)
                                <form
                                    method="POST"
                                    action="{{ route('admin.plans.destroy', $plan) }}"
                                    data-confirm
                                    data-confirm-type="danger"
                                    data-confirm-title="{{ __('messages.confirm.delete_title') }}"
                                    data-confirm-text="{{ __('plans.confirm_delete') }}"
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

        <x-ui.pagination :paginator="$plans" />
    @endif
</x-layouts.admin>
