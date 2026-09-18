<x-layouts.admin :title="__('customers.title')" :heading="__('customers.title')" :subtitle="__('customers.subtitle')">
    @if ($customers->isEmpty())
        <x-ui.card>
            <div class="dropdown__empty">{{ __('customers.no_customers') }}</div>
        </x-ui.card>
    @else
        @can('deleteAnyCustomer', \App\Models\User::class)
            <form
                id="customer-bulk-form"
                method="POST"
                action="{{ route('admin.customers.bulk-destroy') }}"
                data-confirm
                data-confirm-type="danger"
                data-confirm-title="{{ __('customers.confirm.delete_title') }}"
                data-confirm-text="{{ __('customers.bulk.confirm_delete') }}"
                data-confirm-button="{{ __('customers.confirm.delete_confirm') }}"
                data-confirm-cancel="{{ __('messages.confirm.cancel') }}"
            >
                @csrf
                <div class="bulk-bar">
                    <span class="bulk-bar__meta">
                        <span data-customer-bulk-count>0</span>
                        {{ __('customers.bulk.selected') }}
                    </span>
                    <x-ui.button type="submit" variant="danger" class="btn--sm" data-customer-bulk-submit disabled>
                        <x-ui.icon name="trash-2" size="sm" /> {{ __('customers.bulk.delete') }}
                    </x-ui.button>
                </div>
            </form>
        @endcan

        <div class="table-wrap">
            <table class="table">
                <thead>
                    <tr>
                        @can('deleteAnyCustomer', \App\Models\User::class)
                            <th class="table-check-col">
                                <label class="table-check">
                                    <input type="checkbox" data-customer-bulk-all aria-label="{{ __('customers.bulk.select_all') }}">
                                </label>
                            </th>
                        @endcan
                        <th>{{ __('customers.fields.name') }}</th>
                        <th>{{ __('customers.fields.email') }}</th>
                        <th>{{ __('customers.fields.phone') }}</th>
                        <th>{{ __('customers.fields.orders') }}</th>
                        <th>{{ __('customers.fields.subscriptions') }}</th>
                        <th>{{ __('customers.fields.joined') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            @can('delete', $customer)
                                <td class="table-check-col">
                                    <label class="table-check">
                                        <input
                                            form="customer-bulk-form"
                                            type="checkbox"
                                            name="ids[]"
                                            value="{{ $customer->id }}"
                                            data-customer-bulk-item
                                            aria-label="{{ $customer->name }}"
                                        >
                                    </label>
                                </td>
                            @elsecan('deleteAnyCustomer', \App\Models\User::class)
                                <td class="table-check-col"></td>
                            @endcan
                            <td>
                                <div class="row" style="gap: 10px;">
                                    <x-ui.avatar :name="$customer->name" :size="32" />
                                    <strong>{{ $customer->name }}</strong>
                                </div>
                            </td>
                            <td dir="ltr" style="text-align: start;">{{ $customer->email }}</td>
                            <td dir="ltr" style="text-align: start;">{{ $customer->phone ?? '—' }}</td>
                            <td>{{ $customer->orders_count }}</td>
                            <td>{{ $customer->subscriptions_count }}</td>
                            <td>{{ $customer->created_at?->translatedFormat('d M Y') }}</td>
                            <td>
                                <div class="row" style="justify-content: flex-end; gap: 8px;">
                                    <x-ui.button :href="route('admin.customers.show', $customer)" variant="ghost" class="btn--sm">
                                        <x-ui.icon name="eye" size="sm" /> {{ __('messages.actions.view') }}
                                    </x-ui.button>
                                    @can('delete', $customer)
                                        <form
                                            method="POST"
                                            action="{{ route('admin.customers.destroy', $customer) }}"
                                            data-confirm
                                            data-confirm-type="danger"
                                            data-confirm-title="{{ __('customers.confirm.delete_title') }}"
                                            data-confirm-text="{{ __('customers.confirm.delete_text') }}"
                                            data-confirm-button="{{ __('customers.confirm.delete_confirm') }}"
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
                </tbody>
            </table>
        </div>

        <x-ui.pagination :paginator="$customers" />
    @endif

    <script>
    (function () {
        var form = document.getElementById('customer-bulk-form');
        if (!form) return;

        var all = document.querySelector('[data-customer-bulk-all]');
        var boxes = document.querySelectorAll('[data-customer-bulk-item]');
        var count = form.querySelector('[data-customer-bulk-count]');
        var submit = form.querySelector('[data-customer-bulk-submit]');

        function sync() {
            var n = 0;
            boxes.forEach(function (box) { if (box.checked) n++; });
            if (count) count.textContent = String(n);
            if (submit) submit.disabled = n === 0;
            if (all) {
                all.checked = n > 0 && n === boxes.length;
                all.indeterminate = n > 0 && n < boxes.length;
            }
        }

        if (all) {
            all.addEventListener('change', function () {
                boxes.forEach(function (box) { box.checked = all.checked; });
                sync();
            });
        }

        boxes.forEach(function (box) { box.addEventListener('change', sync); });
        form.addEventListener('submit', function (event) {
            if ([].filter.call(boxes, function (box) { return box.checked; }).length === 0) {
                event.preventDefault();
            }
        });
        sync();
    })();
    </script>
</x-layouts.admin>
