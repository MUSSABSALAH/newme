<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ $rtl ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: dejavusans, sans-serif; color: #12233B; font-size: 9.5pt; }
        table { border-collapse: collapse; width: 100%; }

        .kpis td {
            width: 33%;
            padding: 8px 10px;
            background: #F7F5F1;
            border: 1px solid #E8E4DC;
            text-align: center;
        }
        .kpis .num { font-size: 15pt; font-weight: bold; color: #122B4A; }
        .kpis .lbl { font-size: 8pt; color: #7C8799; font-weight: bold; }

        .heading {
            font-size: 11.5pt;
            font-weight: bold;
            color: #122B4A;
            margin: 14px 0 6px;
        }

        /* One table per block: mPDF moves it whole to the next page when it fits on one. */
        .block { page-break-inside: avoid; margin-bottom: 8px; }

        .summary td, .summary th { padding: 5px 8px; border-bottom: 1px solid #EEEAE2; }
        .summary .type th {
            background: #122B4A;
            color: #FFFFFF;
            font-size: 10pt;
            text-align: {{ $rtl ? 'right' : 'left' }};
        }
        .summary .count { width: 14%; text-align: center; font-weight: bold; font-size: 11pt; }

        .section-row td {
            background: #122B4A;
            color: #FFFFFF;
            font-size: 11pt;
            font-weight: bold;
            padding: 6px 10px;
        }
        .dish-row td {
            background: #F0EDE6;
            border: 1px solid #D5D0C6;
            padding: 6px 10px;
            font-weight: bold;
            font-size: 10.5pt;
        }
        .dish-row .count {
            color: #FFFFFF;
            background: #F07F2D;
            text-align: center;
            width: 9%;
            font-size: 11pt;
        }
        .cols th {
            background: #FAF9F6;
            color: #7C8799;
            font-size: 8pt;
            padding: 4px 8px;
            border: 1px solid #E8E4DC;
            text-align: {{ $rtl ? 'right' : 'left' }};
        }
        .people td {
            padding: 4px 8px;
            border: 1px solid #EEEAE2;
            font-size: 9pt;
            vertical-align: top;
        }
        .muted { color: #7C8799; font-weight: normal; }
        .chef { color: #7C8799; font-style: italic; }
        .allergy { color: #9A4B12; font-weight: bold; }
        .ltr { direction: ltr; text-align: {{ $rtl ? 'right' : 'left' }}; }
        .empty { color: #7C8799; padding: 40px 0; text-align: center; }
    </style>
</head>
<body>
    @php
        $dishCount = array_sum(array_map(static fn (array $section): int => count($section['dishes']), $prep['sections']));
    @endphp

    <table class="kpis">
        <tr>
            <td><div class="num">{{ $prep['subscriptions'] }}</div><div class="lbl">{{ __('kitchen.kpi.subscriptions') }}</div></td>
            <td><div class="num">{{ $prep['portions'] }}</div><div class="lbl">{{ __('kitchen.kpi.portions') }}</div></td>
            <td><div class="num">{{ $dishCount }}</div><div class="lbl">{{ __('kitchen.kpi.dishes') }}</div></td>
        </tr>
    </table>

    @if ($prep['sections'] === [])
        <div class="empty">{{ __('kitchen.board.empty_title') }}</div>
    @else
        {{-- Cooking list: what to make and how many, one block per meal type. --}}
        <div class="heading">{{ __('kitchen.pdf.summary') }}</div>

        @foreach ($prep['sections'] as $section)
            <table class="summary block">
                <thead>
                    <tr class="type">
                        <th>{{ $section['label'] }}</th>
                        <th class="count">{{ $section['portions'] }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($section['dishes'] as $dish)
                        <tr>
                            <td class="{{ $dish['is_chef'] ? 'chef' : '' }}">{{ $dish['dish'] }}</td>
                            <td class="count">{{ $dish['count'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach

        {{-- Details: each dish with its customers, starting on a fresh page. --}}
        <pagebreak />
        <div class="heading">{{ __('kitchen.pdf.details') }}</div>

        @foreach ($prep['sections'] as $section)
            @foreach ($section['dishes'] as $dish)
                {{-- The header repeats if a long list has to continue on the next page. --}}
                <table class="block" repeat_header="1">
                    <thead>
                        @if ($loop->first)
                            <tr class="section-row">
                                <td colspan="6">{{ $section['label'] }} — {{ __('kitchen.section.portions', ['count' => $section['portions']]) }}</td>
                            </tr>
                        @endif
                        <tr class="dish-row">
                            <td class="count">{{ $dish['count'] }}</td>
                            <td colspan="5" class="{{ $dish['is_chef'] ? 'chef' : '' }}">
                                {{ $dish['dish'] }}
                                <span class="muted">({{ $section['label'] }})</span>
                            </td>
                        </tr>
                        <tr class="cols">
                            <th>#</th>
                            <th>{{ __('kitchen.fields.customer') }}</th>
                            <th>{{ __('kitchen.fields.phone') }}</th>
                            <th>{{ __('kitchen.fields.subscription') }}</th>
                            <th>{{ __('kitchen.fields.plan') }}</th>
                            <th>{{ __('kitchen.fields.allergies') }}</th>
                        </tr>
                    </thead>
                    <tbody class="people">
                        @foreach ($dish['customers'] as $customer)
                            <tr class="people">
                                <td class="muted" style="width:5%;">{{ $loop->iteration }}</td>
                                <td style="width:24%;"><b>{{ $customer['name'] }}</b></td>
                                <td class="ltr" style="width:17%;">{{ $customer['phone'] ?? '—' }}</td>
                                <td style="width:14%;">#{{ $customer['reference'] }}</td>
                                <td style="width:20%;">{{ $customer['plan'] }}</td>
                                <td style="width:20%;" class="{{ $customer['allergies'] ? 'allergy' : 'muted' }}">{{ $customer['allergies'] ?? '—' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endforeach
        @endforeach
    @endif
</body>
</html>
