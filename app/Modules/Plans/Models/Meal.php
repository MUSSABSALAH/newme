<?php

declare(strict_types=1);

namespace App\Modules\Plans\Models;

use App\Modules\Plans\Enums\MealType;
use Database\Factories\MealFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

/**
 * @property int $id
 * @property string $public_id
 * @property MealType $meal_type
 * @property array<string, string> $name
 * @property int|null $calories
 * @property int|null $protein_g
 * @property int|null $carbs_g
 * @property int|null $fat_g
 * @property string|null $image_path
 * @property bool $is_active
 * @property int $sort_order
 */
class Meal extends Model
{
    /** @use HasFactory<MealFactory> */
    use HasFactory, HasTranslations, SoftDeletes;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'public_id',
        'meal_type',
        'name',
        'calories',
        'protein_g',
        'carbs_g',
        'fat_g',
        'image_path',
        'is_active',
        'sort_order',
    ];

    /**
     * @var list<string>
     */
    public array $translatable = ['name'];

    protected static function booted(): void
    {
        static::creating(function (Meal $meal): void {
            if (empty($meal->public_id)) {
                $meal->public_id = (string) Str::ulid();
            }
        });
    }

    protected static function newFactory(): MealFactory
    {
        return MealFactory::new();
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'meal_type' => MealType::class,
            'calories' => 'integer',
            'protein_g' => 'integer',
            'carbs_g' => 'integer',
            'fat_g' => 'integer',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    /**
     * @return BelongsToMany<Plan, $this>
     */
    public function plans(): BelongsToMany
    {
        return $this->belongsToMany(Plan::class);
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

        return $this->public_id;
    }
}
