<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::all()->keyBy('slug');

        $products = [
            // Books & Notebooks
            [
                'name' => 'Exercise Book - 200 Pages',
                'name_sinhala' => 'අභ්‍යාස පොත - පිටු 200',
                'slug' => 'exercise-book-200-pages',
                'description' => 'High quality exercise book with 200 ruled pages. Perfect for all subjects.',
                'description_sinhala' => 'උසස් තත්ත්වයේ අභ්‍යාස පොතක්. සියලුම විෂයයන් සඳහා සුදුසුයි.',
                'price' => 150.00,
                'sale_price' => 120.00,
                'sku' => 'EXB-200',
                'stock_quantity' => 500,
                'category_id' => $categories['books-notebooks']->id,
                'grades' => ['Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5'],
                'is_featured' => true,
            ],
            [
                'name' => 'Graph Book - A4 Size',
                'name_sinhala' => 'ග්‍රැෆ් පොත - A4 ප්‍රමාණය',
                'slug' => 'graph-book-a4',
                'description' => 'A4 size graph book with square grid pattern. Ideal for mathematics and science.',
                'price' => 200.00,
                'sku' => 'GRB-A4',
                'stock_quantity' => 300,
                'category_id' => $categories['books-notebooks']->id,
                'grades' => ['Grade 6-9', 'O/L', 'A/L'],
                'is_featured' => true,
            ],
            [
                'name' => 'Composition Book',
                'name_sinhala' => 'රචනා පොත',
                'slug' => 'composition-book',
                'description' => 'Premium composition book for creative writing and essays.',
                'price' => 180.00,
                'sku' => 'COMP-001',
                'stock_quantity' => 250,
                'category_id' => $categories['books-notebooks']->id,
                'grades' => ['Grade 3', 'Grade 4', 'Grade 5', 'Grade 6-9'],
            ],

            // Stationery
            [
                'name' => 'Blue Ballpoint Pen',
                'name_sinhala' => 'නිල් බෝල්පොයින්ට් පෑන',
                'slug' => 'blue-ballpoint-pen',
                'description' => 'Smooth writing blue ballpoint pen. Long lasting ink.',
                'price' => 25.00,
                'sale_price' => 20.00,
                'sku' => 'PEN-BLUE',
                'stock_quantity' => 1000,
                'category_id' => $categories['stationery']->id,
                'grades' => ['Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5', 'Grade 6-9', 'O/L', 'A/L'],
                'is_featured' => true,
            ],
            [
                'name' => 'HB Pencil Set (12 pieces)',
                'name_sinhala' => 'HB පැන්සල් කට්ටලය (කෑලි 12)',
                'slug' => 'hb-pencil-set-12',
                'description' => 'Set of 12 high quality HB pencils. Perfect for writing and drawing.',
                'price' => 300.00,
                'sale_price' => 250.00,
                'sku' => 'PENCIL-HB-12',
                'stock_quantity' => 200,
                'category_id' => $categories['stationery']->id,
                'grades' => ['Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5'],
                'is_featured' => true,
            ],
            [
                'name' => 'Eraser - Large Size',
                'name_sinhala' => 'මකනය - විශාල ප්‍රමාණය',
                'slug' => 'eraser-large',
                'description' => 'Large white eraser for clean erasing without smudging.',
                'price' => 15.00,
                'sku' => 'ERASER-LG',
                'stock_quantity' => 800,
                'category_id' => $categories['stationery']->id,
                'grades' => ['Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5', 'Grade 6-9'],
            ],
            [
                'name' => '30cm Ruler',
                'name_sinhala' => 'සෙන්ටිමීටර 30 රූලර්',
                'slug' => '30cm-ruler',
                'description' => 'Transparent plastic ruler with clear markings. 30cm length.',
                'price' => 35.00,
                'sku' => 'RULER-30',
                'stock_quantity' => 400,
                'category_id' => $categories['stationery']->id,
                'grades' => ['Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5', 'Grade 6-9'],
            ],

            // School Bags
            [
                'name' => 'Primary School Backpack - Blue',
                'name_sinhala' => 'ප්‍රාථමික පාසල් බෑගය - නිල්',
                'slug' => 'primary-backpack-blue',
                'description' => 'Comfortable and durable backpack for primary school students. Multiple compartments.',
                'price' => 2500.00,
                'sale_price' => 2200.00,
                'sku' => 'BAG-PRI-BLUE',
                'stock_quantity' => 50,
                'category_id' => $categories['school-bags']->id,
                'grades' => ['Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5'],
                'is_featured' => true,
            ],
            [
                'name' => 'Secondary School Backpack - Black',
                'name_sinhala' => 'ද්විතීයික පාසල් බෑගය - කළු',
                'slug' => 'secondary-backpack-black',
                'description' => 'Large capacity backpack for secondary school students. Water resistant.',
                'price' => 3500.00,
                'sku' => 'BAG-SEC-BLACK',
                'stock_quantity' => 30,
                'category_id' => $categories['school-bags']->id,
                'grades' => ['Grade 6-9', 'O/L', 'A/L'],
                'is_featured' => true,
            ],

            // Lunch & Water Bottles
            [
                'name' => 'Lunch Box - 3 Compartments',
                'name_sinhala' => 'ආහාර පෙට්ටිය - කොටස් 3',
                'slug' => 'lunch-box-3-compartments',
                'description' => 'BPA-free lunch box with 3 separate compartments. Leak-proof design.',
                'price' => 800.00,
                'sale_price' => 650.00,
                'sku' => 'LUNCH-3COMP',
                'stock_quantity' => 100,
                'category_id' => $categories['lunch-water-bottles']->id,
                'grades' => ['Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5', 'Grade 6-9'],
                'is_featured' => true,
            ],
            [
                'name' => 'Water Bottle - 500ml',
                'name_sinhala' => 'වතුර බෝතලය - මිලි 500',
                'slug' => 'water-bottle-500ml',
                'description' => 'BPA-free water bottle with easy-open cap. 500ml capacity.',
                'price' => 450.00,
                'sku' => 'WATER-500',
                'stock_quantity' => 150,
                'category_id' => $categories['lunch-water-bottles']->id,
                'grades' => ['Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5', 'Grade 6-9', 'O/L', 'A/L'],
            ],

            // Art & Craft
            [
                'name' => 'Color Pencil Set - 24 Colors',
                'name_sinhala' => 'වර්ණ පැන්සල් කට්ටලය - වර්ණ 24',
                'slug' => 'color-pencil-set-24',
                'description' => 'Professional quality color pencils in 24 vibrant colors. Perfect for art projects.',
                'price' => 1200.00,
                'sale_price' => 950.00,
                'sku' => 'COLOR-24',
                'stock_quantity' => 80,
                'category_id' => $categories['art-craft']->id,
                'grades' => ['Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5', 'Grade 6-9'],
                'is_featured' => true,
            ],
            [
                'name' => 'Watercolor Paint Set',
                'name_sinhala' => 'ජල වර්ණ කට්ටලය',
                'slug' => 'watercolor-paint-set',
                'description' => '12 color watercolor paint set with brush included.',
                'price' => 600.00,
                'sku' => 'WATER-COLOR',
                'stock_quantity' => 60,
                'category_id' => $categories['art-craft']->id,
                'grades' => ['Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5'],
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
