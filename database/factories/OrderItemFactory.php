<?php
namespace Database\Factories;

use App\Models\Order;
use App\Models\ProductsVariants;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
    public function definition()
    {
        return [
            'order_item_id' => $this->faker->unique()->randomNumber(9),
            'order_id'      => Order::factory()->create()->order_id,
            'variant_id'    => ProductsVariants::factory()->create()->variant_id,
            'quantity'      => $this->faker->numberBetween(1, 10),
            'price'         => $this->faker->randomFloat(2, 1, 500),
        ];
    }
}
