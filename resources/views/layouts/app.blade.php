<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PasalMalla - ලමයෙක් පාසලට ගන්න ඕන හම දේකම!')</title>
    <meta name="description" content="@yield('description', 'Sri Lanka\'s best online school supplies store. Books, stationery, bags, uniforms and more!')">

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @stack('styles')
</head>
<body class="bg-gray-50 font-rounded">
    <!-- Header -->
    <header class="header-glass sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <!-- Top Bar -->
            <div class="border-b border-gray-100 py-2">
                <div class="flex justify-between items-center text-sm">
                    <div class="text-gray-600">
                        <i class="fas fa-truck mr-2"></i>
                        Free Delivery Island Wide | Cash on Delivery Available
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="tel:+94771869132" class="text-gray-600 hover:text-primary-600">
                            <i class="fas fa-phone mr-1"></i>
                            077 186 9132
                        </a>
                        <a href="mailto:info@pasalmalla.lk" class="text-gray-600 hover:text-primary-600">
                            <i class="fas fa-envelope mr-1"></i>
                            info@pasalmalla.lk
                        </a>
                    </div>
                </div>
            </div>

            <!-- Main Header -->
            <div class="py-4">
                <div class="flex items-center justify-between">
                    <!-- Logo -->
                    <a href="{{ route('home') }}" class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-orange-700 rounded-xl flex items-center justify-center">
                            <i class="fas fa-school text-white text-xl"></i>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-gray-800">PasalMalla</h1>
                            <p class="text-xs text-gray-500">ලමයෙක් පාසලට ගන්න ඕන හම දේකම!</p>
                        </div>
                    </a>

                    <!-- Search Bar -->
                    <div class="flex-1 max-w-lg mx-8">
                        <form action="{{ route('products.index') }}" method="GET" class="relative">
                            <input type="text" name="search" placeholder="Search for school supplies..."
                                   value="{{ request('search') }}"
                                   class="w-full px-4 py-3 pl-12 pr-4 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                            <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-colors">
                                Search
                            </button>
                        </form>
                    </div>

                    <!-- Cart & Actions -->
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('cart.index') }}" class="cart-icon-wrapper relative p-3 text-gray-600 hover:text-orange-600 transition-colors">
                            <i class="fas fa-shopping-cart text-xl"></i>
                            <span class="cart-count absolute -top-1 -right-1 bg-orange-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center" style="display: none;">0</span>
                        </a>
                        <a href="{{ route('bundles.index') }}" class="btn-secondary text-white px-6 py-3 rounded-xl font-semibold">
                            Special Packs
                        </a>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="border-t border-gray-100 py-4">
                <div class="flex items-center justify-center space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-primary-600 font-medium transition-colors">
                        <i class="fas fa-home mr-2"></i>Home
                    </a>
                    <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-orange-600 font-medium transition-colors">
                        <i class="fas fa-shopping-bag mr-2"></i>All Products
                    </a>
                    <a href="{{ route('bundles.index') }}" class="text-gray-700 hover:text-orange-600 font-medium transition-colors">
                        <i class="fas fa-gift mr-2"></i>Special Bundles
                    </a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-orange-600 font-medium transition-colors">
                        <i class="fas fa-info-circle mr-2"></i>About Us
                    </a>
                    <a href="{{ route('delivery') }}" class="text-gray-700 hover:text-orange-600 font-medium transition-colors">
                        <i class="fas fa-truck mr-2"></i>Delivery Info
                    </a>
                    <a href="{{ route('contact') }}" class="text-gray-700 hover:text-orange-600 font-medium transition-colors">
                        <i class="fas fa-phone mr-2"></i>Contact
                    </a>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-16">
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-orange-700 rounded-lg flex items-center justify-center">
                            <i class="fas fa-school text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold">PasalMalla</h3>
                    </div>
                    <p class="text-gray-300 mb-4">
                        Sri Lanka's most trusted online school supplies store.
                        Everything your child needs for school, delivered to your doorstep.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-facebook text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-whatsapp text-xl"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('products.index') }}" class="text-gray-300 hover:text-white transition-colors">All Products</a></li>
                        <li><a href="{{ route('bundles.index') }}" class="text-gray-300 hover:text-white transition-colors">Special Bundles</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-white transition-colors">About Us</a></li>
                        <li><a href="{{ route('delivery') }}" class="text-gray-300 hover:text-white transition-colors">Delivery Info</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-300 hover:text-white transition-colors">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Categories -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Categories</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('products.index', ['category' => 'books-notebooks']) }}" class="text-gray-300 hover:text-white transition-colors">Books & Notebooks</a></li>
                        <li><a href="{{ route('products.index', ['category' => 'stationery']) }}" class="text-gray-300 hover:text-white transition-colors">Stationery</a></li>
                        <li><a href="{{ route('products.index', ['category' => 'school-bags']) }}" class="text-gray-300 hover:text-white transition-colors">School Bags</a></li>
                        <li><a href="{{ route('products.index', ['category' => 'lunch-water-bottles']) }}" class="text-gray-300 hover:text-white transition-colors">Lunch & Water Bottles</a></li>
                        <li><a href="{{ route('products.index', ['category' => 'art-craft']) }}" class="text-gray-300 hover:text-white transition-colors">Art & Craft</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact Info</h4>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <i class="fas fa-phone mr-3 text-orange-400"></i>
                            <span class="text-gray-300">077 186 9132</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-envelope mr-3 text-orange-400"></i>
                            <span class="text-gray-300">info@pasalmalla.lk</span>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-map-marker-alt mr-3 text-orange-400 mt-1"></i>
                            <span class="text-gray-300">123 Main Street<br>Colombo 07, Sri Lanka</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                <p class="text-gray-400">
                    © {{ date('Y') }} PasalMalla. All rights reserved. |
                    <a href="#" class="hover:text-white transition-colors">Privacy Policy</a> |
                    <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                </p>
            </div>
        </div>
    </footer>

    <!-- Cart JavaScript -->
    <script src="{{ asset('js/cart.js') }}"></script>
    @stack('scripts')
</body>
</html>