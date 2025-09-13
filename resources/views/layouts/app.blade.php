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
        <div class="container mx-auto px-3 sm:px-4">
            <!-- Main Header -->
            <div class="py-3 sm:py-4">
                <div class="flex items-center justify-between">
                    <!-- Logo -->
                    <a href="{{ route('home') }}" class="flex items-center space-x-2 sm:space-x-3">
                        <div
                            class="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-gradient-to-br from-orange-500 to-orange-700 rounded-lg sm:rounded-xl flex items-center justify-center">
                            <i class="fas fa-school text-white text-lg sm:text-xl md:text-2xl"></i>
                        </div>
                        <div class="hidden sm:block">
                            <h1 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-800">PasalMalla</h1>
                            <p class="text-xs sm:text-sm text-gray-500">ලමයෙක් පාසලට ගන්න ඕන හම දේකම!</p>
                        </div>
                        <div class="block sm:hidden">
                            <h1 class="text-lg font-bold text-gray-800">PasalMalla</h1>
                        </div>
                    </a>


                    <!-- Desktop Navigation - Hidden on mobile -->
                    <nav class="hidden sm:flex flex-1">
                        <div class="flex items-center justify-center space-x-6 lg:space-x-8">
                            <a href="{{ route('home') }}"
                                class="text-gray-700 hover:text-orange-600 font-medium transition-colors text-sm lg:text-base">
                                <i class="fas fa-home mr-1 lg:mr-2"></i>Home
                            </a>
                            <a href="{{ route('products.index') }}"
                                class="text-gray-700 hover:text-orange-600 font-medium transition-colors text-sm lg:text-base">
                                <i class="fas fa-shopping-bag mr-1 lg:mr-2"></i>All Products
                            </a>
                            <a href="{{ route('bundles.index') }}"
                                class="text-gray-700 hover:text-orange-600 font-medium transition-colors text-sm lg:text-base">
                                <i class="fas fa-gift mr-1 lg:mr-2"></i>Special Bundles
                            </a>
                            <a href="{{ route('about') }}"
                                class="text-gray-700 hover:text-orange-600 font-medium transition-colors text-sm lg:text-base">
                                <i class="fas fa-info-circle mr-1 lg:mr-2"></i>About Us
                            </a>
                            <a href="{{ route('delivery') }}"
                                class="text-gray-700 hover:text-orange-600 font-medium transition-colors text-sm lg:text-base">
                                <i class="fas fa-truck mr-1 lg:mr-2"></i>Delivery Info
                            </a>
                            <a href="{{ route('contact') }}"
                                class="text-gray-700 hover:text-orange-600 font-medium transition-colors text-sm lg:text-base">
                                <i class="fas fa-phone mr-1 lg:mr-2"></i>Contact
                            </a>
                        </div>
                    </nav>


                    <!-- Cart & Actions -->
                    <div class="flex items-center space-x-2 sm:space-x-3 md:space-x-4">
                        <!-- Cart Icon - Always visible -->
                        <a href="{{ route('cart.index') }}"
                            class="cart-icon-wrapper relative p-2 sm:p-3 text-gray-600 hover:text-orange-600 transition-colors rounded-lg hover:bg-orange-50">
                            <i class="fas fa-shopping-cart text-base sm:text-lg md:text-xl"></i>
                            <span
                                class="cart-count absolute -top-1 -right-1 bg-orange-500 text-white text-xs rounded-full w-4 h-4 sm:w-5 sm:h-5 flex items-center justify-center font-bold"
                                style="display: none;">0</span>
                        </a>

                        <!-- Mobile Menu Button - Visible only on small screens -->
                        <button id="mobile-menu-button"
                            class="sm:hidden p-2 text-gray-600 hover:text-orange-600 transition-colors focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-opacity-50 rounded-lg hover:bg-orange-50"
                            aria-label="Toggle mobile menu" aria-expanded="false" type="button">
                            <i class="fas fa-bars text-lg sm:text-xl"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Navigation Menu -->
            <div id="mobile-menu"
                class="sm:hidden hidden border-t border-gray-200 bg-white shadow-lg transition-all duration-300 ease-in-out">
                <nav class="px-3 sm:px-4 py-4 sm:py-6">
                    <div class="flex flex-col space-y-1">
                        <a href="{{ route('home') }}"
                            class="flex items-center text-gray-700 hover:text-orange-600 hover:bg-orange-50 font-medium transition-all duration-200 py-3 px-3 rounded-lg">
                            <i class="fas fa-home mr-3 w-5 text-center"></i>
                            <span class="text-sm sm:text-base">Home</span>
                        </a>
                        <a href="{{ route('products.index') }}"
                            class="flex items-center text-gray-700 hover:text-orange-600 hover:bg-orange-50 font-medium transition-all duration-200 py-3 px-3 rounded-lg">
                            <i class="fas fa-shopping-bag mr-3 w-5 text-center"></i>
                            <span class="text-sm sm:text-base">All Products</span>
                        </a>
                        <a href="{{ route('bundles.index') }}"
                            class="flex items-center text-gray-700 hover:text-orange-600 hover:bg-orange-50 font-medium transition-all duration-200 py-3 px-3 rounded-lg">
                            <i class="fas fa-gift mr-3 w-5 text-center"></i>
                            <span class="text-sm sm:text-base">Special Bundles</span>
                        </a>
                        <a href="{{ route('about') }}"
                            class="flex items-center text-gray-700 hover:text-orange-600 hover:bg-orange-50 font-medium transition-all duration-200 py-3 px-3 rounded-lg">
                            <i class="fas fa-info-circle mr-3 w-5 text-center"></i>
                            <span class="text-sm sm:text-base">About Us</span>
                        </a>
                        <a href="{{ route('delivery') }}"
                            class="flex items-center text-gray-700 hover:text-orange-600 hover:bg-orange-50 font-medium transition-all duration-200 py-3 px-3 rounded-lg">
                            <i class="fas fa-truck mr-3 w-5 text-center"></i>
                            <span class="text-sm sm:text-base">Delivery Info</span>
                        </a>
                        <a href="{{ route('contact') }}"
                            class="flex items-center text-gray-700 hover:text-orange-600 hover:bg-orange-50 font-medium transition-all duration-200 py-3 px-3 rounded-lg">
                            <i class="fas fa-phone mr-3 w-5 text-center"></i>
                            <span class="text-sm sm:text-base">Contact</span>
                        </a>
                    </div>

                    <!-- Mobile CTA Section -->
                    <div class="pt-4 mt-4 border-t border-gray-200">
                        <div class="space-y-3">
                            <a href="{{ route('bundles.index') }}"
                                class="btn-secondary text-white px-4 py-3 rounded-xl font-semibold w-full text-center block text-sm sm:text-base">
                                <i class="fas fa-gift mr-2"></i>
                                Special Packs
                            </a>
                            <a href="{{ route('products.index') }}"
                                class="btn-primary text-white px-4 py-3 rounded-xl font-semibold w-full text-center block text-sm sm:text-base">
                                <i class="fas fa-shopping-bag mr-2"></i>
                                Start Shopping
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-16">
        <div class="container mx-auto px-4 py-8 sm:py-12">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">
                <!-- Company Info -->
                <div class="sm:col-span-2 lg:col-span-1">
                    <div class="flex items-center space-x-3 mb-4">
                        <div
                            class="w-10 h-10 bg-gradient-to-br from-orange-500 to-orange-700 rounded-lg flex items-center justify-center">
                            <i class="fas fa-school text-white"></i>
                        </div>
                        <h3 class="text-lg sm:text-xl font-bold">PasalMalla</h3>
                    </div>
                    <p class="text-gray-300 mb-4 text-sm sm:text-base">
                        Sri Lanka's most trusted online school supplies store.
                        Everything your child needs for school, delivered to your doorstep.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-facebook text-lg sm:text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-instagram text-lg sm:text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-whatsapp text-lg sm:text-xl"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-base sm:text-lg font-semibold mb-3 sm:mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('products.index') }}"
                                class="text-gray-300 hover:text-white transition-colors text-sm sm:text-base">All
                                Products</a></li>
                        <li><a href="{{ route('bundles.index') }}"
                                class="text-gray-300 hover:text-white transition-colors text-sm sm:text-base">Special
                                Bundles</a></li>
                        <li><a href="{{ route('about') }}"
                                class="text-gray-300 hover:text-white transition-colors text-sm sm:text-base">About
                                Us</a></li>
                        <li><a href="{{ route('delivery') }}"
                                class="text-gray-300 hover:text-white transition-colors text-sm sm:text-base">Delivery
                                Info</a></li>
                        <li><a href="{{ route('contact') }}"
                                class="text-gray-300 hover:text-white transition-colors text-sm sm:text-base">Contact
                                Us</a></li>
                    </ul>
                </div>

                <!-- Categories -->
                <div>
                    <h4 class="text-base sm:text-lg font-semibold mb-3 sm:mb-4">Categories</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('products.index', ['category' => 'books-notebooks']) }}"
                                class="text-gray-300 hover:text-white transition-colors text-sm sm:text-base">Books &
                                Notebooks</a></li>
                        <li><a href="{{ route('products.index', ['category' => 'stationery']) }}"
                                class="text-gray-300 hover:text-white transition-colors text-sm sm:text-base">Stationery</a>
                        </li>
                        <li><a href="{{ route('products.index', ['category' => 'school-bags']) }}"
                                class="text-gray-300 hover:text-white transition-colors text-sm sm:text-base">School
                                Bags</a></li>
                        <li><a href="{{ route('products.index', ['category' => 'lunch-water-bottles']) }}"
                                class="text-gray-300 hover:text-white transition-colors text-sm sm:text-base">Lunch &
                                Water Bottles</a></li>
                        <li><a href="{{ route('products.index', ['category' => 'art-craft']) }}"
                                class="text-gray-300 hover:text-white transition-colors text-sm sm:text-base">Art &
                                Craft</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-base sm:text-lg font-semibold mb-3 sm:mb-4">Contact Info</h4>
                    <div class="space-y-2 sm:space-y-3">
                        <div class="flex items-center">
                            <i class="fas fa-phone mr-3 text-orange-400 text-sm sm:text-base"></i>
                            <span class="text-gray-300 text-sm sm:text-base">077 186 9132</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-envelope mr-3 text-orange-400 text-sm sm:text-base"></i>
                            <span class="text-gray-300 text-sm sm:text-base">info@pasalmalla.lk</span>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-map-marker-alt mr-3 text-orange-400 mt-1 text-sm sm:text-base"></i>
                            <span class="text-gray-300 text-sm sm:text-base">123 Main Street<br>Colombo 07, Sri
                                Lanka</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-6 sm:mt-8 pt-6 sm:pt-8 text-center">
                <p class="text-gray-400 text-xs sm:text-sm">
                    © {{ date('Y') }} PasalMalla. All rights reserved. |
                    <a href="#" class="hover:text-white transition-colors">Privacy Policy</a> |
                    <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                </p>
            </div>
        </div>
    </footer>

    <!-- Cart JavaScript -->
    <script src="{{ asset('js/cart.js') }}"></script>

    <!-- Mobile Menu JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    // Toggle the mobile menu visibility
                    mobileMenu.classList.toggle('hidden');

                    // Update the icon
                    const icon = mobileMenuButton.querySelector('i');
                    if (mobileMenu.classList.contains('hidden')) {
                        icon.className = 'fas fa-bars text-xl';
                        mobileMenuButton.setAttribute('aria-expanded', 'false');
                    } else {
                        icon.className = 'fas fa-times text-xl';
                        mobileMenuButton.setAttribute('aria-expanded', 'true');
                    }
                });

                // Close mobile menu when clicking outside
                document.addEventListener('click', function(e) {
                    if (!mobileMenuButton.contains(e.target) && !mobileMenu.contains(e.target)) {
                        if (!mobileMenu.classList.contains('hidden')) {
                            mobileMenu.classList.add('hidden');
                            const icon = mobileMenuButton.querySelector('i');
                            icon.className = 'fas fa-bars text-xl';
                            mobileMenuButton.setAttribute('aria-expanded', 'false');
                        }
                    }
                });

                // Close mobile menu when window is resized to desktop size
                window.addEventListener('resize', function() {
                    if (window.innerWidth >= 640) { // sm breakpoint
                        mobileMenu.classList.add('hidden');
                        const icon = mobileMenuButton.querySelector('i');
                        icon.className = 'fas fa-bars text-lg';
                        mobileMenuButton.setAttribute('aria-expanded', 'false');
                    }
                });
            }
        });
    </script>

    @stack('scripts')
</body>

</html>
