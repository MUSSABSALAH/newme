<?php

declare(strict_types=1);

namespace App\Modules\Cms\Services;

/**
 * Announce-bar copy used by the shared header.
 *
 * The three lines live on the homepage CMS page so staff edit them once.
 */
final class HomepageContentService
{
    public function __construct(private readonly PageContentService $pages) {}

    public function announceShipping(?string $locale = null): string
    {
        return $this->pages->html('homepage', 'announce_shipping', $locale);
    }

    /**
     * @return list<string>
     */
    public function announceMessages(?string $locale = null): array
    {
        $lines = [];

        foreach (['announce_shipping', 'announce_partners', 'announce_consult'] as $key) {
            $line = $this->pages->html('homepage', $key, $locale);
            if (trim(strip_tags($line)) === '') {
                continue;
            }
            $lines[] = $line;
        }

        return $lines;
    }
}
