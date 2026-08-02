@php
    use App\Support\Time\DisplayTime;

    $seller = $invoice->sellerParty();
    $buyer = $invoice->buyerParty();
    $lines = $invoice->invoiceLines();
    $align = $rtl ? 'right' : 'left';
    $opposite = $rtl ? 'left' : 'right';
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ $rtl ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <title>{{ $invoice->number }}</title>
    <style>
        body { color: #112944; font-size: 9.5pt; line-height: 1.55; }
        table { width: 100%; border-collapse: collapse; }
        .muted { color: #667788; }
        .tiny { font-size: 8pt; }
        .masthead td { vertical-align: top; padding-bottom: 4mm; }
        .brand { font-size: 15pt; font-weight: bold; }
        .doc-type { font-size: 12pt; font-weight: bold; }
        .parties td {
            width: 50%;
            vertical-align: top;
            padding: 3mm 4mm;
            border: 0.2mm solid #DDE4EA;
            background-color: #F5F7FA;
        }
        .party-title {
            font-size: 8pt;
            font-weight: bold;
            color: #667788;
            padding-bottom: 1.5mm;
        }
        .items { margin-top: 5mm; }
        .items th {
            background-color: #112944;
            color: #FFFFFF;
            font-size: 8.5pt;
            padding: 2.2mm 3mm;
            text-align: {{ $align }};
        }
        .items td { padding: 2.2mm 3mm; border-bottom: 0.2mm solid #DDE4EA; }
        .num { text-align: {{ $opposite }}; }
        .totals { margin-top: 5mm; }
        .totals td { vertical-align: top; }
        .totals-table td { padding: 1.6mm 3mm; }
        .totals-table .label { color: #667788; }
        .totals-table .grand td {
            background-color: #112944;
            color: #FFFFFF;
            font-weight: bold;
            font-size: 11pt;
        }
        .qr { text-align: center; }
        .footer {
            margin-top: 8mm;
            padding-top: 3mm;
            border-top: 0.2mm solid #DDE4EA;
            color: #667788;
            font-size: 8pt;
        }
    </style>
</head>
<body>
<table class="masthead">
    <tr>
        <td>
            <div class="brand">{{ $seller->name }}</div>
            @if ($seller->taxNumber)
                <div class="tiny muted">{{ __('invoices.pdf.vat_number') }}: {{ $seller->taxNumber }}</div>
            @endif
        </td>
        <td class="num">
            <div class="doc-type">{{ __('invoices.pdf.title') }}</div>
            <div class="tiny muted">{{ __('invoices.pdf.number') }}: {{ $invoice->number }}</div>
            <div class="tiny muted">{{ __('invoices.pdf.issued_at') }}: {{ DisplayTime::format($invoice->issued_at) }}</div>
        </td>
    </tr>
</table>

<table class="parties">
    <tr>
        <td>
            <div class="party-title">{{ __('invoices.pdf.seller') }}</div>
            <div>{{ $seller->name }}</div>
            @if ($seller->address)
                <div class="tiny muted">{{ $seller->address }}</div>
            @endif
            @if ($seller->phone)
                <div class="tiny muted">{{ $seller->phone }}</div>
            @endif
            @if ($seller->email)
                <div class="tiny muted">{{ $seller->email }}</div>
            @endif
        </td>
        <td>
            <div class="party-title">{{ __('invoices.pdf.buyer') }}</div>
            <div>{{ $buyer->name }}</div>
            @if ($buyer->address)
                <div class="tiny muted">{{ $buyer->address }}</div>
            @endif
            @if ($buyer->phone)
                <div class="tiny muted">{{ $buyer->phone }}</div>
            @endif
            @if ($buyer->email)
                <div class="tiny muted">{{ $buyer->email }}</div>
            @endif
        </td>
    </tr>
</table>

<table class="items">
    <thead>
    <tr>
        <th>{{ __('invoices.pdf.description') }}</th>
        <th class="num" width="14%">{{ __('invoices.pdf.quantity') }}</th>
        <th class="num" width="20%">{{ __('invoices.pdf.unit_price') }}</th>
        <th class="num" width="22%">{{ __('invoices.pdf.line_total') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($lines as $line)
        <tr>
            <td>{{ $line->description }}</td>
            <td class="num">{{ $line->quantity }}</td>
            <td class="num">{{ $line->unitPriceDisplay() }}</td>
            <td class="num">{{ $line->lineTotalDisplay() }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<table class="totals">
    <tr>
        <td width="42%" class="qr">
            @if ($qr)
                <img src="{{ $qr }}" width="90" height="90">
                <div class="tiny muted">{{ __('invoices.pdf.qr_hint') }}</div>
            @endif
        </td>
        <td>
            <table class="totals-table">
                <tr>
                    <td class="label">{{ __('invoices.pdf.lines_total') }}</td>
                    <td class="num">{{ $invoice->linesTotalDisplay() }}</td>
                </tr>
                @if ($invoice->hasDiscount())
                    <tr>
                        <td class="label">{{ __('invoices.pdf.discount') }}</td>
                        <td class="num">−{{ $invoice->discountDisplay() }}</td>
                    </tr>
                @endif
                <tr>
                    <td class="label">{{ __('invoices.pdf.net') }}</td>
                    <td class="num">{{ $invoice->netDisplay() }}</td>
                </tr>
                <tr>
                    <td class="label">{{ __('invoices.pdf.tax', ['rate' => $invoice->taxRateDisplay()]) }}</td>
                    <td class="num">{{ $invoice->taxDisplay() }}</td>
                </tr>
                <tr class="grand">
                    <td>{{ __('invoices.pdf.total') }}</td>
                    <td class="num">{{ $invoice->totalDisplay() }} {{ __('invoices.pdf.currency') }}</td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<div class="footer">
    {{ __('invoices.pdf.reference', ['reference' => $invoice->invoiceable?->reference() ?? '—']) }}
    · {{ __('invoices.pdf.generated') }}
</div>
</body>
</html>
