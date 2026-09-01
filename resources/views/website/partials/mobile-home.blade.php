{{-- Mobile homepage (newme-mobile-v5). Shown only below 820px; desktop stays in .home-desktop. --}}
@php
  $shopProducts = $shopProducts ?? [];
  $mUsps = __('website.main.usp');
  $mUspIcons = ['🏋', '💧', '🔥', '⏱'];
  $mReviews = __('website.main.reviews.items');
  $mPlans = __('website.main.subs.plans');
  $mFaqs = __('website.main.faq.items');
  $deliveryApps = $deliveryApps ?? [
      ['key' => 'jahez', 'url' => 'https://jahez.link/0xIec6fzk0b', 'logo' => 'assets/images/apps/jahez.svg', 'letter' => 'ج'],
      ['key' => 'hungerstation', 'url' => 'https://hungerstation.go.link/?c=SA&s=c&v=95478&so=mls&adj_t=1sdhhuza_1spi9ypp&adj_og_title=New+Me&adj_og_image=https://images.deliveryhero.io/image/hungerstation/restaurant/logo/3137fcf35d12049ae676a5ae70e868e0.jpg', 'logo' => 'assets/images/apps/hungerstation.png', 'letter' => 'هـ'],
      ['key' => 'chefz', 'url' => 'https://thechefzco.app.link/ImyQFntM9Zb', 'logo' => 'assets/images/apps/chefz.svg', 'letter' => 'ش'],
      ['key' => 'keeta', 'url' => 'https://url.mykeeta.com/taLCveLz', 'logo' => 'assets/images/apps/keeta.png', 'letter' => 'ك'],
      ['key' => 'ninja', 'url' => 'https://ninja.go.link/restaurants?branchId=49004', 'logo' => 'assets/images/apps/ninja.png', 'letter' => 'ن'],
  ];
  $mCats = collect($shopProducts)
      ->filter(fn ($p) => ! empty($p['cat']))
      ->mapWithKeys(fn ($p) => [$p['cat'] => $p['cat_label'] ?? $p['cat']])
      ->unique();
@endphp

<style>

