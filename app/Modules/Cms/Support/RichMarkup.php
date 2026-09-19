<?php

declare(strict_types=1);

namespace App\Modules\Cms\Support;

/**
 * Lets staff edit long legal copy as plain text. Headings stay numbered,
 * bullets start with a dash, and the site still receives structured HTML.
 */
final class RichMarkup
{
    public static function toEditor(string $html): string
    {
        $html = trim($html);
        if ($html === '') {
            return '';
        }

        $html = preg_replace('/<br\s*\/?>/i', "\n", $html) ?? $html;
        $html = preg_replace('/<\/p>/i', "\n\n", $html) ?? $html;
        $html = preg_replace('/<\/h[1-6]>/i', "\n\n", $html) ?? $html;
        $html = preg_replace('/<li[^>]*>/i', '- ', $html) ?? $html;
        $html = preg_replace('/<\/li>/i', "\n", $html) ?? $html;
        $html = preg_replace('/<\/(?:ul|ol)>/i', "\n\n", $html) ?? $html;
        $html = preg_replace('/<(?:ul|ol|p|h[1-6])[^>]*>/i', '', $html) ?? $html;

        $text = html_entity_decode(strip_tags($html), ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $text = str_replace(["\r\n", "\r"], "\n", $text);
        $text = preg_replace("/[ \t]+\n/", "\n", $text) ?? $text;
        $text = preg_replace("/\n{2,}(?=- )/", "\n", $text) ?? $text;
        $text = preg_replace("/\n{3,}/", "\n\n", $text) ?? $text;

        return trim($text);
    }

    public static function fromEditor(string $text): string
    {
        $text = str_replace(["\r\n", "\r"], "\n", $text);
        $text = trim($text);
        if ($text === '') {
            return '';
        }

        $blocks = [];
        $list = [];

        $flushList = static function () use (&$list, &$blocks): void {
            if ($list === []) {
                return;
            }

            $items = '';
            foreach ($list as $item) {
                $items .= '<li>'.self::inline($item).'</li>';
            }
            $blocks[] = '<ul>'.$items.'</ul>';
            $list = [];
        };

        foreach (explode("\n", $text) as $line) {
            $line = trim($line);
            if ($line === '') {
                $flushList();
                continue;
            }

            if (preg_match('/^[-•]\s+(.+)$/u', $line, $match) === 1) {
                $list[] = $match[1];
                continue;
            }

            $flushList();

            $safe = self::inline($line);
            $blocks[] = self::isHeading($line)
                ? '<p><b>'.$safe.'</b></p>'
                : '<p>'.$safe.'</p>';
        }

        $flushList();

        return implode('', $blocks);
    }

    private static function isHeading(string $line): bool
    {
        return preg_match('/^(?:\d+\.\s+|\d+\.\d+(?:\.\d+)*\s+)\S/u', $line) === 1;
    }

    private static function inline(string $text): string
    {
        $safe = htmlspecialchars($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $safe = preg_replace('/\+966[\d-]+/', '<span dir="ltr">$0</span>', $safe) ?? $safe;
        $safe = preg_replace('/[A-Z0-9._%+\-]+@[A-Z0-9.\-]+\.[A-Z]{2,}/i', '<span dir="ltr">$0</span>', $safe) ?? $safe;
        $safe = preg_replace('/www\.[A-Z0-9.\-]+\.[A-Z]{2,}/i', '<span dir="ltr">$0</span>', $safe) ?? $safe;

        return $safe;
    }
}
