(function () {
  'use strict';

  var maps = [];

  function ready(fn) {
    if (window.L) {
      fn();
      return;
    }
    var tries = 0;
    var timer = setInterval(function () {
      tries += 1;
      if (window.L) {
        clearInterval(timer);
        fn();
      } else if (tries > 80) {
        clearInterval(timer);
      }
    }, 50);
  }

  function field(root, name) {
    var sel = root.getAttribute('data-' + name);
    return sel ? document.querySelector(sel) : null;
  }

  function formOf(root) {
    return root.closest('form');
  }

  function setBlocked(root, blocked) {
    var form = formOf(root);
    if (form) {
      form.setAttribute('data-addr-blocked', blocked ? '1' : '0');
    }
  }

  function showMsg(root, text, kind) {
    var box = root.querySelector('[data-addr-msg]');
    if (!box) return;
    if (!text) {
      box.hidden = true;
      box.textContent = '';
      return;
    }
    box.hidden = false;
    box.textContent = text;
    box.classList.toggle('is-bad', kind === 'bad');
    box.classList.toggle('is-ok', kind === 'ok');
  }

  function fill(root, payload) {
    var city = field(root, 'city');
    var district = field(root, 'district');
    var street = field(root, 'street');
    var national = field(root, 'national');
    if (city) city.value = payload.city || '';
    if (district) district.value = payload.district || '';
    if (street) street.value = payload.street || '';
    if (national && (payload.national_address || payload.city === '')) {
      national.value = payload.national_address || '';
    }
  }

  function lookup(root, lat, lng) {
    var url = root.getAttribute('data-lookup');
    if (!url) return;
    showMsg(root, root.getAttribute('data-msg-locating') || '', 'ok');
    var query = url + (url.indexOf('?') === -1 ? '?' : '&') + 'lat=' + encodeURIComponent(lat) + '&lng=' + encodeURIComponent(lng);

    fetch(query, {
      headers: { Accept: 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
      credentials: 'same-origin',
    })
      .then(function (res) {
        return res.json().then(function (data) {
          return { ok: res.ok, data: data };
        }).catch(function () {
          return { ok: false, data: {} };
        });
      })
      .then(function (result) {
        var data = result.data || {};
        if (!result.ok || !data.allowed) {
          setBlocked(root, true);
          fill(root, { city: '', district: '', street: '', national_address: '' });
          showMsg(root, data.message || root.getAttribute('data-msg-outside') || '', 'bad');
          return;
        }
        setBlocked(root, false);
        fill(root, data);
        showMsg(root, '', '');
      })
      .catch(function () {
        setBlocked(root, true);
        showMsg(root, root.getAttribute('data-msg-outside') || '', 'bad');
      });
  }

  function init(root) {
    if (root.getAttribute('data-ready') === '1' || !window.L) return;
    var canvas = root.querySelector('[data-addr-canvas]');
    if (!canvas) return;

    var lat = parseFloat(root.getAttribute('data-center-lat') || '24.7136');
    var lng = parseFloat(root.getAttribute('data-center-lng') || '46.6753');
    var map = window.L.map(canvas, { zoomControl: true, scrollWheelZoom: false }).setView([lat, lng], 12);
    window.L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; OpenStreetMap',
    }).addTo(map);

    var marker = window.L.marker([lat, lng], { draggable: true }).addTo(map);

    function apply(ll) {
      marker.setLatLng(ll);
      lookup(root, ll.lat, ll.lng);
    }

    map.on('click', function (e) { apply(e.latlng); });
    marker.on('dragend', function () { apply(marker.getLatLng()); });

    var locateBtn = root.querySelector('[data-addr-locate]');
    if (locateBtn) {
      locateBtn.addEventListener('click', function () {
        root.scrollIntoView({ behavior: 'smooth', block: 'center' });
        if (!navigator.geolocation) {
          map.invalidateSize();
          return;
        }
        showMsg(root, root.getAttribute('data-msg-locating') || '', 'ok');
        navigator.geolocation.getCurrentPosition(function (pos) {
          var ll = window.L.latLng(pos.coords.latitude, pos.coords.longitude);
          map.setView(ll, 15);
          apply(ll);
        }, function () {
          map.invalidateSize();
          showMsg(root, '', '');
        }, { enableHighAccuracy: true, timeout: 8000, maximumAge: 30000 });
      });
    }

    var form = formOf(root);
    if (form && !form.getAttribute('data-addr-guard')) {
      form.setAttribute('data-addr-guard', '1');
      form.addEventListener('submit', function (e) {
        if (form.getAttribute('data-addr-blocked') === '1') {
          e.preventDefault();
          showMsg(root, root.getAttribute('data-msg-outside') || '', 'bad');
        }
      });
    }

    root.setAttribute('data-ready', '1');
    maps.push({ root: root, map: map });
    setTimeout(function () { map.invalidateSize(); }, 80);
  }

  function resize(scope) {
    maps.forEach(function (item) {
      if (scope && !scope.contains(item.root)) return;
      item.map.invalidateSize();
    });
    if (!scope) return;
    scope.querySelectorAll('[data-addr-map]').forEach(init);
  }

  window.nmAddrMaps = { resize: resize };

  ready(function () {
    document.querySelectorAll('[data-addr-map]').forEach(init);
  });
})();
