<?php

declare(strict_types=1);

namespace App\Modules\Plans\Support;

use App\Modules\Plans\Models\Meal;

/**
 * Shows a dish saved on a subscription in the language of the page.
 *
 * Subscriptions keep the dish as the plain name the customer picked, in the
 * language they were browsing in. The name is matched against the meal
 * catalogue in any language and the current-locale name is returned; a dish
 * no longer in the catalogue is shown as saved.
 */
final class MealNameTranslator
{
    /** @var array<string, Meal>|null */
    private ?array $index = null;

    public function translate(string $dish, ?string $locale = null): string
    {
        $meal = $this->index()[$this->key($dish)] ?? null;

        if ($meal === null) {
            return $dish;
        }

        $name = $meal->getTranslation('name', $locale ?? app()->getLocale(), false);

        return is_string($name) && trim($name) !== '' ? $name : $dish;
    }

    /**
     * @return array<string, Meal>
     */
    private function index(): array
    {
        if ($this->index !== null) {
            return $this->index;
        }

        $index = [];

        foreach (Meal::withTrashed()->get(['id', 'name', 'deleted_at']) as $meal) {
            foreach ($meal->getTranslations('name') as $name) {
                if (is_string($name) && trim($name) !== '') {
                    // A live meal wins over an archived one with the same name.
                    $key = $this->key($name);
                    if (! isset($index[$key]) || $index[$key]->trashed()) {
                        $index[$key] = $meal;
                    }
                }
            }
        }

        return $this->index = $index;
    }

    private function key(string $name): string
    {
        return mb_strtolower(trim((string) preg_replace('/\s+/u', ' ', $name)));
    }
}
