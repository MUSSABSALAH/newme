<?php

declare(strict_types=1);

namespace App\Modules\Cms\Support;

/**
 * Homepage copy keys that the CMS page can edit.
 *
 * Add a constant here when a new homepage block is ready to be managed.
 */
final class HomepageContentRegistry
{
    public const PAGE = 'homepage';

    public const ANNOUNCE_SHIPPING = 'announce_shipping';

    public const ANNOUNCE_PARTNERS = 'announce_partners';

    public const ANNOUNCE_CONSULT = 'announce_consult';

    /**
     * @return list<string>
     */
    public static function keys(): array
    {
        return [
            self::ANNOUNCE_SHIPPING,
            self::ANNOUNCE_PARTNERS,
            self::ANNOUNCE_CONSULT,
        ];
    }

    public static function isKnown(string $key): bool
    {
        return in_array($key, self::keys(), true);
    }

    public static function fallback(string $key, string $locale): string
    {
        return match ($key) {
            self::ANNOUNCE_SHIPPING => (string) trans('website.site.announce.shipping', [], $locale),
            self::ANNOUNCE_PARTNERS => (string) trans('website.site.announce.partners', [], $locale),
            self::ANNOUNCE_CONSULT => (string) trans('website.site.announce.consult', [], $locale),
            default => '',
        };
    }
}
