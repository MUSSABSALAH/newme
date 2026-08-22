<table width="100%" cellpadding="0" cellspacing="0" style="border-top:1px solid #D5D0C6;padding-top:6px;font-family:dejavusans,sans-serif;font-size:8pt;color:#7C8799;">
    <tr>
        <td style="width:50%;">{{ __('subscriptions.schedule.pdf_generated', ['at' => $generatedAt]) }}</td>
        <td style="width:50%;text-align:{{ $rtl ? 'left' : 'right' }};">
            {{ __('subscriptions.schedule.pdf_page') }} {PAGENO} / {nbpg}
        </td>
    </tr>
</table>
