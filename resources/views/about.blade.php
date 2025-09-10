@extends('layouts.app')

@section('title', 'About Us - PasalMalla')
@section('description', 'Learn about PasalMalla - Sri Lanka\'s trusted online school supplies store serving parents and students across the island.')

@section('content')
<div class="bg-gray-50 py-8">
    <div class="container mx-auto px-4">
        <!-- Hero Section -->
        <section class="text-center mb-16">
            <h1 class="text-4xl lg:text-5xl font-bold text-gray-800 mb-6">About PasalMalla</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                අම්මලා හදුවේ අම්මලා සමරන්න ❤️<br>
                We understand the challenges parents face when preparing their children for school
            </p>
        </section>

        <!-- Our Story -->
        <section class="mb-16">
            <div class="bg-white rounded-3xl p-8 lg:p-12 shadow-lg">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-800 mb-6">Our Story</h2>
                        <div class="space-y-4 text-gray-600 leading-relaxed">
                            <p>
                                PasalMalla was born from a simple observation: every year, thousands of parents across Sri Lanka
                                struggle to find quality school supplies for their children. Long queues at bookshops,
                                limited stock, and the hassle of visiting multiple stores became a yearly nightmare.
                            </p>
                            <p>
                                We decided to change that. PasalMalla brings together everything a child needs for school
                                under one digital roof - from textbooks and notebooks to school bags and uniforms.
                                Our mission is simple: make school shopping easy, affordable, and stress-free for every parent in Sri Lanka.
                            </p>
                            <p>
                                Today, we're proud to serve thousands of families across the island, delivering quality
                                school supplies right to their doorstep with our reliable cash-on-delivery service.
                            </p>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="w-80 h-80 mx-auto bg-gradient-to-br from-primary-100 to-primary-200 rounded-full flex items-center justify-center">
                            <div class="text-6xl">🎒📚✏️</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our Values -->
        <section class="mb-16">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Our Values</h2>
                <p class="text-xl text-gray-600">What drives us every day</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl p-8 shadow-lg text-center">
                    <div class="w-20 h-20 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-heart text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Parent-First Approach</h3>
                    <p class="text-gray-600">
                        We understand the challenges parents face and design our services around making their lives easier.
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-lg text-center">
                    <div class="w-20 h-20 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-shield-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Quality Assurance</h3>
                    <p class="text-gray-600">
                        Every product we sell meets our strict quality standards. Your child deserves the best.
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-lg text-center">
                    <div class="w-20 h-20 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-handshake text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Trust & Reliability</h3>
                    <p class="text-gray-600">
                        We've built our reputation on trust. Thousands of parents rely on us year after year.
                    </p>
                </div>
            </div>
        </section>

        <!-- Why Choose Us -->
        <section class="mb-16">
            <div class="bg-gradient-to-br from-blue-50 to-indigo-100 rounded-3xl p-8 lg:p-12">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Why Parents Choose PasalMalla</h2>
                    <p class="text-xl text-gray-600">The benefits that matter most to Sri Lankan families</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-primary-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-truck text-white text-xl"></i>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Island-wide Delivery</h3>
                        <p class="text-gray-600 text-sm">Free delivery to every corner of Sri Lanka</p>
                    </div>

                    <div class="text-center">
                        <div class="w-16 h-16 bg-secondary-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-money-bill-wave text-white text-xl"></i>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Cash on Delivery</h3>
                        <p class="text-gray-600 text-sm">Pay only when you receive your order</p>
                    </div>

                    <div class="text-center">
                        <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-tags text-white text-xl"></i>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Best Prices</h3>
                        <p class="text-gray-600 text-sm">Competitive prices with special bundle offers</p>
                    </div>

                    <div class="text-center">
                        <div class="w-16 h-16 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-clock text-white text-xl"></i>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Save Time</h3>
                        <p class="text-gray-600 text-sm">No more queues or multiple store visits</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our Promise -->
        <section class="mb-16">
            <div class="bg-white rounded-3xl p-8 lg:p-12 shadow-lg text-center">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Our Promise to You</h2>
                <div class="max-w-4xl mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-left">
                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <i class="fas fa-check text-white text-sm"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800 mb-2">Quality Products Only</h3>
                                <p class="text-gray-600">We carefully select every item to ensure it meets our quality standards.</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <i class="fas fa-check text-white text-sm"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800 mb-2">Fast & Reliable Delivery</h3>
                                <p class="text-gray-600">Your orders are processed quickly and delivered safely to your doorstep.</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <i class="fas fa-check text-white text-sm"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800 mb-2">Excellent Customer Service</h3>
                                <p class="text-gray-600">Our friendly team is always ready to help with any questions or concerns.</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <i class="fas fa-check text-white text-sm"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800 mb-2">Secure Shopping</h3>
                                <p class="text-gray-600">Your personal information and transactions are always protected.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact CTA -->
        <section class="text-center">
            <div class="bg-gradient-to-r from-primary-500 to-primary-700 rounded-3xl p-8 lg:p-12 text-white">
                <h2 class="text-3xl font-bold mb-4">Ready to Make School Shopping Easy?</h2>
                <p class="text-xl mb-8 text-blue-100">
                    Join thousands of happy parents who trust PasalMalla for their children's school needs
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('products.index') }}" class="btn-white px-8 py-4 rounded-xl font-semibold text-lg">
                        <i class="fas fa-shopping-bag mr-3"></i>
                        Start Shopping
                    </a>
                    <a href="{{ route('contact') }}" class="btn-glass px-8 py-4 rounded-xl font-semibold text-lg border-white">
                        <i class="fas fa-phone mr-3"></i>
                        Contact Us
                    </a>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
