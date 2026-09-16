<?php

declare(strict_types=1);

namespace App\Modules\Cms\Support;

/**
 * CMS pages and the fields each one can edit.
 *
 * Text fallbacks come from the website language files. Image fallbacks are
 * the files already in public/assets/images — shown in admin as if they
 * were uploaded, until a staff member replaces them.
 *
 * @phpstan-type Field array{
 *     key: string,
 *     type: 'text'|'html'|'textarea'|'list'|'rich'|'image',
 *     section: string,
 *     max?: int,
 *     fallback?: string|list<int|string>,
 *     fallback_image?: string
 * }
 */
final class PageContentRegistry
{
    public const PAGE_HOMEPAGE = 'homepage';

    /**
     * @return array<string, array{label: string, preview: string}>
     */
    public static function pages(): array
    {
        return [
            'homepage' => ['label' => 'cms.pages.homepage', 'preview' => 'website.main'],
            'intro' => ['label' => 'cms.pages.intro', 'preview' => 'website.home'],
            'about' => ['label' => 'cms.pages.about', 'preview' => 'website.about'],
            'make' => ['label' => 'cms.pages.make', 'preview' => 'website.make'],
            'consult' => ['label' => 'cms.pages.consult', 'preview' => 'website.consult'],
            'help' => ['label' => 'cms.pages.help', 'preview' => 'website.help'],
            'store' => ['label' => 'cms.pages.store', 'preview' => 'website.store'],
            'subscribe' => ['label' => 'cms.pages.subscribe', 'preview' => 'website.subscribe'],
            'blog' => ['label' => 'cms.pages.blog', 'preview' => 'website.blog'],
            'menu' => ['label' => 'cms.pages.menu', 'preview' => 'website.menu'],
            'terms' => ['label' => 'cms.pages.terms', 'preview' => 'website.terms'],
        ];
    }

    /**
     * @return list<string>
     */
    public static function slugs(): array
    {
        return array_keys(self::pages());
    }

    public static function isKnown(string $page): bool
    {
        return isset(self::pages()[$page]);
    }

    /**
     * @return Field|null
     */
    public static function field(string $page, string $key): ?array
    {
        foreach (self::fields($page) as $field) {
            if ($field['key'] === $key) {
                return $field;
            }
        }

        return null;
    }

    public static function isKnownKey(string $page, string $key): bool
    {
        return self::field($page, $key) !== null;
    }

    /**
     * @return list<Field>
     */
    public static function fields(string $page): array
    {
        return match ($page) {
            'homepage' => self::homepageFields(),
            'intro' => self::introFields(),
            'about' => self::aboutFields(),
            'make' => self::makeFields(),
            'consult' => self::consultFields(),
            'help' => self::helpFields(),
            'store' => self::storeFields(),
            'subscribe' => self::subscribeFields(),
            'blog' => self::blogFields(),
            'menu' => self::menuFields(),
            'terms' => self::termsFields(),
            default => [],
        };
    }

    /**
     * @return array<string, list<Field>>
     */
    public static function groupedFields(string $page): array
    {
        $groups = [];

        foreach (self::fields($page) as $field) {
            $groups[$field['section']][] = $field;
        }

        return $groups;
    }

