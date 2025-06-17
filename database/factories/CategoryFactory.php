<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition()
    {
        return [
            'category_id' => $this->faker->unique()->randomNumber(9),
            'parent_id'   => null, // Hoặc dùng Category::factory() để tạo parent nếu cần
            'name'        => $this->faker->word,
            'slug'        => $this->faker->slug(),
            'image'       => $this->faker->optional()->imageUrl(),
            'status'      => $this->faker->boolean(),
            'created_at'  => now(),
            'updated_at'  => now(),
        ];
    }
}
