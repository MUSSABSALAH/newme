<table width="100%" cellpadding="0" cellspacing="0" style="border-bottom:2px solid #122B4A;padding-bottom:5px;font-family:dejavusans,sans-serif;color:#122B4A;">
    <tr>
        <td style="width:60%;font-size:13pt;font-weight:bold;">{{ __('kitchen.title') }}</td>
        <td style="width:40%;font-size:10pt;font-weight:bold;text-align:{{ $rtl ? 'left' : 'right' }};">
            {{ $date->translatedFormat('l') }} — {{ $date->translatedFormat('d M Y') }}
        </td>
    </tr>
</table>
