<?php

declare(strict_types=1);

namespace App\Modules\Notifications\Support;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;

/**
 * Builds a MailMessage that uses the New Me branded HTML shell.
 *
 * Greeting / lines / action stay on the message so existing tests can read
 * them, while the customer sees the invoice-like layout.
 */
final class BrandMail
{
    public static function font(?string $locale = null): string
    {
        return ($locale ?? app()->getLocale()) === 'ar'
            ? "'Cairo', Tahoma, Arial, sans-serif"
            : 'Tahoma, Arial, sans-serif';
    }

    /**
     * Send branded HTML without compiling a Blade view.
     *
     * OTP uses this so a stale compiled `email-otp` / layout on the server
     * cannot throw Undefined variable $mailFont.
     *
     * @param  list<string>  $lines
     */
    public static function html(
        string $html,
        string $text,
        string $subject,
        ?string $greeting = null,
        array $lines = [],
    ): MailMessage {
        $message = (new MailMessage)
            ->subject($subject)
            ->view([
                'html' => static fn (): HtmlString => new HtmlString($html),
                'raw' => $text,
            ]);

        if ($greeting !== null) {
            $message->greeting($greeting);
        }

        foreach ($lines as $line) {
            $message->line($line);
        }

        return $message;
    }

    public static function shell(
        string $title,
        string $heading,
        string $bodyHtml,
        ?string $subheading = null,
    ): string {
        $isAr = app()->getLocale() === 'ar';
        $dir = $isAr ? 'rtl' : 'ltr';
        $align = $isAr ? 'right' : 'left';
        $font = self::font();
        $logo = url('/assets/images/logos/'.($isAr ? 'logo_ar.png' : 'logo_en.png'));
        $strip = url('/assets/images/mail/renew-strip.jpg');
        $title = e($title);
        $heading = e($heading);
        $subheading = $subheading !== null && $subheading !== '' ? e($subheading) : '';
        $brand = e((string) __('website.brand'));
        $made = e((string) __('mail.footer.made'));
        $distributed = e((string) __('mail.footer.distributed'));
        $locale = e(str_replace('_', '-', app()->getLocale()));
        $cairoHead = '';

        if ($isAr) {
            $cairoHead = <<<'HEAD'
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">
        <style type="text/css">
            @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap');
            html, body, table, td, th, p, div, span, a, strong, b, h1, h2, h3, li {
                font-family: 'Cairo', Tahoma, Arial, sans-serif !important;
            }
        </style>
HEAD;
        }

        $subBlock = $subheading !== ''
            ? '<div style="font-size:13px;color:#C2186A;font-weight:bold;margin:0 0 16px;font-family:'.$font.';">'.$subheading.'</div>'
            : '';

        return <<<HTML
<!DOCTYPE html>
<html lang="{$locale}" dir="{$dir}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{$title}</title>
{$cairoHead}
</head>
<body style="margin:0;padding:0;background:#F3F4F4;font-family:{$font};color:#1A1A1A;">
<table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#F3F4F4;padding:24px 0;font-family:{$font};">
    <tr>
        <td align="center" style="font-family:{$font};">
            <table role="presentation" width="600" cellspacing="0" cellpadding="0" style="width:600px;max-width:100%;background:#ffffff;border-radius:8px;overflow:hidden;border-collapse:collapse;font-family:{$font};">
                <tr>
                    <td width="564" valign="top" style="width:564px;padding:0;font-family:{$font};">
                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="font-family:{$font};">
                            <tr>
                                <td style="padding:22px 24px 16px;border-bottom:1px solid #E6E6E6;text-align:{$align};font-family:{$font};">
                                    <img src="{$logo}" alt="{$brand}" width="168" style="display:block;border:0;width:168px;max-width:70%;height:auto;">
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:26px 24px 8px;text-align:{$align};font-family:{$font};">
                                    <div style="font-size:20px;font-weight:bold;color:#128C8C;margin:0 0 6px;font-family:{$font};">{$heading}</div>
                                    {$subBlock}
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:0 24px 28px;text-align:{$align};font-size:14px;line-height:1.7;color:#333333;font-family:{$font};">
                                    {$bodyHtml}
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:16px 24px 22px;background:#FAFBFB;text-align:{$align};font-family:{$font};">
                                    <div style="font-size:11px;font-weight:bold;color:#111111;margin-bottom:6px;font-family:{$font};">{$made}</div>
                                    <div style="font-size:11px;color:#555555;line-height:1.6;font-family:{$font};">
                                        {$distributed}<br>
                                        NEWME © Maysa Malik Yousuf Kurdy Trading Establishment<br>
                                        <span dir="ltr" style="font-family:{$font};">+966 53 336 0317</span>
                                        · info@newmeforever.com
                                        · www.newmeforever.com
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td width="36" valign="top" title="PREP - BAKE - RENEW · جدد حياتك" style="width:36px;max-width:36px;padding:0;border:0;font-size:0;line-height:0;background-image:url('{$strip}');background-repeat:no-repeat;background-position:top center;background-size:100% 100%;">
                        <div style="width:36px;height:1px;font-size:0;line-height:0;">&nbsp;</div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
HTML;
    }

    /**
     * @param  array<string, mixed>  $data
     * @param  list<string>  $lines
     */
    public static function make(
        string $view,
        array $data,
        string $subject,
        ?string $greeting = null,
        array $lines = [],
        ?string $actionLabel = null,
        ?string $actionUrl = null,
    ): MailMessage {
        $message = (new MailMessage)
            ->subject($subject)
            ->view($view, $data);

        if ($greeting !== null) {
            $message->greeting($greeting);
        }

        foreach ($lines as $line) {
            $message->line($line);
        }

        if ($actionLabel !== null && $actionUrl !== null) {
            $message->action($actionLabel, $actionUrl);
        }

        return $message;
    }
}
