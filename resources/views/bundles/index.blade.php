@extends('layouts.app')

@section('title', 'Special Bundle Packs - PasalMalla')
@section('description', 'Save money with our special bundle packs. Complete school supply sets at discounted prices with free delivery.')

@section('content')
<div class="bg-gray-50 py-8">
    <div class="container mx-auto px-4">
        <!-- Page Header -->
        <div class="text-center mb-12">
            <h1 class="text-5xl font-bold mb-4">
                <span class="gradient-text">Special Bundle Packs</span>
            </h1>
            <p class="text-2xl text-gray-600 font-medium">Save money with our carefully curated school supply bundles</p>
            <div class="w-24 h-1 bg-gradient-to-r from-orange-500 to-red-500 mx-auto mt-4 rounded-full"></div>
        </div>

        <!-- Filters -->
        <div class="bg-white rounded-3xl p-8 shadow-xl mb-12 border border-gray-100">
            <form method="GET" action="{{ route('bundles.index') }}" class="flex flex-wrap gap-4 items-end">
                <div class="flex-1 min-w-64">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Search Bundles</label>
                    <input type="text" name="search" value="{{ request('search') }}"
                           placeholder="Search bundle packs..."
                           class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Grade Level</label>
                <button type="submit" class="btn-primary text-white px-8 py-3 rounded-xl font-bold">
                    <i class="fas fa-filter mr-2"></i>
                    Filter
                </button>
                @if(request()->hasAny(['search']))
                <a href="{{ route('bundles.index') }}" class="bg-gray-100 text-gray-700 px-8 py-3 rounded-xl font-bold hover:bg-gray-200 transition-colors inline-flex items-center">
                    <i class="fas fa-times mr-2"></i>
                    Clear
                </a>
                @endif
            </form>
        </div>

        @if($bundles->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach($bundles as $bundle)
            <div class="card-hover bg-white rounded-3xl overflow-hidden shadow-xl border border-gray-100">
                <div class="relative">
                    <img src="https://images.pexels.com/photos/159711/books-bookstore-book-reading-159711.jpeg?auto=compress&cs=tinysrgb&w=400"
                         alt="{{ $bundle->name }}" class="w-full h-56 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute top-4 right-4 bg-gradient-to-r from-red-500 to-red-600 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg animate-pulse">
                        Save {{ $bundle->getSavingsPercentage() }}%
                    </div>
                    @if($bundle->grade_level)
                    <div class="absolute top-4 left-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                        {{ $bundle->grade_level }}
                    </div>
                    @endif
                    <div class="absolute bottom-4 left-4 bg-gradient-to-r from-blue-500 to-blue-600 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                        <i class="fas fa-gift mr-1"></i>Bundle
                    </div>
                </div>
                <div class="p-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-orange-600 transition-colors">{{ $bundle->name }}</h3>
                    <p class="text-gray-600 mb-3">{{ $bundle->name_sinhala }}</p>
                    <p class="text-sm text-gray-500 mb-6">{{ Str::limit($bundle->description, 80) }}</p>
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <span class="text-3xl font-bold text-orange-600">Rs. {{ number_format($bundle->price, 2) }}</span>
                            <div class="text-sm text-gray-500 line-through">Rs. {{ number_format($bundle->original_price, 2) }}</div>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('bundles.show', $bundle) }}" class="flex-1 btn-primary text-white py-4 rounded-2xl font-bold text-center">
                            <i class="fas fa-eye mr-2"></i>
                            View Bundle
                        </a>
                        <button class="add-to-cart bg-gradient-to-r from-orange-100 to-orange-200 hover:from-orange-200 hover:to-orange-300 text-orange-700 px-5 py-4 rounded-2xl transition-all hover:scale-110 hover:shadow-lg"
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
            <div class="text-8xl mb-8 float-animation">📦</div>
            <h3 class="text-3xl font-bold text-gray-800 mb-6">No bundles found</h3>
            <p class="text-xl text-gray-600 mb-8">Try adjusting your search or filters</p>
            <a href="{{ route('bundles.index') }}" class="btn-primary text-white px-12 py-5 rounded-2xl font-bold text-xl">
                View All Bundles
            </a>
        </div>
        @endif

        <!-- Why Choose Bundles Section -->
        <section class="mt-16">
            <div class="bg-gradient-to-br from-orange-50 via-orange-100 to-red-50 rounded-3xl p-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-12 text-center">
                    <span class="gradient-text">Why Choose Our Bundle Packs?</span>
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    <div class="text-center group">
                        <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <i class="fas fa-piggy-bank text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Save Money</h3>
                        <p class="text-gray-600 text-lg">Up to 30% savings compared to buying items separately</p>
                    </div>
                    <div class="text-center group">
                        <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <i class="fas fa-check-double text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Complete Sets</h3>
                        <p class="text-gray-600 text-lg">Everything your child needs in one convenient package</p>
                    </div>
                    <div class="text-center group">
                        <div class="w-20 h-20 bg-gradient-to-br from-orange-500 to-orange-600 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <i class="fas fa-shipping-fast text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Free Delivery</h3>
                        <p class="text-gray-600 text-lg">Free island-wide delivery with cash on delivery option</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
