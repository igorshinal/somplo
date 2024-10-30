<?php

namespace Database\Factories;

use App\Models\Seller;
use Illuminate\Database\Eloquent\Factories\Factory;

class SellerFactory extends Factory
{
    protected $model = Seller::class;

    /**
     * @return array|mixed[]
     */
    public function definition(): array
    {
        return [
            'seller_name' => $this->faker->company,
        ];
    }
}

