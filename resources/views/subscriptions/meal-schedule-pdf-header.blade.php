<div class="pdf-header" style="border-bottom:2px solid #122B4A;padding-bottom:8px;font-family:dejavusans,sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
        <tr>
            <td style="vertical-align:top;width:62%;">
                <div style="font-size:13pt;font-weight:700;color:#122B4A;margin:0 0 2px;">
                    {{ __('subscriptions.schedule.pdf_report_title') }}
                </div>
                <div style="font-size:9pt;color:#43536A;">
                    {{ __('subscriptions.fields.reference') }}:
                    <strong style="color:#122B4A;">#{{ $subscription->reference() }}</strong>
                    · {{ $subscription->plan_name }}
                </div>
            </td>
            <td style="vertical-align:top;text-align:{{ $rtl ? 'left' : 'right' }};width:38%;">
                <div style="font-size:9pt;color:#7C8799;margin:0 0 2px;">{{ __('subscriptions.fields.customer') }}</div>
                <div style="font-size:11pt;font-weight:700;color:#122B4A;">
                    {{ $subscription->user?->name ?? '—' }}
                </div>
                @if ($subscription->user?->phone)
                    <div style="font-size:8.5pt;color:#43536A;direction:ltr;text-align:{{ $rtl ? 'left' : 'right' }};">
                        {{ $subscription->user->phone }}
                    </div>
                @endif
            </td>
        </tr>
    </table>
</div>
