@php $mailFont = $mailFont ?? (app()->getLocale() === 'ar' ? "'Cairo', Tahoma, Arial, sans-serif" : 'Tahoma, Arial, sans-serif'); @endphp
<table role="presentation" cellspacing="0" cellpadding="0" style="margin:8px 0 4px;font-family:{{ $mailFont }};">
    <tr>
        <td style="background:#128C8C;border-radius:6px;font-family:{{ $mailFont }};">
            <a href="{{ $url }}" style="display:inline-block;padding:11px 20px;color:#ffffff;text-decoration:none;font-size:14px;font-weight:bold;font-family:{{ $mailFont }};">{{ $label }}</a>
        </td>
    </tr>
</table>
