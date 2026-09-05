@extends('website.layouts.app')

@section('title', __('website.main.title'))
@section('theme', '#122B4A')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/website-v30.css') }}">
@endpush

@section('content')
@include('website.partials.v30-icons')

<div class="v30-desk home-desktop">
  @include('website.partials.v30-home')

  @php $shopProducts = $shopProducts ?? []; @endphp
  @if (count($shopProducts) > 0)
    @include('website.partials.v30-shop-rail', ['shopProducts' => $shopProducts, 'preview' => true])
  @endif

  @include('website.partials.v30-closing')
</div>

@include('website.partials.mobile-home')
@endsection
