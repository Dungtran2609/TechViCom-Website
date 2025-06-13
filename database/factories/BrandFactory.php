<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BrandFactory extends Factory
{
    protected $model = \App\Models\Brand::class;

    public function definition(): array
    {
        $name = $this->faker->unique()->word();
        return [
            'name'        => $name,
            'slug'        => Str::slug($name),
            'description' => $this->faker->sentence(),
        ];
    }
}
