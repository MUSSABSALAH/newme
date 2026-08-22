<?php

declare(strict_types=1);

namespace App\Modules\Store\Models;

use App\Modules\Store\Enums\NutritionNote;
use App\Modules\Store\Enums\ProductFlag;
use App\Modules\Store\Enums\ServingSize;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

/**
 * @property int $id
 * @property string $public_id
 * @property int $category_id
 * @property string $slug
 * @property array<string, string> $name
 * @property array<string, string>|null $description
 * @property string|null $image_path
 * @property string|null $external_url
 * @property int $price
 * @property int|null $calories
 * @property ServingSize|null $serving_size
 * @property string|null $protein_g
 * @property string|null $carbs_g
 * @property string|null $fat_g
 * @property NutritionNote|null $nutrition_note
 * @property ProductFlag|null $flag
 * @property bool $is_featured
 * @property bool $is_active
 * @property int $sort_order
 */
class Product extends Model
{
    /** @use HasFactory<ProductFactory> */
    use HasFactory, HasTranslations, SoftDeletes;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'public_id',
        'category_id',
        'slug',
        'name',
        'description',
        'image_path',
        'external_url',
        'price',
        'calories',
        'serving_size',
        'protein_g',
        'carbs_g',
        'fat_g',
        'nutrition_note',
        'flag',
        'is_featured',
        'is_active',
        'sort_order',
    ];

    /**
     * @var list<string>
     */
    public array $translatable = ['name', 'description'];

    protected static function booted(): void
    {
        static::creating(function (Product $product): void {
            if (empty($product->public_id)) {
                $product->public_id = (string) Str::ulid();
            }
        });
    }

    protected static function newFactory(): ProductFactory
    {
        return ProductFactory::new();
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'price' => 'integer',
            'calories' => 'integer',
            'serving_size' => ServingSize::class,
            'protein_g' => 'decimal:2',
            'carbs_g' => 'decimal:2',
            'fat_g' => 'decimal:2',
            'nutrition_note' => NutritionNote::class,
            'flag' => ProductFlag::class,
            'is_featured' => 'boolean',
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
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
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

    /**
     * Resolve the public URL for the product image.
     *
     * Uploaded / seeded images live under the public storage disk
     * (paths contain a folder). Legacy bare filenames may still point at
     * public/assets/images, but prefer a storage copy when one exists.
     */
    public function imageUrl(): ?string
    {
        if ($this->image_path === null || $this->image_path === '') {
            return null;
        }

        if (str_contains($this->image_path, '/')) {
            return asset('storage/'.$this->image_path);
        }

        $stored = 'store/products/'.$this->image_path;
        if (
            is_file(storage_path('app/public/'.$stored))
            || is_file(public_path('storage/'.$stored))
        ) {
            return asset('storage/'.$stored);
        }

        return asset('assets/images/'.$this->image_path);
    }
}
