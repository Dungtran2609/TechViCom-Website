<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(UserAddressSeeder::class);

        // 
        $this->call([
            CategorySeeder::class,
        ]);
        $this->call(BrandSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(ProductsVariantsSeeder::class);

        $this->call(OrderSeeder::class);
        $this->call(OrderItemSeeder::class);

    }
}
