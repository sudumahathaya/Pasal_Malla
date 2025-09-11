@extends('layouts.app')

@section('title', 'Shopping Cart - PasalMalla')
@section('description', 'Review your cart and proceed to checkout with cash on delivery option')

@section('content')
<div class="bg-gray-50 py-8">
    <div class="container mx-auto px-4">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Shopping Cart</h1>
            <p class="text-gray-600">Review your items and proceed to checkout</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Cart Items -->
            <div class="lg:col-span-2">
                <div id="cart-items" class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <!-- Cart Header -->
                    <div class="bg-orange-50 px-6 py-4 border-b border-orange-100">
                        <h2 class="text-lg font-bold text-gray-800">Your Items</h2>
                    </div>

                    <!-- Cart items will be loaded here by JavaScript -->

                    <!-- Continue Shopping -->
                    <div class="p-6 bg-gray-50 border-t border-gray-200">
                        <a href="{{ route('products.index') }}" class="text-orange-600 hover:text-orange-700 font-medium inline-flex items-center">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Continue Shopping
                        </a>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div id="cart-summary">
                    <!-- Cart summary will be loaded here by JavaScript -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection