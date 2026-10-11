@php
    use App\Support\Money\Money;

    $money = static fn (int $minor): string => Money::fromMinor($minor)->format();
    $share = static fn (int $part, int $whole): string => $whole > 0 ? number_format($part / $whole * 100, 1).'%' : '—';
    $currency = __('invoices.pdf.currency');
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ $rtl ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: dejavusans, sans-serif; color: #12233B; font-size: 8.5pt; }
        table { border-collapse: collapse; width: 100%; }

        .heading {
            font-size: 11.5pt;
            font-weight: bold;
            color: #122B4A;
            margin: 14px 0 6px;
        }
        .period { color: #7C8799; font-size: 8.5pt; margin-bottom: 8px; }

        .kpis td {
            width: 25%;
            padding: 8px 8px;
            background: #F7F5F1;
            border: 1px solid #E8E4DC;
            text-align: center;
            vertical-align: top;
        }
        .kpis .num { font-size: 12.5pt; font-weight: bold; color: #122B4A; }
        .kpis .lbl { font-size: 7.5pt; color: #7C8799; font-weight: bold; }
        .kpis .sub { font-size: 7.5pt; color: #43536A; }

        .grid th {
            background: #122B4A;
            color: #FFFFFF;
            font-size: 7.8pt;
            padding: 5px 5px;
            text-align: {{ $rtl ? 'right' : 'left' }};
        }
        .grid th.n, .grid td.n { text-align: {{ $rtl ? 'left' : 'right' }}; }
        .grid td {
            padding: 4px 5px;
            border-bottom: 1px solid #E8E4DC;
            vertical-align: top;
        }
        .grid tr.alt td { background: #FAF9F6; }
        .grid tr.total td {
            background: #F0EDE6;
            border-top: 2px solid #122B4A;
            font-weight: bold;
        }
        .grid .group th { background: #2C4A6E; font-size: 7.5pt; text-align: center; }
        /* Vertical rule closing a column group in the monthly table. */
        .grid th.sep, .grid td.sep { border-{{ $rtl ? 'left' : 'right' }}: 1.5px solid #122B4A; }
        .grid th.sep { border-{{ $rtl ? 'left' : 'right' }}-color: #FFFFFF; }
        .muted { color: #7C8799; }
        .ltr { direction: ltr; }
        .up { color: #1F7A4D; font-weight: bold; }
        .down { color: #B42318; font-weight: bold; }
        .block { page-break-inside: avoid; }
        .note { margin-top: 6px; color: #9A4B12; font-weight: bold; }
        .empty { color: #7C8799; padding: 40px 0; text-align: center; }
    </style>
</head>
<body>
    {{-- Overview --}}
    <div class="heading" style="margin-top:0;">{{ __('invoices.report.overview') }}</div>
    @if ($summary['first'])
        <div class="period">
            {{ __('invoices.report.period', [
                'from' => $summary['first']->translatedFormat('d M Y'),
                'to' => $summary['last']->translatedFormat('d M Y'),
            ]) }}
        </div>
    @endif

    <table class="kpis block">
        <tr>
            <td>
                <div class="num">{{ $money($summary['total']) }}</div>
                <div class="lbl">{{ __('invoices.report.sales') }} ({{ $currency }})</div>
            </td>
            <td>
                <div class="num">{{ $summary['count'] }}</div>
                <div class="lbl">{{ __('invoices.report.count') }}</div>
            </td>
            <td>
                <div class="num">{{ $money($summary['average']) }}</div>
                <div class="lbl">{{ __('invoices.report.average') }} ({{ $currency }})</div>
            </td>
            <td>
                <div class="num">{{ $summary['best']['label'] ?? '—' }}</div>
                <div class="lbl">{{ __('invoices.report.best_month') }}</div>
                @if ($summary['best'])
                    <div class="sub">{{ $money($summary['best']['total']) }} {{ $currency }}</div>
                @endif
            </td>
        </tr>
        <tr>
            <td>
                <div class="num">{{ $money($summary['net']) }}</div>
                <div class="lbl">{{ __('invoices.report.net') }} ({{ $currency }})</div>
            </td>
            <td>
                <div class="num">{{ $money($summary['tax']) }}</div>
                <div class="lbl">{{ __('invoices.report.tax') }} ({{ $currency }})</div>
            </td>
            <td>
                <div class="num">{{ $money($summary['store']['total']) }}</div>
                <div class="lbl">{{ __('invoices.report.store_sales') }} ({{ $currency }})</div>
                <div class="sub">{{ __('invoices.report.share_of', ['count' => $summary['store']['count'], 'share' => $share($summary['store']['total'], $summary['total'])]) }}</div>
            </td>
            <td>
                <div class="num">{{ $money($summary['subscriptions']['total']) }}</div>
                <div class="lbl">{{ __('invoices.report.subscription_sales') }} ({{ $currency }})</div>
                <div class="sub">{{ __('invoices.report.share_of', ['count' => $summary['subscriptions']['count'], 'share' => $share($summary['subscriptions']['total'], $summary['total'])]) }}</div>
            </td>
        </tr>
    </table>

    @if ($invoices->isEmpty())
        <div class="empty">{{ __('invoices.no_invoices') }}</div>
    @else
        {{-- Invoice list: the header repeats on every page and rows never split. --}}
        <div class="heading">{{ __('invoices.report.list') }}</div>
        <table class="grid" repeat_header="1">
            <thead>
                <tr>
                    <th style="width:4%;">#</th>
                    <th style="width:14%;">{{ __('invoices.fields.number') }}</th>
                    <th style="width:13%;">{{ __('invoices.fields.issued_at') }}</th>
                    <th style="width:19%;">{{ __('invoices.fields.customer') }}</th>
                    <th style="width:10%;">{{ __('invoices.fields.source') }}</th>
                    <th style="width:9%;">{{ __('invoices.fields.reference') }}</th>
                    <th class="n" style="width:11%;">{{ __('invoices.report.net') }}</th>
                    <th class="n" style="width:9%;">{{ __('invoices.report.tax') }}</th>
                    <th class="n" style="width:11%;">{{ __('invoices.fields.total') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoices as $invoice)
                    <tr class="{{ $loop->even ? 'alt' : '' }}">
                        <td class="muted">{{ $loop->iteration }}</td>
                        <td class="ltr"><b>{{ $invoice->number }}</b></td>
                        <td>{{ $invoice->issued_at?->translatedFormat('d M Y') }}</td>
                        <td>{{ $invoice->buyerParty()->name ?: ($invoice->user?->name ?? '—') }}</td>
                        <td>{{ $invoice->isForSubscription() ? __('invoices.sources.subscription') : __('invoices.sources.order') }}</td>
                        <td class="ltr">{{ $invoice->invoiceable ? '#'.$invoice->invoiceable->reference() : '—' }}</td>
                        <td class="n">{{ $invoice->netDisplay() }}</td>
                        <td class="n">{{ $invoice->taxDisplay() }}</td>
                        <td class="n"><b>{{ $invoice->totalDisplay() }}</b></td>
                    </tr>
                @endforeach
                <tr class="total">
                    <td colspan="6">{{ __('invoices.report.grand_total') }} ({{ $currency }})</td>
                    <td class="n">{{ $money($summary['net']) }}</td>
                    <td class="n">{{ $money($summary['tax']) }}</td>
                    <td class="n">{{ $money($summary['total']) }}</td>
                </tr>
            </tbody>
        </table>

        @if ($truncated)
            <div class="note">{{ __('invoices.report.truncated', ['count' => $invoices->count(), 'total' => $summary['count']]) }}</div>
        @endif

        {{-- Monthly results start on their own page. --}}
        <pagebreak />
        <div class="heading" style="margin-top:0;">{{ __('invoices.report.monthly') }}</div>
        <table class="grid" repeat_header="1">
            <thead>
                <tr class="group">
                    <th rowspan="2" class="sep" style="width:16%;">{{ __('invoices.report.month') }}</th>
                    <th colspan="2" class="sep">{{ __('invoices.report.store_sales') }}</th>
                    <th colspan="2" class="sep">{{ __('invoices.report.subscription_sales') }}</th>
                    <th colspan="4">{{ __('invoices.report.month_total') }}</th>
                </tr>
                <tr>
                    <th class="n" style="width:7%;">{{ __('invoices.report.invoices') }}</th>
                    <th class="n sep" style="width:12%;">{{ __('invoices.report.amount') }}</th>
                    <th class="n" style="width:7%;">{{ __('invoices.report.invoices') }}</th>
                    <th class="n sep" style="width:12%;">{{ __('invoices.report.amount') }}</th>
                    <th class="n" style="width:11%;">{{ __('invoices.report.net') }}</th>
                    <th class="n" style="width:10%;">{{ __('invoices.report.tax') }}</th>
                    <th class="n" style="width:13%;">{{ __('invoices.fields.total') }}</th>
                    <th class="n" style="width:12%;">{{ __('invoices.report.change') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($summary['months'] as $month)
                    <tr class="{{ $loop->even ? 'alt' : '' }}">
                        <td class="sep" style="white-space:nowrap;"><b>{{ $month['label'] }}</b></td>
                        <td class="n">{{ $month['store_count'] }}</td>
                        <td class="n sep">{{ $money($month['store_total']) }}</td>
                        <td class="n">{{ $month['subscriptions_count'] }}</td>
                        <td class="n sep">{{ $money($month['subscriptions_total']) }}</td>
                        <td class="n">{{ $money($month['net']) }}</td>
                        <td class="n">{{ $money($month['tax']) }}</td>
                        <td class="n"><b>{{ $money($month['total']) }}</b></td>
                        <td class="n ltr">
                            @if ($month['change'] === null)
                                <span class="muted">—</span>
                            @else
                                <span class="{{ $month['change'] >= 0 ? 'up' : 'down' }}">{{ $month['change'] >= 0 ? '+' : '' }}{{ $month['change'] }}%</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                <tr class="total">
                    <td class="sep">{{ __('invoices.report.grand_total') }}</td>
                    <td class="n">{{ $summary['store']['count'] }}</td>
                    <td class="n sep">{{ $money($summary['store']['total']) }}</td>
                    <td class="n">{{ $summary['subscriptions']['count'] }}</td>
                    <td class="n sep">{{ $money($summary['subscriptions']['total']) }}</td>
                    <td class="n">{{ $money($summary['net']) }}</td>
                    <td class="n">{{ $money($summary['tax']) }}</td>
                    <td class="n">{{ $money($summary['total']) }}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <div class="period" style="margin-top:6px;">{{ __('invoices.report.notes') }}</div>
    @endif
</body>
</html>
