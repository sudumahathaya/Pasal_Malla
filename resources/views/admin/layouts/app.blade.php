<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - PasalMalla')</title>
    <meta name="description" content="@yield('description', 'PasalMalla Admin Dashboard - Manage your school supplies store')">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.svg') }}">

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Chart.js for dashboard charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @stack('styles')
    
    <!-- Custom Admin Styles -->
    <style>
        /* Ensure proper layout with wider sidebar */
        @media (min-width: 1024px) {
            .main-content {
                margin-left: 18rem; /* 18rem = 288px (w-72) */
                width: calc(100vw - 18rem);
                max-width: none;
                min-width: 0;
            }
        }
        
        /* Mobile layout */
        @media (max-width: 1023px) {
            .main-content {
                margin-left: 0;
                width: 100%;
            }
        }
        
        /* Smooth transitions for all elements */
        * {
            transition: all 0.2s ease-in-out;
        }
        
        /* Custom scrollbar for sidebar */
        .sidebar-scroll::-webkit-scrollbar {
            width: 4px;
        }
        
        .sidebar-scroll::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        
        .sidebar-scroll::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 2px;
        }
        
        .sidebar-scroll::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
        
        /* Ensure content doesn't overflow */
        .content-container {
            max-width: 100%;
            overflow-x: hidden;
            width: 100%;
        }
        
        /* Full width content */
        .full-width-content {
            width: 100%;
            max-width: none;
        }
        
        /* Better space utilization */
        .dashboard-grid {
            display: grid;
            gap: 1.5rem;
            width: 100%;
        }
        
        @media (min-width: 1024px) {
            .dashboard-grid {
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            }
        }
        
        /* Fix for sidebar positioning */
        .sidebar-fixed {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 50;
        }
        
        @media (min-width: 1024px) {
            .sidebar-fixed {
                position: static;
                height: auto;
            }
        }
    </style>
</head>

