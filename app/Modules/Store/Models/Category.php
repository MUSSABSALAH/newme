<?php

declare(strict_types=1);

namespace App\Modules\Store\Models;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

/**
 * @property int $id
 * @property string $public_id
 * @property int|null $parent_id
 * @property string $slug
 * @property Category|null $parent
 * @property array<string, string> $name
 * @property array<string, string>|null $description
 * @property string|null $image_path
 * @property bool $is_active
 * @property int $sort_order
 */
class Category extends Model
{
    /** @use HasFactory<CategoryFactory> */
    use HasFactory, HasTranslations, SoftDeletes;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'public_id',
        'parent_id',
        'slug',
        'name',
        'description',
        'image_path',
        'is_active',
        'sort_order',
    ];

    /**
     * @var list<string>
     */
    public array $translatable = ['name', 'description'];

    protected static function booted(): void
    {
        static::creating(function (Category $category): void {
            if (empty($category->public_id)) {
                $category->public_id = (string) Str::ulid();
            }
        });
    }

    protected static function newFactory(): CategoryFactory
    {
        return CategoryFactory::new();
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

    /**
     * @return BelongsTo<Category, $this>
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    /**
     * @return HasMany<Category, $this>
     */
    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    /**
     * @return HasMany<Product, $this>
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function isParent(): bool
    {
        return $this->parent_id === null;
    }

    public function label(?string $locale = null): string
    {
        $locale ??= app()->getLocale();

        $value = $this->getTranslation('name', $locale, false);

        if (is_string($value) && $value !== '') {
            return $value;
        }

        foreach ($this->getTranslations('name') as $translated) {
            if (is_string($translated) && $translated !== '') {
                return $translated;
            }
        }

        return $this->slug;
    }

    public function imageUrl(): ?string
    {
        if ($this->image_path === null || $this->image_path === '') {
            return null;
        }

        if (str_contains($this->image_path, '/')) {
            return asset('storage/'.$this->image_path);
        }

        return asset('assets/images/'.$this->image_path);
    }
}
