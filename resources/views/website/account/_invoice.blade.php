@php
    /** @var \App\Modules\Invoices\Models\Invoice|null $invoice */
    $empty = $empty ?? __('account.invoice.none');
    $headingN = $heading_n ?? '↗';
@endphp

<div class="card inv-card">
  <h2><span class="n">{{ $headingN }}</span>{{ __('account.invoice.title') }}</h2>

  @if ($invoice)
    <div class="inv-card__body">
      <div class="kv"><span>{{ __('invoices.fields.number') }}</span><b dir="ltr">{{ $invoice->number }}</b></div>
      <div class="kv"><span>{{ __('invoices.fields.issued_at') }}</span><b>{{ $invoice->issued_at?->translatedFormat('d M Y') }}</b></div>
      <div class="kv"><span>{{ __('invoices.fields.total') }}</span><b>{{ $invoice->totalDisplay() }} <x-ui.sar /></b></div>
    </div>
    <a class="inv-dl" href="{{ route('website.account.invoice', $invoice) }}">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
        <path d="M12 3v12"/><path d="m7 11 5 5 5-5"/><path d="M5 21h14"/>
      </svg>
      <span>{{ __('account.invoice.download') }}</span>
    </a>
  @else
    <p class="muted-note">{{ $empty }}</p>
  @endif
</div>
