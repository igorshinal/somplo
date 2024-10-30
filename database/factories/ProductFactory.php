<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Seller;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * @return array|mixed[]
     */
    public function definition(): array
    {
        return [
            'phone_name' => $this->faker->word,
            'seller_id' => Seller::factory(),
            'display_size' => $this->faker->randomFloat(2, 5.0, 7.0),
            'quantity' => $this->faker->numberBetween(1, 100),
            'cost' => $this->faker->randomFloat(2, 100, 1000),
        ];
    }
}

