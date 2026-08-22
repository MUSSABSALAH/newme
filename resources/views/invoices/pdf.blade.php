@php
    use App\Support\Time\DisplayTime;

    $seller = $invoice->sellerParty();
    $buyer = $invoice->buyerParty();
    $lines = $invoice->invoiceLines();
    $payment = $invoice->payment;
    $issuedOn = $invoice->issued_at?->copy()->timezone(DisplayTime::timezone());
    $issuedDate = $issuedOn?->format('d / m / Y') ?? '—';
    $issuedAt = DisplayTime::format($invoice->issued_at, 'd / m / Y  H:i') ?? '—';
@endphp
<!DOCTYPE html>
<html lang="ar" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>{{ $invoice->number }}</title>
    <style>
        body {
            color: #1A1A1A;
            font-size: 9pt;
            line-height: 1.5;
        }
        table { width: 100%; border-collapse: collapse; }
        .muted { color: #7A7A7A; }
        .tiny { font-size: 7.5pt; }
        .ltr { direction: ltr; unicode-bidi: embed; }
        .type {
            font-size: 11pt;
            font-weight: bold;
            color: #128C8C;
            padding: 0 4px 3.5mm 0;
            text-align: right;
        }
        .meta { margin-bottom: 5mm; }
        .meta td { vertical-align: top; width: 50%; padding: 0; }
        .meta .start {
            text-align: left;
            padding-right: 6mm;
        }
        .meta .end {
            text-align: right;
            padding-left: 6mm;
            padding-right: 4px;
        }
        .heading {
            font-size: 11pt;
            font-weight: bold;
            color: #C2186A;
            padding-bottom: 2mm;
        }
        .name { font-size: 11pt; font-weight: bold; padding-bottom: 0.6mm; }
        .stack { padding: 0.35mm 0; }
        .facts { width: 100%; }
        .facts td {
            padding: 0.45mm 0;
            vertical-align: top;
            font-size: 8.5pt;
        }
        .facts .k {
            color: #7A7A7A;
            padding-right: 3mm;
            white-space: nowrap;
        }
        .facts .v {
            text-align: left;
            font-weight: bold;
        }
        .items { margin-top: 1mm; }
        .items th {
            font-size: 8.5pt;
            font-weight: bold;
            color: #4A4A4A;
            padding: 2mm 1.5mm 2.2mm;
            border-bottom: 0.25mm solid #C8C8C8;
        }
        .items td {
            padding: 2.6mm 1.5mm;
            vertical-align: middle;
            border-bottom: 0.15mm solid #E4E4E4;
        }
        .items th.desc {
            text-align: right;
            padding: 2mm 2.6mm 2.2mm 1.5mm;
        }
        .items td.desc {
            text-align: right;
            padding: 2.6mm 2.6mm 2.6mm 1.5mm;
        }
        .items .title { font-weight: bold; }
        .items .num,
        .items th.num {
            text-align: left;
            font-weight: bold;
            direction: ltr;
        }
        .lower { margin-top: 6mm; }
        .lower > tbody > tr > td { vertical-align: top; padding: 0; }
        .lower .start { text-align: left; padding-right: 5mm; }
        .lower .end { text-align: right; padding-left: 5mm; }
        .pay-title {
            font-weight: bold;
            padding-bottom: 1.2mm;
        }
        .pay-line { padding: 0.3mm 0; }
        .totals { width: auto; }
        .totals td { padding: 1.1mm 0; vertical-align: baseline; }
        .totals .num {
            text-align: left;
            font-weight: bold;
            direction: ltr;
            padding-right: 5mm;
            white-space: nowrap;
        }
        .totals .label {
            color: #555555;
            font-weight: bold;
            text-align: right;
            white-space: nowrap;
        }
        .grand td {
            color: #128C8C;
            font-weight: bold;
            font-size: 12pt;
            padding-top: 2.8mm;
            border-top: 0.2mm solid #C8C8C8;
        }
    </style>
</head>
<body>
<div class="type">
    فاتورة ضريبية مبسطة<br>
    <span class="tiny muted">Simplified Tax Invoice</span>
</div>

<table class="meta">
    <tr>
        <td class="start" align="left" dir="ltr">
            <div class="heading">بيانات الفاتورة &nbsp; Invoice Details</div>
            <table class="facts">
                <tr>
                    <td class="k">تاريخ الإصدار / Invoice Date</td>
                    <td class="v"><span class="ltr">{{ $issuedAt }}</span></td>
                </tr>
                <tr>
                    <td class="k">تاريخ التوريد / Supply Date</td>
                    <td class="v"><span class="ltr">{{ $issuedDate }}</span></td>
                </tr>
                <tr>
                    <td class="k">رقم الفاتورة / Invoice No.</td>
                    <td class="v"><span class="ltr">#{{ $invoice->number }}</span></td>
                </tr>
                @if ($seller->taxNumber)
                    <tr>
                        <td class="k">الرقم الضريبي / VAT No.</td>
                        <td class="v"><span class="ltr">{{ $seller->taxNumber }}</span></td>
                    </tr>
                @endif
                <tr>
                    <td class="k">البائع / Seller</td>
                    <td class="v">{{ $seller->name }}</td>
                </tr>
            </table>
        </td>
        <td class="end" align="right" dir="rtl">
            <div class="heading">إلى / To:</div>
            <div class="name">{{ $buyer->name }}</div>
            @if ($buyer->address)
                <div class="stack tiny muted">{{ $buyer->address }}</div>
            @endif
            @if ($buyer->phone)
                <div class="stack tiny muted"><span class="ltr">{{ $buyer->phone }}</span></div>
            @endif
            @if ($buyer->email)
                <div class="stack tiny muted"><span class="ltr">{{ $buyer->email }}</span></div>
            @endif
        </td>
    </tr>
</table>

<table class="items">
    <thead>
    <tr>
        <th class="num" align="left" width="18%">المبلغ<br><span class="tiny">Amount</span></th>
        <th class="num" align="left" width="10%">الكمية<br><span class="tiny">Qty</span></th>
        <th class="num" align="left" width="18%">سعر الوحدة<br><span class="tiny">Unit Price</span></th>
        <th class="desc" align="right">البيان / Item Descriptions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($lines as $line)
        <tr>
            <td class="num" align="left">{{ $line->lineTotalDisplay() }}</td>
            <td class="num" align="left">{{ $line->quantity }}</td>
            <td class="num" align="left">{{ $line->unitPriceDisplay() }}</td>
            <td class="desc" align="right" dir="rtl">
                <div class="title">{{ $line->description }}</div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<table class="lower">
    <tr>
        <td class="start" width="44%" align="left" dir="ltr">
            <table class="totals">
                <tr>
                    <td class="num" align="left">{{ $invoice->linesTotalDisplay() }}</td>
                    <td class="label" align="right">المجموع / Sub Total</td>
                </tr>
                @if ($invoice->hasDiscount())
                    <tr>
                        <td class="num" align="left">−{{ $invoice->discountDisplay() }}</td>
                        <td class="label" align="right">الخصم / Discount</td>
                    </tr>
                @endif
                <tr>
                    <td class="num" align="left">{{ $invoice->netDisplay() }}</td>
                    <td class="label" align="right">الخاضع للضريبة / Taxable</td>
                </tr>
                <tr>
                    <td class="num" align="left">{{ $invoice->taxDisplay() }}</td>
                    <td class="label" align="right">ضريبة القيمة المضافة {{ $invoice->taxRateDisplay() }}% / VAT</td>
                </tr>
                <tr class="grand">
                    <td class="num" align="left">{{ $invoice->totalDisplay() }} {{ __('invoices.pdf.currency') }}</td>
                    <td class="label" align="right">الإجمالي / GRAND TOTAL</td>
                </tr>
            </table>
        </td>
        <td class="end" width="56%" align="right" dir="rtl">
            <div class="pay-title">طريقة الدفع / Payment Method</div>
            <div class="pay-line">{{ $payment?->method->label() ?? '—' }}</div>
            @if ($payment?->cardLabel())
                <div class="pay-line tiny muted"><span class="ltr">{{ $payment->cardLabel() }}</span></div>
            @endif
            <div class="pay-line tiny muted">مدى · فيزا · ماستركارد · Apple Pay</div>
        </td>
    </tr>
</table>
</body>
</html>
