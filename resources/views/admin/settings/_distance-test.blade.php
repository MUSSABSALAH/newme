<div class="stack" style="margin-top: 16px;" data-distance-test data-url="{{ route('admin.settings.distance-test') }}">
    <p class="field__hint">{{ __('settings.distance_test.intro') }}</p>
    <div class="form-grid-2">
        <div class="field">
            <label class="field__label" for="distance-test-lat">{{ __('settings.distance_test.lat') }}</label>
            <input type="text" id="distance-test-lat" class="input" dir="ltr" inputmode="decimal" value="24.7743" data-distance-lat>
        </div>
        <div class="field">
            <label class="field__label" for="distance-test-lng">{{ __('settings.distance_test.lng') }}</label>
            <input type="text" id="distance-test-lng" class="input" dir="ltr" inputmode="decimal" value="46.7386" data-distance-lng>
        </div>
    </div>
    <div class="row" style="gap: 12px; align-items: center;">
        <x-ui.button type="button" variant="ghost" data-distance-run>{{ __('settings.distance_test.run') }}</x-ui.button>
        <span class="field__hint" data-distance-result aria-live="polite"></span>
    </div>
</div>

@push('scripts')
<script>
(function () {
    var root = document.querySelector('[data-distance-test]');
    if (!root) { return; }

    var labels = @js([
        'running' => __('settings.distance_test.running'),
        'haversine' => __('settings.distance_test.haversine'),
        'google' => __('settings.distance_test.google'),
        'google_failed' => __('settings.distance_test.google_failed'),
        'failed' => __('settings.distance_test.failed'),
        'km' => __('settings.distance_test.km'),
        'minutes' => __('settings.distance_test.minutes'),
        'routes' => __('settings.distance_test.routes'),
    ]);
    var button = root.querySelector('[data-distance-run]');
    var output = root.querySelector('[data-distance-result]');
    var token = document.querySelector('meta[name="csrf-token"]');
    var form = root.closest('form');

    function typed(field) {
        var input = form ? form.querySelector('[name="settings[' + field + ']"]') : null;
        return input ? input.value.trim() : '';
    }

    function ticked(field) {
        var box = form ? form.querySelector('input[type="checkbox"][name="settings[' + field + ']"]') : null;
        return box ? box.checked : false;
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
                lat: root.querySelector('[data-distance-lat]').value,
                lng: root.querySelector('[data-distance-lng]').value,
                origin_lat: typed('shipping__origin_lat'),
                origin_lng: typed('shipping__origin_lng'),
                road_factor: typed('shipping__road_factor'),
                api_key: typed('shipping__google_maps_key'),
                route_preference: typed('shipping__google_route_preference') || null,
                traffic: typed('shipping__google_traffic') || null,
                avoid_highways: ticked('shipping__google_avoid_highways'),
                avoid_tolls: ticked('shipping__google_avoid_tolls')
            })
        })
            .then(function (res) {
                return res.json().then(function (data) { return { ok: res.ok, data: data }; });
            })
            .then(function (result) {
                var data = result.data || {};
                if (!result.ok) {
                    output.textContent = data.message || labels.failed;
                    return;
                }
                var parts = [
                    labels.haversine + ': ' + data.haversine_km + ' ' + labels.km + ' (' + data.straight_km + ' × ' + data.road_factor + ')'
                ];
                var routes = (data.google_routes || []).map(function (r) {
                    return r.km + ' ' + labels.km + ' / ' + r.minutes + ' ' + labels.minutes;
                });
                parts.push(data.google_km === null
                    ? labels.google_failed + ': ' + (data.google_error || '')
                    : labels.google + ': ' + data.google_km + ' ' + labels.km + ' (' + data.google_minutes + ' ' + labels.minutes + ')'
                        + (routes.length > 1 ? ' — ' + labels.routes + ': ' + routes.join(' | ') : ''));
                output.textContent = parts.join(' — ');
            })
            .catch(function () { output.textContent = labels.failed; })
            .then(function () { button.disabled = false; });
    });
})();
</script>
@endpush
