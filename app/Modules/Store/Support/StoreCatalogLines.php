<?php

declare(strict_types=1);

namespace App\Modules\Store\Support;

use App\Modules\Store\Models\Category;

/**
 * Maps the homepage business-line query (?line=bakery|support) to live
 * top-level store category slugs. Bakery is its own line; everything else
 * is supporting products so newly added categories stay reachable.
 */
final class StoreCatalogLines
{
    public const BAKERY = 'bakery';

    public const SUPPORT = 'support';

    /**
     * @return array{bakery: list<string>, support: list<string>}
     */
    public static function groups(): array
    {
        $slugs = Category::query()
            ->where('is_active', true)
            ->whereNull('parent_id')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->pluck('slug')
            ->all();

        $bakery = [];
        $support = [];

        foreach ($slugs as $slug) {
            if ($slug === self::BAKERY) {
                $bakery[] = $slug;
            } else {
                $support[] = $slug;
            }
        }

        return [
            self::BAKERY => $bakery !== [] ? $bakery : [self::BAKERY],
            self::SUPPORT => $support,
        ];
    }

    /**
     * @return list<string>|null
     */
    public static function allowed(string $line): ?array
    {
        $groups = self::groups();

        return $groups[$line] ?? null;
    }
}