    /**
     * @return list<Field>
     */
    private static function homepageFields(): array
    {
        return array_merge(
            [
                self::html('announce_shipping', 'announce', 'website.site.announce.shipping'),
                self::html('announce_partners', 'announce', 'website.site.announce.partners'),
                self::html('announce_consult', 'announce', 'website.site.announce.consult'),
                self::text('hero_pill', 'hero', 'website.site.hero.pill', 120),
                self::html('hero_h1', 'hero', 'website.site.hero.h1', 400),
                self::textarea('hero_lead', 'hero', 'website.site.hero.lead'),
                self::text('hero_cta_plan', 'hero', 'website.site.hero.cta_plan', 120),
                self::text('hero_cta_store', 'hero', 'website.site.hero.cta_store', 120),
                self::text('hero_trust', 'hero', 'website.site.hero.trust', 240),
                self::text('hero_alt', 'hero', 'website.site.hero.alt', 180),
                self::image('hero_image', 'hero', 'v30-home-hero.jpg'),
                self::textarea('partners', 'hero', 'website.site.partners'),
            ],
            self::repeat('usp', 4, 'usp', [
                'title' => ['website.site.usp', 'title'],
                'sub' => ['website.site.usp', 'sub'],
            ], ['title' => 'text', 'sub' => 'textarea']),
            [
                self::html('why_chapter', 'why', 'website.site.why.chapter', 180),
                self::text('why_kick', 'why', 'website.site.why.kick', 80),
                self::html('why_title', 'why', 'website.site.why.title', 400),
                self::text('why_how', 'why', 'website.site.why.how', 180),
                self::textarea('why_p1', 'why', 'website.site.why.p1', 1600),
            ],
            self::repeat('why_pillar', 3, 'why', [
                'title' => ['website.site.why.pillars', 'title'],
                'body' => ['website.site.why.pillars', 'body'],
            ]),
            [
                self::text('why_cap', 'why', 'website.site.why.cap', 120),
                self::list('why_chips', 'why', 'website.site.why.chips'),
                self::text('why_alt', 'why', 'website.site.why.alt', 180),
                self::image('why_image', 'why', 'v30-why-seeds.jpg'),
                self::html('lines_chapter', 'lines', 'website.site.lines.chapter', 180),
                self::text('lines_kick', 'lines', 'website.site.lines.kick', 80),
                self::html('lines_title', 'lines', 'website.site.lines.title', 400),
                self::text('lines_hint', 'lines', 'website.site.lines.hint', 180),
            ],
            self::repeat('line', 3, 'lines', [
                'n' => ['website.site.lines.items', 'n'],
                'title' => ['website.site.lines.items', 'title'],
                'body' => ['website.site.lines.items', 'body'],
                'tags' => ['website.site.lines.items', 'tags'],
                'alt' => ['website.site.lines.items', 'alt'],
            ], ['n' => 'text', 'title' => 'text', 'body' => 'textarea', 'tags' => 'list', 'alt' => 'text']),
            [
                self::image('line_1_image', 'lines', 'v30-line-bakery.jpg'),
                self::image('line_2_image', 'lines', 'v30-line-support.jpg'),
                self::image('line_3_image', 'lines', 'v30-line-subs.jpg'),
                self::text('shop_kick', 'shop', 'website.site.shop.kick', 80),
                self::html('shop_title', 'shop', 'website.site.shop.title', 400),
                self::textarea('shop_sub', 'shop', 'website.site.shop.sub'),
                self::textarea('shop_know', 'shop', 'website.site.shop.know'),
                self::text('shop_all_products', 'shop', 'website.site.shop.all_products', 80),
                self::text('shop_rail_hint', 'shop', 'website.site.shop.rail_hint', 180),
                self::text('nutrition_kick', 'nutrition', 'website.site.nutrition.kick', 80),
                self::html('nutrition_title', 'nutrition', 'website.site.nutrition.title', 400),
                self::textarea('nutrition_sub', 'nutrition', 'website.site.nutrition.sub'),
                self::text('nutrition_alt', 'nutrition', 'website.main.nutrition.alt', 180),
                self::text('nutrition_cap', 'nutrition', 'website.main.nutrition.cap', 180),
                self::image('nutrition_image', 'nutrition', 'v30-flour.jpg'),
                self::text('closing_h2', 'closing', 'website.site.closing.h2', 180),
                self::text('closing_tag', 'closing', 'website.site.closing.tag', 120),
                self::textarea('closing_k', 'closing', 'website.site.closing.k'),
                self::text('closing_btn', 'closing', 'website.site.closing.btn', 80),
                self::text('closing_fine', 'closing', 'website.site.closing.fine', 240),
            ],
        );
    }

