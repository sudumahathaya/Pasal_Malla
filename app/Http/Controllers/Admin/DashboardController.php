<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Bundle;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_products' => Product::count(),
            'active_products' => Product::where('is_active', true)->count(),
            'total_categories' => Category::count(),
            'total_bundles' => Bundle::count(),
            'total_orders' => Order::count(),
            'pending_orders' => Order::where('status', 'pending')->count(),
            'low_stock_products' => Product::where('stock_quantity', '<=', 5)->count(),
        ];

        $recent_orders = Order::with('orderItems')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $low_stock_products = Product::where('stock_quantity', '<=', 5)
            ->where('is_active', true)
            ->orderBy('stock_quantity', 'asc')
            ->take(10)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_orders', 'low_stock_products'));
    }

    public function getStats()
    {
        $stats = [
            'total_products' => Product::count(),
            'active_products' => Product::where('is_active', true)->count(),
            'total_categories' => Category::count(),
            'total_bundles' => Bundle::count(),
            'total_orders' => Order::count(),
            'pending_orders' => Order::where('status', 'pending')->count(),
            'low_stock_products' => Product::where('stock_quantity', '<=', 5)->count(),
        ];

        return response()->json($stats);
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
