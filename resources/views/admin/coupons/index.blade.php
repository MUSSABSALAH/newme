@php
    use App\Modules\Promotions\Enums\CouponType;
    use App\Support\Time\DisplayTime;

    $window = function ($coupon): string {
        $from = DisplayTime::format($coupon->starts_at, 'Y-m-d H:i');
        $to = DisplayTime::format($coupon->expires_at, 'Y-m-d H:i');

        if ($from === null && $to === null) {
            return __('coupons.window.always');
        }

        return ($from ?? '…').' → '.($to ?? '…');
    };

    $usage = function ($coupon): string {
        return $coupon->max_redemptions === null
            ? $coupon->redemptions_count.' / ∞'
            : $coupon->redemptions_count.' / '.$coupon->max_redemptions;
    };
@endphp

<x-layouts.admin :title="__('coupons.title')" :heading="__('coupons.title')" :subtitle="__('coupons.subtitle')">
    <x-slot:actions>
        @can('create', \App\Modules\Promotions\Models\Coupon::class)
            <x-ui.button :href="route('admin.coupons.create')" variant="primary">
                <x-ui.icon name="plus" size="sm" /> {{ __('coupons.add') }}
            </x-ui.button>
        @endcan
    </x-slot:actions>

    <x-ui.card>
        <form method="GET" action="{{ route('admin.coupons.index') }}" class="row" style="gap: 12px; align-items: flex-end;">
            <x-form.field :label="__('coupons.filter_scope')" name="scope" style="margin:0;min-width:240px;">
                <x-form.select name="scope" onchange="this.form.submit()">
                    <option value="">{{ __('coupons.all_scopes') }}</option>
                    @foreach ($scopes as $scope)
                        <option value="{{ $scope->value }}" @selected($activeScope === $scope)>
                            {{ $scope->label() }}
                        </option>
                    @endforeach
                </x-form.select>
            </x-form.field>
        </form>
    </x-ui.card>

    @if ($coupons->isEmpty())
        <x-ui.card>
            <div class="dropdown__empty">{{ __('coupons.no_coupons') }}</div>
        </x-ui.card>
    @else
        <x-ui.table :headers="[__('coupons.columns.code'), __('coupons.columns.value'), __('coupons.columns.scope'), __('coupons.columns.usage'), __('coupons.columns.window'), __('coupons.columns.status'), '']">
            @foreach ($coupons as $coupon)
                <tr>
                    <td>
                        <strong dir="ltr">{{ $coupon->code }}</strong>
                        <div class="field__hint">{{ $coupon->label() }}</div>
                    </td>
                    <td>
                        {{ $coupon->valueDisplay() }}
                        @if ($coupon->type === CouponType::Fixed)
                            <x-ui.sar />
                        @endif
                    </td>
                    <td>{{ $coupon->scope->label() }}</td>
                    <td dir="ltr">{{ $usage($coupon) }}</td>
                    <td dir="ltr">{{ $window($coupon) }}</td>
                    <td>
                        <x-ui.badge :variant="$coupon->is_active ? 'success' : 'neutral'">
                            {{ $coupon->is_active ? __('coupons.status.active') : __('coupons.status.inactive') }}
                        </x-ui.badge>
                    </td>
                    <td>
                        <div class="row" style="justify-content: flex-end; gap: 8px;">
                            @can('update', $coupon)
                                <x-ui.button :href="route('admin.coupons.edit', $coupon)" variant="ghost" class="btn--sm">
                                    <x-ui.icon name="pencil" size="sm" /> {{ __('messages.actions.edit') }}
                                </x-ui.button>
                            @endcan

                            @can('delete', $coupon)
                                <form
                                    method="POST"
                                    action="{{ route('admin.coupons.destroy', $coupon) }}"
                                    data-confirm
                                    data-confirm-type="danger"
                                    data-confirm-title="{{ __('messages.confirm.delete_title') }}"
                                    data-confirm-text="{{ __('coupons.confirm_delete') }}"
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

        <x-ui.pagination :paginator="$coupons" />
    @endif
</x-layouts.admin>
