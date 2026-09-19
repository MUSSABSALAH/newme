<?php

declare(strict_types=1);

namespace App\Modules\Cms\Services;

use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Audit\Services\AuditService;
use App\Modules\Cms\Models\PageContent;
use App\Modules\Cms\Support\HighlightMarkup;
use App\Modules\Cms\Support\PageContentRegistry;
use App\Modules\Cms\Support\RichMarkup;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

final class PageContentService
{
    private const ALLOWED_HTML = '<b><strong><em><br>';

    private const ALLOWED_RICH = '<b><strong><em><br><ul><ol><li><p><span>';

    /**
     * @var array<string, array<string, array<string, string>>>
     */
    private array $memo = [];

    public function __construct(private readonly AuditService $audit) {}

    public function html(string $page, string $key, ?string $locale = null): string
    {
        return $this->sanitize(HighlightMarkup::expand($this->translated($page, $key, $locale)), $page, $key);
    }

    public function text(string $page, string $key, ?string $locale = null): string
    {
        return trim(strip_tags($this->translated($page, $key, $locale)));
    }

    /**
     * Stored CMS copy only — no language-file fallback.
     */
    public function storedText(string $page, string $key, ?string $locale = null): string
    {
        $locale ??= app()->getLocale();
        $stored = $this->stored($page)[$key] ?? null;

        if (! is_array($stored)) {
            return '';
        }

        $value = $stored[$locale] ?? '';

        return is_string($value) ? trim(strip_tags($value)) : '';
    }

    /**
     * @return list<string>
     */
    public function items(string $page, string $key, ?string $locale = null): array
    {
        $raw = $this->translated($page, $key, $locale);
        $parts = preg_split('/\s*[,،]\s*/u', $raw, -1, PREG_SPLIT_NO_EMPTY);

        return is_array($parts) ? array_values($parts) : [];
    }

    /**
     * @param  list<string>  $attrs
     * @return list<array<string, string>>
     */
    public function group(string $page, string $prefix, int $count, array $attrs, ?string $locale = null): array
    {
        $rows = [];

        for ($i = 1; $i <= $count; $i++) {
            $row = [];
            foreach ($attrs as $attr) {
                $key = $prefix.'_'.$i.'_'.$attr;
                $field = PageContentRegistry::field($page, $key);
                $type = $field['type'] ?? 'text';
                $row[$attr] = match ($type) {
                    'html', 'rich' => $this->html($page, $key, $locale),
                    'list' => $this->items($page, $key, $locale),
                    default => $this->text($page, $key, $locale),
                };
            }
            $rows[] = $row;
        }

        return $rows;
    }

    public function image(string $page, string $key): string
    {
        $field = PageContentRegistry::field($page, $key);
        $stored = $this->storedPath($page, $key);
        $path = $stored !== '' ? $stored : (string) ($field['fallback_image'] ?? '');

        return $this->urlForPath($path);
    }

    /**
     * @return array<string, array{ar: string, en: string, type: string, section: string, image_url: string|null}>
     */
    public function formValues(string $page): array
    {
        $values = [];

        foreach (PageContentRegistry::fields($page) as $field) {
            $key = $field['key'];
            $type = $field['type'];

            $ar = $type === 'image' ? $this->storedPath($page, $key) : $this->translated($page, $key, 'ar');
            $en = $type === 'image' ? $this->storedPath($page, $key) : $this->translated($page, $key, 'en');

            if ($type === 'html') {
                $ar = HighlightMarkup::toEditor($ar);
                $en = HighlightMarkup::toEditor($en);
            }

            if ($type === 'rich') {
                $ar = RichMarkup::toEditor($ar);
                $en = RichMarkup::toEditor($en);
            }

            $values[$key] = [
                'ar' => $ar,
                'en' => $en,
                'type' => $type,
                'section' => $field['section'],
                'image_url' => $type === 'image' ? $this->image($page, $key) : null,
            ];
        }

        return $values;
    }

    /**
     * @param  array<string, mixed>  $input
     * @param  array<string, UploadedFile|null>  $images
     */
    public function update(string $page, array $input, array $images = []): void
    {
        $before = $this->formValues($page);
        $changed = [];

        foreach (PageContentRegistry::fields($page) as $field) {
            $key = $field['key'];

            if ($field['type'] === 'image') {
                $file = $images[$key] ?? null;
                if ($file instanceof UploadedFile) {
                    $path = $this->storeImage($page, $file);
                    $row = PageContent::query()->updateOrCreate(
                        ['page' => $page, 'key' => $key],
                        ['value' => ['ar' => $path, 'en' => $path]],
                    );
                    $changed[$key] = $row;
                }

                continue;
            }

            $translations = $input[$key] ?? null;
            if (! is_array($translations)) {
                continue;
            }

            $ar = (string) ($translations['ar'] ?? '');
            $en = (string) ($translations['en'] ?? '');

            if ($field['type'] === 'html') {
                $ar = HighlightMarkup::fromEditor($ar);
                $en = HighlightMarkup::fromEditor($en);
            }

            if ($field['type'] === 'rich') {
                $ar = RichMarkup::fromEditor($ar);
                $en = RichMarkup::fromEditor($en);
            }

            $value = [
                'ar' => $this->sanitize($ar, $page, $key),
                'en' => $this->sanitize($en, $page, $key),
            ];

            $row = PageContent::query()->updateOrCreate(
                ['page' => $page, 'key' => $key],
                ['value' => $value],
            );
            $changed[$key] = $row;
        }

        $this->flush($page);

        if ($changed === []) {
            return;
        }

        $after = $this->formValues($page);
        $old = [];
        $new = [];

        foreach (array_keys($changed) as $key) {
            $beforeRow = [
                'ar' => $before[$key]['ar'] ?? '',
                'en' => $before[$key]['en'] ?? '',
            ];
            $afterRow = [
                'ar' => $after[$key]['ar'] ?? '',
                'en' => $after[$key]['en'] ?? '',
            ];
            if ($beforeRow === $afterRow) {
                continue;
            }
            $old[$key] = $beforeRow;
            $new[$key] = $afterRow;
        }

        if ($new === []) {
            return;
        }

        $this->audit->log(
            AuditAction::PageContentUpdated,
            array_values($changed)[0],
            ['page' => $page] + $old,
            ['page' => $page] + $new,
        );
    }

