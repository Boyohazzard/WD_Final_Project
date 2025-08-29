<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->unique()->words(3, true);

        return [
            'title'       => $title,
            'slug'        => Str::slug($title).'-'.$this->faker->unique()->numberBetween(100, 999),
            'price_cents' => $this->faker->numberBetween(299, 29900),
            'stock'       => $this->faker->numberBetween(0, 200),
            'description' => $this->faker->paragraph(),
        ];
    }
}
