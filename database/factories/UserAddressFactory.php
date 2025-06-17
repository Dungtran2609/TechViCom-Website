<?php
namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserAddressFactory extends Factory
{
    public function definition(): array
    {
        return [
            // 'address_id'   => $this->faker->unique()->randomNumber(9),                    // Khóa chính không tự tăng
            'user_id'      => User::inRandomOrder()->first()->user_id ?? User::factory(), // Lấy user hiện có hoặc tạo mới
            'address_line' => $this->faker->streetAddress,
            'ward'         => $this->faker->word,
            'district'     => $this->faker->citySuffix,
            'city'         => $this->faker->city,
            'is_default'   => $this->faker->boolean(30), // 30% là địa chỉ mặc định
            'created_at'   => now(),
            'updated_at'   => now(),
        ];
    }
}
