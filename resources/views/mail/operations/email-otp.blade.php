@extends('mail.layout')

@section('content')
    <p style="margin:0 0 14px;">{{ $greeting }}</p>
    <p style="margin:0 0 18px;">{{ $intro }}</p>
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center" style="padding:8px 0 18px;">
                <div style="display:inline-block;background:#F4F7F7;border:1px solid #D7E3E3;border-radius:8px;padding:14px 28px;font-size:28px;font-weight:bold;letter-spacing:6px;color:#128C8C;direction:ltr;">{{ $code }}</div>
            </td>
        </tr>
    </table>
    <p style="margin:0 0 8px;color:#555555;">{{ $expiry }}</p>
    <p style="margin:0;color:#777777;font-size:13px;">{{ $ignore }}</p>
@endsection
