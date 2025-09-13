<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - PasalMalla</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8'
                        }
                    }
                }
            }
        }
    </script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .sidebar-link {
            transition: all 0.3s ease;
        }
        .sidebar-link:hover {
            background: rgba(59, 130, 246, 0.1);
            border-left: 4px solid #3b82f6;
        }
        .sidebar-link.active {
            background: rgba(59, 130, 246, 0.1);
            border-left: 4px solid #3b82f6;
            color: #3b82f6;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-lg">
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-orange-700 rounded-lg flex items-center justify-center">
                        <i class="fas fa-school text-white text-lg"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">PasalMalla</h1>
                        <p class="text-xs text-gray-500">Admin Panel</p>
                    </div>
                </div>
            </div>

            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link flex items-center px-6 py-3 text-gray-700 {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>

                <a href="{{ route('admin.products.index') }}" class="sidebar-link flex items-center px-6 py-3 text-gray-700 {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                    <i class="fas fa-box mr-3"></i>
                    Products
                </a>

                <a href="{{ route('admin.bundles.index') }}" class="sidebar-link flex items-center px-6 py-3 text-gray-700 {{ request()->routeIs('admin.bundles.*') ? 'active' : '' }}">
                    <i class="fas fa-gift mr-3"></i>
                    Bundles
                </a>

                <a href="{{ route('admin.categories.index') }}" class="sidebar-link flex items-center px-6 py-3 text-gray-700 {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                    <i class="fas fa-tags mr-3"></i>
                    Categories
                </a>

                <a href="{{ route('admin.orders.index') }}" class="sidebar-link flex items-center px-6 py-3 text-gray-700 {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                    <i class="fas fa-shopping-cart mr-3"></i>
                    Orders
                </a>

                <a href="{{ route('admin.customers.index') }}" class="sidebar-link flex items-center px-6 py-3 text-gray-700 {{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">
                    <i class="fas fa-users mr-3"></i>
                    Customers
                </a>

                <a href="{{ route('admin.reports.index') }}" class="sidebar-link flex items-center px-6 py-3 text-gray-700 {{ request()->routeIs('admin.reports.*') ? 'active' : '' }}">
                    <i class="fas fa-chart-bar mr-3"></i>
                    Reports
                </a>

                <a href="{{ route('admin.settings.index') }}" class="sidebar-link flex items-center px-6 py-3 text-gray-700 {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                    <i class="fas fa-cog mr-3"></i>
                    Settings
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="flex items-center justify-between px-6 py-4">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">@yield('page-title', 'Dashboard')</h2>
                        <p class="text-gray-600">@yield('page-description', 'Welcome to PasalMalla Admin Panel')</p>
                    </div>

                    <div class="flex items-center space-x-4">
                        <!-- Notifications -->
                        <button class="relative p-2 text-gray-600 hover:text-gray-800">
                            <i class="fas fa-bell text-xl"></i>
                            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                        </button>

                        <!-- Admin Profile Dropdown -->
                        <div class="relative">
                            <button class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-100">
                                <div class="w-8 h-8 bg-primary-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-white text-sm"></i>
                                </div>
                                <div class="text-left">
                                    <p class="text-sm font-medium text-gray-800">{{ Auth::guard('admin')->user()->name }}</p>
                                    <p class="text-xs text-gray-500">{{ Auth::guard('admin')->user()->role }}</p>
                                </div>
                                <i class="fas fa-chevron-down text-gray-400"></i>
                            </button>

                            <!-- Dropdown Menu (hidden by default) -->
                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 hidden">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                                <div class="border-t border-gray-200"></div>
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                        <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6">
                @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
                @endif

                @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    {{ session('error') }}
                </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
