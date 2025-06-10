<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->words(3, true);
        return [
            'name' => ucfirst($name),
            'slug' => Str::slug($name),
            'category_id' => Category::factory(),
            'brand_id' => Brand::factory(),
            'supplier_id' => Supplier::factory(),
            'quantity' => fake()->numberBetween(1, 100),
            'price' => fake()->randomFloat(2, 100, 10000),
            'discount' => fake()->randomFloat(2, 0, 1000),
            'image' => fake()->imageUrl(),
            'description' => fake()->paragraph(),
            'status' => fake()->boolean(),
        ];
    }
}