    /**
     * @return list<Field>
     */
    private static function introFields(): array
    {
        return [
            self::list('intro_beats', 'intro', 'website.site.intro.beats'),
            self::html('intro_title', 'intro', 'website.site.intro.title', 400),
            self::textarea('intro_lead', 'intro', 'website.site.intro.lead'),
            self::text('intro_cta_taste', 'intro', 'website.site.intro.cta_taste', 120),
            self::text('intro_cta_plans', 'intro', 'website.site.intro.cta_plans', 120),
            self::text('intro_skip', 'intro', 'website.site.intro.skip', 80),
            self::textarea('intro_strip', 'intro', 'website.site.intro.strip'),
            self::text('intro_alt', 'intro', 'website.site.hero.alt', 180),
            self::image('intro_image', 'intro', 'v30-intro.jpg'),
        ];
    }

    /**
     * @return list<Field>
     */
    private static function aboutFields(): array
    {
        return array_merge(
            [
                self::text('about_title', 'story', 'website.site.about.title', 180),
                self::text('story_kick', 'story', 'website.site.about.story_kick', 80),
                self::html('story_h2', 'story', 'website.site.about.story_h2', 400),
                self::textarea('quote', 'story', 'website.site.about.quote', 2000),
                self::text('quote_by', 'story', 'website.site.about.quote_by', 180),
                self::text('quote_cred', 'story', 'website.site.about.quote_cred', 180),
                self::text('cap', 'story', 'website.site.about.cap', 120),
                self::text('alt_team', 'story', 'website.site.about.alt_team', 180),
                self::image('team_image', 'story', 'v30-about-team.png'),
            ],
            self::repeat('stat', 3, 'story', [
                'b' => ['website.site.about.stats', 'b'],
                's' => ['website.site.about.stats', 's'],
            ]),
            [
                self::text('vision_kick', 'vision', 'website.site.about.vision_kick', 80),
                self::text('vision_h3', 'vision', 'website.site.about.vision_h3', 240),
                self::textarea('vision_p', 'vision', 'website.site.about.vision_p', 1600),
                self::text('kpi_intro', 'vision', 'website.site.about.kpi_intro', 180),
                self::text('kpi_from', 'vision', 'website.site.about.kpi_from', 80),
                self::text('kpi_to', 'vision', 'website.site.about.kpi_to', 80),
                self::text('kpi1', 'vision', 'website.site.about.kpi1', 240),
                self::text('kpi2', 'vision', 'website.site.about.kpi2', 240),
                self::text('alt_vision', 'vision', 'website.site.about.alt_vision', 180),
                self::image('vision_image', 'vision', 'v30-vision.jpg'),
                self::text('company_kick', 'company', 'website.site.about.company_kick', 80),
                self::html('company_h2', 'company', 'website.site.about.company_h2', 400),
                self::text('tab_t1', 'company', 'website.site.about.tabs.t1', 80),
                self::text('tab_t2', 'company', 'website.site.about.tabs.t2', 80),
                self::text('tab_t3', 'company', 'website.site.about.tabs.t3', 80),
                self::text('tab_t4', 'company', 'website.site.about.tabs.t4', 80),
                self::textarea('lead', 'company', 'website.site.about.lead', 2000),
            ],
            self::repeat('stage', 4, 'company', [
                'n' => ['website.site.about.stages', 'n'],
                'title' => ['website.site.about.stages', 'title'],
                'body' => ['website.site.about.stages', 'body'],
            ]),
            [
                self::text('edge1_kick', 'edges', 'website.site.about.edge1_kick', 80),
                self::text('edge1_h3', 'edges', 'website.site.about.edge1_h3', 180),
                self::textarea('edge1_p', 'edges', 'website.site.about.edge1_p', 1200),
                self::list('edge1_chips', 'edges', 'website.site.about.edge1_chips'),
                self::image('edge1_image', 'edges', 'v30-about-flour.jpg'),
            ],
            self::repeat('edge', 4, 'edges', [
                'n' => ['website.site.about.edges', 'n'],
                'title' => ['website.site.about.edges', 'title'],
                'body' => ['website.site.about.edges', 'body'],
            ]),
            [
                self::image('edge_1_image', 'edges', 'v30-value-review.jpg'),
                self::image('edge_2_image', 'edges', 'v30-value-health.jpg'),
                self::image('edge_3_image', 'edges', 'v30-value-system.png'),
                self::image('edge_4_image', 'edges', 'v30-value-ip.png'),
            ],
            self::repeat('value', 5, 'values', [
                'title' => ['website.site.about.values', 'title'],
                'body' => ['website.site.about.values', 'body'],
            ]),
            [
                self::text('vision_label', 'mission', 'website.site.about.vision_label', 80),
                self::textarea('vision_text', 'mission', 'website.site.about.vision_text', 1200),
                self::text('alt_expert', 'mission', 'website.site.about.alt_expert', 180),
                self::image('expert_image', 'mission', 'v30-expert.jpg'),
                self::text('mission_label', 'mission', 'website.site.about.mission_label', 80),
                self::textarea('mission_text', 'mission', 'website.site.about.mission_text', 1200),
                self::text('alt_mission', 'mission', 'website.site.about.alt_mission', 180),
                self::image('mission_image', 'mission', 'v30-mission.jpg'),
            ],
            self::repeat('goal', 5, 'mission', [
                'text' => ['website.site.about.goals'],
            ], ['text' => 'textarea']),
        );
    }

