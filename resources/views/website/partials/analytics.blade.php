@php
    use App\Modules\Analytics\Support\EcommerceDataLayer;
@endphp
{{-- The one bridge to the GTM dataLayer. Pages describe what happened; nothing
     here talks to Google directly, and a blocked container only means the
     pushes pile up unread. --}}
<script>
(function (w) {
  var sent = {};
  w.dataLayer = w.dataLayer || [];

  function first(key) {
    if (!key) return true;
    if (sent[key]) return false;
    sent[key] = true;

    try {
      var stamp = 'nm_ec_' + key;
      if (w.sessionStorage.getItem(stamp)) return false;
      w.sessionStorage.setItem(stamp, '1');
    } catch (e) {}

    return true;
  }

  w.nmEcommerce = {
    currency: @js(EcommerceDataLayer::CURRENCY),
    productCategory: @js(EcommerceDataLayer::PRODUCT_CATEGORY),
    subscriptionCategory: @js(EcommerceDataLayer::SUBSCRIPTION_CATEGORY),

    planItemId: function (publicId) {
      return @js(EcommerceDataLayer::PLAN_ID_PREFIX) + publicId;
    },

    money: function (value) {
      value = Number(value);

      return isFinite(value) ? Math.round(value * 100) / 100 : 0;
    },

    // ecommerce is cleared first so items from an earlier event cannot leak
    // into this one. onceKey, when given, holds for the whole browser session.
    push: function (event, payload, onceKey) {
      try {
        if (!event || !payload || !first(onceKey)) return;

        w.dataLayer.push({ ecommerce: null });
        w.dataLayer.push({ event: event, ecommerce: payload });
      } catch (e) {}
    }
  };
})(window);
</script>
