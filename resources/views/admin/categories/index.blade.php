@extends('admin.layouts.app')

@section('title', 'Categories')
@section('page-title', 'Categories')
@section('page-description', 'Manage product categories')

@section('content')
<!-- Header Actions -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
    <div>
        <h2 class="text-2xl font-bold text-gray-900">Categories</h2>
        <p class="text-gray-600">Manage your product categories</p>
    </div>
    <div class="mt-4 sm:mt-0">
        <a href="{{ route('admin.categories.create') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors inline-flex items-center">
            <i class="fas fa-plus mr-2"></i>
            Add Category
        </a>
    </div>
</div>

<!-- Search -->
<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
    <form method="GET" class="flex gap-4">
        <div class="flex-1">
            <input type="text" name="search" value="{{ request('search') }}" 
                   placeholder="Search categories..."
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <button type="submit" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
            <i class="fas fa-search mr-2"></i>
            Search
        </button>
    </form>
</div>

<!-- Categories Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($categories as $category)
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
        <!-- Category Image -->
        <div class="h-48 bg-gray-200 flex items-center justify-center">
            <img src="{{ $category->getImageUrl() }}" alt="{{ $category->name }}" 
                 class="w-full h-full object-cover">
        </div>
        
        <!-- Category Info -->
        <div class="p-6">
            <div class="flex items-center justify-between mb-2">
                <h3 class="text-lg font-semibold text-gray-900">{{ $category->name }}</h3>
                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full
                    {{ $category->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ $category->is_active ? 'Active' : 'Inactive' }}
                </span>
            </div>
            
            @if($category->name_sinhala)
                <p class="text-sm text-gray-600 mb-2">{{ $category->name_sinhala }}</p>
            @endif
            
            @if($category->description)
                <p class="text-sm text-gray-500 mb-4 line-clamp-2">{{ $category->description }}</p>
            @endif
            
            <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                <span>{{ $category->products_count }} products</span>
                <span>Sort: {{ $category->sort_order }}</span>
            </div>
            
            <!-- Actions -->
            <div class="flex space-x-2">
                <a href="{{ route('admin.categories.show', $category) }}" 
                   class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-2 rounded-lg text-center text-sm font-medium transition-colors">
                    <i class="fas fa-eye mr-1"></i>
                    View
                </a>
                <a href="{{ route('admin.categories.edit', $category) }}" 
                   class="flex-1 bg-blue-100 hover:bg-blue-200 text-blue-700 px-3 py-2 rounded-lg text-center text-sm font-medium transition-colors">
                    <i class="fas fa-edit mr-1"></i>
                    Edit
                </a>
                <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" 
                      class="flex-1" onsubmit="return confirm('Are you sure you want to delete this category?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full bg-red-100 hover:bg-red-200 text-red-700 px-3 py-2 rounded-lg text-center text-sm font-medium transition-colors">
                        <i class="fas fa-trash mr-1"></i>
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-full">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-12 text-center">
            <i class="fas fa-tags text-6xl text-gray-400 mb-4"></i>
            <h3 class="text-lg font-medium text-gray-900 mb-2">No categories found</h3>
            <p class="text-gray-500 mb-6">Get started by creating your first category.</p>
            <a href="{{ route('admin.categories.create') }}" 
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors inline-flex items-center">
                <i class="fas fa-plus mr-2"></i>
                Add Category
            </a>
        </div>
    </div>
    @endforelse
</div>

<!-- Pagination -->
@if($categories->hasPages())
<div class="mt-6">
    {{ $categories->links() }}
</div>
@endif
@endsection