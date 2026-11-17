<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['category_name' => 'Technology', 'description' => 'Kompetisi teknologi dan inovasi digital.'],
            ['category_name' => 'Artificial Intelligence', 'description' => 'Kompetisi AI, machine learning, dan data science.'],
            ['category_name' => 'Business', 'description' => 'Kompetisi bisnis dan entrepreneurship.'],
            ['category_name' => 'Design', 'description' => 'Kompetisi UI/UX dan graphic design.'],
            ['category_name' => 'Science', 'description' => 'Kompetisi sains dan penelitian.'],
            ['category_name' => 'Writing', 'description' => 'Kompetisi essay dan creative writing.'],
            ['category_name' => 'Engineering', 'description' => 'Kompetisi engineering dan teknologi.'],
            ['category_name' => 'Photography', 'description' => 'Kompetisi fotografi.'],
            ['category_name' => 'Entrepreneurship', 'description' => 'Kompetisi ide bisnis dan startup.'],
            ['category_name' => 'Sports', 'description' => 'Kompetisi olahraga dan e-sports.'],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['category_name' => $category['category_name']],
                ['description' => $category['description']]
            );
        }
    }
}