    public function translated(string $page, string $key, ?string $locale = null): string
    {
        $locale ??= app()->getLocale();
        $stored = $this->stored($page)[$key] ?? null;

        if (is_array($stored)) {
            $value = $stored[$locale] ?? '';
            if (is_string($value) && trim($value) !== '') {
                return $value;
            }
        }

        return $this->fallback($page, $key, $locale);
    }

    private function storedPath(string $page, string $key): string
    {
        $stored = $this->stored($page)[$key] ?? null;
        if (! is_array($stored)) {
            return '';
        }

        foreach (['ar', 'en'] as $locale) {
            $value = $stored[$locale] ?? '';
            if (is_string($value) && trim($value) !== '') {
                return trim($value);
            }
        }

        return '';
    }

    /**
     * @return array<string, array<string, string>>
     */
    private function stored(string $page): array
    {
        if (isset($this->memo[$page])) {
            return $this->memo[$page];
        }

        /** @var array<string, array<string, string>> $values */
        $values = Cache::rememberForever($this->cacheKey($page), function () use ($page): array {
            $resolved = [];

            foreach (PageContent::query()->where('page', $page)->get() as $row) {
                $resolved[$row->key] = $row->getTranslations('value');
            }

            return $resolved;
        });

        return $this->memo[$page] = $values;
    }

    private function fallback(string $page, string $key, string $locale): string
    {
        $field = PageContentRegistry::field($page, $key);
        if ($field === null) {
            return '';
        }

        if (($field['type'] ?? '') === 'image') {
            return (string) ($field['fallback_image'] ?? '');
        }

        $path = $field['fallback'] ?? '';
        $resolved = $this->walkLang($path, $locale);

        if (is_array($resolved)) {
            $separator = $locale === 'en' ? ', ' : '، ';
            $flat = [];
            foreach ($resolved as $item) {
                if (is_string($item) && trim($item) !== '') {
                    $flat[] = $item;
                }
            }

            return implode($separator, $flat);
        }

        return is_string($resolved) ? $resolved : '';
    }

    /**
     * @param  string|list<int|string>  $path
     */
    private function walkLang(string|array $path, string $locale): mixed
    {
        if (is_string($path)) {
            return trans($path, [], $locale);
        }

        if ($path === []) {
            return '';
        }

        $root = (string) array_shift($path);
        $value = trans($root, [], $locale);

        foreach ($path as $segment) {
            if (! is_array($value) || ! array_key_exists($segment, $value)) {
                return '';
            }
            $value = $value[$segment];
        }

        return $value;
    }

    private function storeImage(string $page, UploadedFile $file): string
    {
        $stored = $file->store('cms/pages/'.$page, 'public');

        if (is_string($stored) && $stored !== '') {
            $from = Storage::disk('public')->path($stored);
            $to = public_path('storage/'.$stored);
            File::ensureDirectoryExists(dirname($to));
            if (is_file($from)) {
                File::copy($from, $to);
            }

            return $stored;
        }

        return '';
    }

    private function urlForPath(string $path): string
    {
        if ($path === '') {
            return '';
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        if (str_contains($path, '/')) {
            $public = public_path('storage/'.$path);
            $storage = storage_path('app/public/'.$path);
            if (is_file($public) || is_file($storage)) {
                $mtime = is_file($public) ? filemtime($public) : filemtime($storage);

                return asset('storage/'.$path).($mtime ? '?v='.$mtime : '');
            }
        }

        $asset = public_path('assets/images/'.$path);
        $url = asset('assets/images/'.$path);

        if (is_file($asset)) {
            $mtime = filemtime($asset);
            if ($mtime) {
                $url .= '?v='.$mtime;
            }
        }

        return $url;
    }

    private function sanitize(string $html, string $page, string $key): string
    {
        $field = PageContentRegistry::field($page, $key);
        $type = $field['type'] ?? 'text';

        if ($type === 'text' || $type === 'list') {
            return trim(strip_tags($html));
        }

        $allowed = $type === 'rich' ? self::ALLOWED_RICH : self::ALLOWED_HTML;
        $withoutBlocks = preg_replace('/<(script|style)\b[^>]*>.*?<\/\1>/is', '', $html);
        $html = is_string($withoutBlocks) ? $withoutBlocks : $html;
        $clean = trim(strip_tags($html, $allowed));
        $stripped = preg_replace('/<(\/?)(b|strong|em|br|ul|ol|li|p|span)(?:\s[^>]*)?>/i', '<$1$2>', $clean);

        return is_string($stripped) ? $stripped : $clean;
    }

    private function flush(string $page): void
    {
        Cache::forget($this->cacheKey($page));
        unset($this->memo[$page]);
    }

    private function cacheKey(string $page): string
    {
        return 'cms.page_content.'.$page;
    }
}
