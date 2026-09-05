@once
@push('scripts')
<script>
@verbatim
(function(){
  'use strict';

  function failOpen(){
    try{
      document.querySelectorAll('img.aiimg').forEach(function(i){ i.classList.add('loaded'); });
      document.querySelectorAll('.rv').forEach(function(r){ r.classList.add('in'); });
      document.querySelectorAll('.fuel').forEach(function(f){
        f.style.setProperty('--v', (f.getAttribute('data-v') || 0) + '%');
      });
    }catch(_){}
  }
  window.addEventListener('error', failOpen);

  try {
    /* announcement rotator */
    (function(){
      var a = document.getElementById('announce');
      if (!a) return;
      var s = a.querySelectorAll('span'), i = 0;
      if (!s.length) return;
      setInterval(function(){
        s[i].classList.remove('on');
        i = (i + 1) % s.length;
        s[i].classList.add('on');
      }, 4200);
    })();

    /* image fade-in */
    document.querySelectorAll('img.aiimg').forEach(function(img){
      img.loading = img.loading || 'lazy';
      img.decoding = img.decoding || 'async';
      if (img.complete && img.naturalWidth > 0) img.classList.add('loaded');
      else img.addEventListener('load', function(){ img.classList.add('loaded'); });
    });

    /* reveal + fuel bars inside revealed blocks */
    function fireFuel(scope){
      var list = [];
      if (scope.matches && scope.matches('.fuel')) list.push(scope);
      if (scope.querySelectorAll) list = list.concat([].slice.call(scope.querySelectorAll('.fuel')));
      list.forEach(function(f){
        f.style.setProperty('--v', (f.getAttribute('data-v') || 0) + '%');
      });
    }
    if ('IntersectionObserver' in window) {
      var io = new IntersectionObserver(function(es){
        es.forEach(function(e){
          if (!e.isIntersecting) return;
          e.target.classList.add('in');
          fireFuel(e.target);
          io.unobserve(e.target);
        });
      }, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 });
      document.querySelectorAll('.rv').forEach(function(el){ io.observe(el); });
    } else {
      failOpen();
    }

    /* FAQ accordion */
    document.querySelectorAll('.fq').forEach(function(btn){
      btn.addEventListener('click', function(){
        var item = btn.parentElement;
        if (!item) return;
        var open = item.classList.contains('open');
        var ans = item.querySelector('.fa');
        document.querySelectorAll('.fitem.open').forEach(function(o){
          o.classList.remove('open');
          var a = o.querySelector('.fa');
          if (a) a.style.maxHeight = '0px';
        });
        if (!open) {
          item.classList.add('open');
          if (ans) ans.style.maxHeight = ans.scrollHeight + 'px';
        }
      });
    });

    /* hub tabs */
    (function(){
      function wire(barId){
        var bar = document.getElementById(barId);
        if (!bar) return;
        bar.addEventListener('click', function(e){
          var b = e.target.closest('.tab');
          if (!b) return;
          [].forEach.call(bar.querySelectorAll('.tab'), function(x){ x.classList.remove('on'); });
          b.classList.add('on');
          var sec = bar.closest('section');
          if (!sec) return;
          [].forEach.call(sec.querySelectorAll('.hubpanel'), function(pn){
            pn.classList.toggle('on', pn.id === b.getAttribute('data-t'));
          });
          [].forEach.call(sec.querySelectorAll('.hubpanel.on .rv'), function(el){ el.classList.add('in'); });
        });
      }
      wire('hubtabs');
      wire('kittabs');

      function openKitchenHash(){
        var hash = (location.hash || '').replace(/^#/, '');
        if (!hash) return;
        var bar = document.getElementById('kittabs');
        if (!bar) return;
        var target = hash === 'recipes' ? 'k2' : (hash === 'articles' ? 'k1' : '');
        if (!target) return;
        var tab = bar.querySelector('.tab[data-t="'+target+'"]');
        if (tab) tab.click();
      }
      openKitchenHash();
      window.addEventListener('hashchange', openKitchenHash);
    })();

    /* product rail — only when #v30Rail exists */
    (function(){
      var rail = document.getElementById('v30Rail');
      if (!rail) return;
      var isGrid = !!rail.closest('.shop-grid');
      var prev = document.getElementById('v30Prev');
      var next = document.getElementById('v30Next');
      var bar = document.getElementById('v30Railbar');
      var tabs = document.getElementById('v30Tabs');
      var rtl = getComputedStyle(rail).direction === 'rtl';

      function visible(){ return [].slice.call(rail.querySelectorAll('.prod:not(.hide)')); }
      function step(){
        var c = visible()[0];
        return c ? c.getBoundingClientRect().width + 18 : rail.clientWidth * 0.8;
      }
      function pos(){ return Math.abs(rail.scrollLeft); }
      function go(d){
        var x = step() * d;
        rail.scrollBy({ left: rtl ? -x : x, behavior: 'smooth' });
      }

      if (!isGrid && next) next.addEventListener('click', function(){ go(1); });
      if (!isGrid && prev) prev.addEventListener('click', function(){ go(-1); });

      if (isGrid) {
        if (tabs) {
          tabs.addEventListener('click', function(e){
            var b = e.target.closest('.tab');
            if (!b) return;
            [].forEach.call(tabs.querySelectorAll('.tab'), function(x){ x.classList.remove('on'); });
            b.classList.add('on');
            var c = b.getAttribute('data-cat');
            [].forEach.call(rail.querySelectorAll('.prod'), function(pr){
              pr.classList.toggle('hide', c !== 'all' && pr.getAttribute('data-cat') !== c);
              pr.classList.add('in');
            });
          });
        }
        return;
      }

      rail.addEventListener('keydown', function(e){
        if (e.key === 'ArrowLeft') { e.preventDefault(); go(rtl ? -1 : 1); }
        if (e.key === 'ArrowRight') { e.preventDefault(); go(rtl ? 1 : -1); }
        if (e.key === 'Home') { e.preventDefault(); rail.scrollTo({ left: 0, behavior: 'smooth' }); }
      });

      var down = false, sx = 0, sl = 0, moved = 0;
      rail.addEventListener('pointerdown', function(e){
        if (e.pointerType === 'touch') return;
        down = true; moved = 0; sx = e.clientX; sl = rail.scrollLeft;
        rail.classList.add('dragging');
        rail.setPointerCapture(e.pointerId);
      });
      rail.addEventListener('pointermove', function(e){
        if (!down) return;
        var d = e.clientX - sx;
        moved = Math.abs(d);
        rail.scrollLeft = sl - d;
      });
      ['pointerup', 'pointercancel', 'pointerleave'].forEach(function(ev){
        rail.addEventListener(ev, function(){
          if (!down) return;
          down = false;
          rail.classList.remove('dragging');
          sync();
        });
      });
      rail.addEventListener('click', function(e){ if (moved > 6) e.preventDefault(); }, true);

      function sync(){
        var max = rail.scrollWidth - rail.clientWidth;
        var x = Math.min(pos(), Math.max(max, 0));
        if (prev) prev.disabled = x <= 2;
        if (next) next.disabled = x >= max - 2;
        if (bar) {
          var ratio = rail.scrollWidth > 0 ? rail.clientWidth / rail.scrollWidth : 1;
          var w = Math.max(12, ratio * 100);
          bar.style.width = w + '%';
          var t = max > 0 ? (x / max) * (100 - w) : 0;
          bar.style.transform = 'translateX(' + (rtl ? t : -t) + '%)';
        }
      }
      rail.addEventListener('scroll', sync, { passive: true });
      window.addEventListener('resize', sync);

      if (tabs) {
        tabs.addEventListener('click', function(e){
          var b = e.target.closest('.tab');
          if (!b) return;
          [].forEach.call(tabs.querySelectorAll('.tab'), function(x){ x.classList.remove('on'); });
          b.classList.add('on');
          var c = b.getAttribute('data-cat');
          [].forEach.call(rail.querySelectorAll('.prod'), function(pr){
            pr.classList.toggle('hide', c !== 'all' && pr.getAttribute('data-cat') !== c);
            pr.classList.add('in');
          });
          rail.scrollTo({ left: 0, behavior: 'smooth' });
          setTimeout(sync, 120);
        });
      }

      setTimeout(sync, 80);
      sync();
    })();

  } catch (_) {
    failOpen();
  }
})();
@endverbatim
</script>
@endpush
@endonce