    /**
     * @return list<Field>
     */
    private static function makeFields(): array
    {
        return array_merge(
            [
                self::text('make_title', 'journey', 'website.site.make.title', 180),
                self::html('chapter', 'journey', 'website.site.make.chapter', 180),
                self::text('kick', 'journey', 'website.site.make.kick', 80),
                self::html('h2', 'journey', 'website.site.make.h2', 400),
                self::textarea('sub', 'journey', 'website.site.make.sub'),
                self::text('banner_kick', 'journey', 'website.site.make.banner_kick', 80),
                self::text('banner', 'journey', 'website.site.make.banner', 240),
                self::text('alt_journey', 'journey', 'website.site.make.alt_journey', 180),
                self::image('craft_image', 'journey', 'v30-craft.jpg'),
            ],
            self::repeat('step', 4, 'journey', [
                'n' => ['website.site.make.steps', 'n'],
                'title' => ['website.site.make.steps', 'title'],
                'body' => ['website.site.make.steps', 'body'],
            ]),
            [
                self::text('flour_kick', 'flour', 'website.site.make.flour_kick', 80),
                self::html('flour_h2', 'flour', 'website.site.make.flour_h2', 400),
                self::textarea('flour_p', 'flour', 'website.site.make.flour_p', 1200),
                self::text('flour_stamp', 'flour', 'website.site.make.flour_stamp', 80),
                self::text('flour_stamp_sub', 'flour', 'website.site.make.flour_stamp_sub', 80),
                self::text('flour_alt', 'flour', 'website.site.make.flour_alt', 180),
                self::image('flour_image', 'flour', 'v30-nutrition.jpg'),
            ],
            self::repeat('kpi', 3, 'flour', [
                'b' => ['website.site.make.kpis', 'b'],
                's' => ['website.site.make.kpis', 's'],
            ]),
            self::repeat('spec', 6, 'flour', [
                'title' => ['website.site.make.specs', 'title'],
                'body' => ['website.site.make.specs', 'body'],
            ]),
        );
    }

