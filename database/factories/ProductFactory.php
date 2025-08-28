<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'title' => $this->faker->words(3, true),
            'price_cents' => $this->faker->numberBetween(500, 10000),
            'stock' => $this->faker->numberBetween(0, 100),
            'description' => $this->faker->paragraph,
        ];
    }
}
