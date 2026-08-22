<?php

declare(strict_types=1);

namespace App\Modules\Dashboard\DTOs;

use App\Modules\Store\Models\Category;
use Illuminate\Support\Collection;

final class CatalogPanelData
{
    /**
     * @param  Collection<int, Category>  $categories
     */
    public function __construct(
        public readonly int $products,
        public readonly int $activeProducts,
        public readonly int $hiddenProducts,
        public readonly int $featuredProducts,
        public readonly Collection $categories,
    ) {}
}
