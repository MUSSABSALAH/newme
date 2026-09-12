@extends('mail.layout')

@section('content')
    @php($mailFont = \App\Modules\Notifications\Support\BrandMail::font())
    <p style="margin:0 0 14px;font-family:{{ $mailFont }};">{{ $greeting }}</p>
    <p style="margin:0 0 16px;font-family:{{ $mailFont }};">{{ $intro }}</p>
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#F4F7F7;border-right:4px solid #128C8C;margin:0 0 16px;font-family:{{ $mailFont }};">
        <tr>
            <td style="padding:14px 16px;font-family:{{ $mailFont }};">
                <div style="font-size:12px;color:#777777;font-family:{{ $mailFont }};">{{ __('invoices.fields.number') }}</div>
                <div style="font-size:18px;font-weight:bold;color:#111111;direction:ltr;font-family:{{ $mailFont }};">#{{ $number }}</div>
                <div style="margin-top:8px;font-size:13px;color:#555555;font-family:{{ $mailFont }};">{{ $introTotal }}</div>
                <div style="margin-top:10px;font-size:20px;font-weight:bold;color:#128C8C;font-family:{{ $mailFont }};">{{ $total }} {{ $currency }}</div>
            </td>
        </tr>
    </table>
    <p style="margin:0 0 18px;color:#555555;font-size:13px;font-family:{{ $mailFont }};">{{ $attached }}</p>
    @include('mail.partials.button', ['label' => $actionLabel, 'url' => $actionUrl])
@endsection