.home-mobile{display:none}
@media(max-width:819.98px){
  .home-desktop{display:none!important}
  .home-mobile{display:block}
  body:has(.home-mobile){background:#F5F1EA!important}
}
.nm-m{
  --cream:#F5F1EA;--cream-2:#FAF7F2;--white:#fff;
  --navy:#1B3055;--navy-2:#14294A;
  --orange:#E07B39;--orange-2:#EF9152;--peach:#FDEBDC;
  --muted:#7B8794;--line:rgba(27,48,85,.10);
  --pad:20px;--pill:999px;
  background:var(--cream);min-height:100vh;position:relative;overflow-x:hidden;
  font-family:"Cairo",system-ui,sans-serif;color:var(--navy);line-height:1.7;
  font-size:15px;isolation:isolate
}
/* Isolate from desktop homepage CSS (shared class names) */
.nm-m img{max-width:100%;width:auto;height:auto;display:block;object-fit:unset}
.nm-m .hero-img img,.nm-m .ph img,.nm-m .media img,.nm-m .vid img,.nm-m .final img{width:100%;height:100%;object-fit:cover}
.nm-m a{text-decoration:none;color:inherit}
.nm-m button{font-family:inherit;cursor:pointer;border:0;background:none;color:inherit;min-height:0;padding:0;box-shadow:none}
.nm-m h1,.nm-m h2,.nm-m h3,.nm-m h4{margin:0;font-weight:800;line-height:1.5;letter-spacing:0;color:var(--navy)}
.nm-m header{display:flex;position:relative;background:rgba(245,241,234,.97)}
.nm-m footer{margin:0;padding:26px var(--pad) 112px;background:var(--navy-2);color:#93A9C0;font-size:12.5px}
.nm-m section{padding:30px var(--pad) 0;margin:0;background:transparent;border:0}
.nm-m .hero{display:block;position:relative;overflow:visible;border:0;grid-template-columns:none;min-height:0}
.nm-m .btn{display:block;text-align:center;border-radius:var(--pill);padding:15px 18px;font-weight:800;font-size:15px;min-height:0;border:0;box-shadow:none;gap:0;width:auto}
.nm-m .btn-o{background:linear-gradient(180deg,var(--orange-2),var(--orange));color:#fff;box-shadow:0 10px 24px rgba(224,123,57,.3)}
.nm-m .btn-w{background:var(--white);border:1.5px solid var(--navy);color:var(--navy)}
.nm-m .ph{position:relative;overflow:hidden}
.nm-m .ph::before{content:none;animation:none}
.nm-m .sticky{max-width:100%;inset-inline-start:0;left:0;right:0;transform:translateY(110%);width:100%}
.nm-m .sticky.show{transform:translateY(0)}
.nm-m .sheet{max-width:100%;inset-inline-start:0;left:0;right:0;transform:translateY(105%);margin:0 auto}
.nm-m .sheet.on{transform:translateY(0)}
.nm-m .drawer{transform:translateX(105%)}
html[dir="rtl"] .nm-m .drawer{transform:translateX(-105%)}
.nm-m .drawer.on,html[dir="rtl"] .nm-m .drawer.on{transform:translateX(0)}
.nm-m .app img{width:22px;height:22px;object-fit:contain;border-radius:6px}
.nm-m .app u{display:grid;place-items:center;overflow:hidden}

.nm-m{
  --cream:#F5F1EA;--cream-2:#FAF7F2;--white:#fff;
  --navy:#1B3055;--navy-2:#14294A;
  --orange:#E07B39;--orange-2:#EF9152;--peach:#FDEBDC;
  --muted:#7B8794;--line:rgba(27,48,85,.10);
  --pad:20px;--pill:999px;
}
.nm-m,.nm-m *{box-sizing:border-box;-webkit-tap-highlight-color:transparent}
.nm-m,.nm-m{margin:0}
.nm-m{background:#D9D3C8;font-family:"Cairo",system-ui,sans-serif;color:var(--navy);line-height:1.7}
.nm-m img{max-width:100%;display:block}
.nm-m a{text-decoration:none;color:inherit}
.nm-m button{font-family:inherit;cursor:pointer;border:0;background:none;color:inherit}
.nm-m h1,.nm-m h2,.nm-m h3,.nm-m h4{margin:0;font-weight:800;line-height:1.5}
@media(min-width:820px){}
.nm-m .topwrap{position:sticky;top:0;z-index:60}
.nm-m header{background:rgba(245,241,234,.97);backdrop-filter:blur(12px);
  padding:11px var(--pad);display:flex;align-items:center;gap:9px}
.nm-m .brand{display:flex;align-items:center;gap:8px;margin-inline-end:auto}
.nm-m .brand .logo__img,.nm-m header .brand img{height:36px;width:auto;max-width:140px;object-fit:contain;display:block}
.nm-m .rnd{width:38px;height:38px;border-radius:50%;background:var(--white);border:1px solid var(--line);
  display:grid;place-items:center;font-size:15px;box-shadow:0 2px 6px rgba(27,48,85,.05)}
.nm-m .live{background:var(--navy-2);color:#E9F0F8;padding:7px var(--pad) 8px}
.nm-m .live .r{display:flex;align-items:center;gap:8px;font-size:11.5px;font-weight:600;flex-wrap:nowrap;white-space:nowrap;min-width:0}
.nm-m .live .dot{width:6px;height:6px;border-radius:50%;background:var(--orange);animation:pl 2.4s infinite;flex-shrink:0}
@keyframes pl{0%,100%{box-shadow:0 0 0 0 rgba(224,123,57,.55)}50%{box-shadow:0 0 0 7px rgba(224,123,57,0)}}
.nm-m .live .batch{flex:1;min-width:0;overflow:hidden;text-overflow:ellipsis}
.nm-m .live b{color:var(--orange);font-weight:800}
.nm-m .live .next{margin-inline-start:auto;color:#9FB5CD;font-weight:500;flex-shrink:0}
.nm-m .live .next span{color:#fff;font-weight:800;font-variant-numeric:tabular-nums}
.nm-m .track{height:3px;background:rgba(255,255,255,.14);border-radius:3px;margin-top:7px;overflow:hidden}
.nm-m .track .prog{display:block;height:100%;width:0;border-radius:3px;font-style:normal;
  background:linear-gradient(90deg,var(--orange-2),var(--orange));transition:width 1.2s ease}
.nm-m .hero{padding:26px var(--pad) 24px;text-align:center}
.nm-m .hero h1{font-size:29px;font-weight:900;line-height:1.45}
.nm-m .hero h1 em{font-style:normal;color:var(--orange)}
.nm-m .hero p{font-size:14.5px;color:#5C6B7C;margin:14px 0 0}
.nm-m .btn{display:block;text-align:center;border-radius:var(--pill);padding:15px 18px;font-weight:800;font-size:15px}
.nm-m .btn-o{background:linear-gradient(180deg,var(--orange-2),var(--orange));color:#fff;box-shadow:0 10px 24px rgba(224,123,57,.3)}
.nm-m .btn-w{background:var(--white);border:1.5px solid var(--navy);color:var(--navy)}
.nm-m .hero .btn{margin-top:13px}
.nm-m .hero-img{aspect-ratio:16/10;overflow:hidden}
.nm-m .hero-img img{width:100%;height:100%;object-fit:cover;animation:kb 22s ease-in-out infinite alternate}
@keyframes kb{from{transform:scale(1)}to{transform:scale(1.07)}}
.nm-m .badges{background:var(--white);padding:14px 0;border-bottom:1px solid var(--line);max-width:100%;overflow:hidden}
.nm-m .badges .railwrap{max-width:100%;min-width:0;overflow:hidden}
.nm-m .badges .rail{display:flex;gap:10px;overflow-x:auto;-webkit-overflow-scrolling:touch;overscroll-behavior-x:contain;touch-action:pan-x;scrollbar-width:none;width:100%;max-width:100%;min-width:0;padding:0 var(--pad) 4px;scroll-snap-type:x mandatory}
.nm-m .badges .rail::-webkit-scrollbar{display:none}
.nm-m .badge{display:flex;align-items:flex-start;gap:10px;background:var(--cream);border-radius:18px;padding:12px 14px;flex:0 0 min(78vw,280px);scroll-snap-align:start;min-width:0}
.nm-m .badge u{width:34px;height:34px;border-radius:50%;background:var(--peach);color:var(--orange);
  display:grid;place-items:center;text-decoration:none;font-size:15px;flex-shrink:0;margin-top:1px}
.nm-m .badge .txt{min-width:0;flex:1}
.nm-m .badge b{display:block;font-size:13.5px;font-weight:800;line-height:1.3;color:var(--navy)}
.nm-m .badge small{display:block;font-size:11.5px;font-weight:600;color:var(--muted);line-height:1.45;margin-top:4px}
.nm-m .rail{display:flex;gap:10px;overflow-x:auto;-webkit-overflow-scrolling:touch;overscroll-behavior-x:contain;touch-action:pan-x;padding:0 var(--pad) 6px;scroll-snap-type:x mandatory;scrollbar-width:none;max-width:100%;width:100%;min-width:0}
.nm-m .rail::-webkit-scrollbar{display:none}
.nm-m .railwrap{position:relative;max-width:100%;min-width:0;overflow:hidden}
.nm-m .railwrap::after{content:"";position:absolute;top:0;bottom:6px;inset-inline-end:0;width:38px;pointer-events:none;
  background:linear-gradient(to left,transparent,var(--fade,var(--cream)) 78%)}
.nm-m .railwrap.on-white::after{--fade:var(--white)}
.nm-m .swipe{display:inline-flex;align-items:center;gap:5px;font-size:11px;font-weight:700;color:var(--muted)}
.nm-m .rail>*{scroll-snap-align:start;flex:0 0 auto}
.nm-m .end{width:2px}
.nm-m section{padding:30px var(--pad) 0}
.nm-m section.bleed{padding-inline:0}
.nm-m .bleed .head{padding-inline:var(--pad)}
.nm-m .head{display:flex;align-items:flex-end;justify-content:space-between;gap:12px;margin-bottom:16px}
.nm-m .kicker{font-size:11.5px;font-weight:700;color:var(--orange);letter-spacing:.05em;margin-bottom:2px}
.nm-m .kicker::before{content:"— "}
.nm-m .head h2{font-size:22px;font-weight:900}
.nm-m .head h2 em{font-style:normal;color:var(--orange)}
.nm-m .head a{font-size:12.5px;font-weight:700;white-space:nowrap}
.nm-m .rise{opacity:0;transform:translateY(16px);transition:opacity .55s ease,transform .55s ease}
.nm-m .rise.in{opacity:1;transform:none}
.nm-m .tag{position:absolute;top:10px;inset-inline-start:10px;background:rgba(255,255,255,.95);color:var(--navy);font-size:10px;
  font-weight:800;padding:5px 10px;border-radius:var(--pill);z-index:1}
.nm-m #nmShop{overflow:hidden;max-width:100%}
.nm-m #nmShop .railwrap{max-width:100%;min-width:0;overflow:hidden}
.nm-m #nmProdRail{display:flex;gap:12px;overflow-x:auto;-webkit-overflow-scrolling:touch;overscroll-behavior-x:contain;touch-action:pan-x;scrollbar-width:none;width:100%;max-width:100%;min-width:0;padding:0 var(--pad) 8px;scroll-snap-type:x mandatory}
.nm-m #nmProdRail::-webkit-scrollbar{display:none}
.nm-m #nmProdRail .card{width:min(72vw,232px);flex:0 0 auto;scroll-snap-align:start;display:flex;flex-direction:column;background:#F3EEE6;border-radius:18px;overflow:hidden;padding:0 0 12px;box-shadow:0 4px 16px rgba(16,38,63,.06)}
.nm-m #nmProdRail .card .ph{display:block;aspect-ratio:1;background:#E8E1D6;position:relative;border-radius:18px 18px 0 0;overflow:hidden}
.nm-m #nmProdRail .card .ph img{width:100%;height:100%;object-fit:cover}
.nm-m #nmProdRail .card .b{padding:12px 12px 0;display:flex;flex-direction:column;flex:1}
.nm-m #nmProdRail .card h3{font-size:14px;font-weight:900;line-height:1.35;color:var(--navy);margin:0}
.nm-m #nmProdRail .card .cat{font-size:12px;font-weight:700;color:var(--muted);margin:4px 0 0}
.nm-m #nmProdRail .card .p-specs{display:grid;gap:8px;margin:12px 0;padding:11px 0;border-top:1.5px solid var(--line);border-bottom:1.5px solid var(--line)}
.nm-m #nmProdRail .card .p-spec{display:flex;align-items:center;justify-content:space-between;gap:8px;font-size:12.5px;font-weight:800;color:var(--navy)}
.nm-m #nmProdRail .card .kcal-box{display:inline-grid;place-items:center;min-width:38px;height:22px;border:1.8px solid var(--navy);border-radius:6px;font-size:9.5px;font-weight:700;padding:0 5px;flex-shrink:0}
.nm-m #nmProdRail .card .pr{margin:0 0 10px}
.nm-m #nmProdRail .card .pr .p{font-weight:900;font-size:18px;color:var(--navy)}
.nm-m #nmProdRail .card .p-view{display:flex;justify-content:center;align-items:center;background:var(--navy);color:#fff;font-weight:800;font-size:13px;border-radius:999px;padding:12px;min-height:44px;margin-top:auto}
.nm-m .apps{margin:0 var(--pad);background:var(--white);border-radius:22px;padding:15px 0 14px;box-shadow:0 4px 16px rgba(27,48,85,.06);overflow:hidden;max-width:100%}
.nm-m .apps .t{display:flex;justify-content:space-between;align-items:center;padding:0 16px 12px;font-size:12px;color:var(--muted)}
.nm-m .apps .t b{color:var(--navy);font-size:14.5px;font-weight:800}
.nm-m .apps .railwrap{max-width:100%;min-width:0;overflow:hidden}
.nm-m .apps .rail{display:flex;gap:10px;overflow-x:auto;-webkit-overflow-scrolling:touch;overscroll-behavior-x:contain;touch-action:pan-x;scrollbar-width:none;width:100%;max-width:100%;min-width:0;padding:0 16px 4px;scroll-snap-type:x mandatory}
.nm-m .apps .rail::-webkit-scrollbar{display:none}
.nm-m .app{display:flex;align-items:center;gap:8px;background:var(--cream);border:1px solid var(--line);
  border-radius:var(--pill);padding:8px 14px;font-size:12.5px;font-weight:700;flex:0 0 auto;scroll-snap-align:start;white-space:nowrap}
.nm-m .app u{width:22px;height:22px;border-radius:50%;display:grid;place-items:center;text-decoration:none;
  color:#fff;font-size:11px;font-weight:800;background:var(--orange);flex-shrink:0;overflow:hidden}
.nm-m .label{background:var(--white);border-radius:22px;overflow:hidden;box-shadow:0 4px 16px rgba(27,48,85,.06)}
.nm-m .label .top{display:flex}
.nm-m .label .media{flex:0 0 42%;position:relative;background:#E4DCCE}
.nm-m .label .media img{width:100%;height:100%;object-fit:cover;min-height:160px}
.nm-m .play{position:absolute;inset:0;width:100%;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:7px;
  background:linear-gradient(180deg,rgba(20,41,74,.05),rgba(20,41,74,.55));color:#fff}
.nm-m .play .ring{width:44px;height:44px;border-radius:50%;background:#fff;color:var(--orange);display:grid;place-items:center;
  font-size:14px;padding-inline-start:3px;box-shadow:0 6px 16px rgba(0,0,0,.2)}
.nm-m .play small{font-size:10.5px;font-weight:700}
.nm-m .label .intro{padding:15px}
.nm-m .label .intro h3{font-size:16.5px;font-weight:800}
.nm-m .label .intro p{font-size:12.5px;color:var(--muted);margin:6px 0 0}
.nm-m .vals{display:grid;grid-template-columns:1fr 1fr;border-top:1px solid var(--line)}
.nm-m .v{padding:11px 15px;display:flex;justify-content:space-between;align-items:baseline;border-bottom:1px solid var(--line)}
.nm-m .v:nth-child(odd){border-inline-end:1px solid var(--line)}
.nm-m .v:nth-last-child(-n+2){border-bottom:0}
.nm-m .v span{font-size:12.5px;color:var(--muted)}
.nm-m .v b{font-size:15px;font-weight:800;font-variant-numeric:tabular-nums}
.nm-m .v.hi b{color:var(--orange)}
.nm-m .goalq{font-size:14.5px;font-weight:700;color:var(--muted);margin-bottom:10px}
.nm-m .seg{display:flex;background:var(--white);border-radius:var(--pill);padding:5px;margin-bottom:16px;
  box-shadow:0 3px 12px rgba(27,48,85,.06)}
.nm-m .seg button{flex:1;padding:11px 4px;border-radius:var(--pill);font-weight:800;font-size:12.5px;color:var(--muted);transition:.25s}
.nm-m .seg button.on{background:var(--navy);color:#fff}
.nm-m .plan{background:var(--white);border-radius:24px;padding:22px;box-shadow:0 8px 26px rgba(27,48,85,.08);transition:opacity .25s}
.nm-m .plan.sw{opacity:.25}
.nm-m .plan .code{font-size:11px;font-weight:700;color:var(--muted);letter-spacing:.05em}
.nm-m .plan h3{font-size:21px;font-weight:900}
.nm-m .plan .goal{font-size:13px;color:var(--muted)}
.nm-m .price{display:flex;align-items:baseline;gap:9px;margin:14px 0 4px}
.nm-m .price b{font-size:36px;font-weight:900;line-height:1;color:var(--orange);font-variant-numeric:tabular-nums}
.nm-m .price i{font-style:normal;font-size:13px;color:var(--muted)}
.nm-m .price del{font-size:13.5px;color:var(--muted)}
.nm-m .save{display:inline-block;background:var(--peach);color:var(--orange);font-size:11.5px;font-weight:800;
  padding:3px 11px;border-radius:var(--pill)}
.nm-m .feat-list{list-style:none;margin:16px 0 0;padding:0;font-size:14px}
.nm-m .feat-list li{padding:4px 0;display:flex;gap:9px}
.nm-m .feat-list li::before{content:"✓";color:var(--orange);font-weight:900}
.nm-m .more{font-size:12.5px;font-weight:800;border-bottom:1.5px dashed var(--orange);padding-bottom:2px;margin-top:14px;display:inline-block}
.nm-m .plan .btn{margin-top:18px}
.nm-m .note{text-align:center;font-size:12px;color:var(--muted);margin-top:14px}
.nm-m .tabs{display:flex;gap:8px;padding:0 var(--pad) 14px}
.nm-m .tabs button{border:1px solid var(--line);background:var(--white);border-radius:var(--pill);
  padding:7px 16px;font-size:12.5px;font-weight:700;color:var(--muted);transition:.2s}
.nm-m .tabs button.on{background:var(--navy);border-color:var(--navy);color:#fff}
.nm-m .allcard{width:130px!important;min-height:220px;flex:0 0 auto;background:var(--peach)!important;display:flex;flex-direction:column;align-items:center;justify-content:center;
  gap:6px;text-align:center;padding:16px 12px!important;box-shadow:none;color:inherit;border-radius:18px}
.nm-m .allcard .ico{width:40px;height:40px;border-radius:50%;background:var(--orange);color:#fff;display:grid;place-items:center;font-size:16px}
.nm-m .allcard b{font-size:13.5px;font-weight:800;color:var(--navy)}
.nm-m .allcard small{font-size:11px;color:var(--orange);font-weight:700;opacity:1}
.nm-m .dots{display:flex;gap:6px;justify-content:center;margin-top:12px}
.nm-m .dots i{width:6px;height:6px;border-radius:50%;background:var(--line);transition:.25s}
.nm-m .dots i.on{background:var(--orange);width:18px;border-radius:var(--pill)}
.nm-m .quote{width:270px;background:var(--white);border-radius:22px;padding:20px;box-shadow:0 4px 16px rgba(27,48,85,.06)}
.nm-m .quote .s{color:var(--orange);font-size:13px;letter-spacing:1px}
.nm-m .quote p{font-size:15px;font-weight:800;margin:8px 0 0;line-height:1.6}
.nm-m .quote span{font-size:12px;color:var(--muted);display:block;margin-top:8px}
.nm-m .story{background:var(--navy-2);color:#fff;border-radius:24px;padding:24px;position:relative;overflow:hidden}
.nm-m .story::before{content:"";position:absolute;width:230px;height:230px;border-radius:50%;bottom:-120px;inset-inline-end:-80px;
  background:radial-gradient(circle,rgba(224,123,57,.28),transparent 66%)}
.nm-m .story .kicker{color:var(--orange)}
.nm-m .story h2{font-size:21px;font-weight:900;color:#fff;position:relative}
.nm-m .story h2 em{font-style:normal;color:var(--orange)}
.nm-m .story p{font-size:14px;color:#BFCEDF;margin:10px 0 0;position:relative}
.nm-m .mini{display:flex;gap:9px;margin-top:18px;position:relative}
.nm-m .mini div{flex:1;text-align:center;background:rgba(255,255,255,.08);border-radius:14px;padding:11px 6px}
.nm-m .mini b{display:block;font-size:16px;font-weight:900;color:var(--orange)}
.nm-m .mini span{font-size:10.5px;color:#A9BCD1}
.nm-m .story .btn{margin-top:18px;position:relative;background:rgba(255,255,255,.1);border:1.5px solid rgba(255,255,255,.3);color:#fff}
.nm-m .final{margin:30px var(--pad) 0;border-radius:24px;overflow:hidden;position:relative;color:#fff;text-align:center}
.nm-m .final img{position:absolute;inset:0;width:100%;height:100%;object-fit:cover}
.nm-m .final .in{position:relative;background:linear-gradient(180deg,rgba(20,41,74,.55),rgba(20,41,74,.92));padding:28px 20px}
.nm-m .final h2{font-size:23px;font-weight:900;color:#fff}
.nm-m .final h2 em{font-style:normal;color:var(--orange)}
.nm-m .final p{font-size:13.5px;color:#C6D4E4;margin:9px 0 18px}
.nm-m footer{background:var(--navy-2);color:#93A9C0;margin-top:30px;padding:26px var(--pad) 112px;font-size:12.5px}
.nm-m footer .fl{display:flex;flex-wrap:wrap;gap:8px;margin:16px 0}
.nm-m footer .fl a,.nm-m footer .fl button{background:rgba(255,255,255,.08);padding:8px 13px;border-radius:var(--pill);
  color:#E2EAF3;font-size:12px;font-weight:700}
.nm-m footer .cr{font-size:11px;color:#6E8299;margin-top:14px;line-height:1.9}
.nm-m .sticky{position:fixed;bottom:0;opacity:0;pointer-events:none;transform:translateX(50%) translateY(110%);inset-inline-start:50%;transform:translateX(50%);width:100%;max-width:420px;z-index:70;
  background:rgba(255,255,255,.97);backdrop-filter:blur(14px);border-top:1px solid var(--line);
  padding:11px var(--pad) calc(11px + env(safe-area-inset-bottom));display:flex;align-items:center;gap:12px;transition:opacity .28s ease,transform .32s cubic-bezier(.3,.8,.3,1)}
.nm-m .sticky.show{opacity:1;pointer-events:auto;transform:translateX(50%) translateY(0)}
.nm-m .sticky.hide{opacity:0!important;pointer-events:none!important}
.nm-m .sticky .i{flex:1;min-width:0}
.nm-m .sticky .i b{display:block;font-size:13.5px;font-weight:800}
.nm-m .sticky .i span{font-size:11px;color:var(--muted)}
.nm-m .sticky a{background:linear-gradient(180deg,var(--orange-2),var(--orange));color:#fff;font-weight:800;font-size:13.5px;
  padding:12px 20px;border-radius:var(--pill);white-space:nowrap;box-shadow:0 6px 16px rgba(224,123,57,.28)}
.nm-m .scrim{position:fixed;inset:0;background:rgba(20,41,74,.55);z-index:90;opacity:0;pointer-events:none;transition:opacity .25s}
.nm-m .scrim.on{opacity:1;pointer-events:auto}
.nm-m .drawer{position:fixed;top:0;inset-inline-end:0;height:100%;width:80%;max-width:320px;background:var(--cream-2);z-index:100;
  transform:translateX(-105%);transition:transform .3s cubic-bezier(.3,.8,.3,1);padding:22px 20px;overflow-y:auto}
.nm-m .drawer.on{transform:translateX(0)}
.nm-m .drawer h4{font-size:11.5px;color:var(--orange);letter-spacing:.08em;margin:22px 0 4px;font-weight:800}
.nm-m .drawer nav a{display:block;padding:12px 0;border-bottom:1px solid var(--line);font-weight:800;font-size:15px}
.nm-m .drawer .x{position:absolute;top:18px;inset-inline-start:18px;font-size:19px}
.nm-m .sheet{position:fixed;bottom:0;inset-inline-start:50%;transform:translate(50%,105%);width:100%;max-width:420px;z-index:100;
  background:var(--cream);border-radius:26px 26px 0 0;padding:20px var(--pad) calc(26px + env(safe-area-inset-bottom));
  transition:transform .32s cubic-bezier(.3,.8,.3,1);max-height:84vh;overflow-y:auto}
.nm-m .sheet.on{transform:translate(50%,0)}
.nm-m .grab{width:44px;height:4px;border-radius:4px;background:var(--line);margin:0 auto 16px}
.nm-m .sheet h3{font-size:19px;font-weight:900}
.nm-m .sheet .code{font-size:11.5px;color:var(--muted);font-weight:700}
.nm-m .vid{aspect-ratio:16/9;border-radius:18px;overflow:hidden;margin:14px 0;background:#E4DCCE}
.nm-m .vid img{width:100%;height:100%;object-fit:cover}
.nm-m .faq details{border-bottom:1px solid var(--line)}
.nm-m .faq summary{list-style:none;padding:14px 0;font-weight:800;font-size:14.5px;display:flex;justify-content:space-between;gap:10px}
.nm-m .faq summary::-webkit-details-marker{display:none}
.nm-m .faq summary::after{content:"+";color:var(--orange);font-size:19px}
.nm-m .faq details[open] summary::after{content:"–"}
.nm-m .faq p{margin:0 0 14px;font-size:13.5px;color:var(--muted)}
@media(prefers-reduced-motion:reduce){.nm-m,.nm-m *{animation:none!important;transition:none!important}.nm-m .rise{opacity:1;transform:none}}
.nm-m :focus-visible{outline:2px solid var(--orange);outline-offset:2px;border-radius:10px}
</style>

<div class="home-mobile nm-m" id="nmMobileHome">
  <div class="topwrap">
    <header>
      @php
        $nmLogo = app()->getLocale() === 'ar' ? 'logo_ar.png' : 'logo_en.png';
      @endphp
      <a class="brand" href="{{ route('website.main') }}">
        <img class="logo__img" src="{{ asset('assets/images/logos/'.$nmLogo) }}" alt="{{ __('website.brand') }}" width="140" height="40">
      </a>
      <a class="rnd" href="{{ route('website.cart') }}" aria-label="{{ __('website.nav.cart') }}">🛒</a>
      <button class="rnd" type="button" id="nmMenuBtn" aria-label="{{ __('website.nav.menu') }}">☰</button>
    </header>
    <div class="live">
      <div class="r">
        <span class="dot"></span>
        <span class="batch">
          @if (app()->getLocale() === 'ar')
            دفعة <b>NM-26</b> · خُبزت 07:00
          @else
            Batch <b>NM-26</b> · baked 07:00
          @endif
        </span>
        <span class="next">
          {{ app()->getLocale() === 'ar' ? 'الدفعة القادمة بعد' : 'Next batch in' }}
          <span id="nmCd">—</span>
        </span>
      </div>
      <div class="track"><span class="prog" id="nmProg"></span></div>
    </div>
  </div>

  <div class="hero">
    <h1>{!! __('website.main.hero.h1') !!}</h1>
    <p>{{ __('website.main.hero.lead') }}</p>
    <a class="btn btn-o" href="{{ route('website.subscribe') }}">{{ __('website.main.hero.cta_sub') }}</a>
    <a class="btn btn-w" href="#nmShop">{{ __('website.main.hero.cta_once') }}</a>
  </div>

  <div class="hero-img">
    <img src="{{ asset('assets/images/p81_1000x1150.jpg') }}" alt="{{ __('website.main.hero.alt') }}">
  </div>

  <div class="badges">
    <div class="railwrap on-white">
      <div class="rail" id="nmBadgesRail">
        @foreach ($mUsps as $i => $usp)
        <div class="badge">
          <u>{{ $mUspIcons[$i] ?? '✦' }}</u>
          <div class="txt">
            <b>{{ $usp['title'] }}</b>
            <small>{{ $usp['sub'] }}</small>
          </div>
        </div>
        @endforeach
        <div class="end"></div>
      </div>
    </div>
  </div>

  <section id="nmShop" class="bleed rise">
    <div class="head">
      <div>
        <div class="kicker">{{ __('website.main.shop.kick') }}</div>
        <h2>{!! app()->getLocale() === 'ar' ? 'اطلب <em>الآن</em>' : 'Order <em>now</em>' !!}</h2>
      </div>
      <span class="swipe">{{ app()->getLocale() === 'ar' ? 'اسحب ‹‹' : 'Swipe ››' }}</span>
    </div>
    @if ($mCats->isNotEmpty())
    <div class="tabs">
      <button type="button" class="on" data-cat="all">{{ app()->getLocale() === 'ar' ? 'الكل' : 'All' }}</button>
      @foreach ($mCats as $catSlug => $catLabel)
      <button type="button" data-cat="{{ $catSlug }}">{{ $catLabel }}</button>
      @endforeach
    </div>
    @endif
    <div class="railwrap">
      <div class="rail" id="nmProdRail">
        @foreach ($shopProducts as $p)
        <article class="card" @if(!empty($p['cat'])) data-cat="{{ $p['cat'] }}" @endif>
          <a href="{{ $p['url'] }}" class="ph">
            @if (!empty($p['flag']))
            <span class="tag">{{ $p['flag'] }}</span>
            @endif
            @if (!empty($p['image_url']))
            <img src="{{ $p['image_url'] }}" alt="{{ $p['name'] }}">
            @endif
          </a>
          <div class="b">
            <h3>{{ $p['name'] }}</h3>
            @if (!empty($p['cat_label']) || !empty($p['sub']))
            <span class="cat">{{ $p['cat_label'] ?? $p['sub'] }}</span>
            @endif
            @if (!empty($p['protein']) || !empty($p['kcal']))
            <div class="p-specs">
              @if (!empty($p['protein']))
              <div class="p-spec">
                <span>{{ $p['protein'] }}</span>
                <span aria-hidden="true">〰</span>
              </div>
              @endif
              @if (!empty($p['kcal']))
              <div class="p-spec">
                <span>{{ $p['kcal'] }}</span>
                <span class="kcal-box">kcal</span>
              </div>
              @endif
            </div>
            @endif
            <div class="pr">
              <div class="p">{{ $p['price'] }} <x-ui.sar /></div>
            </div>
            <a class="p-view" href="{{ $p['url'] }}">{{ __('website.store.view_product') }}</a>
          </div>
        </article>
        @endforeach
        <a class="card allcard" href="{{ route('website.store') }}">
          <span class="ico">←</span>
          <b>{{ __('website.main.shop.all') }}</b>
        </a>
        <div class="end"></div>
      </div>
    </div>
  </section>

  <section class="bleed rise" id="nmApps">
    <div class="apps">
      <div class="t">
        <b>{{ app()->getLocale() === 'ar' ? 'اطلب من تطبيقك المفضل' : 'Order from your favorite app' }}</b>
        <span class="swipe">{{ app()->getLocale() === 'ar' ? 'اسحب ‹‹' : 'Swipe ››' }}</span>
      </div>
      <div class="railwrap on-white">
        <div class="rail" id="nmAppsRail">
          @foreach ($deliveryApps as $app)
            @php $copy = __('website.main.apps.items.'.$app['key']); @endphp
            <a class="app" href="{{ $app['url'] }}" target="_blank" rel="noopener noreferrer">
              <u><img src="{{ asset($app['logo']) }}" alt="{{ $copy['name_en'] }}"></u>
              {{ $copy['name_ar'] }}
            </a>
          @endforeach
          <div class="end"></div>
        </div>
      </div>
    </div>
  </section>

  <section class="rise">
    <div class="head">
      <div>
        <div class="kicker">{{ __('website.main.nutrition.kick') }}</div>
        <h2>{!! __('website.main.nutrition.title') !!}</h2>
      </div>
    </div>
    <div class="label">
      <div class="top">
        <div class="media">
          <img src="{{ asset('assets/images/p13_1100x900.jpg') }}" alt="{{ __('website.main.nutrition.alt') }}">
          <button class="play" type="button" id="nmVidBtn"><span class="ring">▶</span><small>{{ app()->getLocale() === 'ar' ? 'جولة 60 ثانية' : '60s tour' }}</small></button>
        </div>
        <div class="intro">
          <h3>{{ __('website.main.nutrition.card_title') }}</h3>
          <p>{{ __('website.main.nutrition.card_sub') }}</p>
        </div>
      </div>
      <div class="vals" id="nmVals">
        <div class="v hi"><span>{{ __('website.main.nutrition.protein') }}</span><b data-to="40" data-suf=" g">0 g</b></div>
        <div class="v"><span>{{ __('website.main.nutrition.energy') }}</span><b data-to="233" data-suf=" kcal">0 kcal</b></div>
        <div class="v hi"><span>{{ __('website.main.nutrition.fiber') }}</span><b data-to="12" data-suf=" g">0 g</b></div>
        <div class="v"><span>{{ __('website.main.nutrition.carbs') }}</span><b data-to="15" data-suf=" g">0 g</b></div>
        <div class="v hi"><span>{{ __('website.main.nutrition.omega') }}</span><b data-to="3.8" data-dec="1" data-suf=" g">0 g</b></div>
        <div class="v"><span>{{ __('website.main.nutrition.sugar') }}</span><b>0 g</b></div>
      </div>
    </div>
  </section>

  <section id="nmPlans" class="rise">
    <div class="head">
      <div>
        <div class="kicker">{{ __('website.main.subs.kick') }}</div>
        <h2>{!! app()->getLocale() === 'ar' ? 'وش <em>هدفك</em>؟' : 'What’s your <em>goal</em>?' !!}</h2>
      </div>
    </div>
    <div class="goalq">{{ app()->getLocale() === 'ar' ? 'اختر هدفك ونختار لك الخطة المناسبة.' : 'Pick your goal and we’ll match the plan.' }}</div>
    <div class="seg">
      <button type="button" data-p="starter">{{ app()->getLocale() === 'ar' ? 'خسارة وزن' : 'Weight loss' }}</button>
      <button type="button" data-p="balance" class="on">{{ app()->getLocale() === 'ar' ? 'توازن' : 'Balance' }}</button>
      <button type="button" data-p="pro">{{ app()->getLocale() === 'ar' ? 'بناء عضل' : 'Muscle' }}</button>
    </div>
    <article class="plan" id="nmPlanCard">
      <div class="code" id="nmPCode">NM-02 · BALANCED</div>
      <h3 id="nmPName">{{ $mPlans[1]['name'] }}</h3>
      <div class="goal" id="nmPGoal">{{ $mPlans[1]['goal'] }}</div>
      <div class="price"><b id="nmPPrice">549</b><i>{!! __('website.main.subs.per_month') !!}</i><del id="nmPOld">610</del></div>
      <span class="save" id="nmPSave">1,150 سعرة يومياً · ≈ 9 ر.س للوجبة</span>
      <ul class="feat-list" id="nmPFeat"></ul>
      <button class="more" type="button" id="nmPMore">{{ app()->getLocale() === 'ar' ? 'بقية التفاصيل ↓' : 'More details ↓' }}</button>
      <a class="btn btn-o" id="nmPCta" href="{{ route('website.subscribe') }}#plan=balance">{{ $mPlans[1]['cta'] }}</a>
    </article>
    <div class="note">{{ __('website.main.subs.guarantee') }}</div>
  </section>

  <section class="bleed rise">
    <div class="head">
      <div>
        <div class="kicker">{{ __('website.main.reviews.kick') }} · 4.9</div>
        <h2>{!! app()->getLocale() === 'ar' ? '+2,300 <em>تقييم</em>' : '+2,300 <em>reviews</em>' !!}</h2>
      </div>
      <span class="swipe">{{ app()->getLocale() === 'ar' ? 'اسحب ‹‹' : 'Swipe ››' }}</span>
    </div>
    <div class="railwrap">
      <div class="rail" id="nmRevRail">
        @foreach ($mReviews as $rev)
        <article class="quote">
          <div class="s">★★★★★</div>
          <p>“{{ $rev['body'] }}”</p>
          <span>{{ $rev['name'] }} · {{ $rev['loc'] }} · {{ __('website.main.reviews.verified') }}</span>
        </article>
        @endforeach
        <div class="end"></div>
      </div>
    </div>
    <div class="dots" id="nmRevDots">
      @foreach ($mReviews as $i => $_)
      <i @class(['on' => $i === 0])></i>
      @endforeach
    </div>
  </section>

  <section class="rise">
    <div class="story">
      <div class="kicker">{{ __('website.main.about.story_kick') }}</div>
      <h2>{!! app()->getLocale() === 'ar' ? 'بدأت من مطبخ بيت في الرياض — <em>واليوم في كل بيت</em>' : __('website.main.about.story_title') !!}</h2>
      <p>{!! strip_tags(__('website.main.about.story_p1')) !!}</p>
      <div class="mini">
        <div><b>22+</b><span>{{ __('website.main.about.stat1') }}</span></div>
        <div><b>5</b><span>{{ app()->getLocale() === 'ar' ? 'معايير تشغيل' : 'ops standards' }}</span></div>
        <div><b>100%</b><span>{{ app()->getLocale() === 'ar' ? 'شفافية مخبرية' : 'lab transparency' }}</span></div>
      </div>
      <a class="btn" href="#nmPlans">{{ app()->getLocale() === 'ar' ? 'ابدأ اشتراكك ←' : 'Start your plan ←' }}</a>
    </div>
  </section>

  <div class="final">
    <img src="{{ asset('assets/images/p77_1600x800.jpg') }}" alt="">
    <div class="in">
      <h2>{!! __('website.main.photo_cta.title') !!}</h2>
      <p>{{ __('website.main.photo_cta.sub') }}</p>
      <a class="btn btn-o" href="{{ route('website.subscribe') }}">{{ __('website.main.photo_cta.btn') }}</a>
    </div>
  </div>

  <footer>
    <div class="brand" style="color:#fff">
      <img class="logo__img" src="{{ asset('assets/images/logos/'.(app()->getLocale() === 'ar' ? 'white_logo_ar.png' : 'white_logo_en.png')) }}" alt="{{ __('website.brand') }}" width="140" height="40">
    </div>
    <div style="margin-top:8px">{{ app()->getLocale() === 'ar' ? 'وجبات ومنتجات صحية بقيم غذائية موثّقة.' : 'Healthy meals with verified nutrition.' }}</div>
    <div class="fl">
      <a href="{{ route('website.store') }}">{{ __('website.nav.store') }}</a>
      <a href="{{ route('website.subscribe') }}">{{ __('website.nav.subscribe') }}</a>
      <a href="https://wa.me/966533360317">{{ __('website.footer.whatsapp') }}</a>
      <button type="button" id="nmFaqBtn">{{ __('website.main.faq.title') }}</button>
    </div>
    <div class="cr">{!! __('website.footer.copyright') !!}<br>{{ __('website.main.subs.trust3') }}</div>
  </footer>

  <div class="sticky" id="nmBar">
    <div class="i">
      <b id="nmBarName">{{ $mPlans[1]['name'] }} — 549</b>
      <span id="nmBarSub">{{ __('website.main.subs.trust1') }}</span>
    </div>
    <a href="{{ route('website.subscribe') }}">{{ __('website.main.sticky.cta') }}</a>
  </div>

  <div class="scrim" id="nmScrim"></div>
  <aside class="drawer" id="nmDrawer">
    <button class="x" type="button" id="nmXDrawer" aria-label="{{ app()->getLocale() === 'ar' ? 'إغلاق' : 'Close' }}">✕</button>
    <div class="kicker">{{ app()->getLocale() === 'ar' ? 'نيو مي · القائمة' : 'New Me · Menu' }}</div>
    <nav>
      <h4>{{ app()->getLocale() === 'ar' ? 'التسوق' : 'Shop' }}</h4>
      <a href="{{ route('website.store') }}">{{ __('website.nav.store') }}</a>
      <a href="{{ route('website.subscribe') }}">{{ __('website.nav.subscribe') }}</a>
      <a href="{{ route('website.consult') }}">{{ __('website.nav.consult') }}</a>
      <h4>{{ app()->getLocale() === 'ar' ? 'اقرأ أكثر' : 'Learn more' }}</h4>
      <a href="{{ route('website.blog') }}#articles">{{ __('website.nav.articles') }}</a>
      <a href="{{ route('website.blog') }}#recipes">{{ __('website.main.recipes.kick') }}</a>
      <a href="#nmPlans">{{ __('website.nav.subscribe') }}</a>
      <h4>{{ app()->getLocale() === 'ar' ? 'الحساب' : 'Account' }}</h4>
      @auth
        @if (auth()->user()->isCustomer())
          <a href="{{ route('website.account') }}">{{ __('account.nav.account') }}</a>
        @endif
      @else
        <a href="{{ route('website.login') }}">{{ __('account.nav.login') }}</a>
      @endauth
      @php($nmLangTarget = app()->getLocale() === 'ar' ? 'en' : 'ar')
      <a href="{{ route('locale.switch', $nmLangTarget) }}" hreflang="{{ $nmLangTarget }}">
        {{ $nmLangTarget === 'en' ? 'EN · English' : 'AR · العربية' }}
      </a>
    </nav>
  </aside>

  <div class="sheet" id="nmSheet">
    <div class="grab"></div>
    <div class="code" id="nmSCode"></div>
    <h3 id="nmSTitle"></h3>
    <ul class="feat-list" id="nmSList"></ul>
    <a class="btn btn-o" id="nmSCta" style="margin-top:18px" href="{{ route('website.subscribe') }}">{{ app()->getLocale() === 'ar' ? 'اشترك الآن' : 'Subscribe now' }}</a>
  </div>

  <div class="sheet" id="nmVsheet">
    <div class="grab"></div>
    <h3>{{ app()->getLocale() === 'ar' ? 'دقيقة داخل مطبخ نيو مي · دفعة NM-26' : 'One minute inside New Me kitchen' }}</h3>
    <div class="vid"><img src="{{ asset('assets/images/p91_1600x900.jpg') }}" alt=""></div>
    <p style="font-size:13px;color:var(--muted);margin:0">{{ app()->getLocale() === 'ar' ? 'من طحن الترمس فجراً إلى تجهيز الوجبة وإغلاق العلبة.' : 'From dawn milling to sealing the box.' }}</p>
  </div>

  <div class="sheet" id="nmFsheet">
    <div class="grab"></div>
    <h3>{{ __('website.main.faq.title') }}</h3>
    <div class="faq" style="margin-top:10px">
      @foreach ($mFaqs as $i => $faq)
      <details @if($i === 0) open @endif>
        <summary>{{ $faq['q'] }}</summary>
        <p>{{ $faq['a'] }}</p>
      </details>
      @endforeach
    </div>
  </div>
</div>

<script>
(function(){
  if(!window.matchMedia || !matchMedia('(max-width:819.98px)').matches) return;
  var root=document.getElementById('nmMobileHome'); if(!root) return;
  var $=function(s,ctx){return (ctx||document).querySelector(s)};
  var $$=function(s,ctx){return Array.prototype.slice.call((ctx||document).querySelectorAll(s))};
  var scrim=$('#nmScrim'), drawer=$('#nmDrawer'), sheet=$('#nmSheet'), vsheet=$('#nmVsheet'), fsheet=$('#nmFsheet'), bar=$('#nmBar');
  var open=function(el){el.classList.add('on');scrim.classList.add('on');if(bar)bar.classList.add('hide')};
  var closeAll=function(){[drawer,sheet,vsheet,fsheet].forEach(function(e){if(e)e.classList.remove('on')});scrim.classList.remove('on');if(bar)bar.classList.remove('hide')};
  var menuBtn=$('#nmMenuBtn'); if(menuBtn) menuBtn.onclick=function(){open(drawer)};
  var xBtn=$('#nmXDrawer'); if(xBtn) xBtn.onclick=closeAll;
  if(scrim) scrim.onclick=closeAll;
  var vidBtn=$('#nmVidBtn'); if(vidBtn) vidBtn.onclick=function(){open(vsheet)};
  var faqBtn=$('#nmFaqBtn'); if(faqBtn) faqBtn.onclick=function(){open(fsheet)};
  addEventListener('keydown',function(e){if(e.key==='Escape')closeAll()});

  function tick(){
    var now=new Date();
    var bake=new Date(now); bake.setHours(7,0,0,0);
    if(now<bake) bake.setDate(bake.getDate()-1);
    var next=new Date(bake); next.setDate(next.getDate()+1);
    var left=next-now, h=Math.floor(left/36e5), m=Math.floor(left%36e5/6e4), s=Math.floor(left%6e4/1e3);
    var cd=$('#nmCd'); if(cd) cd.textContent=String(h).padStart(2,'0')+':'+String(m).padStart(2,'0')+':'+String(s).padStart(2,'0');
    var pct=Math.min(100,((now-bake)/(48*36e5))*100);
    var prog=$('#nmProg'); if(prog) prog.style.width=pct.toFixed(1)+'%';
  }
  tick(); setInterval(tick,1000);

  if('IntersectionObserver' in window){
    var io=new IntersectionObserver(function(es){es.forEach(function(e){
      if(!e.isIntersecting)return;
      e.target.classList.add('in');
      if(e.target.id==='nmVals') $$('b[data-to]',e.target).forEach(count);
      io.unobserve(e.target);
    })},{threshold:.25});
    $$('.rise',root).forEach(function(el){io.observe(el)});
    var vals=$('#nmVals'); if(vals) io.observe(vals);
  } else {
    $$('.rise',root).forEach(function(el){el.classList.add('in')});
  }
  function count(el){
    var to=+el.dataset.to, dec=+(el.dataset.dec||0), suf=el.dataset.suf||'', dur=1100, t0=performance.now();
    (function f(t){
      var k=Math.min(1,(t-t0)/dur), e=1-Math.pow(1-k,3);
      el.textContent=(to*e).toFixed(dec)+suf;
      if(k<1)requestAnimationFrame(f);
    })(t0);
  }

  var planNames=@json([$mPlans[0]['name'], $mPlans[1]['name'], $mPlans[2]['name']]);
  var planGoals=@json([$mPlans[0]['goal'], $mPlans[1]['goal'], $mPlans[2]['goal']]);
  var planFeats=@json([$mPlans[0]['features'], $mPlans[1]['features'], $mPlans[2]['features']]);
  var subBase="{{ route('website.subscribe') }}";
  var P={
    starter:{code:'NM-01 · BASIC',name:planNames[0],goal:planGoals[0],price:'299',old:'332',
      save:'630 · ≈ 10', top:planFeats[0].slice(0,3), all:planFeats[0].slice(3), href:subBase+'#plan=loss'},
    balance:{code:'NM-02 · BALANCED',name:planNames[1],goal:planGoals[1],price:'549',old:'610',
      save:'1,150 · ≈ 9', top:planFeats[1].slice(0,3), all:planFeats[1].slice(3), href:subBase+'#plan=balance'},
    pro:{code:'NM-03 · PRO',name:planNames[2],goal:planGoals[2],price:'749',old:'832',
      save:'1,850 · ≈ 8', top:planFeats[2].slice(0,3), all:planFeats[2].slice(3), href:subBase+'#plan=muscle'}
  };
  var cur='balance';
  function paint(k){
    var p=P[k]; cur=k;
    $('#nmPCode').textContent=p.code; $('#nmPName').textContent=p.name; $('#nmPGoal').textContent=p.goal;
    $('#nmPPrice').textContent=p.price; $('#nmPOld').textContent=p.old; $('#nmPSave').textContent=p.save;
    $('#nmPFeat').innerHTML=p.top.map(function(x){return '<li>'+x+'</li>'}).join('');
    $('#nmPCta').href=p.href;
    if($('#nmBarName')) $('#nmBarName').textContent=p.name+' — '+p.price;
    if($('#nmBarSub')) $('#nmBarSub').textContent=p.save;
  }
  $$('.seg button',root).forEach(function(b){b.onclick=function(){
    $$('.seg button',root).forEach(function(x){x.classList.remove('on')});
    b.classList.add('on');
    var card=$('#nmPlanCard'); card.classList.add('sw');
    setTimeout(function(){paint(b.dataset.p);card.classList.remove('sw')},180);
  }});
  var more=$('#nmPMore');
  if(more) more.onclick=function(){
    var p=P[cur];
    $('#nmSCode').textContent=p.code; $('#nmSTitle').textContent=p.name;
    $('#nmSList').innerHTML=p.top.concat(p.all).map(function(x){return '<li>'+x+'</li>'}).join('');
    $('#nmSCta').href=p.href; open(sheet);
  };
  paint('balance');

  var heroBtn=$('.hero .btn-w',root);
  if(heroBtn && bar && 'IntersectionObserver' in window){
    new IntersectionObserver(function(entries){
      var e=entries[0];
      bar.classList.toggle('show', !e.isIntersecting && e.boundingClientRect.top<0);
    },{threshold:0}).observe(heroBtn);
  }

  $$('.tabs button',root).forEach(function(b){b.onclick=function(){
    $$('.tabs button',root).forEach(function(x){x.classList.remove('on')});
    b.classList.add('on');
    var c=b.dataset.cat;
    $$('#nmProdRail .card[data-cat]',root).forEach(function(card){
      card.style.display=(c==='all'||card.dataset.cat===c)?'':'none';
    });
    var rail=$('#nmProdRail'); if(rail) rail.scrollTo({left:0,behavior:'smooth'});
  }});

  var rev=$('#nmRevRail'), dots=$$('#nmRevDots i');
  if(rev && dots.length){
    rev.addEventListener('scroll',function(){
      var i=Math.round(Math.abs(rev.scrollLeft)/281);
      dots.forEach(function(d,n){d.classList.toggle('on',n===Math.min(i,dots.length-1))});
    },{passive:true});
  }
})();
</script>
