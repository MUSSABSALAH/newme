@extends('website.layouts.app')

@section('title', $article->translated('title').' — '.(app()->getLocale() === 'ar' ? 'نيومي' : 'New Me'))
@section('theme', '#122B4A')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/website-v30.css') }}">
@endpush

@section('content')
@include('website.partials.v30-icons')

<div class="v30-page kit-entry">

  <section class="section tile">
    <a class="kit-back" href="{{ route('website.blog') }}">← {{ __('website.blog.back') }}</a>
    <article class="kit-post rv in">
      @if ($article->imageUrl())
        <div class="kit-post-media">
          <img class="aiimg" loading="lazy" decoding="async" src="{{ $article->imageUrl() }}" alt="{{ $article->translated('title') }}" onerror="this.remove()">
        </div>
      @endif
      <div class="kit-post-meta">
        @if ($article->translated('category') !== '')<span class="kit-cat">{{ $article->translated('category') }}</span>@endif
        @if ($article->translated('read_time') !== '')<span>{{ $article->translated('read_time') }}</span>@endif
        @if ($article->translated('author') !== '')<span>{{ $article->translated('author') }}</span>@endif
      </div>
      <h1>{{ $article->translated('title') }}</h1>
      @if ($article->translated('body_1') !== '')<p>{{ $article->translated('body_1') }}</p>@endif
      @if ($article->translated('body_2') !== '')<p>{{ $article->translated('body_2') }}</p>@endif
      @if ($article->translated('highlight') !== '')<div class="kit-hl">{{ $article->translated('highlight') }}</div>@endif
      @if ($article->translated('body_3') !== '')<p>{{ $article->translated('body_3') }}</p>@endif
      @if ($article->translated('cta_label') !== '' && $article->cta_url)
        <a class="kit-cta" href="{{ $article->cta_url }}">{{ $article->translated('cta_label') }}</a>
      @endif
    </article>
  </section>

  <div class="v30-desk">
    @include('website.partials.v30-closing')
  </div>
</div>
@endsection
