<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use App\Modules\Invoices\Models\Invoice;
use App\Modules\Orders\Models\Order;
use App\Support\Money\Rounding;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @extends Factory<Invoice>
 */
class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $total = fake()->numberBetween(5_000, 80_000);
        $tax = Rounding::divide($total * 1500, 11500);
        $net = $total - $tax;

        return [
            'public_id' => (string) Str::ulid(),
            'number' => 'INV-'.now()->format('Y').'-'.str_pad((string) fake()->unique()->numberBetween(1, 999_999), 6, '0', STR_PAD_LEFT),
            'user_id' => User::factory()->customer(),
            'invoiceable_type' => Order::class,
            'invoiceable_id' => Order::factory(),
            'issued_at' => now(),
            'currency' => 'SAR',
            'tax_rate_bps' => 1500,
            'lines_total_minor' => $net,
            'discount_minor' => 0,
            'net_minor' => $net,
            'tax_minor' => $tax,
            'total_minor' => $total,
            'seller' => [
                'name' => 'New Me',
                'tax_number' => '310000000000003',
                'email' => 'billing@example.test',
                'phone' => '0500000000',
                'address' => 'Riyadh',
            ],
            'buyer' => [
                'name' => fake()->name(),
                'tax_number' => null,
                'email' => fake()->safeEmail(),
                'phone' => '0511111111',
                'address' => 'Riyadh',
            ],
            'lines' => [
                [
                    'description' => 'Test item',
                    'quantity' => 1,
                    'unit_price_minor' => $net,
                    'line_total_minor' => $net,
                ],
            ],
        ];
    }

    public function payable(Model $payable): static
    {
        return $this->state(fn (array $attributes): array => [
            'invoiceable_type' => $payable::class,
            'invoiceable_id' => $payable->getKey(),
        ]);
    }
}
