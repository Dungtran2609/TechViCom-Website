<?php

namespace Database\Seeders;

use App\Models\ProductsVariants;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ProductsVariantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ProductsVariants::factory()->count(10)->create();

    }
}
