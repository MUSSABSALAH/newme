<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Modules\Orders\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<OrderItem>
 */
class OrderItemFactory extends Factory
{
    protected $model = OrderItem::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $unitPrice = fake()->numberBetween(1_500, 9_000);
        $quantity = fake()->numberBetween(1, 4);

        return [
            'order_id' => OrderFactory::new(),
            'product_id' => null,
            'name' => fake()->words(3, true),
            'unit_price_minor' => $unitPrice,
            'quantity' => $quantity,
            'line_total_minor' => $unitPrice * $quantity,
        ];
    }
}
