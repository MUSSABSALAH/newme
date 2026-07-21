@php
    use App\Support\Money\Money;

    $price = $rule ? Money::fromMinor($rule->price)->format() : '';
    $discount = $rule ? $rule->discount_percent : '0';
    $selectedUnit = $rule?->duration_unit->value;
    $selectedMealTypes = $rule ? $rule->meal_types : [];
@endphp

<tr data-pricing-row>
    <td>
        <div class="checkbox-group">
            @foreach ($mealTypes as $type)
                <label class="checkbox-inline">
                    <input
                        type="checkbox"
                        name="rules[{{ $index }}][meal_types][]"
                        value="{{ $type->value }}"
                        @checked(in_array($type->value, $selectedMealTypes, true))
                    >
                    <span>{{ $type->label() }}</span>
                </label>
            @endforeach
        </div>
    </td>
    <td>
        <input type="number" min="1" max="365" class="input" name="rules[{{ $index }}][duration_length]" value="{{ $rule?->duration_length }}" required>
    </td>
    <td>
        <select class="select" name="rules[{{ $index }}][duration_unit]">
            @foreach ($units as $unit)
                <option value="{{ $unit->value }}" @selected($selectedUnit === $unit->value)>{{ $unit->label() }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <input type="number" step="0.01" min="0" class="input" name="rules[{{ $index }}][price]" value="{{ $price }}" required>
    </td>
    <td>
        <input type="number" step="0.01" min="0" max="100" class="input" name="rules[{{ $index }}][discount_percent]" value="{{ $discount }}">
    </td>
    <td>
        <button type="button" class="btn btn--ghost btn--sm" data-pricing-remove title="{{ __('plans.pricing.remove_row') }}">
            <x-ui.icon name="trash-2" size="sm" />
        </button>
    </td>
</tr>