    /**
     * @return list<Field>
     */
    private static function consultFields(): array
    {
        return [
            self::text('title', 'copy', 'website.consult.title', 180),
            self::text('kick', 'copy', 'website.consult.kick', 80),
            self::html('h1', 'copy', 'website.consult.h1', 400),
            self::textarea('lead', 'copy', 'website.consult.lead'),
            self::text('tick1', 'copy', 'website.consult.tick1', 240),
            self::text('tick1_sub', 'copy', 'website.consult.tick1_sub', 240),
            self::text('tick2', 'copy', 'website.consult.tick2', 240),
            self::text('tick2_sub', 'copy', 'website.consult.tick2_sub', 240),
            self::text('tick3', 'copy', 'website.consult.tick3', 240),
            self::text('tick3_sub', 'copy', 'website.consult.tick3_sub', 240),
            self::text('expert_name', 'copy', 'website.consult.expert_name', 120),
            self::text('expert_sub', 'copy', 'website.consult.expert_sub', 180),
            self::text('expert_alt', 'copy', 'website.consult.expert_alt', 180),
            self::image('expert_image', 'copy', 'p211_200x200.jpg'),
            self::text('book_title', 'copy', 'website.consult.book_title', 120),
        ];
    }

    /**
     * @return list<Field>
     */
    private static function helpFields(): array
    {
        return array_merge(
            [
                self::text('title', 'faq', 'website.site.faq.title', 180),
                self::text('kick', 'faq', 'website.site.faq.kick', 80),
                self::html('h2', 'faq', 'website.site.faq.h2', 400),
            ],
            self::repeat('faq', 7, 'faq', [
                'q' => ['website.site.faq.items', 'q'],
                'a' => ['website.site.faq.items', 'a'],
            ], ['q' => 'text', 'a' => 'textarea']),
        );
    }

    /**
     * @return list<Field>
     */
    private static function storeFields(): array
    {
        return [
            self::text('title', 'hero', 'website.store.title', 180),
            self::text('kick', 'hero', 'website.store.kick', 120),
            self::html('heading', 'hero', 'website.store.heading', 400),
            self::textarea('lead', 'hero', 'website.store.lead'),
        ];
    }

    /**
     * @return list<Field>
     */
    private static function subscribeFields(): array
    {
        return [
            self::text('title', 'hero', 'website.subscribe.title', 180),
            self::html('heading', 'hero', 'website.subscribe.heading', 400),
            self::textarea('lead', 'hero', 'website.subscribe.lead'),
        ];
    }

    /**
     * @return list<Field>
     */
    private static function blogFields(): array
    {
        return [
            self::text('title', 'kitchen', 'website.blog.title', 180),
            self::text('chapter', 'kitchen', 'website.site.kitchen.chapter', 80),
            self::text('kick', 'kitchen', 'website.site.kitchen.kick', 80),
            self::html('h2', 'kitchen', 'website.site.kitchen.h2', 400),
            self::textarea('sub', 'kitchen', 'website.site.kitchen.sub'),
            self::text('toc_articles', 'kitchen', 'website.blog.toc_articles', 80),
            self::text('toc_recipes', 'kitchen', 'website.blog.toc_recipes', 80),
        ];
    }

    /**
     * @return list<Field>
     */
    private static function menuFields(): array
    {
        return [
            self::text('title', 'hero', 'website.menu_page.title', 180),
            self::text('h1_prefix', 'hero', 'website.menu_page.h1_prefix', 120),
            self::textarea('sub', 'hero', 'website.menu_page.sub'),
            self::text('cta_start', 'hero', 'website.menu_page.cta_start', 80),
            self::text('cta_sub_default', 'hero', 'website.menu_page.cta_sub_default', 180),
        ];
    }

