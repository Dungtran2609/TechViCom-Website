<?php
namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Products;
use App\Models\User; // Hoặc Product, tùy theo model bạn dùng
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::factory()->count(5)->create(); // Tạo 5 danh mục
        $brands     = Brand::factory()->count(5)->create();    // Tạo 5 thương hiệu (nếu có factory)
        $users      = User::factory()->count(5)->create();     // Tạo 5 người dùng (nếu có factory)

        Products::factory()->count(10)->create([
            'category_id' => $categories->random()->category_id,
            'brand_id'    => $brands->random()->brand_id,
            'created_by'  => $users->random()->user_id,
        ]);
    }
}
