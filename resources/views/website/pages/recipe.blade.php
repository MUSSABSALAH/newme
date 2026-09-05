@extends('website.layouts.app')

@section('title', $recipe->translated('title').' — '.(app()->getLocale() === 'ar' ? 'نيومي' : 'New Me'))
@section('theme', '#122B4A')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/website-v30.css') }}">
@endpush

@section('content')
@include('website.partials.v30-icons')

<div class="v30-page kit-entry">

  <section class="section tile">
    <a class="kit-back" href="{{ route('website.blog') }}#recipes">← {{ __('website.blog.back') }}</a>
    <article class="kit-post rv in">
      @if ($recipe->imageUrl())
        <div class="kit-post-media">
          <img class="aiimg" loading="lazy" decoding="async" src="{{ $recipe->imageUrl() }}" alt="{{ $recipe->translated('title') }}" onerror="this.remove()">
        </div>
      @endif
      <div class="kit-post-meta">
        @if ($recipe->translated('category') !== '')<span class="kit-cat">{{ $recipe->translated('category') }}</span>@endif
        @if ($recipe->translated('meta_title') !== '')<span>{{ $recipe->translated('meta_title') }}</span>@endif
      </div>
      <h1>{{ $recipe->translated('title') }}</h1>
      <div class="kit-rmeta">
        @if ($recipe->translated('time_label') !== '')<span>{{ $recipe->translated('time_label') }}</span>@endif
        @if ($recipe->translated('kcal_label') !== '')<span>{{ $recipe->translated('kcal_label') }}</span>@endif
        @if ($recipe->translated('protein_label') !== '')<span>{{ $recipe->translated('protein_label') }}</span>@endif
        @if ($recipe->translated('servings_label') !== '')<span>{{ $recipe->translated('servings_label') }}</span>@endif
      </div>
      <div class="kit-rcols">
        <div class="kit-rbox">
          <h2>{{ __('website.blog.ingredients') }}</h2>
          <ul>
            @foreach ($recipe->listFor('ingredients') as $ing)<li>{{ $ing }}</li>@endforeach
          </ul>
        </div>
        <div class="kit-rbox">
          <h2>{{ __('website.blog.method') }}</h2>
          <ol>
            @foreach ($recipe->listFor('steps') as $step)<li>{{ $step }}</li>@endforeach
          </ol>
        </div>
      </div>
      @if ($recipe->translated('cta_label') !== '' && $recipe->cta_url)
        <a class="kit-cta" href="{{ $recipe->cta_url }}">{{ $recipe->translated('cta_label') }}</a>
      @endif
    </article>
  </section>

  <div class="v30-desk">
    @include('website.partials.v30-closing')
  </div>
</div>
@endsection
