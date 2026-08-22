@php
    /** @var \App\Modules\Invoices\DTOs\InvoiceParty $seller */
@endphp
<div style="font-family: dejavusans; color: #111111;">
    <div style="font-size: 6.4pt; font-weight: bold; line-height: 1.3;">
        صُنع بعناية وإتقان بواسطة نيومي©
    </div>
    <div style="font-size: 6.2pt; font-weight: bold; letter-spacing: 0.15pt; line-height: 1.3;">
        MADE WITH CARE BY NEWME
    </div>
    <div style="font-size: 5.8pt; margin-top: 1.1mm; line-height: 1.3;">
        DISTRIBUTED BY / موزّع بواسطة
    </div>
    <div style="font-size: 6pt; font-weight: bold; margin-top: 0.3mm; line-height: 1.3;">
        NEWME © Maysa Malik Yousuf Kurdy Trading Establishment
    </div>
    @if ($seller->name !== '' || $seller->taxNumber)
        <div style="font-size: 6pt; margin-top: 0.7mm; line-height: 1.35;">
            @if ($seller->name !== '')
                {{ $seller->name }}
            @endif
            @if ($seller->taxNumber)
                <span dir="ltr" style="white-space: nowrap;">VAT Registration No.: {{ $seller->taxNumber }}</span>
                / الرقم الضريبي
            @endif
        </div>
    @endif
</div>
