@php
    /** @var list<array<string, mixed>> $labels */
    /** @var array{name: string, phone: string} $sender */
@endphp
<html>
<head>
    <style>
        body { font-family: cairo; font-size: 9pt; color: #111; }
        .head { width: 100%; border-bottom: 0.4mm solid #111; padding-bottom: 1.5mm; }
        .head td { vertical-align: middle; }
        .brand { font-size: 12pt; font-weight: bold; }
        .kind { font-size: 8pt; color: #444; }
        .barcode { text-align: center; padding: 2.5mm 0 1mm; }
        .code { text-align: center; font-size: 8pt; letter-spacing: 0.3mm; direction: ltr; }
        .ref { text-align: center; font-size: 14pt; font-weight: bold; direction: ltr; padding-bottom: 1.5mm; }
        .box { width: 100%; border: 0.3mm solid #111; margin-top: 2mm; }
        .box td { padding: 1.2mm 2mm; vertical-align: top; }
        .label { font-size: 7pt; color: #555; }
        .value { font-size: 10pt; font-weight: bold; }
        .ltr { direction: ltr; }
        .cod { border: 0.6mm solid #111; text-align: center; padding: 2mm; margin-top: 2mm; font-size: 13pt; font-weight: bold; }
        .paid { border: 0.3mm dashed #555; text-align: center; padding: 1.5mm; margin-top: 2mm; font-size: 10pt; }
        .foot { width: 100%; margin-top: 2mm; }
        .foot td { vertical-align: middle; font-size: 7.5pt; }
    </style>
</head>
<body>
@forelse ($labels as $label)
    @if (! $loop->first)
        <pagebreak />
    @endif

    <table class="head">
        <tr>
            <td>
                <div class="brand">{{ $sender['name'] }}</div>
                @if ($sender['phone'] !== '')
                    <div class="kind ltr">{{ $sender['phone'] }}</div>
                @endif
            </td>
            <td style="text-align: left;">
                <div class="kind">{{ $label['kind'] }}</div>
                <div class="kind ltr">{{ $label['date'] }}</div>
            </td>
        </tr>
    </table>

    <div class="barcode">
        <barcode code="{{ $label['barcode'] }}" type="C128B" size="0.72" height="1.3" />
    </div>
    <div class="code">{{ $label['barcode'] }}</div>
    <div class="ref">#{{ $label['reference'] }}</div>

    <table class="box">
        <tr>
            <td>
                <div class="label">{{ __('deliveries.waybill.recipient') }}</div>
                <div class="value">{{ $label['name'] }}</div>
                @if ($label['phone'] !== '')
                    <div class="value ltr">{{ $label['phone'] }}</div>
                @endif
            </td>
        </tr>
        <tr>
            <td>
                <div class="label">{{ __('deliveries.fields.address') }}</div>
                <div>{{ $label['address'] !== '' ? $label['address'] : __('deliveries.fields.no_address') }}</div>
                @if ($label['details'])
                    <div>{{ $label['details'] }}</div>
                @endif
            </td>
        </tr>
        @if ($label['contents'] !== '')
            <tr>
                <td>
                    <div class="label">{{ __('deliveries.waybill.contents') }}</div>
                    <div>{{ $label['contents'] }}</div>
                </td>
            </tr>
        @endif
        @if ($label['note'])
            <tr>
                <td>
                    <div class="label">{{ __('deliveries.waybill.note') }}</div>
                    <div>{{ $label['note'] }}</div>
                </td>
            </tr>
        @endif
    </table>

    @if ($label['collect'])
        <div class="cod">{{ __('deliveries.waybill.collect') }}: <span class="ltr">{{ $label['collect'] }}</span> {{ __('deliveries.waybill.sar') }}</div>
    @else
        <div class="paid">{{ __('deliveries.waybill.paid') }}</div>
    @endif

    <table class="foot">
        <tr>
            <td>
                <div class="label">{{ __('deliveries.waybill.job_id') }}</div>
                <div class="value ltr">{{ $label['job_id'] ?? '—' }}</div>
            </td>
            @if ($label['tracking'])
                <td style="text-align: left; width: 22mm;">
                    <barcode code="{{ $label['tracking'] }}" type="QR" size="0.55" error="M" disableborder="1" />
                </td>
            @endif
        </tr>
    </table>
@empty
    <p>{{ __('deliveries.waybill.empty') }}</p>
@endforelse
</body>
</html>
