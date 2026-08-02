<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ $rtl ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: dejavusans, sans-serif; color: #1a1a1a; font-size: 10pt; }
        h1 { font-size: 16pt; margin: 0 0 4px; }
        .meta { color: #666; font-size: 9pt; margin-bottom: 16px; }
        .day {
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 10px 12px;
            margin-bottom: 10px;
            page-break-inside: avoid;
        }
        .day-h { font-weight: 700; margin-bottom: 6px; }
        .day-h small { color: #666; font-weight: 500; }
        table { width: 100%; border-collapse: collapse; }
        td { padding: 3px 0; vertical-align: top; }
        td.lbl { width: 28%; color: #555; }
        td.dish { font-weight: 600; }
        .chef { color: #888; font-weight: 500; font-style: italic; }
        .empty { color: #888; padding: 24px 0; text-align: center; }
    </style>
</head>
<body>
    <h1>{{ __('subscriptions.schedule.pdf_title', ['reference' => $subscription->reference()]) }}</h1>
    <div class="meta">
        {{ $subscription->plan_name }}
        @if ($subscription->user)
            · {{ $subscription->user->name }}
        @endif
        @if ($subscription->start_date)
            · {{ __('subscriptions.fields.start_date') }}: {{ $subscription->start_date->translatedFormat('d M Y') }}
        @endif
    </div>

    @forelse ($days as $day)
        <div class="day">
            <div class="day-h">
                {{ $day['weekday'] }}
                <small>— {{ $day['label'] }}</small>
            </div>
            <table>
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
