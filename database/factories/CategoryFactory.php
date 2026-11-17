<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'category_name' => fake()->unique()->words(2, true),
            'description' => fake()->sentence(),
        ];
    }
}
