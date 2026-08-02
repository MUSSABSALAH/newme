<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Modules\Addresses\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Address>
 */
class AddressFactory extends Factory
{
    protected $model = Address::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'public_id' => (string) Str::ulid(),
            'label' => fake()->randomElement(['Home', 'Work']),
            'recipient_name' => fake()->name(),
            'phone' => fake()->numerify('05########'),
            'city' => fake()->randomElement(['Riyadh', 'Jeddah', 'Dammam']),
            'district' => fake()->streetName(),
            'street' => fake()->streetAddress(),
            'national_address' => strtoupper(fake()->lexify('????').fake()->numerify('####')),
            'details' => null,
            'is_default' => false,
        ];
    }

    public function isDefault(): static
    {
        return $this->state(fn (array $attributes): array => [
            'is_default' => true,
        ]);
    }
}
