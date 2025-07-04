<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Culinary Research & Innovation',
            'Chef Stories & Interviews',
            'Culture & Cuisine',
            'Sustainability & Food Ethics',
            'Food Business & Startups',
            'Tips, Recipes & Techniques',
            'Reviews & Features',
            'Student Research & Contributions',
        ];

        foreach ($categories as $name) {
            Category::create([
                'name' => $name,
                'slug' => Str::slug($name),
            ]);
        }
    }
}


