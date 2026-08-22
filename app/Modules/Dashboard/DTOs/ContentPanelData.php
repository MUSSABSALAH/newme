<?php

declare(strict_types=1);

namespace App\Modules\Dashboard\DTOs;

final class ContentPanelData
{
    public function __construct(
        public readonly int $articles,
        public readonly int $publishedArticles,
        public readonly int $recipes,
        public readonly int $publishedRecipes,
    ) {}
}
