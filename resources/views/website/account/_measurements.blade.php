@use('App\Modules\Identity\Models\BodyMeasurement')
@use('App\Modules\Identity\Support\MeasurementTrend')

@php
  /** Newest first, so the next row in the list is the previous reading. */
  $latest = $measurements->first();
  $trend = MeasurementTrend::weight($measurements);
  $earliest = $measurements->last();
  $totalChange = ($latest && $earliest && $latest->isNot($earliest))
      ? $latest->weight_kg - $earliest->weight_kg
      : null;

  $show = static fn (?float $value): ?string => BodyMeasurement::display($value);

  $unit = static fn (string $field): string => match ($field) {
      'weight_kg' => __('measurements.units.kg'),
      'body_fat_percent' => __('measurements.units.percent'),
      default => __('measurements.units.cm'),
  };

  $signed = static fn (float $change): string => ($change > 0 ? '+' : '−')
      .BodyMeasurement::display(abs($change)).' '.__('measurements.units.kg');
@endphp

@if ($latest)
  <div class="card ms-summary">
    <div class="ms-stat">
      <span>{{ __('measurements.account.current_weight') }}</span>
      <b>{{ $show($latest->weight_kg) }} {{ __('measurements.units.kg') }}</b>
      <small>{{ __('measurements.account.measured_on', ['date' => $latest->measured_on->translatedFormat('d M Y')]) }}</small>
    </div>

    @if ($totalChange !== null)
      <div class="ms-stat">
        <span>{{ __('measurements.account.total_change') }}</span>
        <b>{{ $totalChange == 0.0 ? __('measurements.account.no_change') : $signed($totalChange) }}</b>
        <small>{{ __('measurements.account.since', ['date' => $earliest->measured_on->translatedFormat('d M Y')]) }}</small>
      </div>
    @endif

    @if ($latest->bmi() !== null)
      <div class="ms-stat">
        <span>{{ __('measurements.fields.bmi') }}</span>
        <b>{{ $latest->bmi() }}</b>
        <small>{{ __('measurements.bmi.'.$latest->bmiBand()) }}</small>
      </div>
    @endif
  </div>
@endif

@if ($trend)
  <div class="card">
    <h2><span class="n">↗</span>{{ __('measurements.account.progress') }}</h2>
    <p class="hint">{{ __('measurements.account.progress_hint') }}</p>

    <x-ui.line-chart
      metric="weight_kg"
      :label="__('measurements.fields.weight_kg')"
      :unit="__('measurements.units.kg')"
      :points="$trend"
      color="var(--orange)" />
  </div>
@endif

@forelse ($measurements as $measurement)
  @php
    $previous = $measurements->get($loop->index + 1);
    $change = $previous ? $measurement->weight_kg - $previous->weight_kg : null;

    $cells = array_filter([
        'weight_kg' => $measurement->weight_kg,
        'height_cm' => $measurement->height_cm,
    ], static fn (?float $value): bool => $value !== null);
  @endphp

  <div class="card ms-row">
    <div class="ms-row__head">
      <div class="ms-row__date">
        <b>{{ $measurement->measured_on->translatedFormat('d M Y') }}</b>
        @if ($change !== null && $change != 0.0)
          <span class="ms-delta">{{ $change > 0 ? '▲' : '▼' }} {{ $signed($change) }}</span>
        @endif
        @if ($measurement->bmi() !== null)
          <span class="ms-tag">{{ __('measurements.fields.bmi') }} {{ $measurement->bmi() }}</span>
        @endif
      </div>

      <form method="POST" action="{{ route('website.account.measurements.destroy', $measurement) }}"
            onsubmit="return confirm(@json(__('measurements.account.delete_confirm')))">
        @csrf
        @method('DELETE')
        <button type="submit" class="link-quiet danger">{{ __('measurements.account.delete') }}</button>
      </form>
    </div>

    <div class="ms-grid">
      @foreach ($cells as $field => $value)
        <div class="ms-cell">
          <span>{{ __('measurements.fields.'.$field) }}</span>
          <b>{{ $show($value) }} {{ $unit($field) }}</b>
        </div>
      @endforeach
    </div>

    @if ($measurement->notes)
      <p class="ms-note">{{ $measurement->notes }}</p>
    @endif
  </div>
@empty
  <div class="empty">{{ __('measurements.account.empty') }}</div>
@endforelse

<div class="card">
  <h2><span class="n">+</span>{{ __('measurements.account.add') }}</h2>
  <p class="hint">{{ __('measurements.account.add_hint') }}</p>

  <form method="POST" action="{{ route('website.account.measurements.store') }}" data-validate novalidate>
    @csrf

    <div class="frow">
      <div class="f">
        <label for="measured_on">{{ __('measurements.fields.measured_on') }}</label>
        <input type="date" id="measured_on" name="measured_on"
               value="{{ old('measured_on', now()->toDateString()) }}"
               min="{{ $earliestMeasurementDate }}" max="{{ now()->toDateString() }}" required dir="ltr"
               class="{{ $errors->has('measured_on') ? 'is-invalid' : '' }}">
        @error('measured_on')<div class="err">{{ $message }}</div>@enderror
      </div>

      <div class="f">
        <label for="weight_kg">{{ __('measurements.fields.weight_kg') }} <i>{{ __('measurements.units.kg') }}</i></label>
        <input type="number" id="weight_kg" name="weight_kg" step="0.1" dir="ltr" required
               min="{{ $measurementRanges['weight_kg'][0] }}" max="{{ $measurementRanges['weight_kg'][1] }}"
               value="{{ old('weight_kg') }}"
               class="{{ $errors->has('weight_kg') ? 'is-invalid' : '' }}">
        @error('weight_kg')<div class="err">{{ $message }}</div>@enderror
      </div>
    </div>

    <div class="frow">
      <div class="f">
        <label for="height_cm">{{ __('measurements.fields.height_cm') }} <i>{{ $unit('height_cm') }}</i></label>
        <input type="number" id="height_cm" name="height_cm" step="0.1" dir="ltr"
               min="{{ $measurementRanges['height_cm'][0] }}" max="{{ $measurementRanges['height_cm'][1] }}"
               value="{{ old('height_cm', $latest?->height_cm) }}"
               class="{{ $errors->has('height_cm') ? 'is-invalid' : '' }}">
        @error('height_cm')<div class="err">{{ $message }}</div>@enderror
      </div>
    </div>

    <div class="f">
      <label for="measurement_notes">{{ __('measurements.fields.notes') }}</label>
      <textarea id="measurement_notes" name="notes" rows="2" maxlength="500">{{ old('notes') }}</textarea>
      @error('notes')<div class="err">{{ $message }}</div>@enderror
    </div>

    <button type="submit" class="w-btn">{{ __('measurements.account.save') }}</button>
  </form>
</div>
