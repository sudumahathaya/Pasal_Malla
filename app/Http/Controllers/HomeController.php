<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Bundle;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->take(6)
            ->get();

        $featuredProducts = Product::where('is_featured', true)
            ->where('is_active', true)
            ->with('category')
            ->take(8)
            ->get();

        $featuredBundles = Bundle::where('is_featured', true)
            ->where('is_active', true)
            ->take(4)
            ->get();

        // Get all categories for footer links
        $allCategories = Category::where('is_active', true)->orderBy('sort_order')->get();

        return view('home', compact('categories', 'featuredProducts', 'featuredBundles', 'allCategories'));
    }
}
