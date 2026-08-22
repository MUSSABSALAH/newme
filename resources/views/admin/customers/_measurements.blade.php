@use('App\Modules\Identity\Models\BodyMeasurement')
@use('App\Modules\Identity\Support\MeasurementTrend')

@php
  $measurements = $customer->bodyMeasurements;
  $latest = $measurements->first();
  $trend = MeasurementTrend::weight($measurements);
@endphp

<x-ui.card :title="__('measurements.admin.title')">
    @if ($measurements->isEmpty())
        <div class="dropdown__empty">{{ __('measurements.admin.empty') }}</div>
    @else
        <p class="text-muted" style="margin-bottom: 14px;">
            {{ __('measurements.admin.summary', [
                'count' => $measurements->count(),
                'date' => $latest->measured_on->translatedFormat('d M Y'),
            ]) }}
        </p>

        @if ($trend)
            <x-ui.line-chart
                metric="weight_kg"
                :label="__('measurements.fields.weight_kg')"
                :unit="__('measurements.units.kg')"
                :points="$trend"
                color="var(--color-accent)"
                class="line-chart line-chart--spaced" />
        @endif

        <x-ui.table :headers="[
            __('measurements.fields.measured_on'),
            __('measurements.fields.weight_kg'),
            __('measurements.admin.change'),
            __('measurements.fields.bmi'),
            __('measurements.fields.body_fat_percent'),
            __('measurements.admin.title'),
        ]">
            @foreach ($measurements as $measurement)
                @php
                    // Newest first, so the following row is the earlier reading.
                    $previous = $measurements->get($loop->index + 1);
                    $change = $previous ? $measurement->weight_kg - $previous->weight_kg : null;

                    $tape = [];
                    foreach (['height_cm', ...BodyMeasurement::TAPE_FIELDS] as $field) {
                        if ($measurement->{$field} !== null) {
                            $tape[] = __('measurements.fields.'.$field).' '
                                .BodyMeasurement::display($measurement->{$field}).' '
                                .__('measurements.units.cm');
                        }
                    }
                @endphp

                <tr>
                    <td><strong>{{ $measurement->measured_on->translatedFormat('d M Y') }}</strong></td>
                    <td>{{ BodyMeasurement::display($measurement->weight_kg) }} {{ __('measurements.units.kg') }}</td>
                    <td>
                        @if ($change === null || $change == 0.0)
                            <span class="text-muted">—</span>
                        @else
                            {{ ($change > 0 ? '+' : '−').BodyMeasurement::display(abs($change)) }}
                            {{ __('measurements.units.kg') }}
                        @endif
                    </td>
                    <td>
                        @if ($measurement->bmi() !== null)
                            {{ $measurement->bmi() }}
                            <span class="text-muted">{{ __('measurements.bmi.'.$measurement->bmiBand()) }}</span>
                        @else
                            <span class="text-muted">—</span>
                        @endif
                    </td>
                    <td>
                        @if ($measurement->body_fat_percent !== null)
                            {{ BodyMeasurement::display($measurement->body_fat_percent) }}{{ __('measurements.units.percent') }}
                        @else
                            <span class="text-muted">—</span>
                        @endif
                    </td>
                    <td>
                        @if ($tape)
                            {{ implode(' · ', $tape) }}
                        @else
                            <span class="text-muted">—</span>
                        @endif

                        @if ($measurement->notes)
                            <div class="text-muted">{{ $measurement->notes }}</div>
                        @endif
                    </td>
                </tr>
            @endforeach
        </x-ui.table>
    @endif
</x-ui.card>
