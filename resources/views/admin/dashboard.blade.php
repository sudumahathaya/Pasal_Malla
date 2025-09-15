@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-description', 'Overview of your store performance')

@section('content')
<!-- Stats Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-6 sm:mb-8">
    <!-- Total Revenue -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs sm:text-sm font-medium text-gray-600">Total Revenue</p>
                <p class="text-2xl sm:text-3xl font-bold text-gray-900">Rs. {{ number_format($stats['total_revenue'], 2) }}</p>
                <p class="text-xs sm:text-sm text-green-600">This month: Rs. {{ number_format($stats['monthly_revenue'], 2) }}</p>
            </div>
            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-green-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-dollar-sign text-green-600 text-lg sm:text-xl"></i>
            </div>
        </div>
    </div>
    
    <!-- Total Orders -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs sm:text-sm font-medium text-gray-600">Total Orders</p>
                <p class="text-2xl sm:text-3xl font-bold text-gray-900">{{ $stats['total_orders'] }}</p>
                <p class="text-xs sm:text-sm text-orange-600">{{ $stats['pending_orders'] }} pending</p>
            </div>
            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-shopping-cart text-blue-600 text-lg sm:text-xl"></i>
            </div>
        </div>
    </div>
    
    <!-- Total Products -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs sm:text-sm font-medium text-gray-600">Total Products</p>
                <p class="text-2xl sm:text-3xl font-bold text-gray-900">{{ $stats['total_products'] }}</p>
                <p class="text-xs sm:text-sm text-green-600">{{ $stats['active_products'] }} active</p>
            </div>
            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-box text-purple-600 text-lg sm:text-xl"></i>
            </div>
        </div>
    </div>
    
    <!-- Low Stock Alert -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs sm:text-sm font-medium text-gray-600">Low Stock</p>
                <p class="text-2xl sm:text-3xl font-bold text-gray-900">{{ $stats['low_stock_products'] }}</p>
                <p class="text-xs sm:text-sm text-red-600">Items need restocking</p>
            </div>
            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-red-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-exclamation-triangle text-red-600 text-lg sm:text-xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Charts Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8 mb-8">
    <!-- Monthly Sales Chart -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Monthly Sales</h3>
            <p class="text-sm text-gray-600">Revenue over the last 12 months</p>
        </div>
        <div class="p-6">
            <canvas id="salesChart" width="400" height="200"></canvas>
        </div>
    </div>
    
    <!-- Order Status Distribution -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Order Status</h3>
            <p class="text-sm text-gray-600">Distribution of orders by status</p>
        </div>
        <div class="p-6">
            <canvas id="orderStatusChart" width="400" height="200"></canvas>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8">
    <!-- Recent Orders -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">Recent Orders</h3>
                <a href="{{ route('admin.orders.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">View All</a>
            </div>
        </div>
        <div class="p-6">
            @if($recent_orders->count() > 0)
            <div class="space-y-4">
                @foreach($recent_orders as $order)
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div>
                        <p class="text-sm font-medium text-gray-900">#{{ $order->order_number }}</p>
                        <p class="text-xs text-gray-600">{{ $order->customer_name }}</p>
                        <p class="text-xs text-gray-500">{{ $order->created_at->format('M d, Y H:i') }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-bold text-gray-900">Rs. {{ number_format($order->total, 2) }}</p>
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full
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
            <div class="text-center py-8">
                <i class="fas fa-shopping-cart text-gray-400 text-4xl mb-4"></i>
                <p class="text-sm text-gray-500">No orders yet</p>
            </div>
            @endif
        </div>
    </div>

    <!-- Top Selling Products -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">Top Selling Products</h3>
                <a href="{{ route('admin.products.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">View All</a>
            </div>
        </div>
        <div class="p-6">
            @if($top_products->count() > 0)
            <div class="space-y-4">
                @foreach($top_products as $product)
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div class="flex items-center space-x-3">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-10 h-10 rounded-lg object-cover">
                        @else
                            <div class="w-10 h-10 bg-gray-200 rounded-lg flex items-center justify-center">
                                <i class="fas fa-box text-gray-400"></i>
                            </div>
                        @endif
                        <div>
                            <p class="text-sm font-medium text-gray-900">{{ $product->name }}</p>
                            <p class="text-xs text-gray-600">{{ $product->category->name }}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-bold text-gray-900">{{ $product->order_items_count }} sold</p>
                        <p class="text-xs text-gray-500">Rs. {{ number_format($product->price, 2) }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-8">
                <i class="fas fa-box text-gray-400 text-4xl mb-4"></i>
                <p class="text-sm text-gray-500">No sales data available</p>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Low Stock Alert -->
@if($low_stock_products->count() > 0)
<div class="mt-8">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">Low Stock Alert</h3>
                <span class="bg-red-100 text-red-800 text-sm font-medium px-3 py-1 rounded-full">
                    {{ $stats['low_stock_products'] }} items
                </span>
            </div>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($low_stock_products as $product)
                <div class="flex items-center justify-between p-4 bg-red-50 rounded-lg border border-red-200">
                    <div>
                        <p class="text-sm font-medium text-gray-900">{{ $product->name }}</p>
                        <p class="text-xs text-gray-600">SKU: {{ $product->sku }}</p>
                    </div>
                    <div class="text-right">
                        <span class="text-sm font-bold text-red-600">{{ $product->stock_quantity }} left</span>
                        <p class="text-xs text-gray-500">{{ $product->category->name }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif

<!-- Quick Actions -->
<div class="mt-8">
    <h3 class="text-lg font-semibold text-gray-900 mb-6">Quick Actions</h3>
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="{{ route('admin.products.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white p-6 rounded-xl transition-colors text-center group">
            <i class="fas fa-plus text-2xl mb-3 group-hover:scale-110 transition-transform"></i>
            <p class="text-sm font-semibold">Add Product</p>
        </a>
        <a href="{{ route('admin.bundles.create') }}" class="bg-green-500 hover:bg-green-600 text-white p-6 rounded-xl transition-colors text-center group">
            <i class="fas fa-gift text-2xl mb-3 group-hover:scale-110 transition-transform"></i>
            <p class="text-sm font-semibold">Create Bundle</p>
        </a>
        <a href="{{ route('admin.categories.create') }}" class="bg-purple-500 hover:bg-purple-600 text-white p-6 rounded-xl transition-colors text-center group">
            <i class="fas fa-tags text-2xl mb-3 group-hover:scale-110 transition-transform"></i>
            <p class="text-sm font-semibold">Add Category</p>
        </a>
        <a href="{{ route('admin.reports.index') }}" class="bg-orange-500 hover:bg-orange-600 text-white p-6 rounded-xl transition-colors text-center group">
            <i class="fas fa-chart-bar text-2xl mb-3 group-hover:scale-110 transition-transform"></i>
            <p class="text-sm font-semibold">View Reports</p>
        </a>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Monthly Sales Chart
    const salesCtx = document.getElementById('salesChart').getContext('2d');
    const salesData = @json($monthly_sales);
    
    new Chart(salesCtx, {
        type: 'line',
        data: {
            labels: salesData.map(item => item.month),
            datasets: [{
                label: 'Sales (Rs.)',
                data: salesData.map(item => item.sales),
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
                    ticks: {
                        callback: function(value) {
                            return 'Rs. ' + value.toLocaleString();
                        }
                    }
                }
            }
        }
    });
    
    // Order Status Chart
    const statusCtx = document.getElementById('orderStatusChart').getContext('2d');
    const statusData = @json($order_status);
    
    new Chart(statusCtx, {
        type: 'doughnut',
        data: {
            labels: Object.keys(statusData).map(key => key.charAt(0).toUpperCase() + key.slice(1)),
            datasets: [{
                data: Object.values(statusData),
                backgroundColor: [
                    'rgb(251, 191, 36)',   // pending - yellow
                    'rgb(59, 130, 246)',   // confirmed - blue
                    'rgb(139, 92, 246)',   // processing - purple
                    'rgb(16, 185, 129)',   // shipped - green
                    'rgb(34, 197, 94)',    // delivered - green
                    'rgb(239, 68, 68)'     // cancelled - red
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








