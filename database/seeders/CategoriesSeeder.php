<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = json_decode(file_get_contents(database_path('json/categories.json')), true);
        foreach ($categories as $category) {
            Category::create(
                [
                    'title' => $category['title'],
                    'description' => $category['description'],
                ]
            );
        }
    }
}
