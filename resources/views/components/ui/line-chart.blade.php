@props([
    'label',
    'points' => [],
    'unit' => '',
    'color' => '#F36B22',
    'metric' => null,
])

@php
    /**
     * A dependency-free plot: points are placed by their real date, so a gap of
     * six months reads as a gap rather than as one more evenly spaced step.
     */
    $points = array_values($points);

    $width = 640;
    $height = 190;
    $left = 54;
    $right = 16;
    $top = 18;
    $bottom = 32;

    $plotWidth = $width - $left - $right;
    $plotHeight = $height - $top - $bottom;

    $values = array_map(static fn (array $point): float => $point['value'], $points);
    $lowest = min($values);
    $highest = max($values);

    // A flat series would divide by zero, so give it breathing room either side.
    $padding = $highest > $lowest ? ($highest - $lowest) * 0.18 : max(abs($highest) * 0.05, 1);
    $floor = $lowest - $padding;
    $ceiling = $highest + $padding;

    $times = array_map(static fn (array $point): int => $point['date']->getTimestamp(), $points);
    $firstTime = min($times);
    $span = max(max($times) - $firstTime, 1);

    $format = static fn (float $value): string => rtrim(rtrim(number_format($value, 2, '.', ''), '0'), '.');
    $rowFor = static fn (float $value): float => round($top + (1 - (($value - $floor) / ($ceiling - $floor))) * $plotHeight, 1);

    // Label the readings themselves rather than the padded bounds of the axis.
    $marks = $highest > $lowest
        ? [[$rowFor($highest), $highest], [$rowFor($lowest), $lowest]]
        : [[$rowFor($highest), $highest]];

    $plotted = [];

    foreach ($points as $index => $point) {
        $plotted[] = [
            'x' => round($left + (($times[$index] - $firstTime) / $span) * $plotWidth, 1),
            'y' => round($top + (1 - (($point['value'] - $floor) / ($ceiling - $floor))) * $plotHeight, 1),
            'point' => $point,
        ];
    }

    $line = implode(' ', array_map(static fn (array $spot): string => $spot['x'].','.$spot['y'], $plotted));
    $area = $plotted[0]['x'].','.($top + $plotHeight).' '.$line.' '.end($plotted)['x'].','.($top + $plotHeight);
    $gradient = 'chart-'.($metric ?? 'series').'-'.substr(md5($line), 0, 6);
@endphp

<figure {{ $attributes->merge(['class' => 'line-chart']) }} @if ($metric) data-chart="{{ $metric }}" @endif>
    <figcaption class="line-chart__head">
        <span>{{ $label }}</span>
        <b style="color: {{ $color }};">{{ $format(end($values)) }} {{ $unit }}</b>
    </figcaption>

    <svg viewBox="0 0 {{ $width }} {{ $height }}" role="img" aria-label="{{ $label }}" style="width: 100%; height: auto;">
        <defs>
            <linearGradient id="{{ $gradient }}" x1="0" y1="0" x2="0" y2="1">
                <stop offset="0%" stop-color="{{ $color }}" stop-opacity="0.22" />
                <stop offset="100%" stop-color="{{ $color }}" stop-opacity="0" />
            </linearGradient>
        </defs>

        @foreach ([$top, $top + $plotHeight / 2, $top + $plotHeight] as $gridY)
            <line x1="{{ $left }}" y1="{{ $gridY }}" x2="{{ $width - $right }}" y2="{{ $gridY }}"
                  stroke="#E4E9EE" stroke-width="1" />
        @endforeach

        @foreach ($marks as [$markY, $markValue])
            <text x="{{ $left - 10 }}" y="{{ $markY + 4 }}" text-anchor="end"
                  fill="#94A3B0" font-size="12" font-weight="700" direction="ltr">{{ $format($markValue) }}</text>
        @endforeach

        <polygon points="{{ $area }}" fill="url(#{{ $gradient }})" />
        <polyline points="{{ $line }}" fill="none" stroke="{{ $color }}" stroke-width="2.5"
                  stroke-linejoin="round" stroke-linecap="round" vector-effect="non-scaling-stroke" />

        @foreach ($plotted as $spot)
            <circle cx="{{ $spot['x'] }}" cy="{{ $spot['y'] }}" r="4" fill="#fff" stroke="{{ $color }}" stroke-width="2.5">
                <title>{{ $spot['point']['date']->translatedFormat('d M Y') }} — {{ $format($spot['point']['value']) }} {{ $unit }}</title>
            </circle>
        @endforeach

        {{-- Anchoring follows the text direction, so pin it: the oldest reading stays on the left. --}}
        <text x="{{ $left }}" y="{{ $height - 8 }}" text-anchor="start" direction="ltr"
              fill="#94A3B0" font-size="12" font-weight="700">{{ $points[0]['date']->translatedFormat('d M Y') }}</text>
        <text x="{{ $width - $right }}" y="{{ $height - 8 }}" text-anchor="end" direction="ltr"
              fill="#94A3B0" font-size="12" font-weight="700">{{ end($points)['date']->translatedFormat('d M Y') }}</text>
    </svg>
</figure>
