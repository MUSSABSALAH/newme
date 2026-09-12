@extends('mail.layout')

@section('content')
    <p style="margin:0 0 14px;font-family:{{ $mailFont }};">{{ $greeting }}</p>
    <p style="margin:0 0 18px;font-family:{{ $mailFont }};">{{ $intro }}</p>
    @include('mail.partials.button', ['label' => $actionLabel, 'url' => $actionUrl])
    <p style="margin:16px 0 8px;color:#555555;font-family:{{ $mailFont }};">{{ $expiry }}</p>
    <p style="margin:0;color:#777777;font-size:13px;font-family:{{ $mailFont }};">{{ $ignore }}</p>
@endsection
