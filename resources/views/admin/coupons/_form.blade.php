@php
    use App\Modules\Promotions\Enums\CouponType;
    use App\Support\Money\Money;
    use App\Support\Time\DisplayTime;

    $couponName = fn (string $locale) => old("name.$locale", $coupon?->getTranslation('name', $locale, false) ?: '');
    $major = fn (?int $minor) => $minor === null ? '' : Money::fromMinor($minor)->format();
    $datetime = fn (?\Illuminate\Support\Carbon $at) => DisplayTime::forInput($at);
    $selectedType = old('type', $coupon?->type?->value ?? CouponType::Percentage->value);
@endphp

<form action="{{ $action }}" method="POST" data-validate novalidate class="stack">
    @csrf
    @if (($method ?? 'POST') === 'PUT')
        @method('PUT')
    @endif

    <x-ui.card :title="__('coupons.sections.basics')">
        <div class="form-grid-2">
            <x-form.field :label="__('coupons.fields.code')" name="code" :hint="__('coupons.fields.code_hint')">
                <x-form.input name="code" :value="old('code', $coupon?->code)" required dir="ltr" placeholder="WELCOME10" />
            </x-form.field>

            <x-form.field :label="__('coupons.fields.scope')" name="scope">
                <x-form.select name="scope" :selected="old('scope', $coupon?->scope?->value)">
                    @foreach ($scopes as $scope)
                        <option value="{{ $scope->value }}" @selected(old('scope', $coupon?->scope?->value ?? 'all') === $scope->value)>
                            {{ $scope->label() }}
                        </option>
                    @endforeach
                </x-form.select>
            </x-form.field>

            <x-form.field :label="__('coupons.fields.name_ar')" name="name.ar">
                <x-form.input name="name[ar]" :value="$couponName('ar')" />
            </x-form.field>

            <x-form.field :label="__('coupons.fields.name_en')" name="name.en">
                <x-form.input name="name[en]" :value="$couponName('en')" dir="ltr" />
            </x-form.field>
        </div>
    </x-ui.card>

    <x-ui.card :title="__('coupons.sections.discount')">
        <div class="form-grid-2">
            <x-form.field :label="__('coupons.fields.type')" name="type">
                <x-form.select name="type" :selected="$selectedType" data-coupon-type>
                    @foreach ($types as $type)
                        <option value="{{ $type->value }}" @selected($selectedType === $type->value)>
                            {{ $type->label() }}
                        </option>
                    @endforeach
                </x-form.select>
            </x-form.field>

            <div data-coupon-percentage>
                <x-form.field :label="__('coupons.fields.percent_off')" name="percent_off">
                    <x-form.input name="percent_off" type="number" step="0.01" min="0" max="100" :value="old('percent_off', $coupon?->percent_off)" />
                </x-form.field>
            </div>

            <div data-coupon-fixed>
                <x-form.field :label="__('coupons.fields.amount_off')" name="amount_off" :hint="__('coupons.fields.amount_off_hint')">
                    <x-form.input name="amount_off" type="number" step="0.01" min="0" :value="old('amount_off', $major($coupon?->amount_off_minor))" />
                </x-form.field>
            </div>

            <div data-coupon-percentage>
                <x-form.field :label="__('coupons.fields.max_discount')" name="max_discount" :hint="__('coupons.fields.max_discount_hint')">
                    <x-form.input name="max_discount" type="number" step="0.01" min="0" :value="old('max_discount', $major($coupon?->max_discount_minor))" />
                </x-form.field>
            </div>

            <x-form.field :label="__('coupons.fields.min_subtotal')" name="min_subtotal" :hint="__('coupons.fields.min_subtotal_hint')">
                <x-form.input name="min_subtotal" type="number" step="0.01" min="0" :value="old('min_subtotal', $major($coupon?->min_subtotal_minor ?? 0))" />
            </x-form.field>
        </div>
    </x-ui.card>

    <x-ui.card :title="__('coupons.sections.limits')">
        <div class="form-grid-2">
            <x-form.field :label="__('coupons.fields.max_redemptions')" name="max_redemptions" :hint="__('coupons.fields.max_redemptions_hint')">
                <x-form.input name="max_redemptions" type="number" min="1" :value="old('max_redemptions', $coupon?->max_redemptions)" />
            </x-form.field>

            <x-form.field :label="__('coupons.fields.max_redemptions_per_user')" name="max_redemptions_per_user" :hint="__('coupons.fields.max_redemptions_per_user_hint')">
                <x-form.input name="max_redemptions_per_user" type="number" min="1" :value="old('max_redemptions_per_user', $coupon?->max_redemptions_per_user)" />
            </x-form.field>

            <x-form.field :label="__('coupons.fields.starts_at')" name="starts_at" :hint="__('coupons.fields.timezone_hint', ['timezone' => DisplayTime::timezone()])">
                <x-form.input name="starts_at" type="datetime-local" :value="old('starts_at', $datetime($coupon?->starts_at))" dir="ltr" />
            </x-form.field>

            <x-form.field :label="__('coupons.fields.expires_at')" name="expires_at" :hint="__('coupons.fields.timezone_hint', ['timezone' => DisplayTime::timezone()])">
                <x-form.input name="expires_at" type="datetime-local" :value="old('expires_at', $datetime($coupon?->expires_at))" dir="ltr" />
            </x-form.field>

            <x-form.field :label="__('coupons.fields.is_active')" name="is_active">
                <label class="switch-row">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $coupon?->is_active ?? true))>
                    <span class="switch-row__title">{{ __('coupons.status.active') }}</span>
                </label>
            </x-form.field>

            @if ($coupon !== null)
                <x-form.field :label="__('coupons.fields.redemptions_count')" name="redemptions_count">
                    <x-form.input name="redemptions_count_display" :value="$coupon->redemptions_count" disabled dir="ltr" />
                </x-form.field>
            @endif
        </div>
    </x-ui.card>

    <div class="row" style="gap: 12px;">
        <x-ui.button type="submit" variant="primary">{{ __('messages.actions.save') }}</x-ui.button>
        <x-ui.button :href="route('admin.coupons.index')" variant="ghost">{{ __('messages.actions.cancel') }}</x-ui.button>
    </div>
</form>

@push('scripts')
<script>
@verbatim
(function () {
    var select = document.querySelector('[data-coupon-type]');
    if (!select) { return; }

    function sync() {
        var percentage = select.value === 'percentage';
        document.querySelectorAll('[data-coupon-percentage]').forEach(function (el) {
            el.hidden = !percentage;
        });
        document.querySelectorAll('[data-coupon-fixed]').forEach(function (el) {
            el.hidden = percentage;
        });
    }

    select.addEventListener('change', sync);
    sync();
})();
@endverbatim
</script>
@endpush
