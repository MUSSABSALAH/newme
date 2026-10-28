@php($customerEmail = $subscription->user?->email)

<div class="edit-panel__notify">
    @if (is_string($customerEmail) && trim($customerEmail) !== '')
        <label class="switch-row">
            <input type="hidden" name="notify_customer" value="0">
            <input type="checkbox" name="notify_customer" value="1" checked>
            <span>
                <span class="switch-row__title">{{ __('subscriptions.manage.notify') }}</span>
                <span class="field__hint" style="display:block" dir="ltr">{{ $customerEmail }}</span>
            </span>
        </label>
    @else
        <p class="field__hint" style="margin: 0;">
            <x-ui.icon name="mail-x" size="sm" /> {{ __('subscriptions.manage.no_email') }}
        </p>
    @endif
</div>
