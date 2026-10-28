<x-layouts.admin :title="$customer->name" :heading="$customer->name" :subtitle="__('customers.show.subtitle')">
    <x-slot:actions>
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
                <x-ui.button type="submit" variant="danger">
                    <x-ui.icon name="trash-2" size="sm" /> {{ __('messages.actions.delete') }}
                </x-ui.button>
            </form>
        @endcan
        <x-ui.button :href="route('admin.customers.index')" variant="ghost">
            <x-ui.icon name="arrow-left" size="sm" /> {{ __('messages.actions.back') }}
        </x-ui.button>
    </x-slot:actions>

    <x-ui.card :title="__('customers.show.contact')">
        <div class="stack" style="gap: 10px;">
            <div class="row" style="justify-content: space-between;">
                <span class="text-muted">{{ __('customers.fields.email') }}</span>
                <strong dir="ltr">{{ $customer->email }}</strong>
            </div>
            <div class="row" style="justify-content: space-between;">
                <span class="text-muted">{{ __('customers.fields.phone') }}</span>
                <strong dir="ltr">{{ $customer->phone ?? '—' }}</strong>
            </div>
            <div class="row" style="justify-content: space-between;">
                <span class="text-muted">{{ __('customers.fields.joined') }}</span>
                <strong>{{ $customer->created_at?->translatedFormat('d M Y') }}</strong>
            </div>
        </div>
    </x-ui.card>

    <x-ui.card :title="__('customers.show.health')">
        @if ($customer->birth_date === null && $customer->allergies === null && $customer->medications === null)
            <div class="dropdown__empty">{{ __('customers.show.no_health') }}</div>
        @else
            <div class="stack" style="gap: 10px;">
                <div class="row" style="justify-content: space-between;">
                    <span class="text-muted">{{ __('customers.fields.birth_date') }}</span>
                    <strong>
                        @if ($customer->birth_date)
                            {{ $customer->birth_date->translatedFormat('d M Y') }}
                            <span class="text-muted">({{ __('customers.show.age_years', ['n' => $customer->birth_date->age]) }})</span>
                        @else
                            {{ __('customers.show.none_reported') }}
                        @endif
                    </strong>
                </div>
                <div class="row" style="justify-content: space-between;">
                    <span class="text-muted">{{ __('customers.fields.allergies') }}</span>
                    <strong>{{ $customer->allergies ?? __('customers.show.none_reported') }}</strong>
                </div>
                <div class="row" style="justify-content: space-between;">
                    <span class="text-muted">{{ __('customers.fields.medications') }}</span>
                    <strong>{{ $customer->medications ?? __('customers.show.none_reported') }}</strong>
                </div>
            </div>
        @endif
    </x-ui.card>

    @if ($canEdit)
        <x-ui.card :title="__('customers.edit.title')">
            <form method="POST" action="{{ route('admin.customers.update', $customer) }}" class="stack" style="gap: 14px;">
                @csrf
                @method('PUT')

                <p class="field__hint" style="margin: 0;">
                    <x-ui.icon name="lock" size="sm" /> {{ __('customers.edit.locked_hint') }}
                </p>

                <div class="form-grid-2">
                    <x-form.field :label="__('customers.fields.name')" name="name">
                        <x-form.input name="name" :value="$customer->name" required maxlength="255" />
                    </x-form.field>

                    <x-form.field :label="__('customers.fields.birth_date')" name="birth_date">
                        <x-form.input type="date" name="birth_date" :value="$customer->birth_date?->toDateString()" />
                    </x-form.field>

                    <x-form.field :label="__('customers.fields.email')">
                        <input type="text" class="input" value="{{ $customer->email ?? '—' }}" dir="ltr" disabled>
                    </x-form.field>

                    <x-form.field :label="__('customers.fields.phone')">
                        <input type="text" class="input" value="{{ $customer->phone ?? '—' }}" dir="ltr" disabled>
                    </x-form.field>

                    <x-form.field :label="__('customers.fields.allergies')" name="allergies">
                        <x-form.textarea name="allergies" :value="$customer->allergies" rows="2" />
                    </x-form.field>

                    <x-form.field :label="__('customers.fields.medications')" name="medications">
                        <x-form.textarea name="medications" :value="$customer->medications" rows="2" />
                    </x-form.field>
                </div>

                <div>
                    <x-ui.button type="submit" variant="primary">
                        <x-ui.icon name="save" size="sm" /> {{ __('customers.edit.save') }}
                    </x-ui.button>
                </div>
            </form>
        </x-ui.card>
    @endif

    <x-ui.card :title="__('customers.addresses.title')">
        @if ($customer->addresses->isEmpty())
            <div class="dropdown__empty">{{ __('customers.addresses.empty') }}</div>
        @else
            <div class="stack" style="gap: 14px;">
                @foreach ($customer->addresses as $address)
                    <div class="address-row">
                        <div class="row" style="justify-content: space-between; align-items: flex-start; gap: 12px;">
                            <div class="stack" style="gap: 4px;">
                                <strong>
                                    {{ $address->label }}
                                    @if ($address->is_default)
                                        <x-ui.badge variant="success">{{ __('customers.addresses.default') }}</x-ui.badge>
                                    @endif
                                    @if ($address->needsBackupPhone())
                                        <x-ui.badge variant="warning">{{ __('customers.addresses.missing_backup') }}</x-ui.badge>
                                    @endif
                                </strong>
                                <span>{{ $address->recipient_name }} — {{ $address->summary() }}</span>
                                @if ($address->national_address)
                                    <span class="text-muted">{{ __('addresses.fields.national_address') }}: <span dir="ltr">{{ $address->national_address }}</span></span>
                                @endif
                                @if ($address->details)
                                    <span class="text-muted">{{ $address->details }}</span>
                                @endif
                                <span class="text-muted">
                                    {{ __('addresses.fields.phone') }}: <span dir="ltr">{{ $address->phone }}</span>
                                    @unless ($address->needsBackupPhone())
                                        · {{ __('addresses.fields.backup_phone') }}: <span dir="ltr">{{ $address->backup_phone }}</span>
                                    @endunless
                                </span>
                            </div>
                        </div>

                        @if ($canEdit)
                            @include('admin.customers._address-form', ['customer' => $customer, 'address' => $address])
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </x-ui.card>

    @include('admin.customers._measurements')

    <x-ui.card :title="__('customers.show.orders')">
        @if ($customer->orders->isEmpty())
            <div class="dropdown__empty">{{ __('customers.show.no_orders') }}</div>
        @else
            <x-ui.table :headers="[
                __('orders.fields.reference'),
                __('orders.fields.items'),
                __('orders.fields.total'),
                __('orders.fields.status'),
                __('orders.fields.placed_at'),
            ]">
                @foreach ($customer->orders as $order)
                    <tr>
                        <td><strong dir="ltr">#{{ $order->reference() }}</strong></td>
                        <td>{{ $order->items_count }}</td>
                        <td>{{ $order->totalDisplay() }}</td>
                        <td><x-ui.badge variant="neutral">{{ $order->status->label() }}</x-ui.badge></td>
                        <td>{{ $order->placed_at?->translatedFormat('d M Y') }}</td>
                    </tr>
                @endforeach
            </x-ui.table>
        @endif
    </x-ui.card>

    <x-ui.card :title="__('customers.show.subscriptions')">
        @if ($customer->subscriptions->isEmpty())
            <div class="dropdown__empty">{{ __('customers.show.no_subscriptions') }}</div>
        @else
            <x-ui.table :headers="[
                __('subscriptions.fields.plan'),
                __('subscriptions.fields.duration'),
                __('subscriptions.fields.total'),
                __('subscriptions.fields.status'),
                __('subscriptions.fields.created_at'),
            ]">
                @foreach ($customer->subscriptions as $subscription)
                    <tr>
                        <td><strong>{{ $subscription->planLabel() }}</strong></td>
                        <td>{{ $subscription->duration_length }} {{ __('plans.units.' . $subscription->duration_unit) }}</td>
                        <td>{{ $subscription->totalDisplay() }}</td>
                        <td><x-ui.badge variant="neutral">{{ $subscription->status->label() }}</x-ui.badge></td>
                        <td>{{ $subscription->created_at?->translatedFormat('d M Y') }}</td>
                    </tr>
                @endforeach
            </x-ui.table>
        @endif
    </x-ui.card>
</x-layouts.admin>
