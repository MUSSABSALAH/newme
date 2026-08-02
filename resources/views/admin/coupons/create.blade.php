<x-layouts.admin :title="__('coupons.create_title')" :heading="__('coupons.create_title')" :subtitle="__('coupons.subtitle')">
    @include('admin.coupons._form', [
        'action' => route('admin.coupons.store'),
        'method' => 'POST',
        'coupon' => null,
        'types' => $types,
        'scopes' => $scopes,
    ])
</x-layouts.admin>
