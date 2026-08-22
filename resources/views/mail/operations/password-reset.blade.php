@extends('mail.layout')

@section('content')
    <p style="margin:0 0 14px;">{{ $greeting }}</p>
    <p style="margin:0 0 18px;">{{ $intro }}</p>
    @include('mail.partials.button', ['label' => $actionLabel, 'url' => $actionUrl])
    <p style="margin:16px 0 8px;color:#555555;">{{ $expiry }}</p>
    <p style="margin:0;color:#777777;font-size:13px;">{{ $ignore }}</p>
@endsection
