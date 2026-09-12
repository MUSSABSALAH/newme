@extends('mail.layout')

@section('content')
    @php($mailFont = \App\Modules\Notifications\Support\BrandMail::font())
    <p style="margin:0 0 14px;font-family:{{ $mailFont }};">{{ $greeting }}</p>
    <p style="margin:0 0 16px;font-family:{{ $mailFont }};">{{ $intro }}</p>
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;margin:0 0 16px;font-family:{{ $mailFont }};">
        <tr>
            <td style="padding:8px 0;border-bottom:1px solid #E4E4E4;font-size:12px;font-weight:bold;color:#4A4A4A;font-family:{{ $mailFont }};">{{ __('orders.fields.items') }}</td>
            <td style="padding:8px 0;border-bottom:1px solid #E4E4E4;font-size:12px;font-weight:bold;color:#4A4A4A;text-align:{{ app()->getLocale() === 'ar' ? 'left' : 'right' }};font-family:{{ $mailFont }};">{{ __('orders.fields.total') }}</td>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td style="padding:10px 0;border-bottom:1px solid #F0F0F0;font-family:{{ $mailFont }};">{{ $item['name'] }} × {{ $item['quantity'] }}</td>
                <td style="padding:10px 0;border-bottom:1px solid #F0F0F0;font-weight:bold;direction:ltr;text-align:{{ app()->getLocale() === 'ar' ? 'left' : 'right' }};font-family:{{ $mailFont }};">{{ $item['total'] }}</td>
            </tr>
        @endforeach
    </table>
    <p style="margin:0 0 8px;font-size:16px;font-weight:bold;color:#128C8C;font-family:{{ $mailFont }};">{{ $totalLine }}</p>
    @if (! empty($paymentLine))
        <p style="margin:0 0 8px;color:#555555;font-family:{{ $mailFont }};">{{ $paymentLine }}</p>
    @endif
    @if (! empty($deferredLine))
        <p style="margin:0 0 16px;color:#555555;font-family:{{ $mailFont }};">{{ $deferredLine }}</p>
    @endif
    @include('mail.partials.button', ['label' => $actionLabel, 'url' => $actionUrl])
    <p style="margin:16px 0 0;color:#777777;font-size:13px;font-family:{{ $mailFont }};">{{ $outro }}</p>
@endsection
