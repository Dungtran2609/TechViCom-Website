<?php
namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    public function definition()
    {
        return [
            'product_id'     => $this->faker->unique()->randomNumber(9),
            'category_id'    => Category::factory()->create()->category_id,
            'brand_id'       => Brand::factory()->create()->brand_id,
            'name'           => $this->faker->word . ' Products',
            'price'          => $this->faker->randomFloat(2, 100, 1000),
            'discount_price' => $this->faker->optional(0.7)->randomFloat(2, 50, 900),
            'description'    => $this->faker->paragraph,
            'status'         => $this->faker->randomElement(['active', 'hidden']),
            'created_by'     => User::factory()->create()->user_id,
            'created_at'     => now(),
            'updated_at'     => now(),
        ];
    }
}
