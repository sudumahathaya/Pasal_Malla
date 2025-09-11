@extends('admin.layouts.app')

@section('title', 'Bundles')
@section('page-title', 'Bundle Management')
@section('page-description', 'Manage your product bundles and special offers')

@section('content')
<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Total Bundles</p>
                <p class="text-3xl font-bold text-gray-900">{{ \App\Models\Bundle::count() }}</p>
            </div>
            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-gift text-purple-600 text-xl"></i>
            </div>
        </div>
    </div>
<<<<<<< HEAD

=======
    
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Active Bundles</p>
                <p class="text-3xl font-bold text-gray-900">{{ \App\Models\Bundle::where('is_active', true)->count() }}</p>
            </div>
            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-check-circle text-green-600 text-xl"></i>
            </div>
        </div>
    </div>
<<<<<<< HEAD

=======
    
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Featured Bundles</p>
                <p class="text-3xl font-bold text-gray-900">{{ \App\Models\Bundle::where('is_featured', true)->count() }}</p>
            </div>
            <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-star text-yellow-600 text-xl"></i>
            </div>
        </div>
    </div>
<<<<<<< HEAD

=======
    
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Total Savings</p>
                <p class="text-3xl font-bold text-gray-900">Rs. {{ number_format(\App\Models\Bundle::sum(\Illuminate\Support\Facades\DB::raw('original_price - price')), 2) }}</p>
            </div>
            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-piggy-bank text-red-600 text-xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Filters and Actions -->
<div class="bg-white rounded-xl shadow-sm p-6 mb-6 border border-gray-200">
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
        <div class="flex-1">
            <form method="GET" action="{{ route('admin.bundles.index') }}" class="flex gap-4">
                <div class="flex-1">
<<<<<<< HEAD
                    <input type="text" name="search" value="{{ request('search') }}"
                           placeholder="Search bundles..."
=======
                    <input type="text" name="search" value="{{ request('search') }}" 
                           placeholder="Search bundles..." 
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition-colors">
                    <i class="fas fa-search mr-2"></i>Filter
                </button>
                @if(request()->has('search'))
                <a href="{{ route('admin.bundles.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition-colors">
                    <i class="fas fa-times mr-2"></i>Clear
                </a>
                @endif
            </form>
        </div>
        <div>
            <a href="{{ route('admin.bundles.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg transition-colors inline-flex items-center">
                <i class="fas fa-plus mr-2"></i>Add Bundle
            </a>
        </div>
    </div>
</div>

<!-- Bundles Table -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bundle</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Grade Level</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pricing</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Savings</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($bundles as $bundle)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-12 w-12">
<<<<<<< HEAD
                                <img src="https://images.pexels.com/photos/159711/books-bookstore-book-reading-159711.jpeg?auto=compress&cs=tinysrgb&w=100"
=======
                                <img src="https://images.pexels.com/photos/159711/books-bookstore-book-reading-159711.jpeg?auto=compress&cs=tinysrgb&w=100" 
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
                                     alt="{{ $bundle->name }}" class="h-12 w-12 rounded-lg object-cover border border-gray-200">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">{{ $bundle->name }}</div>
                                <div class="text-sm text-gray-500">{{ $bundle->name_sinhala }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($bundle->grade_level)
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                            {{ $bundle->grade_level }}
                        </span>
                        @else
                        <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">
                            <div class="font-bold text-green-600">Rs. {{ number_format($bundle->price, 2) }}</div>
                            <div class="text-xs text-gray-500 line-through">Rs. {{ number_format($bundle->original_price, 2) }}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-red-600">
                            {{ $bundle->getSavingsPercentage() }}% OFF
                        </div>
                        <div class="text-xs text-gray-500">
                            Save Rs. {{ number_format($bundle->getSavingsAmount(), 2) }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
<<<<<<< HEAD
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full
=======
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
                            @if($bundle->is_active) bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif">
                            {{ $bundle->is_active ? 'Active' : 'Inactive' }}
                        </span>
                        @if($bundle->is_featured)
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800 ml-1">
                            Featured
                        </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.bundles.show', $bundle) }}" class="text-blue-600 hover:text-blue-900">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.bundles.edit', $bundle) }}" class="text-green-600 hover:text-green-900">
                                <i class="fas fa-edit"></i>
                            </a>
<<<<<<< HEAD
                            <form method="POST" action="{{ route('admin.bundles.destroy', $bundle) }}" class="inline"
=======
                            <form method="POST" action="{{ route('admin.bundles.destroy', $bundle) }}" class="inline" 
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
                                  onsubmit="return confirm('Are you sure you want to delete this bundle?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center">
                        <div class="text-gray-500">
                            <i class="fas fa-gift text-4xl mb-4"></i>
                            <p class="text-lg">No bundles found</p>
                            <p class="text-sm">Create your first bundle to get started</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
<<<<<<< HEAD

=======
    
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
    @if($bundles->hasPages())
    <div class="px-6 py-4 border-t border-gray-200">
        {{ $bundles->appends(request()->query())->links() }}
    </div>
    @endif
</div>
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
