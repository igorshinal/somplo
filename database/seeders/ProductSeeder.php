<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        Product::factory()->count(10)->create();
    }
}

