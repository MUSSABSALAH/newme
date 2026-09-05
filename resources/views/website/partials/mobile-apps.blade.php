@php
  $deliveryApps = $deliveryApps ?? [
    ['key' => 'jahez', 'url' => 'https://jahez.go.link/aRQ2e', 'logo' => 'assets/images/apps/jahez.svg'],
    ['key' => 'hungerstation', 'url' => 'https://hungerstation.go.link/?c=SA&s=c&v=95478&so=mls&adj_t=1sdhhuza_1spi9ypp', 'logo' => 'assets/images/apps/hungerstation.png'],
    ['key' => 'chefz', 'url' => 'https://thechefzco.app.link/r2NV4MwR45b', 'logo' => 'assets/images/apps/chefz.svg'],
    ['key' => 'keeta', 'url' => 'https://url.mykeeta.com/qRgdI46z', 'logo' => 'assets/images/apps/keeta.png'],
    ['key' => 'ninja', 'url' => 'https://ninja.go.link/restaurants?branchId=49004', 'logo' => 'assets/images/apps/ninja.png'],
  ];
@endphp
<div class="ip-apps" id="nmApps">
  <div class="t">
    <b>{{ app()->getLocale() === 'ar' ? 'اطلب من تطبيقك المفضل' : 'Order from your favorite app' }}</b>
  </div>
  <div class="rail">
    @foreach ($deliveryApps as $app)
      @php $copy = __('website.main.apps.items.'.$app['key']); @endphp
      <a class="app" href="{{ $app['url'] }}" target="_blank" rel="noopener noreferrer">
        <u><img src="{{ asset($app['logo']) }}" alt="{{ $copy['name_en'] }}"></u>
        {{ app()->getLocale() === 'ar' ? $copy['name_ar'] : $copy['name_en'] }}
      </a>
    @endforeach
  </div>
</div>
