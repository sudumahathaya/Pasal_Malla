@extends('admin.layouts.app')

@section('title', 'Product Details')
@section('page-title', 'Product Details')
@section('page-description', 'View product information')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">{{ $product->name }}</h2>
                <p class="text-gray-600">Product details and information</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('admin.products.edit', $product) }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors inline-flex items-center">
                    <i class="fas fa-edit mr-2"></i>
                    Edit Product
                </a>
                <a href="{{ route('admin.products.index') }}"
                   class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg font-medium transition-colors inline-flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to Products
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Product Image & Basic Info -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <!-- Product Image -->
                <div class="mb-6">
                    @if($product->image)
                        <img src="{{ $product->getImageUrl() }}" alt="{{ $product->name }}"
                             class="w-full h-64 object-cover rounded-lg">
                    @else
                        <div class="w-full h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                            <i class="fas fa-box text-gray-400 text-6xl"></i>
                        </div>
                    @endif
                </div>

                <!-- Basic Info -->
                <div class="space-y-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Basic Information</h3>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-500">SKU</label>
                        <p class="text-sm text-gray-900">{{ $product->sku }}</p>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-500">Category</label>
                        <p class="text-sm text-gray-900">{{ $product->category->name }}</p>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-500">Status</label>
                        <div class="flex items-center space-x-2">
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full
                                {{ $product->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $product->is_active ? 'Active' : 'Inactive' }}
                            </span>
                            @if($product->is_featured)
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Featured
                                </span>
                            @endif
                        </div>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-500">Created</label>
                        <p class="text-sm text-gray-900">{{ $product->created_at->format('M d, Y H:i') }}</p>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-500">Last Updated</label>
                        <p class="text-sm text-gray-900">{{ $product->updated_at->format('M d, Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Details -->
        <div class="lg:col-span-2">
            <div class="space-y-6">
                <!-- Pricing Information -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Pricing Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="text-sm font-medium text-gray-500">Regular Price</label>
                            <p class="text-2xl font-bold text-gray-900">Rs. {{ number_format($product->price, 2) }}</p>
                        </div>
                        @if($product->sale_price)
                        <div>
                            <label class="text-sm font-medium text-gray-500">Sale Price</label>
                            <p class="text-2xl font-bold text-green-600">Rs. {{ number_format($product->sale_price, 2) }}</p>
                            <p class="text-sm text-gray-500">
                                Save Rs. {{ number_format($product->price - $product->sale_price, 2) }}
                                ({{ round((($product->price - $product->sale_price) / $product->price) * 100) }}% off)
                            </p>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Stock Information -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Stock Information</h3>
                    <div class="flex items-center justify-between">
                        <div>
                            <label class="text-sm font-medium text-gray-500">Current Stock</label>
                            <p class="text-3xl font-bold {{ $product->stock_quantity <= 5 ? 'text-red-600' : 'text-gray-900' }}">
                                {{ $product->stock_quantity }}
                            </p>
                        </div>
                        @if($product->stock_quantity <= 5)
                        <div class="text-right">
                            <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-red-100 text-red-800">
                                Low Stock Alert
                            </span>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Descriptions -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Descriptions</h3>
                    <div class="space-y-4">
                        @if($product->description)
                        <div>
                            <label class="text-sm font-medium text-gray-500">English Description</label>
                            <p class="text-sm text-gray-900 mt-1">{{ $product->description }}</p>
                        </div>
                        @endif

                        @if($product->description_sinhala)
                        <div>
                            <label class="text-sm font-medium text-gray-500">Sinhala Description</label>
                            <p class="text-sm text-gray-900 mt-1">{{ $product->description_sinhala }}</p>
                        </div>
                        @endif

                        @if($product->name_sinhala)
                        <div>
                            <label class="text-sm font-medium text-gray-500">Sinhala Name</label>
                            <p class="text-sm text-gray-900 mt-1">{{ $product->name_sinhala }}</p>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Grades -->
                @if($product->grades && count($product->grades) > 0)
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Applicable Grades</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach($product->grades as $grade)
                            <span class="inline-flex px-3 py-1 text-sm font-medium bg-blue-100 text-blue-800 rounded-full">
                                {{ $grade }}
                            </span>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Sales Information -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Sales Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="text-center">
                            <p class="text-2xl font-bold text-gray-900">{{ $product->orderItems()->count() }}</p>
                            <p class="text-sm text-gray-500">Total Sold</p>
                        </div>
                        <div class="text-center">
                            <p class="text-2xl font-bold text-gray-900">Rs. {{ number_format($product->orderItems()->sum('total'), 2) }}</p>
                            <p class="text-sm text-gray-500">Total Revenue</p>
                        </div>
                        <div class="text-center">
                            <p class="text-2xl font-bold text-gray-900">
                                {{ $product->orderItems()->count() > 0 ? number_format($product->orderItems()->sum('total') / $product->orderItems()->count(), 2) : '0.00' }}
                            </p>
                            <p class="text-sm text-gray-500">Avg. Order Value</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
