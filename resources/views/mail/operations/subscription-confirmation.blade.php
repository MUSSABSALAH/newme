@extends('mail.layout')

@section('content')
    @php($mailFont = \App\Modules\Notifications\Support\BrandMail::font())
    <p style="margin:0 0 14px;font-family:{{ $mailFont }};">{{ $greeting }}</p>
    <p style="margin:0 0 16px;font-family:{{ $mailFont }};">{{ $intro }}</p>
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#F4F7F7;margin:0 0 16px;font-family:{{ $mailFont }};">
        <tr>
            <td style="padding:16px;font-family:{{ $mailFont }};">
                <div style="font-size:12px;color:#C2186A;font-weight:bold;margin-bottom:8px;font-family:{{ $mailFont }};">{{ $plan }}</div>
                <div style="font-size:13px;color:#555555;font-family:{{ $mailFont }};">{{ $referenceLine }}</div>
                <div style="font-size:13px;color:#555555;font-family:{{ $mailFont }};">{{ $durationLine }}</div>
                @if (! empty($startLine))
                    <div style="font-size:13px;color:#555555;font-family:{{ $mailFont }};">{{ $startLine }}</div>
                @endif
                <div style="margin-top:10px;font-size:18px;font-weight:bold;color:#128C8C;font-family:{{ $mailFont }};">{{ $totalLine }}</div>
            </td>
        </tr>
    </table>
    @if (! empty($paymentLine))
        <p style="margin:0 0 8px;color:#555555;font-family:{{ $mailFont }};">{{ $paymentLine }}</p>
    @endif
    @if (! empty($deferredLine))
        <p style="margin:0 0 16px;color:#555555;font-family:{{ $mailFont }};">{{ $deferredLine }}</p>
    @endif
    @include('mail.partials.button', ['label' => $actionLabel, 'url' => $actionUrl])
    <p style="margin:16px 0 0;color:#777777;font-size:13px;font-family:{{ $mailFont }};">{{ $outro }}</p>
@endsection
