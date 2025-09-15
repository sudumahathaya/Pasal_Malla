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
            'total_categories' => Category::count(),
            'total_bundles' => Bundle::count(),
            'total_orders' => Order::count(),
            'pending_orders' => Order::where('status', 'pending')->count(),
            'confirmed_orders' => Order::where('status', 'confirmed')->count(),
            'delivered_orders' => Order::where('status', 'delivered')->count(),
            'low_stock_products' => Product::where('stock_quantity', '<=', 5)->count(),
            'total_revenue' => Order::where('payment_status', 'paid')->sum('total'),
            'monthly_revenue' => Order::where('payment_status', 'paid')
                ->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->sum('total'),
        ];

        // Recent Orders
        $recent_orders = Order::with('orderItems')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Low Stock Products
        $low_stock_products = Product::where('stock_quantity', '<=', 5)
            ->where('is_active', true)
            ->orderBy('stock_quantity', 'asc')
            ->take(10)
            ->get();

        // Top Selling Products
        $top_products = Product::with('category')
            ->withCount('orderItems')
            ->orderBy('order_items_count', 'desc')
            ->take(5)
            ->get();

        // Monthly Sales Data for Chart
        $monthly_sales = [];
        for ($i = 11; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $sales = Order::where('payment_status', 'paid')
                ->whereMonth('created_at', $date->month)
                ->whereYear('created_at', $date->year)
                ->sum('total');
            
            $monthly_sales[] = [
                'month' => $date->format('M Y'),
                'sales' => $sales
            ];
        }

        // Order Status Distribution
        $order_status = [
            'pending' => Order::where('status', 'pending')->count(),
            'confirmed' => Order::where('status', 'confirmed')->count(),
            'processing' => Order::where('status', 'processing')->count(),
            'shipped' => Order::where('status', 'shipped')->count(),
            'delivered' => Order::where('status', 'delivered')->count(),
            'cancelled' => Order::where('status', 'cancelled')->count(),
        ];

        return view('admin.dashboard', compact(
            'stats', 
            'recent_orders', 
            'low_stock_products', 
            'top_products', 
            'monthly_sales', 
            'order_status'
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
