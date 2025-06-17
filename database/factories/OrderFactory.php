<?php
namespace Database\Factories;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition()
    {
        // Chọn một người dùng có địa chỉ
        $user = User::has('addresses')->inRandomOrder()->first();

        // Nếu không có người dùng nào có địa chỉ, tạo một địa chỉ mới
        if (! $user) {
            $user    = User::inRandomOrder()->first() ?? User::factory()->create();
            $address = UserAddress::factory()->create(['user_id' => $user->user_id]);
        } else {
            $address = $user->addresses()->inRandomOrder()->first();
        }

        return [
            'order_id'       => $this->faker->unique()->randomNumber(9),
            'user_id'        => $user->user_id,
            'address_id'     => $address->address_id, // Đảm bảo address_id không null

            'status'         => $this->faker->randomElement(['đang chờ', 'đã xác nhận', 'đang giao', 'hoàn thành', 'đã hủy']),
            'payment_method' => $this->faker->randomElement(['thanh toán khi nhận hàng', 'chuyển khoản ngân hàng', 'momo']),
            'total_amount'   => $this->faker->randomFloat(2, 10, 1000),
            'shipping_date'  => $this->faker->optional()->dateTimeBetween('now', '+7 days'),

            'created_at'     => now(),
            'updated_at'     => now(),
        ];
    }
}
