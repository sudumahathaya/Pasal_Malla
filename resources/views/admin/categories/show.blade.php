@extends('admin.layouts.app')

@section('title', 'View Category')
@section('page-title', 'Category Details')
@section('page-description', 'View category information and products')

@section('content')
<div class="space-y-6">
    <!-- Header Actions -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-2xl font-bold text-gray-900">{{ $category->name }}</h3>
                <p class="text-gray-600">{{ $category->name_sinhala }}</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('admin.categories.edit', $category) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-colors">
                    <i class="fas fa-edit mr-2"></i>Edit
                </a>
                <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" class="inline" 
                      onsubmit="return confirm('Are you sure you want to delete this category?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition-colors">
                        <i class="fas fa-trash mr-2"></i>Delete
                    </button>
                </form>
                <a href="{{ route('admin.categories.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>Back
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Category Info -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Category Image -->
            @if($category->image)
            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                <div class="p-6 border-b border-gray-200">
                    <h4 class="text-lg font-semibold text-gray-900">Category Image</h4>
                </div>
                <div class="p-6">
                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" 
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
                            <label class="block text-sm font-medium text-gray-500 mb-1">Category Name</label>
                            <p class="text-gray-900 font-medium">{{ $category->name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Category Name (Sinhala)</label>
                            <p class="text-gray-900 font-medium">{{ $category->name_sinhala ?? 'Not set' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Icon</label>
                            <p class="text-gray-900 font-medium text-2xl">{{ $category->icon ?? '📚' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Sort Order</label>
                            <p class="text-gray-900 font-medium">{{ $category->sort_order }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Created</label>
                            <p class="text-gray-900 font-medium">{{ $category->created_at->format('M d, Y H:i') }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Last Updated</label>
                            <p class="text-gray-900 font-medium">{{ $category->updated_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description -->
            @if($category->description)
            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                <div class="p-6 border-b border-gray-200">
                    <h4 class="text-lg font-semibold text-gray-900">Description</h4>
                </div>
                <div class="p-6">
                    <p class="text-gray-900 leading-relaxed">{{ $category->description }}</p>
                </div>
            </div>
            @endif

            <!-- Category Products -->
            @if($category->products && $category->products->count() > 0)
            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                <div class="p-6 border-b border-gray-200">
                    <h4 class="text-lg font-semibold text-gray-900">Products in this Category</h4>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($category->products->take(10) as $product)
                        <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                            <img src="{{ $product->getImageUrl() }}" alt="{{ $product->name }}" 
                                 class="w-12 h-12 object-cover rounded-lg">
                            <div class="flex-1">
                                <h5 class="font-medium text-gray-800">{{ $product->name }}</h5>
                                <p class="text-sm text-gray-600">Rs. {{ number_format($product->getCurrentPrice(), 2) }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @if($category->products->count() > 10)
                    <p class="text-sm text-gray-500 mt-4">And {{ $category->products->count() - 10 }} more products...</p>
                    @endif
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
                            @if($category->is_active) bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif">
                            {{ $category->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-500">Products</span>
                        <span class="text-lg font-bold text-blue-600">{{ $category->products->count() }}</span>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                <div class="p-6 border-b border-gray-200">
                    <h4 class="text-lg font-semibold text-gray-900">Quick Actions</h4>
                </div>
                <div class="p-6 space-y-3">
                    <a href="{{ route('products.index', ['category' => $category->slug]) }}" target="_blank" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg transition-colors text-center block">
                        <i class="fas fa-external-link-alt mr-2"></i>View on Website
                    </a>
                    <a href="{{ route('admin.products.create') }}?category={{ $category->id }}" class="w-full bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg transition-colors text-center block">
                        <i class="fas fa-plus mr-2"></i>Add Product
                    </a>
                    <button class="w-full bg-orange-500 hover:bg-orange-600 text-white py-2 px-4 rounded-lg transition-colors">
                        <i class="fas fa-chart-line mr-2"></i>View Analytics
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection