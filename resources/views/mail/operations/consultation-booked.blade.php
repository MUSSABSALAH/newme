@extends('mail.layout')

@section('content')
    <p style="margin:0 0 14px;">{{ $greeting }}</p>
    <p style="margin:0 0 16px;">{{ $intro }}</p>
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#F4F7F7;border-right:4px solid #128C8C;margin:0 0 16px;">
        <tr>
            <td style="padding:16px;">
                <div style="font-size:12px;color:#C2186A;font-weight:bold;margin-bottom:8px;">{{ $whenLine }}</div>
                <div style="font-size:13px;color:#555555;">{{ $referenceLine }}</div>
                @if (! empty($goalLine))
                    <div style="font-size:13px;color:#555555;margin-top:6px;">{{ $goalLine }}</div>
                @endif
            </td>
        </tr>
    </table>
    <p style="margin:0 0 16px;color:#555555;">{{ $callAhead }}</p>
    @include('mail.partials.button', ['label' => $actionLabel, 'url' => $actionUrl])
    <p style="margin:16px 0 0;color:#777777;font-size:13px;">{{ $outro }}</p>
@endsection
