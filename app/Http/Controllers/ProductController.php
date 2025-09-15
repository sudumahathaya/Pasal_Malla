<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::where('is_active', true)->with('category');

        // Filter by category
        if ($request->has('category') && $request->category) {
            $category = Category::where('slug', $request->category)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        // Filter by price range
        if ($request->has('min_price') && $request->min_price) {
            $query->where(function ($q) use ($request) {
                $q->where('sale_price', '>=', $request->min_price)
                    ->orWhere(function ($subQ) use ($request) {
                        $subQ->whereNull('sale_price')
                            ->where('price', '>=', $request->min_price);
                    });
            });
        }

        if ($request->has('max_price') && $request->max_price) {
            $query->where(function ($q) use ($request) {
                $q->where('sale_price', '<=', $request->max_price)
                    ->orWhere(function ($subQ) use ($request) {
                        $subQ->whereNull('sale_price')
                            ->where('price', '<=', $request->max_price);
                    });
            });
        }

        // Filter by availability
        if ($request->has('availability') && $request->availability) {
            switch ($request->availability) {
                case 'in_stock':
                    $query->where('stock_quantity', '>', 0);
                    break;
                case 'low_stock':
                    $query->where('stock_quantity', '>', 0)->where('stock_quantity', '<=', 5);
                    break;
                case 'out_of_stock':
                    $query->where('stock_quantity', 0);
                    break;
            }
        }

        // Filter by featured
        if ($request->has('featured') && $request->featured == '1') {
            $query->where('is_featured', true);
        }

        // Filter by discount
        if ($request->has('on_sale') && $request->on_sale == '1') {
            $query->whereNotNull('sale_price');
        }

        // Search
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('name_sinhala', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('sku', 'like', "%{$search}%");
            });
        }

        // Sort
        $sort = $request->get('sort', 'name');
        switch ($sort) {
            case 'price_low':
                $query->orderByRaw('COALESCE(sale_price, price) ASC');
                break;
            case 'price_high':
                $query->orderByRaw('COALESCE(sale_price, price) DESC');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'popularity':
                $query->withCount('orderItems')->orderBy('order_items_count', 'desc');
                break;
            case 'discount':
                $query->whereNotNull('sale_price')
                    ->orderByRaw('((price - sale_price) / price * 100) DESC');
                break;
            default:
                $query->orderBy('name', 'asc');
        }

        $products = $query->paginate(12);
        $categories = Category::where('is_active', true)->orderBy('sort_order')->get();

        // Get price range for filter
        $priceRange = [
            'min' => Product::where('is_active', true)->min('price'),
            'max' => Product::where('is_active', true)->max('price')
        ];

        return view('products.index', compact('products', 'categories', 'priceRange'));
    }

    public function show(Product $product)
    {
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('is_active', true)
            ->take(4)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }
}
