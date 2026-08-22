@extends('mail.layout')

@section('content')
    <p style="margin:0 0 14px;">{{ $greeting }}</p>
    <p style="margin:0 0 16px;">{{ $intro }}</p>
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#F4F7F7;border-right:4px solid #128C8C;margin:0 0 16px;">
        <tr>
            <td style="padding:14px 16px;">
                <div style="font-size:12px;color:#777777;">{{ __('invoices.fields.number') }}</div>
                <div style="font-size:18px;font-weight:bold;color:#111111;direction:ltr;">#{{ $number }}</div>
                <div style="margin-top:8px;font-size:13px;color:#555555;">{{ $introTotal }}</div>
                <div style="margin-top:10px;font-size:20px;font-weight:bold;color:#128C8C;">{{ $total }} {{ $currency }}</div>
            </td>
        </tr>
    </table>
    <p style="margin:0 0 18px;color:#555555;font-size:13px;">{{ $attached }}</p>
    @include('mail.partials.button', ['label' => $actionLabel, 'url' => $actionUrl])
@endsection
