<?php

declare(strict_types=1);

namespace App\Modules\Cms\Support;

/**
 * Lets staff highlight a phrase with *asterisks* instead of HTML tags.
 */
final class HighlightMarkup
{
    public static function toEditor(string $html): string
    {
        $text = preg_replace('/<br\s*\/?>/i', "\n", $html) ?? $html;
        $text = preg_replace('/<\/?(em|b|strong)>/i', '*', $text) ?? $text;
        $text = html_entity_decode(strip_tags($text), ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $text = preg_replace('/\*{2,}/', '*', $text) ?? $text;

        return trim($text);
    }

    public static function fromEditor(string $text): string
    {
        $safe = htmlspecialchars($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $withBreaks = nl2br($safe, false);
        $marked = preg_replace('/\*([^*\n]+)\*/u', '<em>$1</em>', $withBreaks);

        return is_string($marked) ? $marked : $withBreaks;
    }

    public static function expand(string $html): string
    {
        $marked = preg_replace('/\*([^*\n<]+)\*/u', '<em>$1</em>', $html);

        return is_string($marked) ? $marked : $html;
    }
}
