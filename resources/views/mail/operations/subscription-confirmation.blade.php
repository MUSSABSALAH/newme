@extends('mail.layout')

@section('content')
    <p style="margin:0 0 14px;">{{ $greeting }}</p>
    <p style="margin:0 0 16px;">{{ $intro }}</p>
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#F4F7F7;margin:0 0 16px;">
        <tr>
            <td style="padding:16px;">
                <div style="font-size:12px;color:#C2186A;font-weight:bold;margin-bottom:8px;">{{ $plan }}</div>
                <div style="font-size:13px;color:#555555;">{{ $referenceLine }}</div>
                <div style="font-size:13px;color:#555555;">{{ $durationLine }}</div>
                @if (! empty($startLine))
                    <div style="font-size:13px;color:#555555;">{{ $startLine }}</div>
                @endif
                <div style="margin-top:10px;font-size:18px;font-weight:bold;color:#128C8C;">{{ $totalLine }}</div>
            </td>
        </tr>
    </table>
    @if (! empty($paymentLine))
        <p style="margin:0 0 8px;color:#555555;">{{ $paymentLine }}</p>
    @endif
    @if (! empty($deferredLine))
        <p style="margin:0 0 16px;color:#555555;">{{ $deferredLine }}</p>
    @endif
    @include('mail.partials.button', ['label' => $actionLabel, 'url' => $actionUrl])
    <p style="margin:16px 0 0;color:#777777;font-size:13px;">{{ $outro }}</p>
@endsection
