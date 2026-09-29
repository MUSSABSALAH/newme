<div class="stack" style="margin-top: 16px;" data-walim-secret data-url="{{ route('admin.settings.walim-secret') }}">
    <div class="field">
        <label class="field__label" for="walim-webhook-url">{{ __('settings.walim_secret.webhook_url') }}</label>
        <input type="text" id="walim-webhook-url" class="input" dir="ltr" readonly value="{{ route('website.webhooks.walim') }}" onclick="this.select()">
        <span class="field__hint">{{ __('settings.walim_secret.intro') }}</span>
    </div>
    <div class="row" style="gap: 12px; align-items: center;">
        <x-ui.button type="button" variant="ghost" data-walim-secret-run>{{ __('settings.walim_secret.run') }}</x-ui.button>
        <span class="field__hint" data-walim-secret-result aria-live="polite"></span>
    </div>
</div>

@push('scripts')
<script>
(function () {
    var root = document.querySelector('[data-walim-secret]');
    if (!root) { return; }

    var labels = @js([
        'running' => __('settings.walim_secret.running'),
        'failed' => __('settings.walim_secret.failed'),
    ]);
    var button = root.querySelector('[data-walim-secret-run]');
    var output = root.querySelector('[data-walim-secret-result]');
    var token = document.querySelector('meta[name="csrf-token"]');
    var form = root.closest('form');

    function typed(field) {
        var input = form ? form.querySelector('[name="settings[' + field + ']"]') : null;
        return input ? input.value.trim() : '';
    }

    button.addEventListener('click', function () {
        output.textContent = labels.running;
        button.disabled = true;

        fetch(root.getAttribute('data-url'), {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': token ? token.getAttribute('content') : ''
            },
            body: JSON.stringify({
                api_key: typed('walim__api_key'),
                shared_secret: typed('walim__shared_secret')
            })
        })
            .then(function (res) { return res.json(); })
            .then(function (data) { output.textContent = (data && data.message) || labels.failed; })
            .catch(function () { output.textContent = labels.failed; })
            .then(function () { button.disabled = false; });
    });
})();
</script>
@endpush