<body class="bg-gray-50 font-sans">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="w-72 bg-gradient-to-b from-white to-gray-50 shadow-2xl transform -translate-x-full lg:translate-x-0 transition-all duration-300 ease-in-out sidebar-fixed lg:static inset-y-0 left-0 z-50 border-r border-gray-200" id="sidebar">
            <div class="flex flex-col h-full">
                <!-- Logo Section -->
                <div class="p-6 border-b border-gray-200 bg-white">
                    <div class="flex items-center space-x-3">
                        <div class="w-14 h-14 bg-gradient-to-br from-orange-500 via-orange-600 to-red-500 rounded-2xl flex items-center justify-center shadow-lg ring-4 ring-orange-100">
                            <i class="fas fa-school text-white text-2xl"></i>
                        </div>
                        <div>
                            <h1 class="text-xl font-bold text-gray-800">PasalMalla</h1>
                            <p class="text-xs text-orange-600 font-semibold bg-orange-50 px-2 py-1 rounded-full">Admin Panel</p>
                        </div>
                    </div>
                </div>

                <!-- Navigation -->
                <div class="flex-1 overflow-y-auto py-6 sidebar-scroll">
                    <!-- Main Navigation -->
                    <nav class="space-y-2 px-4">
                        <!-- Dashboard -->
                        <a href="{{ route('admin.dashboard') }}" 
                           class="group flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-gradient-to-r hover:from-orange-50 hover:to-orange-100 hover:text-orange-700 transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-orange-50 to-orange-100 text-orange-700 shadow-md border-r-4 border-orange-500' : '' }}">
                            <div class="w-10 h-10 flex items-center justify-center rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-orange-500 text-white' : 'bg-gray-100 group-hover:bg-orange-200' }}">
                                <i class="fas fa-tachometer-alt text-lg"></i>
                            </div>
                            <div class="flex-1">
                                <span class="font-semibold">Dashboard</span>
                                <p class="text-xs text-gray-500">Overview & Analytics</p>
                            </div>
                        </a>
                        
                        <!-- Products Section -->
                        <div class="space-y-1">
                            <a href="{{ route('admin.products.index') }}" 
                               class="group flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:text-blue-700 transition-all duration-200 {{ request()->routeIs('admin.products.*') ? 'bg-gradient-to-r from-blue-50 to-blue-100 text-blue-700 shadow-md border-r-4 border-blue-500' : '' }}">
                                <div class="w-10 h-10 flex items-center justify-center rounded-lg {{ request()->routeIs('admin.products.*') ? 'bg-blue-500 text-white' : 'bg-gray-100 group-hover:bg-blue-200' }}">
                                    <i class="fas fa-box text-lg"></i>
                                </div>
                                <div class="flex-1">
                                    <span class="font-semibold">Products</span>
                                    <p class="text-xs text-gray-500">Manage inventory</p>
                                </div>
                            </a>
                        </div>
                        
                        <!-- Categories Section -->
                        <div class="space-y-1">
                            <a href="{{ route('admin.categories.index') }}" 
                               class="group flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-gradient-to-r hover:from-purple-50 hover:to-purple-100 hover:text-purple-700 transition-all duration-200 {{ request()->routeIs('admin.categories.*') ? 'bg-gradient-to-r from-purple-50 to-purple-100 text-purple-700 shadow-md border-r-4 border-purple-500' : '' }}">
                                <div class="w-10 h-10 flex items-center justify-center rounded-lg {{ request()->routeIs('admin.categories.*') ? 'bg-purple-500 text-white' : 'bg-gray-100 group-hover:bg-purple-200' }}">
                                    <i class="fas fa-tags text-lg"></i>
                                </div>
                                <div class="flex-1">
                                    <span class="font-semibold">Categories</span>
                                    <p class="text-xs text-gray-500">Product categories</p>
                                </div>
                            </a>
                        </div>
                        
                        <!-- Bundles Section -->
                        <div class="space-y-1">
                            <a href="{{ route('admin.bundles.index') }}" 
                               class="group flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-gradient-to-r hover:from-green-50 hover:to-green-100 hover:text-green-700 transition-all duration-200 {{ request()->routeIs('admin.bundles.*') ? 'bg-gradient-to-r from-green-50 to-green-100 text-green-700 shadow-md border-r-4 border-green-500' : '' }}">
                                <div class="w-10 h-10 flex items-center justify-center rounded-lg {{ request()->routeIs('admin.bundles.*') ? 'bg-green-500 text-white' : 'bg-gray-100 group-hover:bg-green-200' }}">
                                    <i class="fas fa-gift text-lg"></i>
                                </div>
                                <div class="flex-1">
                                    <span class="font-semibold">Bundles</span>
                                    <p class="text-xs text-gray-500">Product packages</p>
                                </div>
                            </a>
                        </div>
                        
                        <!-- Orders Section -->
                        <div class="space-y-1">
                            <a href="{{ route('admin.orders.index') }}" 
                               class="group flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-gradient-to-r hover:from-yellow-50 hover:to-yellow-100 hover:text-yellow-700 transition-all duration-200 {{ request()->routeIs('admin.orders.*') ? 'bg-gradient-to-r from-yellow-50 to-yellow-100 text-yellow-700 shadow-md border-r-4 border-yellow-500' : '' }}">
                                <div class="w-10 h-10 flex items-center justify-center rounded-lg {{ request()->routeIs('admin.orders.*') ? 'bg-yellow-500 text-white' : 'bg-gray-100 group-hover:bg-yellow-200' }}">
                                    <i class="fas fa-shopping-cart text-lg"></i>
                                </div>
                                <div class="flex-1">
                                    <span class="font-semibold">Orders</span>
                                    <p class="text-xs text-gray-500">Customer orders</p>
                                </div>
                            </a>
                        </div>
                        
                        <!-- Customers Section -->
                        <div class="space-y-1">
                            <a href="{{ route('admin.customers.index') }}" 
                               class="group flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-gradient-to-r hover:from-indigo-50 hover:to-indigo-100 hover:text-indigo-700 transition-all duration-200 {{ request()->routeIs('admin.customers.*') ? 'bg-gradient-to-r from-indigo-50 to-indigo-100 text-indigo-700 shadow-md border-r-4 border-indigo-500' : '' }}">
                                <div class="w-10 h-10 flex items-center justify-center rounded-lg {{ request()->routeIs('admin.customers.*') ? 'bg-indigo-500 text-white' : 'bg-gray-100 group-hover:bg-indigo-200' }}">
                                    <i class="fas fa-users text-lg"></i>
                                </div>
                                <div class="flex-1">
                                    <span class="font-semibold">Customers</span>
                                    <p class="text-xs text-gray-500">Customer management</p>
                                </div>
                            </a>
                        </div>
                        
                        <!-- Reports Section -->
                        <div class="space-y-1">
                            <a href="{{ route('admin.reports.index') }}" 
                               class="group flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-gradient-to-r hover:from-pink-50 hover:to-pink-100 hover:text-pink-700 transition-all duration-200 {{ request()->routeIs('admin.reports.*') ? 'bg-gradient-to-r from-pink-50 to-pink-100 text-pink-700 shadow-md border-r-4 border-pink-500' : '' }}">
                                <div class="w-10 h-10 flex items-center justify-center rounded-lg {{ request()->routeIs('admin.reports.*') ? 'bg-pink-500 text-white' : 'bg-gray-100 group-hover:bg-pink-200' }}">
                                    <i class="fas fa-chart-bar text-lg"></i>
                                </div>
                                <div class="flex-1">
                                    <span class="font-semibold">Reports</span>
                                    <p class="text-xs text-gray-500">Analytics & insights</p>
                                </div>
                            </a>
                        </div>
                    </nav>

                    <!-- Divider -->
                    <div class="border-t border-gray-200 my-6 mx-4"></div>

                    <!-- Quick Actions -->
                    <div class="px-4">
                        <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-4 flex items-center">
                            <i class="fas fa-bolt mr-2"></i>
                            Quick Actions
                        </h3>
                        <div class="space-y-2">
                            <a href="{{ route('admin.products.create') }}" 
                               class="group flex items-center space-x-3 px-4 py-2 rounded-lg text-sm text-gray-600 hover:bg-orange-50 hover:text-orange-600 transition-all duration-200 border border-transparent hover:border-orange-200">
                                <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-orange-100 group-hover:bg-orange-200">
                                    <i class="fas fa-plus text-orange-600"></i>
                                </div>
                                <span class="font-medium">Add Product</span>
                            </a>
                            <a href="{{ route('admin.categories.create') }}" 
                               class="group flex items-center space-x-3 px-4 py-2 rounded-lg text-sm text-gray-600 hover:bg-purple-50 hover:text-purple-600 transition-all duration-200 border border-transparent hover:border-purple-200">
                                <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-purple-100 group-hover:bg-purple-200">
                                    <i class="fas fa-plus text-purple-600"></i>
                                </div>
                                <span class="font-medium">Add Category</span>
                            </a>
                            <a href="{{ route('admin.bundles.create') }}" 
                               class="group flex items-center space-x-3 px-4 py-2 rounded-lg text-sm text-gray-600 hover:bg-green-50 hover:text-green-600 transition-all duration-200 border border-transparent hover:border-green-200">
                                <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-green-100 group-hover:bg-green-200">
                                    <i class="fas fa-plus text-green-600"></i>
                                </div>
                                <span class="font-medium">Create Bundle</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- User Profile & Settings Section -->
                <div class="p-4 border-t border-gray-200 bg-white">
                    <!-- Settings -->
                    <a href="{{ route('admin.settings.index') }}" 
                       class="group flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 transition-all duration-200 mb-3 {{ request()->routeIs('admin.settings.*') ? 'bg-gray-50 text-gray-800' : '' }}">
                        <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-gray-100 group-hover:bg-gray-200">
                            <i class="fas fa-cog text-lg"></i>
                        </div>
                        <span class="font-medium">Settings</span>
                    </a>
                    
                    <!-- Back to Site -->
                    <a href="{{ route('home') }}" 
                       class="group flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-orange-50 hover:text-orange-600 transition-all duration-200 border border-transparent hover:border-orange-200">
                        <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-orange-100 group-hover:bg-orange-200">
                            <i class="fas fa-external-link-alt text-orange-600"></i>
                        </div>
                        <span class="font-medium">Back to Site</span>
                    </a>
                    
                    <!-- Logout -->
                    <form method="POST" action="{{ route('admin.logout') }}" class="mt-3">
                        @csrf
                        <button type="submit" 
                                class="group w-full flex items-center space-x-3 px-4 py-3 rounded-lg text-red-600 hover:bg-red-50 transition-all duration-200 border border-transparent hover:border-red-200">
                            <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-red-100 group-hover:bg-red-200">
                                <i class="fas fa-sign-out-alt text-red-600"></i>
                            </div>
                            <span class="font-medium">Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden main-content">
            <!-- Top Header -->
            <header class="bg-white shadow-sm border-b border-gray-200 px-6 py-4 z-40">
                <div class="flex items-center justify-between">
                    <!-- Mobile menu button -->
                    <button id="sidebar-toggle" class="lg:hidden p-2 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors">
                        <i class="fas fa-bars text-lg"></i>
                    </button>

                    <!-- Page Title -->
                    <div class="flex-1">
                        <h1 class="text-2xl font-bold text-gray-800">@yield('page-title', 'Dashboard')</h1>
                        <p class="text-sm text-gray-600">@yield('page-description', 'Overview of your store performance')</p>
                    </div>

                    <!-- User Menu -->
                    <div class="flex items-center space-x-4">
                        <!-- Notifications -->
                        <button class="relative p-3 text-gray-600 hover:text-orange-600 transition-colors rounded-xl hover:bg-orange-50 group">
                            <i class="fas fa-bell text-lg group-hover:animate-pulse"></i>
                            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center font-bold animate-pulse">3</span>
                        </button>

                        <!-- Search -->
                        <button class="p-3 text-gray-600 hover:text-orange-600 transition-colors rounded-xl hover:bg-orange-50 group">
                            <i class="fas fa-search text-lg group-hover:scale-110 transition-transform"></i>
                        </button>

                        <!-- User Profile -->
                        <div class="flex items-center space-x-3 bg-gray-50 rounded-xl px-4 py-2 hover:bg-gray-100 transition-colors">
                            <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-orange-600 rounded-full flex items-center justify-center shadow-lg ring-2 ring-orange-100">
                                <i class="fas fa-user text-white"></i>
                            </div>
                            <div class="hidden sm:block">
                                <p class="text-sm font-semibold text-gray-800">Admin User</p>
                                <p class="text-xs text-orange-600 font-medium">Administrator</p>
                            </div>
                            <i class="fas fa-chevron-down text-gray-400 text-xs"></i>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto bg-gray-50 main-content">
                <div class="p-6 w-full content-container">
                    @if(session('success'))
                        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle mr-2"></i>
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                {{ session('error') }}
                            </div>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Sidebar Overlay (Mobile) -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden hidden"></div>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('sidebar-toggle');
            const sidebar = document.getElementById('sidebar');
            const sidebarOverlay = document.getElementById('sidebar-overlay');

            if (sidebarToggle && sidebar && sidebarOverlay) {
                // Toggle sidebar
                sidebarToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    sidebar.classList.toggle('-translate-x-full');
                    sidebarOverlay.classList.toggle('hidden');
                    
                    // Add smooth transition
                    sidebar.style.transition = 'transform 0.3s ease-in-out';
                });

                // Close sidebar when clicking overlay
                sidebarOverlay.addEventListener('click', function() {
                    sidebar.classList.add('-translate-x-full');
                    sidebarOverlay.classList.add('hidden');
                });

                // Close sidebar on window resize to desktop
                window.addEventListener('resize', function() {
                    if (window.innerWidth >= 1024) {
                        sidebar.classList.remove('-translate-x-full');
                        sidebarOverlay.classList.add('hidden');
                    } else {
                        // On mobile, ensure sidebar is hidden by default
                        sidebar.classList.add('-translate-x-full');
                        sidebarOverlay.classList.add('hidden');
                    }
                });

                // Close sidebar when clicking outside on mobile
                document.addEventListener('click', function(e) {
                    if (window.innerWidth < 1024) {
                        if (!sidebar.contains(e.target) && !sidebarToggle.contains(e.target)) {
                            sidebar.classList.add('-translate-x-full');
                            sidebarOverlay.classList.add('hidden');
                        }
                    }
                });

                // Add active state management
                const navLinks = sidebar.querySelectorAll('nav a');
                navLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        // Remove active state from all links
                        navLinks.forEach(l => {
                            l.classList.remove('bg-gradient-to-r', 'from-orange-50', 'to-orange-100', 'text-orange-700', 'shadow-md', 'border-r-4', 'border-orange-500');
                        });
                        
                        // Add active state to clicked link
                        this.classList.add('bg-gradient-to-r', 'from-orange-50', 'to-orange-100', 'text-orange-700', 'shadow-md', 'border-r-4', 'border-orange-500');
                    });
                });

                // Add hover effects for better UX
                const quickActionLinks = sidebar.querySelectorAll('.space-y-2 a');
                quickActionLinks.forEach(link => {
                    link.addEventListener('mouseenter', function() {
                        this.style.transform = 'translateX(4px)';
                        this.style.transition = 'transform 0.2s ease-in-out';
                    });
                    
                    link.addEventListener('mouseleave', function() {
                        this.style.transform = 'translateX(0)';
                    });
                });
            }

            // Add loading states for form submissions
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', function() {
                    const submitBtn = this.querySelector('button[type="submit"]');
                    if (submitBtn) {
                        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Processing...';
                        submitBtn.disabled = true;
                    }
                });
            });
        });
    </script>

    @stack('scripts')
</body>

</html>