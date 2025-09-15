@extends('admin.layouts.app')

@section('title', 'Bundles')
@section('page-title', 'Bundles')
@section('page-description', 'Manage product bundles and special offers')

@section('content')
<!-- Header Actions -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
    <div>
        <h2 class="text-2xl font-bold text-gray-900">Bundles</h2>
        <p class="text-gray-600">Manage your product bundles and special offers</p>
    </div>
    <div class="mt-4 sm:mt-0">
        <a href="{{ route('admin.bundles.create') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors inline-flex items-center">
            <i class="fas fa-plus mr-2"></i>
            Add Bundle
        </a>
    </div>
</div>

<!-- Search -->
<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
    <form method="GET" class="flex gap-4">
        <div class="flex-1">
            <input type="text" name="search" value="{{ request('search') }}" 
                   placeholder="Search bundles..."
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <button type="submit" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
            <i class="fas fa-search mr-2"></i>
            Search
        </button>
    </form>
</div>

<!-- Bundles Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($bundles as $bundle)
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
        <!-- Bundle Image -->
        <div class="h-48 bg-gray-200 flex items-center justify-center">
            @if($bundle->image)
                <img src="{{ asset('storage/' . $bundle->image) }}" alt="{{ $bundle->name }}" 
                     class="w-full h-full object-cover">
            @else
                <div class="text-center">
                    <i class="fas fa-gift text-6xl text-gray-400 mb-4"></i>
                    <p class="text-gray-500">{{ $bundle->name }}</p>
                </div>
            @endif
        </div>
        
        <!-- Bundle Info -->
        <div class="p-6">
            <div class="flex items-center justify-between mb-2">
                <h3 class="text-lg font-semibold text-gray-900">{{ $bundle->name }}</h3>
                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full
                    {{ $bundle->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ $bundle->is_active ? 'Active' : 'Inactive' }}
                </span>
            </div>
            
            @if($bundle->name_sinhala)
                <p class="text-sm text-gray-600 mb-2">{{ $bundle->name_sinhala }}</p>
            @endif
            
            @if($bundle->description)
                <p class="text-sm text-gray-500 mb-4 line-clamp-2">{{ $bundle->description }}</p>
            @endif
            
            <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                <span class="font-semibold text-lg text-green-600">Rs. {{ number_format($bundle->price, 2) }}</span>
                <span>{{ $bundle->products->count() }} products</span>
            </div>
            
            @if($bundle->sale_price)
            <div class="flex items-center justify-between text-sm mb-4">
                <span class="text-gray-500">Regular Price:</span>
                <span class="text-gray-400 line-through">Rs. {{ number_format($bundle->sale_price, 2) }}</span>
            </div>
            @endif
            
            <!-- Actions -->
            <div class="flex space-x-2">
                <a href="{{ route('admin.bundles.show', $bundle) }}" 
                   class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-2 rounded-lg text-center text-sm font-medium transition-colors">
                    <i class="fas fa-eye mr-1"></i>
                    View
                </a>
                <a href="{{ route('admin.bundles.edit', $bundle) }}" 
                   class="flex-1 bg-blue-100 hover:bg-blue-200 text-blue-700 px-3 py-2 rounded-lg text-center text-sm font-medium transition-colors">
                    <i class="fas fa-edit mr-1"></i>
                    Edit
                </a>
                <form method="POST" action="{{ route('admin.bundles.destroy', $bundle) }}" 
                      class="flex-1" onsubmit="return confirm('Are you sure you want to delete this bundle?')">
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
            <i class="fas fa-gift text-6xl text-gray-400 mb-4"></i>
            <h3 class="text-lg font-medium text-gray-900 mb-2">No bundles found</h3>
            <p class="text-gray-500 mb-6">Create special product bundles to offer great deals to your customers.</p>
            <a href="{{ route('admin.bundles.create') }}" 
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors inline-flex items-center">
                <i class="fas fa-plus mr-2"></i>
                Add Bundle
            </a>
        </div>
    </div>
    @endforelse
</div>

<!-- Pagination -->
@if($bundles->hasPages())
<div class="mt-6">
    {{ $bundles->links() }}
</div>
@endif
@endsection