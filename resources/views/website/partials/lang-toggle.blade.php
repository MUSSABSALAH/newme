@php($target = app()->getLocale() === 'ar' ? 'en' : 'ar')
<a href="{{ route('locale.switch', $target) }}"
   class="lang-toggle {{ $class ?? '' }}"
   aria-label="{{ $target === 'en' ? 'Switch to English' : 'Switch to Arabic' }}"
   hreflang="{{ $target }}">
  {{ $target === 'en' ? 'EN' : 'AR' }}
</a>
