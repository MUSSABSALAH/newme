{{-- Desktop kitchen (blog) grid from DB articles + recipes --}}
@php
  $blogArticles = $articles ?? collect();
  $blogRecipes = $recipes ?? collect();
  $isAr = app()->getLocale() === 'ar';
@endphp

<section class="section tile" id="articles">
  <div class="sec-head rv">
    <span class="chapter">{{ __('website.site.kitchen.chapter') }}</span>
    <span class="kick">{{ __('website.site.kitchen.kick') }}</span>
    <h2>{!! __('website.site.kitchen.h2') !!}</h2>
    <p>{{ __('website.site.kitchen.sub') }}</p>
  </div>
  <div class="hubtabs" id="kittabs">
    <button type="button" class="tab on" data-t="k1">{{ __('website.blog.toc_articles') }}</button>
    <button type="button" class="tab" data-t="k2">{{ __('website.blog.toc_recipes') }}</button>
  </div>

  <div class="hubpanel on" id="k1">
    <div class="card-grid">
      @forelse ($blogArticles as $a)
        <a class="acard rv" id="{{ $a->anchorId() }}" href="{{ route('website.article', ['article' => $a->slug]) }}">
          <div class="media">
            @if ($a->translated('category') !== '')
              <span class="cat">{{ $a->translated('category') }}</span>
            @endif
            <div class="ph"><svg><use href="#i-wheat"/></svg></div>
            @if ($a->imageUrl())
              <img class="aiimg" loading="lazy" decoding="async" src="{{ $a->imageUrl() }}" alt="{{ $a->translated('title') }}" onerror="this.remove()">
            @endif
          </div>
          <div class="body">
            <div class="meta">
              @if ($a->translated('read_time') !== '')
                <span><svg class="i"><use href="#i-clock"/></svg> {{ $a->translated('read_time') }}</span>
              @endif
              @if ($a->translated('author') !== '')
                <span>{{ $a->translated('author') }}</span>
              @endif
            </div>
            <h3>{{ $a->translated('title') }}</h3>
            @php
              $articleLead = $a->translated('excerpt') !== '' ? $a->translated('excerpt') : $a->translated('body_1');
            @endphp
            @if ($articleLead !== '')
              <p class="ex">{{ \Illuminate\Support\Str::limit($articleLead, 120) }}</p>
            @endif
            <span class="go">{{ __('website.blog.read_article') }}</span>
          </div>
        </a>
      @empty
        <p class="rv">{{ __('website.blog.empty_articles') }}</p>
      @endforelse
    </div>
  </div>

  <div class="hubpanel" id="k2">
    <span id="recipes"></span>
    <div class="card-grid">
      @forelse ($blogRecipes as $r)
        <a class="acard rv" id="{{ $r->anchorId() }}" href="{{ route('website.recipe', ['recipe' => $r->slug]) }}">
          <div class="media">
            @if ($r->translated('category') !== '')
              <span class="cat">{{ $r->translated('category') }}</span>
            @endif
            <div class="ph"><svg><use href="#i-bread"/></svg></div>
            @if ($r->imageUrl())
              <img class="aiimg" loading="lazy" decoding="async" src="{{ $r->imageUrl() }}" alt="{{ $r->translated('title') }}" onerror="this.remove()">
            @endif
          </div>
          <div class="body">
            <div class="meta">
              @if ($r->translated('time_label') !== '')
                <span><svg class="i"><use href="#i-clock"/></svg> {{ $r->translated('time_label') }}</span>
              @endif
              @if ($r->translated('kcal_label') !== '')
                <span>{{ $r->translated('kcal_label') }}</span>
              @endif
              @if ($r->translated('protein_label') !== '')
                <span>{{ $r->translated('protein_label') }}</span>
              @endif
            </div>
            <h3>{{ $r->translated('title') }}</h3>
            @if ($r->translated('excerpt') !== '')
              <p class="ex">{{ \Illuminate\Support\Str::limit($r->translated('excerpt'), 120) }}</p>
            @endif
            <span class="go">{{ __('website.blog.view_recipe') }}</span>
          </div>
        </a>
      @empty
        <p class="rv">{{ __('website.blog.empty_recipes') }}</p>
      @endforelse
    </div>
  </div>
</section>
