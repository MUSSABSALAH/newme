@php
    use App\Support\Money\Money;

    /** @var \App\Modules\Dashboard\DTOs\FinancePanelData $finance */
@endphp

<x-admin.dashboard.section :title="__('dashboard.panels.finance')" icon="banknote" />

<div class="grid grid--4">
    <x-ui.stat-card
        :label="__('dashboard.kpi.sales_today')"
        :value="Money::fromMinor($finance->salesTodayMinor)->format()"
        :unit="__('invoices.pdf.currency')"
        accent="primary"
    >
        <x-slot:icon><x-ui.icon name="banknote" /></x-slot:icon>
    </x-ui.stat-card>

    <x-ui.stat-card
        :label="__('dashboard.kpi.sales_month')"
        :value="Money::fromMinor($finance->salesMonthMinor)->format()"
        :unit="__('invoices.pdf.currency')"
        accent="accent"
    >
        <x-slot:icon><x-ui.icon name="trending-up" /></x-slot:icon>
    </x-ui.stat-card>

    <x-ui.stat-card
        :label="__('dashboard.kpi.invoices_month')"
        :value="$finance->invoicesMonth"
        accent="dark"
    >
        <x-slot:icon><x-ui.icon name="file-text" /></x-slot:icon>
    </x-ui.stat-card>

    <x-ui.stat-card
        :label="__('dashboard.kpi.average_invoice')"
        :value="Money::fromMinor($finance->averageInvoiceMinor)->format()"
        :unit="__('invoices.pdf.currency')"
        accent="primary"
    >
        <x-slot:icon><x-ui.icon name="calculator" /></x-slot:icon>
    </x-ui.stat-card>
</div>

<p class="text-muted dash-hint">{{ __('dashboard.kpi.sales_hint') }}</p>

<x-ui.card :title="__('dashboard.sections.invoices')">
    <x-slot:actions>
        <a href="{{ route('admin.invoices.index') }}" class="link-btn">{{ __('dashboard.sections.view_all_invoices') }}</a>
    </x-slot:actions>

    @if ($finance->recentInvoices->isEmpty())
        <div class="dropdown__empty">{{ __('dashboard.sections.empty_invoices') }}</div>
    @else
        <div class="dash-feed">
            @foreach ($finance->recentInvoices as $invoice)
                <a href="{{ route('admin.invoices.download', $invoice) }}" class="dash-feed__item">
                    <span class="dash-feed__main">
                        <strong dir="ltr">{{ $invoice->number }}</strong>
                        <span class="text-muted">{{ $invoice->user?->name ?? '—' }}</span>
                    </span>
                    <span class="dash-feed__meta">
                        <span class="text-muted">{{ $invoice->issued_at?->translatedFormat('d M Y') ?? '—' }}</span>
                        <span class="dash-feed__amount">{{ $invoice->totalDisplay() }} <x-ui.sar /></span>
                    </span>
                </a>
            @endforeach
        </div>
    @endif
</x-ui.card>
