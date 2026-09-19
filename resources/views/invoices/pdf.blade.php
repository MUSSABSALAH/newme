@php
    use App\Support\Time\DisplayTime;

    $seller = $invoice->sellerParty();
    $buyer = $invoice->buyerParty();
    $lines = $invoice->invoiceLines();
    $payment = $invoice->payment;
    $issuedOn = $invoice->issued_at?->copy()->timezone(DisplayTime::timezone());
    $issuedDate = $issuedOn?->format('d / m / Y') ?? '—';
    $issuedAt = DisplayTime::format($invoice->issued_at, 'd / m / Y  H:i') ?? '—';
    $wAmount = '15%';
    $wQty = '13%';
    $wUnit = '24%';
    $wDesc = '48%';
    $wKeys = '28%';
    $factRows = 4 + ($seller->taxNumber ? 1 : 0);
    $payRows = 3 + ($invoice->hasDiscount() ? 1 : 0);
@endphp
<!DOCTYPE html>
<html lang="ar" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>{{ $invoice->number }}</title>
    <style>
        body {
            font-family: cairo;
            color: #1A1A1A;
            font-size: 9pt;
            line-height: 1.5;
        }
        table { width: 100%; border-collapse: collapse; }
        .muted { color: #7A7A7A; }
        .tiny { font-size: 7.5pt; }
        .ltr { direction: ltr; unicode-bidi: embed; }
        .bi { direction: ltr; unicode-bidi: embed; white-space: nowrap; }
        .type {
            font-size: 11pt;
            font-weight: bold;
            color: #128C8C;
            padding: 0 0 3.5mm;
            text-align: left;
        }
        .grid { width: 100%; }
        .grid td,
        .grid th { vertical-align: top; }
        .pad-l { padding-left: 1.5mm; padding-right: 1.5mm; }
        .left { text-align: left; }
        .right { text-align: right; }
        .heading {
            font-size: 11pt;
            font-weight: bold;
            color: #C2186A;
            padding: 0 1.5mm 4mm;
        }
        .name { font-size: 11pt; font-weight: bold; padding-top: 2.2mm; padding-bottom: 0.6mm; }
        .stack { padding: 0.35mm 0; }
        .facts td {
            padding: 0.45mm 1.5mm;
            vertical-align: middle;
            font-size: 8.5pt;
        }
        .facts .k {
            color: #7A7A7A;
            text-align: left;
            white-space: nowrap;
        }
        .facts .v {
            text-align: right;
            font-weight: bold;
            direction: ltr;
            white-space: nowrap;
        }
        .to {
            text-align: right;
            padding-left: 5mm;
            padding-right: 1.5mm;
        }
        .items { margin-top: 1mm; }
        .items th {
            font-size: 8.5pt;
            font-weight: bold;
            color: #4A4A4A;
            padding: 2mm 1.5mm 2.2mm;
            border-bottom: 0.25mm solid #C8C8C8;
            white-space: nowrap;
        }
        .items td {
            padding: 2.6mm 1.5mm;
            vertical-align: middle;
            border-bottom: 0.15mm solid #E4E4E4;
        }
        .items th.amount,
        .items td.amount {
            text-align: left;
            padding-left: 1.5mm;
            padding-right: 1.5mm;
        }
        .items td.amount { direction: ltr; font-weight: bold; }
        .items th.qty,
        .items th.unit,
        .items td.qty,
        .items td.unit {
            text-align: right;
            font-weight: bold;
        }
        .items td.qty,
        .items td.unit { direction: ltr; }
        .items th.desc,
        .items td.desc {
            text-align: right;
            padding-right: 2.6mm;
        }
        .items .title { font-weight: bold; }
        .lower { width: 100%; margin-top: 3.5mm; }
        .lower td { vertical-align: middle; }
        .lower .num {
            text-align: left;
            font-weight: bold;
            direction: ltr;
            padding: 0.55mm 1.5mm;
            white-space: nowrap;
        }
        .lower .label {
            color: #555555;
            font-weight: bold;
            text-align: right;
            white-space: nowrap;
            padding: 0.55mm 1.5mm;
        }
        .lower .pay {
            text-align: right;
            vertical-align: bottom;
            padding: 0 1.5mm 0.55mm 5mm;
        }
        .grand-brands {
            color: #7A7A7A;
            font-size: 7.5pt;
            text-align: right;
            padding: 0.6mm 1.5mm 0 5mm;
            white-space: nowrap;
        }
        .pay-title {
            font-weight: bold;
            padding-bottom: 0.35mm;
        }
        .pay-line { padding: 0; }
        .grand .num,
        .grand .label {
            color: #128C8C;
            font-weight: bold;
            font-size: 12pt;
            padding-top: 0.8mm;
            border-top: 0.2mm solid #C8C8C8;
            white-space: nowrap;
        }
    </style>
</head>
<body>
<div class="type"><span class="bi">Simplified Tax Invoice / فاتورة ضريبية مبسطة</span></div>

<table class="grid facts">
    <tr>
        <td class="heading left" width="{{ $wKeys }}" align="left">
            <span class="bi">Invoice Details / بيانات الفاتورة</span>
        </td>
        <td width="{{ $wUnit }}"></td>
        <td class="heading to" width="{{ $wDesc }}" align="right">
            <span class="bi">To / إلى</span>
        </td>
    </tr>
    <tr>
        <td class="k" width="{{ $wKeys }}" align="left">
            <span class="bi">Invoice Date / تاريخ الإصدار</span>
        </td>
        <td class="v" width="{{ $wUnit }}" align="right" dir="ltr">{{ $issuedAt }}</td>
        <td class="to" width="{{ $wDesc }}" align="right" dir="rtl" rowspan="{{ $factRows }}">
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
    <tr>
        <td class="k" width="{{ $wKeys }}" align="left">
            <span class="bi">Supply Date / تاريخ التوريد</span>
        </td>
        <td class="v" width="{{ $wUnit }}" align="right" dir="ltr">{{ $issuedDate }}</td>
    </tr>
    <tr>
        <td class="k" width="{{ $wKeys }}" align="left">
            <span class="bi">Invoice No. / رقم الفاتورة</span>
        </td>
        <td class="v" width="{{ $wUnit }}" align="right" dir="ltr">#{{ $invoice->number }}</td>
    </tr>
    @if ($seller->taxNumber)
        <tr>
            <td class="k" width="{{ $wKeys }}" align="left">
                <span class="bi">VAT No. / الرقم الضريبي</span>
            </td>
            <td class="v" width="{{ $wUnit }}" align="right" dir="ltr">{{ $seller->taxNumber }}</td>
        </tr>
    @endif
    <tr>
        <td class="k" width="{{ $wKeys }}" align="left">
            <span class="bi">Seller / البائع</span>
        </td>
        <td class="v" width="{{ $wUnit }}" align="right">{{ $seller->name }}</td>
    </tr>
</table>

<table class="grid items">
    <thead>
    <tr>
        <th class="amount" align="left" width="{{ $wAmount }}">
            <span class="bi">Amount / المبلغ</span>
        </th>
        <th class="qty" align="right" width="{{ $wQty }}">
            <span class="bi">Qty / الكمية</span>
        </th>
        <th class="unit" align="right" width="{{ $wUnit }}">
            <span class="bi">Unit Price / سعر الوحدة</span>
        </th>
        <th class="desc" align="right" width="{{ $wDesc }}">
            <span class="bi">Item Descriptions / البيان</span>
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach ($lines as $line)
        <tr>
            <td class="amount" align="left" dir="ltr" width="{{ $wAmount }}">{{ $line->lineTotalDisplay() }}</td>
            <td class="qty" align="right" dir="ltr" width="{{ $wQty }}">{{ $line->quantity }}</td>
            <td class="unit" align="right" dir="ltr" width="{{ $wUnit }}">{{ $line->unitPriceDisplay() }}</td>
            <td class="desc" align="right" dir="rtl" width="{{ $wDesc }}">
                <div class="title">{{ $line->description }}</div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<table class="grid lower">
    <tr>
        <td class="num" width="{{ $wAmount }}" align="left" dir="ltr">{{ $invoice->linesTotalDisplay() }}</td>
        <td class="label" width="37%" align="right">
            <span class="bi">Sub Total / المجموع</span>
        </td>
        <td class="pay" width="{{ $wDesc }}" align="right" dir="rtl" rowspan="{{ $payRows }}">
            <div class="pay-title"><span class="bi">Payment Method / طريقة الدفع</span></div>
            <div class="pay-line">{{ $payment?->method->label() ?? '—' }}</div>
            @if ($payment?->cardLabel())
                <div class="pay-line tiny muted"><span class="ltr">{{ $payment->cardLabel() }}</span></div>
            @endif
        </td>
    </tr>
    @if ($invoice->hasDiscount())
        <tr>
            <td class="num" width="{{ $wAmount }}" align="left" dir="ltr">−{{ $invoice->discountDisplay() }}</td>
            <td class="label" width="37%" align="right">
                <span class="bi">Discount / الخصم</span>
            </td>
        </tr>
    @endif
    <tr>
        <td class="num" width="{{ $wAmount }}" align="left" dir="ltr">{{ $invoice->netDisplay() }}</td>
        <td class="label" width="37%" align="right">
            <span class="bi">Taxable / الخاضع للضريبة</span>
        </td>
    </tr>
    <tr>
        <td class="num" width="{{ $wAmount }}" align="left" dir="ltr">{{ $invoice->taxDisplay() }}</td>
        <td class="label" width="37%" align="right">
            <span class="bi">VAT {{ $invoice->taxRateDisplay() }}% / ضريبة القيمة المضافة</span>
        </td>
    </tr>
    <tr class="grand">
        <td class="num" width="{{ $wAmount }}" align="left" dir="ltr">{{ $invoice->totalDisplay() }} {{ __('invoices.pdf.currency') }}</td>
        <td class="label" width="37%" align="right">
            <span class="bi">GRAND TOTAL / الإجمالي</span>
        </td>
        <td class="grand-brands" width="{{ $wDesc }}" align="right" dir="ltr">مدى · فيزا · ماستركارد · Apple Pay</td>
    </tr>
</table>
</body>
</html>
