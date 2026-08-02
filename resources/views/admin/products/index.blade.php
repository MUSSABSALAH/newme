@php
    use App\Support\Money\Money;
    $catLabel = fn ($c) => ($c->parent ? $c->parent->label().' — ' : '').$c->label();
@endphp

<x-layouts.admin :title="__('products.title')" :heading="__('products.title')" :subtitle="__('products.subtitle')">
    <x-slot:actions>
        @can('create', \App\Modules\Store\Models\Product::class)
            <x-ui.button :href="route('admin.products.create')" variant="primary">
                <x-ui.icon name="plus" size="sm" /> {{ __('products.add') }}
            </x-ui.button>
        @endcan
    </x-slot:actions>

    <x-ui.card>
        <form method="GET" action="{{ route('admin.products.index') }}" class="row" style="gap: 12px; align-items: flex-end;">
            <x-form.field :label="__('products.filter_category')" name="category" style="margin:0;min-width:240px;">
                <x-form.select name="category" :selected="$activeCategory" onchange="this.form.submit()">
                    <option value="">{{ __('products.all_categories') }}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected((string) $activeCategory === (string) $category->id)>
                            {{ $catLabel($category) }}
                        </option>
                    @endforeach
                </x-form.select>
            </x-form.field>
        </form>
    </x-ui.card>

    @if ($products->isEmpty())
        <x-ui.card>
            <div class="dropdown__empty">{{ __('products.no_products') }}</div>
        </x-ui.card>
    @else
        <x-ui.table :headers="[__('products.columns.product'), __('products.columns.category'), __('products.columns.price'), __('products.columns.flag'), __('products.columns.status'), '']">
            @foreach ($products as $product)
                <tr>
                    <td>
                        <div class="row" style="gap: 10px; align-items: center;">
                            @if ($product->imageUrl())
                                <img src="{{ $product->imageUrl() }}" alt="" style="width:44px;height:44px;object-fit:cover;border-radius:8px" onerror="this.remove()">
                            @endif
                            <div>
                                <strong>{{ $product->label() }}</strong>
                                <div class="field__hint" dir="ltr">{{ $product->slug }}</div>
                            </div>
                        </div>
                    </td>
                    <td>{{ $product->category ? $catLabel($product->category) : '—' }}</td>
                    <td>{{ Money::fromMinor($product->price)->format() }} <x-ui.sar /></td>
                    <td>
                        @if ($product->flag)
                            <x-ui.badge variant="info">{{ $product->flag->label() }}</x-ui.badge>
                        @else
                            —
                        @endif
                    </td>
                    <td>
                        <x-ui.badge :variant="$product->is_active ? 'success' : 'neutral'">
                            {{ $product->is_active ? __('products.status.active') : __('products.status.inactive') }}
                        </x-ui.badge>
                    </td>
                    <td>
                        <div class="row" style="justify-content: flex-end; gap: 8px;">
                            @can('update', $product)
                                <x-ui.button :href="route('admin.products.edit', $product)" variant="ghost" class="btn--sm">
                                    <x-ui.icon name="pencil" size="sm" /> {{ __('messages.actions.edit') }}
                                </x-ui.button>
                            @endcan

                            @can('delete', $product)
                                <form
                                    method="POST"
                                    action="{{ route('admin.products.destroy', $product) }}"
                                    data-confirm
                                    data-confirm-type="danger"
                                    data-confirm-title="{{ __('messages.confirm.delete_title') }}"
                                    data-confirm-text="{{ __('products.confirm_delete') }}"
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

        <x-ui.pagination :paginator="$products" />
    @endif
</x-layouts.admin>
