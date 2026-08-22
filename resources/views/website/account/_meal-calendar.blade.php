@if (count($calendarMonths) === 0)
  <div class="empty">{{ __('account.subscription.no_schedule') }}</div>
@else
  <form method="POST" action="{{ route('website.account.subscriptions.meals', $subscription) }}" class="meal-cal-form" id="mealCalForm">
    @csrf
    @method('PUT')

    <div class="meal-cal-legend">
      <span class="meal-cal-legend__item"><i class="dot dot--open"></i>{{ __('account.subscription.legend_editable') }}</span>
      <span class="meal-cal-legend__item"><i class="dot dot--locked"></i>{{ __('account.subscription.legend_locked') }}</span>
      <span class="meal-cal-legend__item"><i class="dot dot--paused"></i>{{ __('account.subscription.legend_paused') }}</span>
    </div>

    @foreach ($calendarMonths as $month)
      <section class="meal-cal-month">
        <h3 class="meal-cal-month__title">{{ $month['label'] }}</h3>
        <div class="meal-cal-grid">
          @foreach ($month['weekdays'] as $wd)
            <div class="meal-cal-grid__wd">{{ $wd }}</div>
          @endforeach

          @foreach ($month['weeks'] as $week)
            @foreach ($week as $cell)
              @if ($cell['day'] === null)
                <div class="meal-cal-cell meal-cal-cell--blank" aria-hidden="true"></div>
              @elseif ($cell['delivery'] === null)
                <div class="meal-cal-cell meal-cal-cell--empty">
                  <span class="meal-cal-cell__num">{{ $cell['day'] }}</span>
                </div>
              @else
                @php $delivery = $cell['delivery']; @endphp
                <button type="button"
                        class="meal-cal-cell meal-cal-cell--delivery {{ ($delivery['paused'] ?? false) ? 'is-paused' : ($delivery['editable'] ? 'is-editable' : 'is-locked') }}"
                        data-day-index="{{ $delivery['index'] }}"
                        aria-label="{{ $delivery['label'] }}">
                  <span class="meal-cal-cell__num">{{ $cell['day'] }}</span>
                  @if ($delivery['paused'] ?? false)
                    <span class="meal-cal-cell__badge">{{ __('account.subscription.paused_badge') }}</span>
                  @endif
                  <div class="meal-cal-cell__meals">
                    @foreach ($delivery['meals'] as $meal)
                      <span class="meal-cal-cell__meal {{ $meal['is_chef'] ? 'chef' : '' }}" title="{{ $meal['label'] }}: {{ $meal['dish'] }}">
                        <em>{{ $meal['label'] }}</em>
                        {{ Str::limit($meal['dish'], 22) }}
                      </span>
                    @endforeach
                  </div>
                  @if ($delivery['editable'] && ! ($delivery['paused'] ?? false))
                    <span class="meal-cal-cell__edit">{{ __('account.subscription.tap_to_edit') }}</span>
                  @endif
                </button>
              @endif
            @endforeach
          @endforeach
        </div>
      </section>
    @endforeach

    <div id="mealCalStash" hidden>
      @foreach ($scheduleDays as $index => $day)
        <div class="meal-cal-editor" id="meal-editor-{{ $index }}" hidden>
          <div class="meal-cal-editor__head">
            <div>
              <strong>{{ $day['weekday'] }}</strong>
              <span>{{ $day['label'] }}</span>
            </div>
            <button type="button" class="meal-cal-editor__close" data-close-editor aria-label="{{ __('account.subscription.close_editor') }}">×</button>
          </div>

          <input type="hidden" name="meal_schedule[{{ $index }}][date]" value="{{ $day['date'] }}" @disabled($day['paused'] ?? false)>

          @if ($day['editable'])
            @foreach ($day['meals'] as $meal)
              <div class="meal-cal-editor__row">
                <label for="meal-{{ $index }}-{{ $meal['type'] }}">{{ $meal['label'] }}</label>
                <select id="meal-{{ $index }}-{{ $meal['type'] }}" name="meal_schedule[{{ $index }}][meals][{{ $meal['type'] }}]">
                  <option value="">{{ __('account.subscription.chef_choice') }}</option>
                  @foreach (($dishOptions[$meal['type']] ?? []) as $dishName)
                    <option value="{{ $dishName }}" @selected(($meal['dish_raw'] ?? null) === $dishName)>{{ $dishName }}</option>
                  @endforeach
                  @if (($meal['dish_raw'] ?? null) && ! in_array($meal['dish_raw'], $dishOptions[$meal['type']] ?? [], true))
                    <option value="{{ $meal['dish_raw'] }}" selected>{{ $meal['dish_raw'] }}</option>
                  @endif
                </select>
              </div>
            @endforeach
            <button type="submit" class="w-btn meal-cal-drawer__save">{{ __('account.subscription.save_day') }}</button>
          @else
            <p class="meal-cal-editor__locked-note">
              {{ ($day['paused'] ?? false) ? __('account.subscription.schedule_paused_note') : __('account.subscription.schedule_locked') }}
            </p>
            @foreach ($day['meals'] as $meal)
              @unless ($day['paused'] ?? false)
                <input type="hidden" name="meal_schedule[{{ $index }}][meals][{{ $meal['type'] }}]" value="{{ $meal['dish_raw'] ?? '' }}">
              @endunless
              <div class="meal-cal-editor__readonly">
                <span>{{ $meal['label'] }}</span>
                <b class="{{ $meal['is_chef'] ? 'chef' : '' }}">{{ $meal['dish'] }}</b>
              </div>
            @endforeach
          @endif
        </div>
      @endforeach
    </div>

    <div class="meal-cal-drawer" id="mealCalDrawer" hidden>
      <div class="meal-cal-drawer__backdrop" data-close-editor></div>
      <div class="meal-cal-drawer__panel">
        <div id="mealCalDrawerBody"></div>
      </div>
    </div>
  </form>
@endif

@push('scripts')
<script>
(function(){
  var drawer=document.getElementById('mealCalDrawer');
  var body=document.getElementById('mealCalDrawerBody');
  var stash=document.getElementById('mealCalStash');
  if(!drawer||!body||!stash)return;

  function closeEditor(){
    while(body.firstChild){
      var node=body.firstChild;
      node.hidden=true;
      stash.appendChild(node);
    }
    drawer.hidden=true;
    document.body.classList.remove('meal-cal-open');
  }

  document.querySelectorAll('[data-close-editor]').forEach(function(el){
    el.addEventListener('click',closeEditor);
  });

  document.querySelectorAll('.meal-cal-cell--delivery').forEach(function(cell){
    cell.addEventListener('click',function(){
      var idx=cell.getAttribute('data-day-index');
      var editor=document.getElementById('meal-editor-'+idx);
      if(!editor)return;
      closeEditor();
      body.appendChild(editor);
      editor.hidden=false;
      drawer.hidden=false;
      document.body.classList.add('meal-cal-open');
    });
  });

  document.addEventListener('keydown',function(e){
    if(e.key==='Escape')closeEditor();
  });
})();
</script>
@endpush
