<?php

declare(strict_types=1);

namespace App\Modules\Orders\Models;

use App\Modules\Store\Models\Product;
use App\Support\Money\Money;
use Database\Factories\OrderItemFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $order_id
 * @property int|null $product_id
 * @property string $name
 * @property int $unit_price_minor
 * @property int $quantity
 * @property int $line_total_minor
 */
class OrderItem extends Model
{
    /** @use HasFactory<OrderItemFactory> */
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'name',
        'unit_price_minor',
        'quantity',
        'line_total_minor',
    ];

    protected static function newFactory(): OrderItemFactory
    {
        return OrderItemFactory::new();
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'unit_price_minor' => 'integer',
            'quantity' => 'integer',
            'line_total_minor' => 'integer',
        ];
    }

    /**
     * @return BelongsTo<Order, $this>
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * @return BelongsTo<Product, $this>
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function unitPriceDisplay(): string
    {
        return Money::fromMinor($this->unit_price_minor)->format();
    }

    public function lineTotalDisplay(): string
    {
        return Money::fromMinor($this->line_total_minor)->format();
    }
}
