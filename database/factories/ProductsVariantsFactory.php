<?php
namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsVariantsFactory extends Factory
{
    public function definition()
    {
        return [
            'variant_id' => $this->faker->unique()->randomNumber(9),
            'product_id' => Products::factory()->create()->product_id,
            'ram'        => $this->faker->randomElement(['4GB', '8GB', '16GB']),
            'rom'        => $this->faker->randomElement(['64GB', '128GB', '256GB']),
            'color'      => $this->faker->safeColorName,
            'material'   => $this->faker->randomElement(['Plastic', 'Metal', 'Glass']),
            'stock'      => $this->faker->numberBetween(0, 100),
            'price'      => $this->faker->randomFloat(2, 50, 800),
        ];
    }
}
