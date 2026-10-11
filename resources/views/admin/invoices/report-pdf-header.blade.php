<table width="100%" cellpadding="0" cellspacing="0" style="border-bottom:2px solid #122B4A;padding-bottom:5px;font-family:dejavusans,sans-serif;color:#122B4A;">
    <tr>
        <td style="width:50%;font-size:13pt;font-weight:bold;">{{ __('invoices.report.title') }}</td>
        <td style="width:50%;font-size:8.5pt;font-weight:bold;text-align:{{ $rtl ? 'left' : 'right' }};">
            {{ $filters === [] ? __('invoices.report.all') : implode(' · ', $filters) }}
        </td>
    </tr>
</table>
