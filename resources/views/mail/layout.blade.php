@php
    $isAr = app()->getLocale() === 'ar';
    $dir = $isAr ? 'rtl' : 'ltr';
    $align = $dir === 'rtl' ? 'right' : 'left';
    $mailFont = $isAr ? "'Cairo', Tahoma, Arial, sans-serif" : 'Tahoma, Arial, sans-serif';
    $logo = $logoUrl ?? url('/assets/images/logos/'.($isAr ? 'logo_ar.png' : 'logo_en.png'));
    $strip = $stripUrl ?? url('/assets/images/mail/renew-strip.jpg');
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ $dir }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>
    @if ($isAr)
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">
        <style type="text/css">
            @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap');
            html, body, table, td, th, p, div, span, a, strong, b, h1, h2, h3, li {
                font-family: 'Cairo', Tahoma, Arial, sans-serif !important;
            }
        </style>
    @endif
</head>
<body style="margin:0;padding:0;background:#F3F4F4;font-family:{{ $mailFont }};color:#1A1A1A;">
<table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#F3F4F4;padding:24px 0;font-family:{{ $mailFont }};">
    <tr>
        <td align="center" style="font-family:{{ $mailFont }};">
            <table role="presentation" width="600" cellspacing="0" cellpadding="0" style="width:600px;max-width:100%;background:#ffffff;border-radius:8px;overflow:hidden;border-collapse:collapse;font-family:{{ $mailFont }};">
                <tr>
                    <td width="564" valign="top" style="width:564px;padding:0;font-family:{{ $mailFont }};">
                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="font-family:{{ $mailFont }};">
                            <tr>
                                <td style="padding:22px 24px 16px;border-bottom:1px solid #E6E6E6;text-align:{{ $align }};font-family:{{ $mailFont }};">
                                    <img src="{{ $logo }}" alt="{{ __('website.brand') }}" width="168" style="display:block;border:0;width:168px;max-width:70%;height:auto;">
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:26px 24px 8px;text-align:{{ $align }};font-family:{{ $mailFont }};">
                                    <div style="font-size:20px;font-weight:bold;color:#128C8C;margin:0 0 6px;font-family:{{ $mailFont }};">{{ $heading }}</div>
                                    @if (! empty($subheading))
                                        <div style="font-size:13px;color:#C2186A;font-weight:bold;margin:0 0 16px;font-family:{{ $mailFont }};">{{ $subheading }}</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:0 24px 28px;text-align:{{ $align }};font-size:14px;line-height:1.7;color:#333333;font-family:{{ $mailFont }};">
                                    @yield('content')
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:16px 24px 22px;background:#FAFBFB;text-align:{{ $align }};font-family:{{ $mailFont }};">
                                    <div style="font-size:11px;font-weight:bold;color:#111111;margin-bottom:6px;font-family:{{ $mailFont }};">{{ __('mail.footer.made') }}</div>
                                    <div style="font-size:11px;color:#555555;line-height:1.6;font-family:{{ $mailFont }};">
                                        {{ __('mail.footer.distributed') }}<br>
                                        NEWME © Maysa Malik Yousuf Kurdy Trading Establishment<br>
                                        <span dir="ltr" style="font-family:{{ $mailFont }};">+966 53 336 0317</span>
                                        · info@newmeforever.com
                                        · www.newmeforever.com
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td width="36" valign="top" title="PREP - BAKE - RENEW · جدد حياتك" style="width:36px;max-width:36px;padding:0;border:0;font-size:0;line-height:0;background-image:url('{{ $strip }}');background-repeat:no-repeat;background-position:top center;background-size:100% 100%;">
                        <div style="width:36px;height:1px;font-size:0;line-height:0;">&nbsp;</div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
