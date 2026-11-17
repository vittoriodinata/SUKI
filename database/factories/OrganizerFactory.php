<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrganizerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'organizer_name' => fake()->company(),
            'organizer_type' => fake()->randomElement([
                'University',
                'Company',
                'Community',
                'Government',
                'Organization',
            ]),
            'email' => fake()->unique()->safeEmail(),
            'website' => fake()->optional()->url(),
            'description' => fake()->paragraph(),
        ];
    }
}
