<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - PasalMalla</title>
<<<<<<< HEAD

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

=======
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-blue-500 to-purple-600 min-h-screen flex items-center justify-center">
    <div class="bg-white rounded-2xl shadow-2xl p-8 w-full max-w-md">
        <!-- Logo -->
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-700 rounded-xl flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-school text-white text-2xl"></i>
            </div>
            <h1 class="text-2xl font-bold text-gray-800">PasalMalla Admin</h1>
            <p class="text-gray-600">Sign in to your admin account</p>
        </div>
<<<<<<< HEAD

        <!-- Login Form -->
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf

=======
        
        <!-- Login Form -->
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
            <!-- Email -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                <div class="relative">
                    <input type="email" name="email" value="{{ old('email') }}" required
                           class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('email') border-red-500 @enderror">
                    <i class="fas fa-envelope absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
                @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
<<<<<<< HEAD

=======
            
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
            <!-- Password -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <div class="relative">
                    <input type="password" name="password" required
                           class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('password') border-red-500 @enderror">
                    <i class="fas fa-lock absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
                @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
<<<<<<< HEAD

=======
            
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
            <!-- Remember Me -->
            <div class="flex items-center justify-between mb-6">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>
<<<<<<< HEAD

=======
            
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
            <!-- Submit Button -->
            <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-3 rounded-lg font-semibold hover:from-blue-600 hover:to-purple-700 transition-all duration-300 transform hover:scale-105">
                <i class="fas fa-sign-in-alt mr-2"></i>
                Sign In
            </button>
        </form>
<<<<<<< HEAD

=======
        
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
        <!-- Register Link -->
        <div class="text-center mt-6">
            <p class="text-gray-600">Don't have an account?</p>
            <a href="{{ route('admin.register') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                Create admin account
            </a>
        </div>
<<<<<<< HEAD

=======
        
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
        <!-- Back to Site -->
        <div class="text-center mt-6">
            <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-800 text-sm">
                <i class="fas fa-arrow-left mr-1"></i>
                Back to Website
            </a>
        </div>
    </div>
</body>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
