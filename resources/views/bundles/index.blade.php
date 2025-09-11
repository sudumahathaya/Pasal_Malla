@extends('layouts.app')

@section('title', 'Special Bundle Packs - PasalMalla')
@section('description', 'Save money with our special bundle packs. Complete school supply sets at discounted prices with free delivery.')

@section('content')
<div class="bg-gray-50 py-8">
    <div class="container mx-auto px-4">
        <!-- Page Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Special Bundle Packs</h1>
            <p class="text-xl text-gray-600">Save money with our carefully curated school supply bundles</p>
        </div>

        <!-- Filters -->
        <div class="bg-white rounded-2xl p-6 shadow-lg mb-8">
            <form method="GET" action="{{ route('bundles.index') }}" class="flex flex-wrap gap-4 items-end">
                <div class="flex-1 min-w-64">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Search Bundles</label>
                    <input type="text" name="search" value="{{ request('search') }}"
                           placeholder="Search bundle packs..."
                           class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Grade Level</label>
                <button type="submit" class="btn-primary text-white px-6 py-2 rounded-lg font-semibold">
                    <i class="fas fa-filter mr-2"></i>
                    Filter
                </button>
                @if(request()->hasAny(['search']))
                <a href="{{ route('bundles.index') }}" class="bg-gray-100 text-gray-700 px-6 py-2 rounded-lg font-semibold hover:bg-gray-200 transition-colors inline-flex items-center">
                    <i class="fas fa-times mr-2"></i>
                    <i class="fas fa-arrow-left mr-2"></i>
                    Clear
                </a>
                @endif
            </form>
        </div>

        @if($bundles->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($bundles as $bundle)
            <div class="card-hover bg-white rounded-2xl overflow-hidden shadow-lg">
                <div class="relative">
                    <img src="https://images.pexels.com/photos/159711/books-bookstore-book-reading-159711.jpeg?auto=compress&cs=tinysrgb&w=400"
                         alt="{{ $bundle->name }}" class="w-full h-48 object-cover">
                    <div class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                        Save {{ $bundle->getSavingsPercentage() }}%
                    </div>
                    @if($bundle->grade_level)
                    <div class="absolute top-4 left-4 bg-orange-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                        {{ $bundle->grade_level }}
                    </div>
                    @endif
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $bundle->name }}</h3>
                    <p class="text-gray-600 mb-2">{{ $bundle->name_sinhala }}</p>
                    <p class="text-sm text-gray-500 mb-4">{{ Str::limit($bundle->description, 80) }}</p>
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <span class="text-2xl font-bold text-orange-600">Rs. {{ number_format($bundle->price, 2) }}</span>
                            <span class="text-sm text-gray-500 line-through ml-2">Rs. {{ number_format($bundle->original_price, 2) }}</span>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('bundles.show', $bundle) }}" class="flex-1 btn-primary text-white py-3 rounded-xl font-semibold text-center">
                            <i class="fas fa-eye mr-2"></i>
                            View Bundle
                        </a>
                        <button class="add-to-cart bg-orange-100 hover:bg-orange-200 text-orange-700 px-4 py-3 rounded-xl transition-colors hover:scale-105"
                                data-id="{{ $bundle->id }}"
                                data-name="{{ $bundle->name }}"
                                data-name-sinhala="{{ $bundle->name_sinhala }}"
                                data-price="{{ $bundle->price }}"
                                data-image="https://images.pexels.com/photos/159711/books-bookstore-book-reading-159711.jpeg?auto=compress&cs=tinysrgb&w=400"
                                data-type="bundle">
                            <i class="fas fa-shopping-cart"></i>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $bundles->appends(request()->query())->links() }}
        </div>
        @else
        <div class="text-center py-12">
            <div class="text-6xl mb-4">📦</div>
            <h3 class="text-2xl font-bold text-gray-800 mb-4">No bundles found</h3>
            <p class="text-gray-600 mb-6">Try adjusting your search or filters</p>
            <a href="{{ route('bundles.index') }}" class="btn-primary text-white px-6 py-3 rounded-lg font-semibold">
                View All Bundles
            </a>
        </div>
        @endif

        <!-- Why Choose Bundles Section -->
        <section class="mt-16">
            <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">Why Choose Our Bundle Packs?</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-piggy-bank text-white text-xl"></i>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Save Money</h3>
                        <p class="text-gray-600">Up to 30% savings compared to buying items separately</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-check-double text-white text-xl"></i>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Complete Sets</h3>
                        <p class="text-gray-600">Everything your child needs in one convenient package</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-shipping-fast text-white text-xl"></i>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Free Delivery</h3>
                        <p class="text-gray-600">Free island-wide delivery with cash on delivery</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection