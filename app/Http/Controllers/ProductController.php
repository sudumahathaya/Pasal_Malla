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
            // Handle both slug and ID for category filtering
            if (is_numeric($request->category)) {
                $query->where('category_id', $request->category);
            } else {
                $category = Category::where('slug', $request->category)->first();
                if ($category) {
                    $query->where('category_id', $category->id);
                }
            }
        }

        // Search
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('name_sinhala', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filter by price range
        if ($request->has('price_range') && $request->price_range) {
            $priceRange = $request->price_range;
            if ($priceRange === '0-100') {
                $query->where(function ($q) {
                    $q->where('price', '<=', 100)
                        ->orWhere(function ($subQ) {
                            $subQ->whereNotNull('sale_price')->where('sale_price', '<=', 100);
                        });
                });
            } elseif ($priceRange === '100-500') {
                $query->where(function ($q) {
                    $q->whereBetween('price', [100, 500])
                        ->orWhere(function ($subQ) {
                            $subQ->whereNotNull('sale_price')->whereBetween('sale_price', [100, 500]);
                        });
                });
            } elseif ($priceRange === '500-1000') {
                $query->where(function ($q) {
                    $q->whereBetween('price', [500, 1000])
                        ->orWhere(function ($subQ) {
                            $subQ->whereNotNull('sale_price')->whereBetween('sale_price', [500, 1000]);
                        });
                });
            } elseif ($priceRange === '1000-2000') {
                $query->where(function ($q) {
                    $q->whereBetween('price', [1000, 2000])
                        ->orWhere(function ($subQ) {
                            $subQ->whereNotNull('sale_price')->whereBetween('sale_price', [1000, 2000]);
                        });
                });
            } elseif ($priceRange === '2000+') {
                $query->where(function ($q) {
                    $q->where('price', '>', 2000)
                        ->orWhere(function ($subQ) {
                            $subQ->whereNotNull('sale_price')->where('sale_price', '>', 2000);
                        });
                });
            }
        }

        // Filter by grade levels
        if ($request->has('grades') && $request->grades) {
            $grades = is_array($request->grades) ? $request->grades : [$request->grades];
            $query->where(function ($q) use ($grades) {
                foreach ($grades as $grade) {
                    $q->orWhereJsonContains('grades', $grade);
                }
            });
        }

        // Filter by stock availability
        if ($request->has('in_stock') && $request->in_stock) {
            $query->where('stock_quantity', '>', 0);
        }

        // Filter by featured products
        if ($request->has('featured') && $request->featured) {
            $query->where('is_featured', true);
        }

        // Filter by products on sale
        if ($request->has('on_sale') && $request->on_sale) {
            $query->whereNotNull('sale_price')->where('sale_price', '<', \DB::raw('price'));
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
            case 'popular':
                $query->orderBy('is_featured', 'desc')->orderBy('name', 'asc');
                break;
            case 'discount':
                $query->whereNotNull('sale_price')
                    ->orderByRaw('((price - sale_price) / price) DESC')
                    ->orderBy('name', 'asc');
                break;
            default:
                $query->orderBy('name', 'asc');
        }

        $products = $query->paginate(10);
        $categories = Category::where('is_active', true)->orderBy('sort_order')->get();

        // Get current category for display
        $currentCategory = null;
        if ($request->has('category') && $request->category) {
            if (is_numeric($request->category)) {
                $currentCategory = Category::find($request->category);
            } else {
                $currentCategory = Category::where('slug', $request->category)->first();
            }
        }

        return view('products.index', compact('products', 'categories', 'currentCategory'));
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