    /**
     * @return list<Field>
     */
    private static function termsFields(): array
    {
        return [
            self::text('title', 'legal', 'website.terms.title', 180),
            self::text('kick', 'legal', 'website.terms.kick', 80),
            self::text('h1', 'legal', 'website.terms.h1', 240),
            self::textarea('lead', 'legal', 'website.terms.lead'),
            self::text('toc_title', 'legal', 'website.terms.toc_title', 80),
            self::text('note', 'legal', 'website.terms.note', 240),
            self::text('section_1_id', 'legal', ['website.terms.sections', 0, 'id'], 40),
            self::text('section_1_title', 'legal', ['website.terms.sections', 0, 'title'], 240),
            self::rich('section_1_html', 'legal', ['website.terms.sections', 0, 'html']),
            self::text('section_2_id', 'legal', ['website.terms.sections', 1, 'id'], 40),
            self::text('section_2_title', 'legal', ['website.terms.sections', 1, 'title'], 240),
            self::rich('section_2_html', 'legal', ['website.terms.sections', 1, 'html']),
            self::text('section_3_id', 'legal', ['website.terms.sections', 2, 'id'], 40),
            self::text('section_3_title', 'legal', ['website.terms.sections', 2, 'title'], 240),
            self::rich('section_3_html', 'legal', ['website.terms.sections', 2, 'html']),
        ];
    }

    /**
     * @param  string|list<int|string>  $fallback
     * @return Field
     */
    private static function text(string $key, string $section, string|array $fallback, int $max = 800): array
    {
        return ['key' => $key, 'type' => 'text', 'section' => $section, 'fallback' => $fallback, 'max' => $max];
    }

    /**
     * @param  string|list<int|string>  $fallback
     * @return Field
     */
    private static function html(string $key, string $section, string|array $fallback, int $max = 800): array
    {
        return ['key' => $key, 'type' => 'html', 'section' => $section, 'fallback' => $fallback, 'max' => $max];
    }

    /**
     * @param  string|list<int|string>  $fallback
     * @return Field
     */
    private static function textarea(string $key, string $section, string|array $fallback, int $max = 1600): array
    {
        return ['key' => $key, 'type' => 'textarea', 'section' => $section, 'fallback' => $fallback, 'max' => $max];
    }

    /**
     * @param  string|list<int|string>  $fallback
     * @return Field
     */
    private static function list(string $key, string $section, string|array $fallback, int $max = 800): array
    {
        return ['key' => $key, 'type' => 'list', 'section' => $section, 'fallback' => $fallback, 'max' => $max];
    }

    /**
     * @param  string|list<int|string>  $fallback
     * @return Field
     */
    private static function rich(string $key, string $section, string|array $fallback, int $max = 20000): array
    {
        return ['key' => $key, 'type' => 'rich', 'section' => $section, 'fallback' => $fallback, 'max' => $max];
    }

    /**
     * @return Field
     */
    private static function image(string $key, string $section, string $file): array
    {
        return ['key' => $key, 'type' => 'image', 'section' => $section, 'fallback_image' => $file];
    }

    /**
     * Flatten a numbered group: prefix_1_attr, prefix_2_attr, …
     *
     * @param  array<string, list<int|string>>  $attrs
     * @param  array<string, 'text'|'textarea'|'list'>  $types
     * @return list<Field>
     */
    private static function repeat(string $prefix, int $count, string $section, array $attrs, array $types = []): array
    {
        $fields = [];

        for ($i = 1; $i <= $count; $i++) {
            foreach ($attrs as $attr => $langPath) {
                $type = $types[$attr] ?? 'text';
                $fallback = $langPath;
                $fallback[] = $i - 1;
                if ($attr !== 'text' && count($langPath) > 1) {
                    $base = $langPath;
                    $attrKey = array_pop($base);
                    $fallback = array_merge($base, [$i - 1, $attrKey]);
                } elseif ($attr === 'text') {
                    $fallback = array_merge($langPath, [$i - 1]);
                }

                $max = $type === 'textarea' ? 1600 : 400;
                $fields[] = [
                    'key' => $prefix.'_'.$i.'_'.$attr,
                    'type' => $type,
                    'section' => $section,
                    'fallback' => $fallback,
                    'max' => $max,
                ];
            }
        }

        return $fields;
    }
}
