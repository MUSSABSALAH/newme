<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ $rtl ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: dejavusans, sans-serif; color: #12233B; font-size: 8.5pt; }
        table { border-collapse: collapse; width: 100%; }

        .kpis td {
            width: 50%;
            padding: 7px 10px;
            background: #F7F5F1;
            border: 1px solid #E8E4DC;
            text-align: center;
        }
        .kpis .num { font-size: 14pt; font-weight: bold; color: #122B4A; }
        .kpis .lbl { font-size: 8pt; color: #7C8799; font-weight: bold; }

        .list { margin-top: 10px; }
        .list th {
            background: #122B4A;
            color: #FFFFFF;
            font-size: 8pt;
            padding: 6px 6px;
            text-align: {{ $rtl ? 'right' : 'left' }};
        }
        .list td {
            padding: 5px 6px;
            border-bottom: 1px solid #E8E4DC;
            vertical-align: top;
        }
        .list tr.alt td { background: #FAF9F6; }
        .muted { color: #7C8799; }
        .ltr { direction: ltr; text-align: {{ $rtl ? 'right' : 'left' }}; }
        .num-col { text-align: center; }
        .note { margin-top: 8px; color: #9A4B12; font-weight: bold; }
        .empty { color: #7C8799; padding: 40px 0; text-align: center; }
    </style>
</head>
<body>
    <table class="kpis">
        <tr>
            <td><div class="num">{{ $subscriptions->count() }}</div><div class="lbl">{{ __('subscriptions.pdf.count') }}</div></td>
            <td><div class="num">{{ $total->format() }} {{ __('subscriptions.pdf.currency') }}</div><div class="lbl">{{ __('subscriptions.pdf.total') }}</div></td>
        </tr>
    </table>

    @if ($subscriptions->isEmpty())
        <div class="empty">{{ __('subscriptions.no_subscriptions') }}</div>
    @else
        {{-- mPDF repeats the thead on every page and never splits a row. --}}
        <table class="list" repeat_header="1">
            <thead>
                <tr>
                    <th class="num-col" style="width:3%;">#</th>
                    <th style="width:7%;">{{ __('subscriptions.fields.reference') }}</th>
                    <th style="width:12%;">{{ __('subscriptions.fields.customer') }}</th>
                    <th style="width:9%;">{{ __('subscriptions.pdf.phone') }}</th>
                    <th style="width:12%;">{{ __('subscriptions.fields.plan') }}</th>
                    <th style="width:7%;">{{ __('subscriptions.fields.duration') }}</th>
                    <th style="width:10%;">{{ __('subscriptions.fields.start_date') }}</th>
                    <th style="width:8%;">{{ __('subscriptions.fields.total') }}</th>
                    <th style="width:8%;">{{ __('subscriptions.fields.status') }}</th>
                    <th style="width:14%;">{{ __('subscriptions.handling.column') }}</th>
                    <th style="width:10%;">{{ __('subscriptions.fields.created_at') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subscriptions as $subscription)
                    <tr class="{{ $loop->even ? 'alt' : '' }}">
                        <td class="num-col muted">{{ $loop->iteration }}</td>
                        <td class="ltr"><b>#{{ $subscription->reference() }}</b></td>
                        <td>{{ $subscription->user?->name ?? '—' }}</td>
                        <td class="ltr">{{ $subscription->user?->phone ?? '—' }}</td>
                        <td>{{ $subscription->planLabel() }}</td>
                        <td>{{ $subscription->duration_length }} {{ __('plans.units.'.$subscription->duration_unit) }}</td>
                        <td>{{ $subscription->start_date?->translatedFormat('d M Y') ?? '—' }}</td>
                        <td>{{ $subscription->totalDisplay() }}</td>
                        <td>{{ $subscription->status->label() }}</td>
                        <td>
                            {{ $subscription->handling_status->label() }}
                            @if ($subscription->handler)
                                <span class="muted">— {{ $subscription->handler->name }}</span>
                            @endif
                        </td>
                        <td>{{ $subscription->created_at?->translatedFormat('d M Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if ($truncated)
            <div class="note">{{ __('subscriptions.pdf.truncated', ['count' => \App\Modules\Subscriptions\Services\SubscriptionListPdfRenderer::MAX_ROWS]) }}</div>
        @endif
    @endif
</body>
</html>
