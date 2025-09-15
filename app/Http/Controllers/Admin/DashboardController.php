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
        // Basic Statistics
        $stats = [
            'total_products' => Product::count(),
            'active_products' => Product::where('is_active', true)->count(),
            'inactive_products' => Product::where('is_active', false)->count(),
            'total_categories' => Category::count(),
            'active_categories' => Category::where('is_active', true)->count(),
            'total_bundles' => Bundle::count(),
            'active_bundles' => Bundle::where('is_active', true)->count(),
            'total_orders' => Order::count(),
            'pending_orders' => Order::where('status', 'pending')->count(),
            'confirmed_orders' => Order::where('status', 'confirmed')->count(),
            'delivered_orders' => Order::where('status', 'delivered')->count(),
            'cancelled_orders' => Order::where('status', 'cancelled')->count(),
            'low_stock_products' => Product::where('stock_quantity', '<=', 5)->where('is_active', true)->count(),
            'out_of_stock_products' => Product::where('stock_quantity', '<=', 0)->where('is_active', true)->count(),
        ];

        // Recent Orders
        $recent_orders = Order::with('orderItems')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Low Stock Products
        $low_stock_products = Product::where('stock_quantity', '<=', 5)
            ->where('is_active', true)
            ->with('category')
            ->orderBy('stock_quantity', 'asc')
            ->take(10)
            ->get();

        // Top Selling Products (if you have order items)
        $top_products = Product::with('category')
            ->where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Recent Activity (Orders from last 7 days)
        $recent_activity = Order::where('created_at', '>=', now()->subDays(7))
            ->count();

        return view('admin.dashboard', compact(
            'stats', 
            'recent_orders', 
            'low_stock_products', 
            'top_products', 
            'recent_activity'
        ));
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
}
