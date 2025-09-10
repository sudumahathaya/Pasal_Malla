<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Books & Notebooks',
                'name_sinhala' => 'පොත් සහ නෝට්ස්',
                'slug' => 'books-notebooks',
                'description' => 'Exercise books, notebooks, textbooks and educational materials',
                'icon' => '📚',
                'sort_order' => 1,
            ],
            [
                'name' => 'Stationery',
                'name_sinhala' => 'ලිපි ද්‍රව්‍ය',
                'slug' => 'stationery',
                'description' => 'Pens, pencils, erasers, rulers and writing materials',
                'icon' => '✏️',
                'sort_order' => 2,
            ],
            [
                'name' => 'School Bags',
                'name_sinhala' => 'පාසල් බෑග්',
                'slug' => 'school-bags',
                'description' => 'Backpacks, school bags and carrying accessories',
                'icon' => '🎒',
                'sort_order' => 3,
            ],
            [
                'name' => 'Lunch & Water Bottles',
                'name_sinhala' => 'ආහාර සහ වතුර බෝතල්',
                'slug' => 'lunch-water-bottles',
                'description' => 'Lunch boxes, water bottles and food containers',
                'icon' => '🍱',
                'sort_order' => 4,
            ],
            [
                'name' => 'Uniforms & Shoes',
                'name_sinhala' => 'නිල ඇඳුම් සහ සපත්තු',
                'slug' => 'uniforms-shoes',
                'description' => 'School uniforms, shoes and accessories',
                'icon' => '👕',
                'sort_order' => 5,
            ],
            [
                'name' => 'Art & Craft',
                'name_sinhala' => 'කලා සහ ශිල්ප',
                'slug' => 'art-craft',
                'description' => 'Art supplies, craft materials and creative tools',
                'icon' => '🎨',
                'sort_order' => 6,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
