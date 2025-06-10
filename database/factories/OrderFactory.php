<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => \App\Models\Customer::factory(),
            'status' => fake()->randomElement(['pending', 'completed', 'cancelled']),
            'total' => fake()->randomFloat(2, 100, 10000),
            'note' => fake()->optional()->sentence(),
        ];
    }
}
