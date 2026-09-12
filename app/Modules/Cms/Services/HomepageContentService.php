<?php

declare(strict_types=1);

namespace App\Modules\Cms\Services;

use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Audit\Services\AuditService;
use App\Modules\Cms\Models\PageContent;
use App\Modules\Cms\Support\HomepageContentRegistry;
use Illuminate\Support\Facades\Cache;

final class HomepageContentService
{
    private const CACHE_KEY = 'cms.homepage_content';

    private const ALLOWED_HTML = '<b><strong><em><br>';

    public function __construct(private readonly AuditService $audit) {}

    /**
     * Current homepage fields, falling back to the website language files.
     *
     * @return array<string, array{ar: string, en: string}>
     */
    public function formValues(): array
    {
        $values = [];

        foreach (HomepageContentRegistry::keys() as $key) {
            $values[$key] = [
                'ar' => $this->translated($key, 'ar'),
                'en' => $this->translated($key, 'en'),
            ];
        }

        return $values;
    }

    public function announceShipping(?string $locale = null): string
    {
        return $this->sanitizeHtml($this->translated(HomepageContentRegistry::ANNOUNCE_SHIPPING, $locale));
    }

    /**
     * Rotating top-bar lines, in display order.
     *
     * @return list<string>
     */
    public function announceMessages(?string $locale = null): array
    {
        $lines = [];

        foreach (HomepageContentRegistry::keys() as $key) {
            $line = $this->sanitizeHtml($this->translated($key, $locale));
            if (trim(strip_tags($line)) === '') {
                continue;
            }

            $lines[] = $line;
        }

        return $lines;
    }

    /**
     * @param  array<string, mixed>  $input
     */
    public function update(array $input): void
    {
        $before = $this->formValues();
        $changed = [];

        foreach ($input as $key => $translations) {
            if (! is_string($key) || ! HomepageContentRegistry::isKnown($key) || ! is_array($translations)) {
                continue;
            }

            $value = [
                'ar' => $this->sanitizeHtml((string) ($translations['ar'] ?? '')),
                'en' => $this->sanitizeHtml((string) ($translations['en'] ?? '')),
            ];

            $row = PageContent::query()->updateOrCreate(
                ['page' => HomepageContentRegistry::PAGE, 'key' => $key],
                ['value' => $value],
            );

            $changed[$key] = $row;
        }

        Cache::forget(self::CACHE_KEY);

        if ($changed === []) {
            return;
        }

        $after = $this->formValues();
        $old = [];
        $new = [];

        foreach (array_keys($changed) as $key) {
            if (($before[$key] ?? null) === ($after[$key] ?? null)) {
                continue;
            }

            $old[$key] = $before[$key] ?? null;
            $new[$key] = $after[$key] ?? null;
        }

        if ($new === []) {
            return;
        }

        $this->audit->log(AuditAction::HomepageContentUpdated, array_values($changed)[0], $old, $new);
    }

    public function translated(string $key, ?string $locale = null): string
    {
        $locale ??= app()->getLocale();
        $stored = $this->stored()[$key] ?? null;

        if (is_array($stored)) {
            $value = $stored[$locale] ?? '';
            if (is_string($value) && trim($value) !== '') {
                return $value;
            }
        }

        return HomepageContentRegistry::fallback($key, $locale);
    }

    /**
     * @return array<string, array<string, string>>
     */
    private function stored(): array
    {
        /** @var array<string, array<string, string>> $values */
        $values = Cache::rememberForever(self::CACHE_KEY, function (): array {
            $resolved = [];

            foreach (
                PageContent::query()
                    ->where('page', HomepageContentRegistry::PAGE)
                    ->get() as $row
            ) {
                $resolved[$row->key] = $row->getTranslations('value');
            }

            return $resolved;
        });

        return $values;
    }

    private function sanitizeHtml(string $html): string
    {
        $withoutBlocks = preg_replace('/<(script|style)\b[^>]*>.*?<\/\1>/is', '', $html);
        $html = is_string($withoutBlocks) ? $withoutBlocks : $html;

        $clean = trim(strip_tags($html, self::ALLOWED_HTML));

        $stripped = preg_replace('/<(\/?)(b|strong|em|br)(?:\s[^>]*)?>/i', '<$1$2>', $clean);

        return is_string($stripped) ? $stripped : $clean;
    }
}
