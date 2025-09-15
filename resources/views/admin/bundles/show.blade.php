@extends('admin.layouts.app')

@section('title', 'Bundle Details')
@section('page-title', 'Bundle Details')
@section('page-description', 'View bundle information and products')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">{{ $bundle->name }}</h2>
                <p class="text-gray-600">Bundle details and included products</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('admin.bundles.edit', $bundle) }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors inline-flex items-center">
                    <i class="fas fa-edit mr-2"></i>
                    Edit Bundle
                </a>
                <a href="{{ route('admin.bundles.index') }}"
                   class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg font-medium transition-colors inline-flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to Bundles
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Bundle Image & Basic Info -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <!-- Bundle Image -->
                <div class="mb-6">
                    @if($bundle->image)
                        <img src="{{ asset('storage/' . $bundle->image) }}" alt="{{ $bundle->name }}"
                             class="w-full h-64 object-cover rounded-lg">
                    @else
                        <div class="w-full h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                            <i class="fas fa-gift text-gray-400 text-6xl"></i>
                        </div>
                    @endif
                </div>

                <!-- Basic Info -->
                <div class="space-y-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Basic Information</h3>
                    </div>

                    @if($bundle->name_sinhala)
                    <div>
                        <label class="text-sm font-medium text-gray-500">Sinhala Name</label>
                        <p class="text-sm text-gray-900">{{ $bundle->name_sinhala }}</p>
                    </div>
                    @endif

                    <div>
                        <label class="text-sm font-medium text-gray-500">Slug</label>
                        <p class="text-sm text-gray-900 font-mono bg-gray-50 px-2 py-1 rounded">{{ $bundle->slug }}</p>
                    </div>

                    @if($bundle->grade_level)
                    <div>
                        <label class="text-sm font-medium text-gray-500">Grade Level</label>
                        <p class="text-sm text-gray-900">{{ $bundle->grade_level }}</p>
                    </div>
                    @endif

                    <div>
                        <label class="text-sm font-medium text-gray-500">Status</label>
                        <div class="flex items-center space-x-2">
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full
                                {{ $bundle->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $bundle->is_active ? 'Active' : 'Inactive' }}
                            </span>
                            @if($bundle->is_featured)
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Featured
                                </span>
                            @endif
                        </div>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-500">Created</label>
                        <p class="text-sm text-gray-900">{{ $bundle->created_at->format('M d, Y H:i') }}</p>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-500">Last Updated</label>
                        <p class="text-sm text-gray-900">{{ $bundle->updated_at->format('M d, Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bundle Details -->
        <div class="lg:col-span-2">
            <div class="space-y-6">
                <!-- Pricing Information -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Pricing Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="text-sm font-medium text-gray-500">Original Price</label>
                            <p class="text-2xl font-bold text-gray-900">Rs. {{ number_format($bundle->original_price, 2) }}</p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-500">Bundle Price</label>
                            <p class="text-2xl font-bold text-green-600">Rs. {{ number_format($bundle->price, 2) }}</p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-500">Savings</label>
                            <p class="text-2xl font-bold text-red-600">Rs. {{ number_format($bundle->getSavingsAmount(), 2) }}</p>
                            <p class="text-sm text-gray-500">{{ $bundle->getSavingsPercentage() }}% off</p>
                        </div>
                    </div>
                </div>

                <!-- Descriptions -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Descriptions</h3>
                    <div class="space-y-4">
                        @if($bundle->description)
                        <div>
                            <label class="text-sm font-medium text-gray-500">English Description</label>
                            <p class="text-sm text-gray-900 mt-1">{{ $bundle->description }}</p>
                        </div>
                        @endif

                        @if($bundle->description_sinhala)
                        <div>
                            <label class="text-sm font-medium text-gray-500">Sinhala Description</label>
                            <p class="text-sm text-gray-900 mt-1">{{ $bundle->description_sinhala }}</p>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Bundle Products -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Bundle Products</h3>
                    @if($bundle->products->count() > 0)
                        <div class="space-y-4">
                            @foreach($bundle->products as $product)
                            <div class="border border-gray-200 rounded-lg p-4">
                                <div class="flex items-center space-x-4">
                                    @if($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
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
                                            <span class="text-sm text-gray-500">Qty: {{ $product->pivot->quantity }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <i class="fas fa-box text-4xl text-gray-400 mb-4"></i>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">No products in this bundle</h3>
                            <p class="text-gray-500 mb-6">Add products to this bundle to see them here.</p>
                        </div>
                    @endif
                </div>

                <!-- Sales Information -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Sales Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="text-center">
                            <p class="text-2xl font-bold text-gray-900">{{ $bundle->orderItems()->count() }}</p>
                            <p class="text-sm text-gray-500">Total Sold</p>
                        </div>
                        <div class="text-center">
                            <p class="text-2xl font-bold text-gray-900">Rs. {{ number_format($bundle->orderItems()->sum('total'), 2) }}</p>
                            <p class="text-sm text-gray-500">Total Revenue</p>
                        </div>
                        <div class="text-center">
                            <p class="text-2xl font-bold text-gray-900">
                                {{ $bundle->orderItems()->count() > 0 ? number_format($bundle->orderItems()->sum('total') / $bundle->orderItems()->count(), 2) : '0.00' }}
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
