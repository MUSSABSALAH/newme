<x-layouts.admin :title="__('subscriptions.title')" :heading="__('subscriptions.title')" :subtitle="__('subscriptions.subtitle')">
    <x-ui.card>
        <form method="GET" action="{{ route('admin.subscriptions.index') }}" class="row" style="gap: 12px; align-items: flex-end; flex-wrap: wrap;">
            <x-form.field :label="__('subscriptions.handling.filter')" name="handling" style="margin:0;min-width:220px;">
                <x-form.select name="handling" onchange="this.form.submit()">
                    <option value="">{{ __('subscriptions.handling.all') }}</option>
                    @foreach ($handlingStatuses as $handling)
                        <option value="{{ $handling->value }}" @selected($activeHandling === $handling)>
                            {{ $handling->label() }}
                        </option>
                    @endforeach
                </x-form.select>
            </x-form.field>

            <x-form.field :label="__('subscriptions.filter_status')" name="status" style="margin:0;min-width:220px;">
                <x-form.select name="status" onchange="this.form.submit()">
                    <option value="">{{ __('subscriptions.all_statuses') }}</option>
                    @foreach ($statuses as $status)
                        <option value="{{ $status->value }}" @selected($activeStatus === $status)>
                            {{ $status->label() }}
                        </option>
                    @endforeach
                </x-form.select>
            </x-form.field>

            @if ($pendingCount > 0)
                <p class="text-muted" style="margin: 0 0 10px;">
                    {{ __('subscriptions.handling.pending_hint', ['count' => $pendingCount]) }}
                </p>
            @endif
        </form>
    </x-ui.card>

    @if ($subscriptions->isEmpty())
        <x-ui.card>
            <div class="dropdown__empty">{{ __('subscriptions.no_subscriptions') }}</div>
        </x-ui.card>
    @else
        <x-ui.table :headers="[
            __('subscriptions.fields.reference'),
            __('subscriptions.fields.customer'),
            __('subscriptions.fields.plan'),
            __('subscriptions.fields.duration'),
            __('subscriptions.fields.total'),
            __('subscriptions.fields.status'),
            __('subscriptions.handling.column'),
            __('subscriptions.fields.created_at'),
            '',
        ]">
            @foreach ($subscriptions as $subscription)
                <tr class="{{ $subscription->needsHandling() ? 'row--attention' : '' }}">
                    <td><strong dir="ltr">#{{ $subscription->reference() }}</strong></td>
                    <td>{{ $subscription->user?->name ?? '—' }}</td>
                    <td>{{ $subscription->plan_name }}</td>
                    <td>{{ $subscription->duration_length }} {{ __('plans.units.'.$subscription->duration_unit) }}</td>
                    <td>{{ $subscription->totalDisplay() }} <x-ui.sar /></td>
                    <td>
                        <x-ui.badge :variant="$subscription->status->badge()">{{ $subscription->status->label() }}</x-ui.badge>
                    </td>
                    <td>
                        <x-ui.badge :variant="$subscription->handling_status->badge()">
                            {{ $subscription->handling_status->label() }}
                        </x-ui.badge>
                        @if ($subscription->handler)
                            <span class="text-muted" style="display:block;font-size:0.75rem;margin-top:4px;">
                                {{ $subscription->handler->name }}
                            </span>
                        @endif
                    </td>
                    <td>{{ $subscription->created_at?->translatedFormat('d M Y') }}</td>
                    <td>
                        <div class="row" style="justify-content: flex-end; gap: 8px;">
                            <x-ui.button :href="route('admin.subscriptions.show', $subscription)" variant="ghost" class="btn--sm">
                                {{ __('messages.actions.view') }}
                            </x-ui.button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-ui.table>

        <x-ui.pagination :paginator="$subscriptions" />
    @endif
</x-layouts.admin>
