@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-description', 'Overview of your store performance')

@section('content')
<div class="full-width-content">
<!-- Welcome Section -->
<div class="mb-8">
    <div class="bg-gradient-to-r from-orange-500 to-red-500 rounded-xl p-6 text-white shadow-lg w-full">
        <div class="flex items-center justify-between">
            <div class="flex-1">
                <h2 class="text-2xl font-bold mb-2">Welcome back, Admin! 👋</h2>
                <p class="text-orange-100">Here's what's happening with your store today.</p>
            </div>
            <div class="hidden sm:block ml-4">
                <i class="fas fa-chart-line text-4xl text-orange-200"></i>
            </div>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8 w-full">
    <!-- Total Products Card -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200 hover:shadow-md transition-shadow">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600 mb-1">Total Products</p>
                <p class="text-3xl font-bold text-gray-900" data-stat="total_products">{{ $stats['total_products'] }}</p>
                <div class="flex items-center mt-2">
                    <span class="text-sm text-green-600 font-medium">
                        <span data-stat="active_products">{{ $stats['active_products'] }}</span> active
                    </span>
                    <span class="text-sm text-gray-400 ml-2">
                        ({{ $stats['total_products'] - $stats['active_products'] }} inactive)
                    </span>
                </div>
            </div>
            <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                <i class="fas fa-box text-white text-xl"></i>
            </div>
        </div>
        <div class="mt-4">
            <div class="flex items-center text-sm text-gray-500">
                <i class="fas fa-arrow-up text-green-500 mr-1"></i>
                <span>+12% from last month</span>
            </div>
        </div>
    </div>

    <!-- Total Orders Card -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200 hover:shadow-md transition-shadow">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600 mb-1">Total Orders</p>
                <p class="text-3xl font-bold text-gray-900" data-stat="total_orders">{{ $stats['total_orders'] }}</p>
                <div class="flex items-center mt-2">
                    <span class="text-sm text-orange-600 font-medium">
                        <span data-stat="pending_orders">{{ $stats['pending_orders'] }}</span> pending
                    </span>
                    <span class="text-sm text-gray-400 ml-2">
                        ({{ $stats['total_orders'] - $stats['pending_orders'] }} completed)
                    </span>
                </div>
            </div>
            <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center">
                <i class="fas fa-shopping-cart text-white text-xl"></i>
            </div>
        </div>
        <div class="mt-4">
            <div class="flex items-center text-sm text-gray-500">
                <i class="fas fa-arrow-up text-green-500 mr-1"></i>
                <span>+8% from last week</span>
            </div>
        </div>
    </div>

    <!-- Categories Card -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200 hover:shadow-md transition-shadow">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600 mb-1">Categories</p>
                <p class="text-3xl font-bold text-gray-900" data-stat="total_categories">{{ $stats['total_categories'] }}</p>
                <div class="flex items-center mt-2">
                    <span class="text-sm text-gray-500">Active categories</span>
                </div>
            </div>
            <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center">
                <i class="fas fa-tags text-white text-xl"></i>
            </div>
        </div>
        <div class="mt-4">
            <div class="flex items-center text-sm text-gray-500">
                <i class="fas fa-chart-pie text-purple-500 mr-1"></i>
                <span>Well organized</span>
            </div>
        </div>
    </div>

    <!-- Bundle Packs Card -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200 hover:shadow-md transition-shadow">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600 mb-1">Bundle Packs</p>
                <p class="text-3xl font-bold text-gray-900" data-stat="total_bundles">{{ $stats['total_bundles'] }}</p>
                <div class="flex items-center mt-2">
                    <span class="text-sm text-gray-500">Special offers</span>
                </div>
            </div>
            <div class="w-14 h-14 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-xl flex items-center justify-center">
                <i class="fas fa-gift text-white text-xl"></i>
            </div>
        </div>
        <div class="mt-4">
            <div class="flex items-center text-sm text-gray-500">
                <i class="fas fa-star text-yellow-500 mr-1"></i>
                <span>Popular with customers</span>
            </div>
        </div>
    </div>
</div>

<!-- Charts Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8 w-full">
    <!-- Sales Chart -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-gray-900">Sales Overview</h3>
            <div class="flex space-x-2">
                <button class="px-3 py-1 text-xs bg-orange-100 text-orange-600 rounded-full">7 Days</button>
                <button class="px-3 py-1 text-xs bg-gray-100 text-gray-600 rounded-full">30 Days</button>
            </div>
        </div>
        <div class="h-64">
            <canvas id="salesChart"></canvas>
        </div>
    </div>

    <!-- Order Status Chart -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-gray-900">Order Status</h3>
            <div class="text-sm text-gray-500">This Month</div>
        </div>
        <div class="h-64">
            <canvas id="orderStatusChart"></canvas>
        </div>
    </div>
</div>

<!-- Main Content Grid -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8 w-full">
    <!-- Recent Orders -->
    <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">Recent Orders</h3>
                <a href="{{ route('admin.orders.index') }}" class="text-orange-600 hover:text-orange-800 text-sm font-medium flex items-center">
                    View All
                    <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>
        <div class="p-6">
            @if($recent_orders->count() > 0)
            <div class="space-y-4">
                @foreach($recent_orders as $order)
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-shopping-cart text-orange-600"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900">#{{ $order->order_number }}</p>
                            <p class="text-sm text-gray-600">{{ $order->customer_name }}</p>
                            <p class="text-xs text-gray-500">{{ $order->created_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="font-bold text-gray-900">Rs. {{ number_format($order->total, 2) }}</p>
                        <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full
                            @if($order->status == 'pending') bg-yellow-100 text-yellow-800
                            @elseif($order->status == 'confirmed') bg-blue-100 text-blue-800
                            @elseif($order->status == 'delivered') bg-green-100 text-green-800
                            @else bg-gray-100 text-gray-800 @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-12">
                <i class="fas fa-shopping-cart text-gray-300 text-5xl mb-4"></i>
                <p class="text-gray-500 text-lg">No orders yet</p>
                <p class="text-gray-400 text-sm">Orders will appear here when customers make purchases</p>
            </div>
            @endif
        </div>
    </div>

    <!-- Low Stock Alert -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">Low Stock Alert</h3>
                @if($stats['low_stock_products'] > 0)
                <span class="bg-red-100 text-red-800 text-sm font-medium px-3 py-1 rounded-full">
                    {{ $stats['low_stock_products'] }} items
                </span>
                @endif
            </div>
        </div>
        <div class="p-6">
            @if($low_stock_products->count() > 0)
            <div class="space-y-4">
                @foreach($low_stock_products->take(5) as $product)
                <div class="flex items-center justify-between p-3 bg-red-50 rounded-lg border border-red-200">
                    <div>
                        <p class="font-medium text-gray-900 text-sm">{{ Str::limit($product->name, 20) }}</p>
                        <p class="text-xs text-gray-600">{{ $product->category->name }}</p>
                    </div>
                    <div class="text-right">
                        <span class="text-red-600 font-bold text-sm">{{ $product->stock_quantity }} left</span>
                    </div>
                </div>
                @endforeach
                @if($low_stock_products->count() > 5)
                <div class="text-center">
                    <a href="{{ route('admin.products.index', ['filter' => 'low_stock']) }}" class="text-orange-600 hover:text-orange-800 text-sm font-medium">
                        View {{ $low_stock_products->count() - 5 }} more items
                    </a>
                </div>
                @endif
            </div>
            @else
            <div class="text-center py-8">
                <i class="fas fa-check-circle text-green-400 text-4xl mb-4"></i>
                <p class="text-gray-500">All products are well stocked</p>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="mb-8">
    <h3 class="text-lg font-semibold text-gray-900 mb-6">Quick Actions</h3>
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 w-full">
        <a href="{{ route('admin.products.create') }}" class="group bg-gradient-to-br from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white p-6 rounded-xl transition-all duration-300 text-center transform hover:scale-105 hover:shadow-lg">
            <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
                <i class="fas fa-plus text-xl"></i>
            </div>
            <p class="font-semibold text-sm">Add Product</p>
            <p class="text-blue-100 text-xs mt-1">Create new product</p>
        </a>
        
        <a href="{{ route('admin.bundles.create') }}" class="group bg-gradient-to-br from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white p-6 rounded-xl transition-all duration-300 text-center transform hover:scale-105 hover:shadow-lg">
            <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
                <i class="fas fa-gift text-xl"></i>
            </div>
            <p class="font-semibold text-sm">Create Bundle</p>
            <p class="text-green-100 text-xs mt-1">Special offers</p>
        </a>
        
        <a href="{{ route('admin.categories.create') }}" class="group bg-gradient-to-br from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700 text-white p-6 rounded-xl transition-all duration-300 text-center transform hover:scale-105 hover:shadow-lg">
            <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
                <i class="fas fa-tags text-xl"></i>
            </div>
            <p class="font-semibold text-sm">Add Category</p>
            <p class="text-purple-100 text-xs mt-1">Organize products</p>
        </a>
        
        <a href="{{ route('admin.reports.index') }}" class="group bg-gradient-to-br from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white p-6 rounded-xl transition-all duration-300 text-center transform hover:scale-105 hover:shadow-lg">
            <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
                <i class="fas fa-chart-bar text-xl"></i>
            </div>
            <p class="font-semibold text-sm">View Reports</p>
            <p class="text-orange-100 text-xs mt-1">Analytics & insights</p>
        </a>
    </div>
</div>
</div> <!-- End full-width-content -->
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Sales Chart
    const salesCtx = document.getElementById('salesChart').getContext('2d');
    new Chart(salesCtx, {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'Sales (Rs.)',
                data: [12000, 19000, 15000, 25000, 22000, 30000, 28000],
                borderColor: 'rgb(249, 115, 22)',
                backgroundColor: 'rgba(249, 115, 22, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    // Order Status Chart
    const orderStatusCtx = document.getElementById('orderStatusChart').getContext('2d');
    new Chart(orderStatusCtx, {
        type: 'doughnut',
        data: {
            labels: ['Pending', 'Confirmed', 'Delivered', 'Cancelled'],
            datasets: [{
                data: [{{ $stats['pending_orders'] }}, {{ $stats['total_orders'] - $stats['pending_orders'] }}, 0, 0],
                backgroundColor: [
                    'rgb(251, 191, 36)',
                    'rgb(34, 197, 94)',
                    'rgb(59, 130, 246)',
                    'rgb(239, 68, 68)'
                ],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 20,
                        usePointStyle: true
                    }
                }
            }
        }
    });
});
</script>
@endpush









