@extends('admin.layouts.app')

@section('title', 'View Product')
@section('page-title', 'Product Details')
@section('page-description', 'View product information')

@section('content')
<div class="space-y-6">
    <!-- Header Actions -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-2xl font-bold text-gray-900">{{ $product->name }}</h3>
                <p class="text-gray-600">{{ $product->name_sinhala }}</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('admin.products.edit', $product) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-colors">
                    <i class="fas fa-edit mr-2"></i>Edit
                </a>
                <form method="POST" action="{{ route('admin.products.destroy', $product) }}" class="inline" 
                      onsubmit="return confirm('Are you sure you want to delete this product?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition-colors">
                        <i class="fas fa-trash mr-2"></i>Delete
                    </button>
                </form>
                <a href="{{ route('admin.products.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>Back
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Product Info -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Product Image -->
            @if($product->image)
            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                <div class="p-6 border-b border-gray-200">
                    <h4 class="text-lg font-semibold text-gray-900">Product Image</h4>
                </div>
                <div class="p-6">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" 
                         class="w-full max-w-md h-64 object-cover rounded-lg border border-gray-200">
                </div>
            </div>
            @endif
            
            <!-- Basic Information -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                <div class="p-6 border-b border-gray-200">
                    <h4 class="text-lg font-semibold text-gray-900">Basic Information</h4>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Product Name</label>
                            <p class="text-gray-900 font-medium">{{ $product->name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Product Name (Sinhala)</label>
                            <p class="text-gray-900 font-medium">{{ $product->name_sinhala ?? 'Not set' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">SKU</label>
                            <p class="text-gray-900 font-medium">{{ $product->sku }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Category</label>
                            <p class="text-gray-900 font-medium">{{ $product->category->name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Created</label>
                            <p class="text-gray-900 font-medium">{{ $product->created_at->format('M d, Y H:i') }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Last Updated</label>
                            <p class="text-gray-900 font-medium">{{ $product->updated_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description -->
            @if($product->description || $product->description_sinhala)
            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                <div class="p-6 border-b border-gray-200">
                    <h4 class="text-lg font-semibold text-gray-900">Description</h4>
                </div>
                <div class="p-6 space-y-4">
                    @if($product->description)
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-2">English Description</label>
                        <p class="text-gray-900 leading-relaxed">{{ $product->description }}</p>
                    </div>
                    @endif
                    @if($product->description_sinhala)
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-2">Sinhala Description</label>
                        <p class="text-gray-900 leading-relaxed">{{ $product->description_sinhala }}</p>
                    </div>
                    @endif
                </div>
            </div>
            @endif

            <!-- Grade Levels -->
            @if($product->grades && count($product->grades) > 0)
            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                <div class="p-6 border-b border-gray-200">
                    <h4 class="text-lg font-semibold text-gray-900">Grade Levels</h4>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-2">
                        @foreach($product->grades as $grade)
                        <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-blue-100 text-blue-800">
                            {{ $grade }}
                        </span>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Status & Settings -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                <div class="p-6 border-b border-gray-200">
                    <h4 class="text-lg font-semibold text-gray-900">Status & Settings</h4>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-500">Status</span>
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                            @if($product->is_active) bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif">
                            {{ $product->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-500">Featured</span>
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                            @if($product->is_featured) bg-yellow-100 text-yellow-800 @else bg-gray-100 text-gray-800 @endif">
                            {{ $product->is_featured ? 'Yes' : 'No' }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Pricing -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                <div class="p-6 border-b border-gray-200">
                    <h4 class="text-lg font-semibold text-gray-900">Pricing</h4>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-500">Regular Price</span>
                        <span class="text-lg font-bold text-gray-900">Rs. {{ number_format($product->price, 2) }}</span>
                    </div>
                    @if($product->sale_price)
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-500">Sale Price</span>
                        <span class="text-lg font-bold text-green-600">Rs. {{ number_format($product->sale_price, 2) }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-500">Discount</span>
                        <span class="text-sm font-bold text-red-600">{{ $product->getDiscountPercentage() }}% OFF</span>
                    </div>
                    @endif
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-500">Current Price</span>
                        <span class="text-xl font-bold text-orange-600">Rs. {{ number_format($product->getCurrentPrice(), 2) }}</span>
                    </div>
                </div>
            </div>

            <!-- Inventory -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                <div class="p-6 border-b border-gray-200">
                    <h4 class="text-lg font-semibold text-gray-900">Inventory</h4>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-500">Stock Quantity</span>
                        <span class="text-2xl font-bold 
                            @if($product->stock_quantity <= 5) text-red-600
                            @elseif($product->stock_quantity <= 20) text-yellow-600
                            @else text-green-600 @endif">
                            {{ $product->stock_quantity }}
                        </span>
                    </div>
                    @if($product->stock_quantity <= 5)
                    <div class="mt-3 p-3 bg-red-50 border border-red-200 rounded-lg">
                        <p class="text-sm text-red-800">
                            <i class="fas fa-exclamation-triangle mr-2"></i>
                            Low stock alert! Consider restocking soon.
                        </p>
                    </div>
                    @elseif($product->stock_quantity <= 20)
                    <div class="mt-3 p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                        <p class="text-sm text-yellow-800">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            Stock is getting low. Monitor inventory levels.
                        </p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                <div class="p-6 border-b border-gray-200">
                    <h4 class="text-lg font-semibold text-gray-900">Quick Actions</h4>
                </div>
                <div class="p-6 space-y-3">
                    <a href="{{ route('products.show', $product) }}" target="_blank" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg transition-colors text-center block">
                        <i class="fas fa-external-link-alt mr-2"></i>View on Website
                    </a>
                    <button class="w-full bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg transition-colors">
                        <i class="fas fa-copy mr-2"></i>Duplicate Product
                    </button>
                    <button class="w-full bg-orange-500 hover:bg-orange-600 text-white py-2 px-4 rounded-lg transition-colors">
                        <i class="fas fa-chart-line mr-2"></i>View Analytics
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection