<?php

declare(strict_types=1);

namespace App\Modules\Cms\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * @property int $id
 * @property string $page
 * @property string $key
 * @property array<string, string> $value
 */
class PageContent extends Model
{
    use HasTranslations;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'page',
        'key',
        'value',
    ];

    /**
     * @var list<string>
     */
    public array $translatable = [
        'value',
    ];
}
