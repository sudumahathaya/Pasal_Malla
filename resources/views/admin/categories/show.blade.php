@extends('admin.layouts.app')

@section('title', 'Category Details')
@section('page-title', 'Category Details')
@section('page-description', 'View category information and products')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">{{ $category->name }}</h2>
                <p class="text-gray-600">Category details and products</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('admin.categories.edit', $category) }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors inline-flex items-center">
                    <i class="fas fa-edit mr-2"></i>
                    Edit Category
                </a>
                <a href="{{ route('admin.categories.index') }}"
                   class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg font-medium transition-colors inline-flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to Categories
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Category Info -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <!-- Category Image -->
                <div class="mb-6">
                    <img src="{{ $category->getImageUrl() }}" alt="{{ $category->name }}"
                         class="w-full h-48 object-cover rounded-lg">
                </div>

                <!-- Basic Info -->
                <div class="space-y-4">
                    <div>
                        <label class="text-sm font-medium text-gray-500">Category Name</label>
                        <p class="text-lg font-bold text-gray-900">{{ $category->name }}</p>
                    </div>

                    @if($category->name_sinhala)
                    <div>
                        <label class="text-sm font-medium text-gray-500">Sinhala Name</label>
                        <p class="text-lg text-gray-900">{{ $category->name_sinhala }}</p>
                    </div>
                    @endif

                    <div>
                        <label class="text-sm font-medium text-gray-500">Slug</label>
                        <p class="text-sm text-gray-900 font-mono bg-gray-50 px-2 py-1 rounded">{{ $category->slug }}</p>
                    </div>

                    @if($category->icon)
                    <div>
                        <label class="text-sm font-medium text-gray-500">Icon</label>
                        <p class="text-sm text-gray-900">
                            <i class="{{ $category->icon }} mr-2"></i>
                            {{ $category->icon }}
                        </p>
                    </div>
                    @endif

                    <div>
                        <label class="text-sm font-medium text-gray-500">Sort Order</label>
                        <p class="text-sm text-gray-900">{{ $category->sort_order }}</p>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-500">Status</label>
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full
                            {{ $category->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $category->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-500">Created</label>
                        <p class="text-sm text-gray-900">{{ $category->created_at->format('M d, Y H:i') }}</p>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-500">Last Updated</label>
                        <p class="text-sm text-gray-900">{{ $category->updated_at->format('M d, Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Category Products -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">Products in this Category</h3>
                        <span class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full">
                            {{ $category->products->count() }} products
                        </span>
                    </div>
                </div>

                @if($category->products->count() > 0)
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($category->products as $product)
                        <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                            <div class="flex items-center space-x-4">
                                @if($product->image)
                                    <img src="{{ $product->getImageUrl() }}" alt="{{ $product->name }}"
                                         class="w-16 h-16 object-cover rounded-lg">
                                @else
                                    <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-box text-gray-400"></i>
                                    </div>
                                @endif
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-800">{{ $product->name }}</h4>
                                    <p class="text-sm text-gray-600">SKU: {{ $product->sku }}</p>
                                    <div class="flex items-center justify-between mt-2">
                                        <span class="text-orange-600 font-bold">Rs. {{ number_format($product->getCurrentPrice(), 2) }}</span>
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full
                                            {{ $product->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $product->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @else
                <div class="p-12 text-center">
                    <i class="fas fa-box text-4xl text-gray-400 mb-4"></i>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No products in this category</h3>
                    <p class="text-gray-500 mb-6">Add products to this category to see them here.</p>
                    <a href="{{ route('admin.products.create') }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors inline-flex items-center">
                        <i class="fas fa-plus mr-2"></i>
                        Add Product
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
