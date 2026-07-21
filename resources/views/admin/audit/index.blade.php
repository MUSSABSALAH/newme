<x-layouts.admin :title="__('audit.title')" :heading="__('audit.title')" :subtitle="__('audit.subtitle')">
    <x-slot:actions>
        <form method="GET" action="{{ route('admin.audit.index') }}" class="row" style="gap: 8px;">
            <x-form.select
                name="action"
                :selected="$selectedAction"
                onchange="this.form.submit()"
                class="select--inline"
                aria-label="{{ __('audit.filter_by_action') }}"
            >
                <option value="">{{ __('audit.all_actions') }}</option>
                @foreach ($actions as $action)
                    <option value="{{ $action->value }}" @selected($selectedAction === $action->value)>
                        {{ $action->label() }}
                    </option>
                @endforeach
            </x-form.select>
        </form>
    </x-slot:actions>

    @if ($logs->isEmpty())
        <x-ui.card>
            <div class="dropdown__empty">{{ __('audit.no_logs') }}</div>
        </x-ui.card>
    @else
        <x-ui.table :headers="[__('audit.fields.time'), __('audit.fields.actor'), __('audit.fields.action'), __('audit.fields.target'), __('audit.fields.request_id')]">
            @foreach ($logs as $log)
                <tr>
                    <td>
                        <span title="{{ $log->created_at?->toDateTimeString() }}">
                            {{ $log->created_at?->diffForHumans() }}
                        </span>
                    </td>
                    <td>
                        @if ($log->actor)
                            <div class="row" style="gap: 10px;">
                                <x-ui.avatar :name="$log->actor->name" :size="28" />
                                <span>{{ $log->actor->name }}</span>
                            </div>
                        @else
                            <span class="text-muted">{{ __('audit.system_actor') }}</span>
                        @endif
                    </td>
                    <td>
                        <x-ui.badge :variant="\App\Support\Ui\AuditActionPresenter::variant($log->action)">
                            {{ $log->actionLabel() }}
                        </x-ui.badge>
                    </td>
                    <td>
                        @if ($log->auditable_type)
                            <span class="text-muted">
                                {{ __('audit.target_line', [
                                    'type' => \App\Support\Ui\AuditActionPresenter::targetLabel($log->auditable_type),
                                    'id' => $log->auditable_id,
                                ]) }}
                            </span>
                        @else
                            <span class="text-muted">—</span>
                        @endif
                    </td>
                    <td dir="ltr" style="text-align: start;">
                        @if ($log->request_id)
                            <code class="audit-request-id">{{ $log->request_id }}</code>
                        @else
                            <span class="text-muted">—</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </x-ui.table>

        <x-ui.pagination :paginator="$logs" />
    @endif
</x-layouts.admin>
