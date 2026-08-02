<x-layouts.admin :title="__('coupons.edit_title')" :heading="__('coupons.edit_title')" :subtitle="__('coupons.subtitle')">
    @include('admin.coupons._form', [
        'action' => route('admin.coupons.update', $coupon),
        'method' => 'PUT',
        'coupon' => $coupon,
        'types' => $types,
        'scopes' => $scopes,
    ])
</x-layouts.admin>
