@auth
  @if (auth()->user()->isCustomer())
    <a href="{{ route('website.account') }}" class="acct" aria-label="{{ __('account.nav.account') }}" title="{{ __('account.nav.account') }}">
      <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
    </a>
  @endif
@else
  <a href="{{ route('website.login') }}" class="nav-cta">{{ __('account.nav.login') }}</a>
@endauth
