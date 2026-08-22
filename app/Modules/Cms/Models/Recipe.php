<?php

declare(strict_types=1);

namespace App\Modules\Cms\Models;

use Database\Factories\RecipeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

/**
 * @property int $id
 * @property string $public_id
 * @property string $slug
 * @property array<string, string> $category
 * @property array<string, string> $title
 * @property array<string, string>|null $excerpt
 * @property array<string, string>|null $meta_title
 * @property array<string, string>|null $time_label
 * @property array<string, string>|null $kcal_label
 * @property array<string, string>|null $protein_label
 * @property array<string, string>|null $servings_label
 * @property array<string, list<string>>|null $ingredients
 * @property array<string, list<string>>|null $steps
 * @property array<string, string>|null $cta_label
 * @property string|null $cta_url
 * @property string|null $image_path
 * @property bool $is_active
 * @property int $sort_order
 */
class Recipe extends Model
{
    /** @use HasFactory<RecipeFactory> */
    use HasFactory, HasTranslations, SoftDeletes;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'public_id',
        'slug',
        'category',
        'title',
        'excerpt',
        'meta_title',
        'time_label',
        'kcal_label',
        'protein_label',
        'servings_label',
        'ingredients',
        'steps',
        'cta_label',
        'cta_url',
        'image_path',
        'is_active',
        'sort_order',
    ];

    /**
     * @var list<string>
     */
    public array $translatable = [
        'category',
        'title',
        'excerpt',
        'meta_title',
        'time_label',
        'kcal_label',
        'protein_label',
        'servings_label',
        'ingredients',
        'steps',
        'cta_label',
    ];

    protected static function booted(): void
    {
        static::creating(function (Recipe $recipe): void {
            if (empty($recipe->public_id)) {
                $recipe->public_id = (string) Str::ulid();
            }
        });
    }

    protected static function newFactory(): RecipeFactory
    {
        return RecipeFactory::new();
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'id';
    }

    public function label(?string $locale = null): string
    {
        return $this->translated('title', $locale) ?: $this->slug;
    }

    public function translated(string $attribute, ?string $locale = null): string
    {
        $locale ??= app()->getLocale();

        $value = $this->getTranslation($attribute, $locale, false);

        if (is_string($value) && $value !== '') {
            return $value;
        }

        foreach ($this->getTranslations($attribute) as $translated) {
            if (is_string($translated) && $translated !== '') {
                return $translated;
            }
        }

        return '';
    }

    /**
     * @return list<string>
     */
    public function listFor(string $attribute, ?string $locale = null): array
    {
        $locale ??= app()->getLocale();

        $value = $this->getTranslation($attribute, $locale, false);

        if (is_array($value)) {
            return array_values(array_filter($value, static fn ($item): bool => is_string($item) && trim($item) !== ''));
        }

        foreach ($this->getTranslations($attribute) as $translated) {
            if (is_array($translated) && $translated !== []) {
                return array_values(array_filter($translated, static fn ($item): bool => is_string($item) && trim($item) !== ''));
            }
        }

        return [];
    }

    public function imageUrl(): ?string
    {
        if ($this->image_path === null || $this->image_path === '') {
            return null;
        }

        if (str_starts_with($this->image_path, 'http://') || str_starts_with($this->image_path, 'https://')) {
            return $this->image_path;
        }

        if (str_contains($this->image_path, '/')) {
            return asset('storage/'.$this->image_path);
        }

        $stored = 'cms/recipes/'.$this->image_path;
        if (
            is_file(storage_path('app/public/'.$stored))
            || is_file(public_path('storage/'.$stored))
        ) {
            return asset('storage/'.$stored);
        }

        return asset('assets/images/'.$this->image_path);
    }

    public function anchorId(): string
    {
        return 'recipe-'.$this->slug;
    }
}
