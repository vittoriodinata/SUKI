<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Competition;
use App\Models\Organizer;
use Illuminate\Database\Seeder;

class CompetitionSeeder extends Seeder
{
    public function run(): void
    {
        $categoryIds = Category::pluck('id')->toArray();
        $organizerIds = Organizer::pluck('id')->toArray();

        if (empty($categoryIds) || empty($organizerIds)) {
            $this->command->error(
                'Categories and organizers must be seeded first.'
            );

            return;
        }

        if (Competition::exists()) {
            $this->command->info(
                'Competitions already exist. Skipping competition seeding.'
            );

            return;
        }

        for ($i = 0; $i < 30; $i++) {
            Competition::factory()->create([
                'category_id' => fake()->randomElement($categoryIds),
                'organizer_id' => fake()->randomElement($organizerIds),
            ]);
        }

        $this->command->info('30 competitions have been created.');
    }
}
