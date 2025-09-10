<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bundle;
use App\Models\Product;
use App\Models\BundleProduct;

class BundleSeeder extends Seeder
{
    public function run()
    {
        // Grade 1 Full Pack
        $grade1Bundle = Bundle::create([
            'name' => 'Grade 1 Full Pack',
            'name_sinhala' => 'පළමු ශ්‍රේණිය සම්පූර්ණ කට්ටලය',
            'slug' => 'grade-1-full-pack',
            'description' => 'Everything your Grade 1 child needs for the school year. Includes books, stationery, bag, and lunch box.',
            'description_sinhala' => 'ඔබේ පළමු ශ්‍රේණියේ දරුවාට පාසල් වර්ෂය සඳහා අවශ්‍ය සියල්ල. පොත්, ලිපි ද්‍රව්‍ය, බෑගය සහ ආහාර පෙට්ටිය ඇතුළත්ව.',
            'price' => 4500.00,
            'original_price' => 6000.00,
            'grade_level' => 'Grade 1',
            'is_featured' => true,
        ]);

        // Add products to Grade 1 bundle
        $grade1Products = [
            'exercise-book-200-pages' => 5,
            'blue-ballpoint-pen' => 3,
            'hb-pencil-set-12' => 1,
            'eraser-large' => 2,
            '30cm-ruler' => 1,
            'primary-backpack-blue' => 1,
            'lunch-box-3-compartments' => 1,
            'water-bottle-500ml' => 1,
            'color-pencil-set-24' => 1,
        ];

        foreach ($grade1Products as $slug => $quantity) {
            $product = Product::where('slug', $slug)->first();
            if ($product) {
                BundleProduct::create([
                    'bundle_id' => $grade1Bundle->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                ]);
            }
        }

        // Back-to-School Starter Kit
        $starterBundle = Bundle::create([
            'name' => 'Back-to-School Starter Kit',
            'name_sinhala' => 'පාසලට ආපසු යාමේ ආරම්භක කට්ටලය',
            'slug' => 'back-to-school-starter-kit',
            'description' => 'Essential items to get any student ready for the new school year. Suitable for all grades.',
            'description_sinhala' => 'ඕනෑම ශිෂ්‍යයෙකු නව පාසල් වර්ෂය සඳහා සූදානම් කිරීමට අත්‍යවශ්‍ය අයිතම.',
            'price' => 1800.00,
            'original_price' => 2400.00,
            'grade_level' => 'All Grades',
            'is_featured' => true,
        ]);

        $starterProducts = [
            'exercise-book-200-pages' => 3,
            'blue-ballpoint-pen' => 5,
            'hb-pencil-set-12' => 1,
            'eraser-large' => 3,
            '30cm-ruler' => 1,
        ];

        foreach ($starterProducts as $slug => $quantity) {
            $product = Product::where('slug', $slug)->first();
            if ($product) {
                BundleProduct::create([
                    'bundle_id' => $starterBundle->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                ]);
            }
        }

        // Arts & Craft Pack
        $artBundle = Bundle::create([
            'name' => 'Arts & Craft Pack',
            'name_sinhala' => 'කලා සහ ශිල්ප කට්ටලය',
            'slug' => 'arts-craft-pack',
            'description' => 'Complete art supplies for creative students. Perfect for art classes and projects.',
            'description_sinhala' => 'නිර්මාණශීලී ශිෂ්‍යයන් සඳහා සම්පූර්ණ කලා ද්‍රව්‍ය. කලා පන්ති සහ ව්‍යාපෘති සඳහා පරිපූර්ණයි.',
            'price' => 2200.00,
            'original_price' => 2800.00,
            'grade_level' => 'Art & Craft',
            'is_featured' => true,
        ]);

        $artProducts = [
            'color-pencil-set-24' => 1,
            'watercolor-paint-set' => 1,
            'hb-pencil-set-12' => 1,
            'eraser-large' => 2,
            '30cm-ruler' => 1,
        ];

        foreach ($artProducts as $slug => $quantity) {
            $product = Product::where('slug', $slug)->first();
            if ($product) {
                BundleProduct::create([
                    'bundle_id' => $artBundle->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                ]);
            }
        }

        // O/L Exam Essentials Pack
        $olBundle = Bundle::create([
            'name' => 'O/L Exam Essentials Pack',
            'name_sinhala' => 'සා.පෙ. විභාග අත්‍යවශ්‍ය කට්ටලය',
            'slug' => 'ol-exam-essentials-pack',
            'description' => 'Everything needed for O/L students. High quality materials for serious studying.',
            'description_sinhala' => 'සා.පෙ. ශිෂ්‍යයන්ට අවශ්‍ය සියල්ල. බැරෑරුම් අධ්‍යයනය සඳහා උසස් තත්ත්වයේ ද්‍රව්‍ය.',
            'price' => 3200.00,
            'original_price' => 4200.00,
            'grade_level' => 'O/L',
            'is_featured' => true,
        ]);

        $olProducts = [
            'graph-book-a4' => 3,
            'exercise-book-200-pages' => 5,
            'blue-ballpoint-pen' => 10,
            'hb-pencil-set-12' => 1,
            'eraser-large' => 3,
            '30cm-ruler' => 2,
            'secondary-backpack-black' => 1,
        ];

        foreach ($olProducts as $slug => $quantity) {
            $product = Product::where('slug', $slug)->first();
            if ($product) {
                BundleProduct::create([
                    'bundle_id' => $olBundle->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                ]);
            }
        }
    }
}
