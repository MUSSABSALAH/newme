<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ $rtl ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: dejavusans, sans-serif; color: #12233B; font-size: 10pt; }
        .section-title {
            font-size: 11pt;
            font-weight: 700;
            color: #122B4A;
            margin: 0 0 8px;
            padding-bottom: 4px;
            border-bottom: 1px solid #E8E4DC;
        }
        .summary {
            width: 100%;
            border-collapse: collapse;
            margin: 0 0 14px;
            background: #F7F5F1;
            border: 1px solid #E8E4DC;
        }
        .summary td {
            padding: 7px 10px;
            vertical-align: top;
            border-bottom: 1px solid #E8E4DC;
            width: 50%;
        }
        .summary tr:last-child td { border-bottom: 0; }
        .summary .lbl {
            display: block;
            font-size: 7.5pt;
            color: #7C8799;
            font-weight: 700;
            margin-bottom: 2px;
        }
        .summary .val {
            display: block;
            font-size: 9.5pt;
            font-weight: 700;
            color: #122B4A;
        }
        .summary .val-muted { font-weight: 500; color: #43536A; }
        .ops {
            margin: 0 0 14px;
            padding: 9px 11px;
            background: #E8F0FE;
            border: 1px solid #B7CFE8;
            border-radius: 6px;
            font-size: 9pt;
            color: #1B4F9C;
            font-weight: 700;
            line-height: 1.45;
        }
        .banner {
            margin: 0 0 14px;
            padding: 9px 11px;
            border-radius: 6px;
            background: #FFF4E8;
            border: 1px solid #F5C89A;
            color: #9A4B12;
            font-size: 9pt;
            font-weight: 700;
            line-height: 1.45;
        }
        .legend {
            margin: 0 0 10px;
            font-size: 8pt;
            color: #7C8799;
        }
        .legend span {
            display: inline-block;
            margin-inline-end: 12px;
        }
        .swatch {
            display: inline-block;
            width: 9px;
            height: 9px;
            border-radius: 2px;
            margin-inline-end: 4px;
            vertical-align: -1px;
            border: 1px solid #D5D0C6;
        }
        .swatch-active { background: #F0EDE6; }
        .swatch-paused { background: #FBF6EA; border-color: #E8D4A8; }
        .day {
            border: 1px solid #D5D0C6;
            border-radius: 6px;
            padding: 0;
            margin-bottom: 9px;
            page-break-inside: avoid;
            overflow: hidden;
        }
        .day-h {
            background: #F0EDE6;
            padding: 7px 10px;
            border-bottom: 1px solid #D5D0C6;
        }
        .day.paused .day-h { background: #FBF6EA; border-bottom-color: #E8D4A8; }
        .day-h .num {
            display: inline-block;
            min-width: 22px;
            padding: 1px 6px;
            margin-inline-end: 6px;
            border-radius: 999px;
            background: #122B4A;
            color: #fff;
            font-size: 8pt;
            font-weight: 700;
            text-align: center;
        }
        .day.paused .day-h .num { background: #8A6B2A; }
        .day-h .title { font-weight: 700; font-size: 10pt; color: #122B4A; }
        .day-h .date { color: #7C8799; font-size: 8.5pt; font-weight: 500; }
        .badge {
            display: inline-block;
            margin-inline-start: 6px;
            padding: 1px 7px;
            border-radius: 999px;
            background: #F5EBD6;
            color: #8A6B2A;
            font-size: 7.5pt;
            font-weight: 700;
        }
        .badge-go {
            background: #E6F6EE;
            color: #1F7A4D;
        }
        .meals { width: 100%; border-collapse: collapse; }
        .meals td {
            padding: 5px 10px;
            border-bottom: 1px solid #EEEAE2;
            vertical-align: top;
            font-size: 9.5pt;
        }
        .meals tr:last-child td { border-bottom: 0; }
        .meals .lbl { width: 28%; color: #7C8799; font-weight: 700; }
        .meals .dish { font-weight: 700; color: #12233B; }
        .chef { color: #7C8799; font-weight: 500; font-style: italic; }
        .empty { color: #7C8799; padding: 28px 0; text-align: center; }
        .address-block { white-space: pre-line; }
    </style>
</head>
<body>
    <div class="section-title">{{ __('subscriptions.schedule.pdf_summary') }}</div>

    <table class="summary">
        <tr>
            <td>
                <span class="lbl">{{ __('subscriptions.fields.customer') }}</span>
                <span class="val">{{ $subscription->user?->name ?? '—' }}</span>
                @if ($subscription->user?->phone)
                    <span class="val val-muted" style="direction:ltr;">{{ $subscription->user->phone }}</span>
                @endif
                @if ($subscription->user?->email)
                    <span class="val val-muted">{{ $subscription->user->email }}</span>
                @endif
            </td>
            <td>
                <span class="lbl">{{ __('subscriptions.fields.plan') }}</span>
                <span class="val">{{ $subscription->plan_name }}</span>
                <span class="val val-muted">
                    {{ __('subscriptions.fields.status') }}: {{ $subscription->status->label() }}
                    · {{ __('subscriptions.handling.column') }}: {{ $subscription->handling_status->label() }}
                </span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="lbl">{{ __('subscriptions.fields.start_date') }} / {{ __('subscriptions.fields.end_date') }}</span>
                <span class="val">
                    {{ $subscription->start_date?->translatedFormat('d M Y') ?? '—' }}
                    →
                    {{ $subscription->endDate()?->translatedFormat('d M Y') ?? '—' }}
                </span>
                <span class="val val-muted">
                    {{ __('subscriptions.fields.total_days') }}: {{ $subscription->total_days }}
                    · {{ __('subscriptions.schedule.pdf_active_days') }}: {{ $activeCount }}
                    @if ($pausedCount > 0)
                        · {{ __('subscriptions.schedule.pdf_paused_days') }}: {{ $pausedCount }}
                    @endif
                </span>
            </td>
            <td>
                <span class="lbl">{{ __('subscriptions.fields.meal_types') }}</span>
                <span class="val">{{ $mealLabels !== [] ? implode(' · ', $mealLabels) : '—' }}</span>
                <span class="val val-muted">
                    {{ __('subscriptions.fields.selected_days') }}:
                    {{ $selectedDayLabels !== [] ? implode(' · ', $selectedDayLabels) : '—' }}
                </span>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <span class="lbl">{{ __('subscriptions.show.delivery') }}</span>
                @if ($address)
                    <span class="val">{{ $address->recipientName }} · <span style="direction:ltr;display:inline-block;">{{ $address->phone }}</span></span>
                    <span class="val val-muted">{{ $address->oneLine() }}</span>
                    @if ($address->details)
                        <span class="val val-muted">{{ $address->details }}</span>
                    @endif
                @else
                    <span class="val val-muted">{{ __('subscriptions.show.no_address') }}</span>
                @endif
            </td>
        </tr>
    </table>

    <div class="ops">
        {{ __('subscriptions.schedule.pdf_ops_hint', [
            'active' => $activeCount,
            'paused' => $pausedCount,
        ]) }}
    </div>

    @if ($subscription->isPaused())
        <div class="banner">
            {{ __('subscriptions.schedule.paused_banner', [
                'date' => $subscription->pause_started_on?->translatedFormat('d M Y') ?? '—',
                'count' => $subscription->frozenDaysCount(),
            ]) }}
        </div>
    @endif

    <div class="section-title">{{ __('subscriptions.schedule.pdf_days_title') }}</div>

    <div class="legend">
        <span><i class="swatch swatch-active"></i>{{ __('subscriptions.schedule.pdf_legend_active') }}</span>
        <span><i class="swatch swatch-paused"></i>{{ __('subscriptions.schedule.pdf_legend_paused') }}</span>
    </div>

    @forelse ($days as $index => $day)
        <div class="day {{ ! empty($day['paused']) ? 'paused' : '' }}">
            <div class="day-h">
                <span class="num">{{ $index + 1 }}</span>
                <span class="title">{{ $day['weekday'] }}</span>
                <span class="date">— {{ $day['label'] }}</span>
                @if (! empty($day['paused']))
                    <span class="badge">{{ __('subscriptions.schedule.paused_badge') }}</span>
                @else
                    <span class="badge badge-go">{{ __('subscriptions.schedule.pdf_action_prepare') }}</span>
                @endif
            </div>
            <table class="meals">
                @foreach ($day['meals'] as $meal)
                    <tr>
                        <td class="lbl">{{ $meal['label'] }}</td>
                        <td class="dish {{ $meal['is_chef'] ? 'chef' : '' }}">{{ $meal['dish'] }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    @empty
        <div class="empty">{{ __('subscriptions.schedule.empty') }}</div>
    @endforelse
</body>
</html>
