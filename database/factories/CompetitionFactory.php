<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompetitionFactory extends Factory
{
    public function definition(): array
    {
        $registrationStart = fake()->dateTimeBetween('-15 days', 'now');
        $registrationDeadline = fake()->dateTimeBetween('+15 days', '+60 days');

        $competitionStart = (clone $registrationDeadline)->modify('+14 days');
        $competitionEnd = (clone $competitionStart)->modify('+3 days');

        return [
            'competition_name' => fake()->sentence(4),
            'description' => fake()->paragraphs(3, true),

            'competition_type' => fake()->randomElement([
                'Individual', 'Team', 'Both'
            ]),

            'competition_mode' => fake()->randomElement([
                'Online', 'Offline', 'Hybrid'
            ]),

            'difficulty_level' => fake()->randomElement([
                'Beginner', 'Intermediate', 'Advanced'
            ]),

            'competition_level' => fake()->randomElement([
                'School', 'University', 'National', 'International'
            ]),

            'registration_fee' => fake()->randomElement([
                0, 25000, 50000, 75000, 100000
            ]),

            'currency' => 'IDR',

            'prizepool' => fake()->randomElement([
                1000000, 3000000, 5000000, 10000000, 25000000
            ]),

            'min_team_members' => 1,
            'max_team_members' => fake()->randomElement([1, 3, 4, 5]),

            'region' => fake()->city(),
            'city' => fake()->city(),
            'country' => 'Indonesia',

            'registration_start' => $registrationStart,
            'registration_deadline' => $registrationDeadline,
            'competition_start' => $competitionStart,
            'competition_end' => $competitionEnd,

            'poster_url' => null,
            'registration_url' => fake()->url(),
            'official_url' => fake()->url(),

            'significance' => fake()->paragraph(),

            'status' => 'Open',
        ];
    }
}
