@extends('admin.layouts.app')

@section('title', 'View Bundle')
@section('page-title', 'Bundle Details')
@section('page-description', 'View bundle information')

@section('content')
<div class="space-y-6">
    <!-- Header Actions -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-2xl font-bold text-gray-900">{{ $bundle->name }}</h3>
                <p class="text-gray-600">{{ $bundle->name_sinhala }}</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('admin.bundles.edit', $bundle) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-colors">
                    <i class="fas fa-edit mr-2"></i>Edit
                </a>
                <form method="POST" action="{{ route('admin.bundles.destroy', $bundle) }}" class="inline" 
                      onsubmit="return confirm('Are you sure you want to delete this bundle?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition-colors">
                        <i class="fas fa-trash mr-2"></i>Delete
                    </button>
                </form>
                <a href="{{ route('admin.bundles.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>Back
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Bundle Info -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Bundle Image -->
            @if($bundle->image)
            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                <div class="p-6 border-b border-gray-200">
                    <h4 class="text-lg font-semibold text-gray-900">Bundle Image</h4>
                </div>
                <div class="p-6">
                    <img src="{{ asset('storage/' . $bundle->image) }}" alt="{{ $bundle->name }}" 
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
                            <label class="block text-sm font-medium text-gray-500 mb-1">Bundle Name</label>
                            <p class="text-gray-900 font-medium">{{ $bundle->name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Bundle Name (Sinhala)</label>
                            <p class="text-gray-900 font-medium">{{ $bundle->name_sinhala ?? 'Not set' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Grade Level</label>
                            <p class="text-gray-900 font-medium">{{ $bundle->grade_level ?? 'Not specified' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Slug</label>
                            <p class="text-gray-900 font-medium">{{ $bundle->slug }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Created</label>
                            <p class="text-gray-900 font-medium">{{ $bundle->created_at->format('M d, Y H:i') }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Last Updated</label>
                            <p class="text-gray-900 font-medium">{{ $bundle->updated_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description -->
            @if($bundle->description || $bundle->description_sinhala)
            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                <div class="p-6 border-b border-gray-200">
                    <h4 class="text-lg font-semibold text-gray-900">Description</h4>
                </div>
                <div class="p-6 space-y-4">
                    @if($bundle->description)
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-2">English Description</label>
                        <p class="text-gray-900 leading-relaxed">{{ $bundle->description }}</p>
                    </div>
                    @endif
                    @if($bundle->description_sinhala)
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-2">Sinhala Description</label>
                        <p class="text-gray-900 leading-relaxed">{{ $bundle->description_sinhala }}</p>
                    </div>
                    @endif
                </div>
            </div>
            @endif

            <!-- Bundle Products -->
            @if($bundle->products && $bundle->products->count() > 0)
            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                <div class="p-6 border-b border-gray-200">
                    <h4 class="text-lg font-semibold text-gray-900">Bundle Contents</h4>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        @foreach($bundle->products as $product)
                        <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                            <img src="{{ $product->getImageUrl() }}" alt="{{ $product->name }}" 
                                 class="w-12 h-12 object-cover rounded-lg">
                            <div class="flex-1">
                                <h5 class="font-medium text-gray-800">{{ $product->name }}</h5>
                                <p class="text-sm text-gray-600">{{ $product->category->name }}</p>
                            </div>
                            <div class="text-right">
                                <p class="font-medium text-gray-800">Qty: {{ $product->pivot->quantity }}</p>
                                <p class="text-sm text-gray-600">Rs. {{ number_format($product->getCurrentPrice(), 2) }}</p>
                            </div>
                        </div>
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
                            @if($bundle->is_active) bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif">
                            {{ $bundle->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-500">Featured</span>
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                            @if($bundle->is_featured) bg-yellow-100 text-yellow-800 @else bg-gray-100 text-gray-800 @endif">
                            {{ $bundle->is_featured ? 'Yes' : 'No' }}
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
                        <span class="text-sm font-medium text-gray-500">Bundle Price</span>
                        <span class="text-lg font-bold text-green-600">Rs. {{ number_format($bundle->price, 2) }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-500">Original Price</span>
                        <span class="text-lg font-bold text-gray-900">Rs. {{ number_format($bundle->original_price, 2) }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-500">Savings</span>
                        <span class="text-sm font-bold text-red-600">{{ $bundle->getSavingsPercentage() }}% OFF</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-500">You Save</span>
                        <span class="text-xl font-bold text-orange-600">Rs. {{ number_format($bundle->getSavingsAmount(), 2) }}</span>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                <div class="p-6 border-b border-gray-200">
                    <h4 class="text-lg font-semibold text-gray-900">Quick Actions</h4>
                </div>
                <div class="p-6 space-y-3">
                    <a href="{{ route('bundles.show', $bundle) }}" target="_blank" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg transition-colors text-center block">
                        <i class="fas fa-external-link-alt mr-2"></i>View on Website
                    </a>
                    <button class="w-full bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg transition-colors">
                        <i class="fas fa-copy mr-2"></i>Duplicate Bundle
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