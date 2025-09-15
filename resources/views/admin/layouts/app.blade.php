<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - PasalMalla</title>
    <meta name="description" content="@yield('description', 'PasalMalla Admin Panel')">
    
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    @stack('styles')
</head>

<body class="bg-gray-50 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="bg-white shadow-lg w-64 flex-shrink-0 overflow-y-auto">
            <!-- Logo -->
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-orange-700 rounded-lg flex items-center justify-center">
                        <i class="fas fa-school text-white text-lg"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-gray-800">PasalMalla</h1>
                        <p class="text-xs text-gray-500">Admin Panel</p>
                    </div>
                </div>
            </div>
            
            <!-- Navigation -->
            <nav class="mt-6 px-3">
                <div class="space-y-1">
                    <!-- Dashboard -->
                    <a href="{{ route('admin.dashboard') }}" 
                       class="flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-orange-100 text-orange-700' : 'text-gray-700 hover:bg-gray-100' }}">
                        <i class="fas fa-tachometer-alt mr-3 w-5 text-center"></i>
                        Dashboard
                    </a>
                    
                    <!-- Products -->
                    <div class="space-y-1">
                        <button class="w-full flex items-center justify-between px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg transition-colors" 
                                onclick="toggleSubmenu('products')">
                            <div class="flex items-center">
                                <i class="fas fa-box mr-3 w-5 text-center"></i>
                                Products
                            </div>
                            <i class="fas fa-chevron-down text-xs transition-transform" id="products-arrow"></i>
                        </button>
                        <div class="ml-6 space-y-1 hidden" id="products-submenu">
                            <a href="{{ route('admin.products.index') }}" 
                               class="flex items-center px-3 py-2 text-sm text-gray-600 hover:bg-gray-100 rounded-lg transition-colors {{ request()->routeIs('admin.products.*') ? 'bg-orange-50 text-orange-700' : '' }}">
                                <i class="fas fa-list mr-3 w-5 text-center"></i>
                                All Products
                            </a>
                            <a href="{{ route('admin.products.create') }}" 
                               class="flex items-center px-3 py-2 text-sm text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                                <i class="fas fa-plus mr-3 w-5 text-center"></i>
                                Add Product
                            </a>
                        </div>
                    </div>
                    
                    <!-- Categories -->
                    <div class="space-y-1">
                        <button class="w-full flex items-center justify-between px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg transition-colors" 
                                onclick="toggleSubmenu('categories')">
                            <div class="flex items-center">
                                <i class="fas fa-tags mr-3 w-5 text-center"></i>
                                Categories
                            </div>
                            <i class="fas fa-chevron-down text-xs transition-transform" id="categories-arrow"></i>
                        </button>
                        <div class="ml-6 space-y-1 hidden" id="categories-submenu">
                            <a href="{{ route('admin.categories.index') }}" 
                               class="flex items-center px-3 py-2 text-sm text-gray-600 hover:bg-gray-100 rounded-lg transition-colors {{ request()->routeIs('admin.categories.*') ? 'bg-orange-50 text-orange-700' : '' }}">
                                <i class="fas fa-list mr-3 w-5 text-center"></i>
                                All Categories
                            </a>
                            <a href="{{ route('admin.categories.create') }}" 
                               class="flex items-center px-3 py-2 text-sm text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                                <i class="fas fa-plus mr-3 w-5 text-center"></i>
                                Add Category
                            </a>
                        </div>
                    </div>
                    
                    <!-- Bundles -->
                    <div class="space-y-1">
                        <button class="w-full flex items-center justify-between px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg transition-colors" 
                                onclick="toggleSubmenu('bundles')">
                            <div class="flex items-center">
                                <i class="fas fa-gift mr-3 w-5 text-center"></i>
                                Bundles
                            </div>
                            <i class="fas fa-chevron-down text-xs transition-transform" id="bundles-arrow"></i>
                        </button>
                        <div class="ml-6 space-y-1 hidden" id="bundles-submenu">
                            <a href="{{ route('admin.bundles.index') }}" 
                               class="flex items-center px-3 py-2 text-sm text-gray-600 hover:bg-gray-100 rounded-lg transition-colors {{ request()->routeIs('admin.bundles.*') ? 'bg-orange-50 text-orange-700' : '' }}">
                                <i class="fas fa-list mr-3 w-5 text-center"></i>
                                All Bundles
                            </a>
                            <a href="{{ route('admin.bundles.create') }}" 
                               class="flex items-center px-3 py-2 text-sm text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                                <i class="fas fa-plus mr-3 w-5 text-center"></i>
                                Add Bundle
                            </a>
                        </div>
                    </div>
                    
                    <!-- Orders -->
                    <a href="{{ route('admin.orders.index') }}" 
                       class="flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.orders.*') ? 'bg-orange-100 text-orange-700' : 'text-gray-700 hover:bg-gray-100' }}">
                        <i class="fas fa-shopping-cart mr-3 w-5 text-center"></i>
                        Orders
                        @if(isset($stats) && $stats['pending_orders'] > 0)
                            <span class="ml-auto bg-red-500 text-white text-xs rounded-full px-2 py-1">{{ $stats['pending_orders'] }}</span>
                        @endif
                    </a>
                    
                    <!-- Customers -->
                    <a href="{{ route('admin.customers.index') }}" 
                       class="flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.customers.*') ? 'bg-orange-100 text-orange-700' : 'text-gray-700 hover:bg-gray-100' }}">
                        <i class="fas fa-users mr-3 w-5 text-center"></i>
                        Customers
                    </a>
                    
                    <!-- Reports -->
                    <div class="space-y-1">
                        <button class="w-full flex items-center justify-between px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg transition-colors" 
                                onclick="toggleSubmenu('reports')">
                            <div class="flex items-center">
                                <i class="fas fa-chart-bar mr-3 w-5 text-center"></i>
                                Reports
                            </div>
                            <i class="fas fa-chevron-down text-xs transition-transform" id="reports-arrow"></i>
                        </button>
                        <div class="ml-6 space-y-1 hidden" id="reports-submenu">
                            <a href="{{ route('admin.reports.index') }}" 
                               class="flex items-center px-3 py-2 text-sm text-gray-600 hover:bg-gray-100 rounded-lg transition-colors {{ request()->routeIs('admin.reports.index') ? 'bg-orange-50 text-orange-700' : '' }}">
                                <i class="fas fa-chart-line mr-3 w-5 text-center"></i>
                                Overview
                            </a>
                            <a href="{{ route('admin.reports.sales') }}" 
                               class="flex items-center px-3 py-2 text-sm text-gray-600 hover:bg-gray-100 rounded-lg transition-colors {{ request()->routeIs('admin.reports.sales') ? 'bg-orange-50 text-orange-700' : '' }}">
                                <i class="fas fa-dollar-sign mr-3 w-5 text-center"></i>
                                Sales Report
                            </a>
                            <a href="{{ route('admin.reports.products') }}" 
                               class="flex items-center px-3 py-2 text-sm text-gray-600 hover:bg-gray-100 rounded-lg transition-colors {{ request()->routeIs('admin.reports.products') ? 'bg-orange-50 text-orange-700' : '' }}">
                                <i class="fas fa-box mr-3 w-5 text-center"></i>
                                Product Report
                            </a>
                            <a href="{{ route('admin.reports.customers') }}" 
                               class="flex items-center px-3 py-2 text-sm text-gray-600 hover:bg-gray-100 rounded-lg transition-colors {{ request()->routeIs('admin.reports.customers') ? 'bg-orange-50 text-orange-700' : '' }}">
                                <i class="fas fa-users mr-3 w-5 text-center"></i>
                                Customer Report
                            </a>
                        </div>
                    </div>
                    
                    <!-- Settings -->
                    <a href="{{ route('admin.settings.index') }}" 
                       class="flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.settings.*') ? 'bg-orange-100 text-orange-700' : 'text-gray-700 hover:bg-gray-100' }}">
                        <i class="fas fa-cog mr-3 w-5 text-center"></i>
                        Settings
                    </a>
                </div>
            </nav>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header class="bg-white shadow-sm border-b border-gray-200 px-6 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">@yield('page-title', 'Dashboard')</h1>
                        <p class="text-sm text-gray-600">@yield('page-description', 'Manage your store')</p>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <!-- Notifications -->
                        <button class="relative p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors">
                            <i class="fas fa-bell text-lg"></i>
                            @if(isset($stats) && $stats['pending_orders'] > 0)
                                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">{{ $stats['pending_orders'] }}</span>
                            @endif
                        </button>
                        
                        <!-- Admin Profile -->
                        <div class="relative">
                            <button class="flex items-center space-x-3 p-2 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors" 
                                    onclick="toggleProfileMenu()">
                                <div class="w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-white text-sm"></i>
                                </div>
                                <div class="text-left">
                                    <p class="text-sm font-medium">Admin User</p>
                                    <p class="text-xs text-gray-500">Administrator</p>
                                </div>
                                <i class="fas fa-chevron-down text-xs"></i>
                            </button>
                            
                            <!-- Profile Dropdown -->
                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 hidden" id="profile-menu">
                                <div class="py-1">
                                    <a href="{{ route('admin.settings.index') }}" 
                                       class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-cog mr-3"></i>
                                        Settings
                                    </a>
                                    <a href="{{ route('home') }}" 
                                       class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-external-link-alt mr-3"></i>
                                        View Store
                                    </a>
                                    <hr class="my-1">
                                    <form method="POST" action="{{ route('admin.logout') }}">
                                        @csrf
                                        <button type="submit" 
                                                class="flex items-center w-full px-4 py-2 text-sm text-red-700 hover:bg-red-50">
                                            <i class="fas fa-sign-out-alt mr-3"></i>
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6">
                <!-- Flash Messages -->
                @if(session('success'))
                    <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg flex items-center">
                        <i class="fas fa-check-circle mr-2"></i>
                        {{ session('success') }}
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg flex items-center">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        {{ session('error') }}
                    </div>
                @endif
                
                @if(session('warning'))
                    <div class="mb-6 bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded-lg flex items-center">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        {{ session('warning') }}
                    </div>
                @endif
                
                @if(session('info'))
                    <div class="mb-6 bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded-lg flex items-center">
                        <i class="fas fa-info-circle mr-2"></i>
                        {{ session('info') }}
                    </div>
                @endif
                
                @yield('content')
            </main>
        </div>
    </div>
    
    <!-- JavaScript -->
    <script>
        // Toggle submenu
        function toggleSubmenu(menuName) {
            const submenu = document.getElementById(menuName + '-submenu');
            const arrow = document.getElementById(menuName + '-arrow');
            
            if (submenu.classList.contains('hidden')) {
                submenu.classList.remove('hidden');
                arrow.style.transform = 'rotate(180deg)';
            } else {
                submenu.classList.add('hidden');
                arrow.style.transform = 'rotate(0deg)';
            }
        }
        
        // Toggle profile menu
        function toggleProfileMenu() {
            const menu = document.getElementById('profile-menu');
            menu.classList.toggle('hidden');
        }
        
        // Close profile menu when clicking outside
        document.addEventListener('click', function(e) {
            const profileMenu = document.getElementById('profile-menu');
            const profileButton = e.target.closest('button[onclick="toggleProfileMenu()"]');
            
            if (!profileButton && !profileMenu.contains(e.target)) {
                profileMenu.classList.add('hidden');
            }
        });
        
        // Auto-hide flash messages
        setTimeout(function() {
            const flashMessages = document.querySelectorAll('.bg-green-100, .bg-red-100, .bg-yellow-100, .bg-blue-100');
            flashMessages.forEach(function(message) {
                message.style.transition = 'opacity 0.5s';
                message.style.opacity = '0';
                setTimeout(function() {
                    message.remove();
                }, 500);
            });
        }, 5000);
    </script>
    
    @stack('scripts')
</body>
</html>